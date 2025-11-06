<?php
require_once 'config.php';
requireLogin();

$lesson_id = isset($_GET['id']) ? (int)$_GET['id'] : 0;

if (!$lesson_id) {
    redirect('dashboard.php');
}

$user = getCurrentUser();
$db_lang = getLanguageDB();
$db_users = getUserDB();

// Get lesson details
$stmt = $db_lang->prepare("SELECT l.*, lg.code as lang_code FROM lessons l JOIN languages lg ON l.language_id = lg.id WHERE l.id = ?");
$stmt->execute([$lesson_id]);
$lesson = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$lesson) {
    redirect('dashboard.php');
}

// Get all exercises for this lesson
$stmt = $db_lang->prepare("SELECT * FROM exercises WHERE lesson_id = ? ORDER BY exercise_number");
$stmt->execute([$lesson_id]);
$exercises = $stmt->fetchAll(PDO::FETCH_ASSOC);

if (empty($exercises)) {
    die('Denna lektion har inga övningar ännu.');
}

$page_title = $lesson['title'] . ' - ' . SITE_NAME;
include 'includes/header.php';
?>

<div class="lesson-container">
    <div class="lesson-header">
        <a href="dashboard.php" class="back-button">← Tillbaka</a>
        <div class="lesson-info">
            <span class="lesson-theme-badge"><?php echo htmlspecialchars($lesson['theme']); ?></span>
            <h1><?php echo htmlspecialchars($lesson['title']); ?></h1>
            <p><?php echo htmlspecialchars($lesson['description']); ?></p>
        </div>
        <div class="progress-bar">
            <div class="progress-fill" id="progressBar"></div>
            <span class="progress-text" id="progressText">0 / <?php echo count($exercises); ?></span>
        </div>
    </div>
    
    <div class="exercise-area" id="exerciseArea">
        <!-- Exercises will be loaded here via JavaScript -->
    </div>
</div>

<script>
const lessonData = {
    lessonId: <?php echo $lesson_id; ?>,
    exercises: <?php echo json_encode($exercises); ?>,
    totalExercises: <?php echo count($exercises); ?>,
    currentExercise: 0,
    correctAnswers: 0
};

let currentExerciseIndex = 0;
let correctAnswersCount = 0;
let currentAttempts = 0;
let currentCorrectAnswer = null;

// Helper function to normalize text for comparison (remove punctuation, lowercase, trim)
function normalizeText(text) {
    return text.toLowerCase()
        .trim()
        .replace(/[.,!?;:"""'']/g, '')
        .replace(/\s+/g, ' ');
}

function loadExercise(index) {
    console.log('=== Loading exercise ===');
    console.log('Index:', index, 'Total:', lessonData.totalExercises);
    
    currentAttempts = 0;
    currentCorrectAnswer = null;
    if (index >= lessonData.exercises.length) {
        console.log('All exercises completed! Showing results...');
        showResults();
        return;
    }
    
    const exercise = lessonData.exercises[index];
    console.log('Loading exercise type:', exercise.type);
    const data = JSON.parse(exercise.data);
    const exerciseArea = document.getElementById('exerciseArea');
    
    // Update progress
    document.getElementById('progressText').textContent = `${index} / ${lessonData.totalExercises}`;
    const progressPercent = (index / lessonData.totalExercises) * 100;
    document.getElementById('progressBar').style.width = progressPercent + '%';
    
    let html = '';
    
    switch(exercise.type) {
        case 'multiple_choice':
            html = createMultipleChoice(exercise, data);
            break;
        case 'translation':
            html = createTranslation(exercise, data);
            break;
        case 'matching':
            html = createMatching(exercise, data);
            break;
        case 'word_order':
            html = createWordOrder(exercise, data);
            break;
        case 'fill_blank':
            html = createFillBlank(exercise, data);
            break;
        case 'explanation':
            html = createExplanation(exercise, data);
            break;
    }
    
    exerciseArea.innerHTML = html;
}

function createMultipleChoice(exercise, data) {
    return `
        <div class="exercise-card">
            <h2 class="exercise-question">${exercise.question}</h2>
            <div class="options-grid">
                ${data.options.map((option, i) => `
                    <button class="option-btn" onclick="checkMultipleChoice(${i}, ${data.correct})">${option}</button>
                `).join('')}
            </div>
            <button class="hint-btn" onclick="showHint('multiple_choice', ${data.correct}, ${JSON.stringify(data.options).replace(/"/g, '&quot;')})">💡 Jag behöver hjälp</button>
            <div id="feedback" class="feedback"></div>
        </div>
    `;
}

function createTranslation(exercise, data) {
    return `
        <div class="exercise-card">
            <h2 class="exercise-question">${exercise.question}</h2>
            <div class="translation-input">
                <input type="text" id="translationInput" class="text-input" placeholder="Skriv din översättning här...">
                <button class="btn btn-primary" onclick="checkTranslation('${data.correct.replace(/'/g, "\\'")}')">Kontrollera</button>
            </div>
            <button class="hint-btn" onclick="showHint('translation', '${data.correct.replace(/'/g, "\\'")}')">💡 Jag behöver hjälp</button>
            <div id="feedback" class="feedback"></div>
        </div>
    `;
}

function createMatching(exercise, data) {
    const shuffledRight = [...data.right].sort(() => Math.random() - 0.5);
    return `
        <div class="exercise-card">
            <h2 class="exercise-question">${exercise.question}</h2>
            <div class="matching-container">
                <div class="matching-column">
                    ${data.left.map((item, i) => `
                        <div class="matching-item left" data-index="${i}">${item}</div>
                    `).join('')}
                </div>
                <div class="matching-column">
                    ${shuffledRight.map((item, i) => `
                        <button class="matching-item right" data-value="${item}" onclick="selectMatch(this)">${item}</button>
                    `).join('')}
                </div>
            </div>
            <button class="btn btn-primary" onclick="checkMatching(${JSON.stringify(data.pairs).replace(/"/g, '&quot;')})" style="display:none;" id="checkMatchBtn">Kontrollera</button>
            <div id="feedback" class="feedback"></div>
        </div>
    `;
}

function createWordOrder(exercise, data) {
    const shuffledWords = [...data.words].sort(() => Math.random() - 0.5);
    return `
        <div class="exercise-card">
            <h2 class="exercise-question">${exercise.question}</h2>
            <div class="word-bank">
                ${shuffledWords.map((word, i) => `
                    <button class="word-chip" onclick="addWord('${word.replace(/'/g, "\\'")}', this)">${word}</button>
                `).join('')}
            </div>
            <div class="sentence-area" id="sentenceArea"></div>
            <button class="btn btn-primary" onclick="checkWordOrder('${data.correct.replace(/'/g, "\\'")}')">Kontrollera</button>
            <button class="hint-btn" onclick="showHint('word_order', '${data.correct.replace(/'/g, "\\'")}')">💡 Jag behöver hjälp</button>
            <div id="feedback" class="feedback"></div>
        </div>
    `;
}

function createFillBlank(exercise, data) {
    const sentenceWithBlank = data.sentence.replace('___', '<input type="text" id="blankInput" class="blank-input">');
    return `
        <div class="exercise-card">
            <h2 class="exercise-question">${exercise.question}</h2>
            <div class="fill-blank-sentence">${sentenceWithBlank}</div>
            <button class="btn btn-primary" onclick="checkFillBlank('${data.correct.replace(/'/g, "\\'")}')">Kontrollera</button>
            <button class="hint-btn" onclick="showHint('fill_blank', '${data.correct.replace(/'/g, "\\'")}')">💡 Jag behöver hjälp</button>
            <div id="feedback" class="feedback"></div>
        </div>
    `;
}

function createExplanation(exercise, data) {
    return `
        <div class="exercise-card explanation-card">
            <h2 class="exercise-question">${exercise.question}</h2>
            <div class="explanation-box">
                <h3>📚 Förklaring</h3>
                <p class="explanation-text">${data.explanation}</p>
                <div class="example-box">
                    <strong>Exempel:</strong> <em>${data.example}</em>
                </div>
            </div>
            <hr style="margin: 20px 0; border: none; border-top: 2px solid #e0e0e0;">
            <h3 class="quiz-question">${data.question}</h3>
            <div class="options-grid">
                ${data.options.map((option, i) => `
                    <button class="option-btn" onclick="checkMultipleChoice(${i}, ${data.correct})">${option}</button>
                `).join('')}
            </div>
            <div id="feedback" class="feedback"></div>
        </div>
    `;
}

function checkMultipleChoice(selected, correct) {
    console.log('Selected:', selected, 'Type:', typeof selected);
    console.log('Correct:', correct, 'Type:', typeof correct);
    
    const buttons = document.querySelectorAll('.option-btn');
    const isCorrect = selected.toString() === correct.toString();
    
    console.log('Is correct?', isCorrect);
    
    buttons.forEach((btn, i) => {
        btn.disabled = true;
        if (i.toString() === correct.toString()) {
            btn.classList.add('correct');
        } else if (i === selected && !isCorrect) {
            btn.classList.add('incorrect');
        }
    });
    
    if (isCorrect) {
        correctAnswersCount++;
        console.log('Answer is correct! Moving to next exercise...');
        console.log('Current index:', currentExerciseIndex);
        console.log('Total exercises:', lessonData.totalExercises);
        showFeedback(true, 'Rätt! 🎉');
        setTimeout(() => {
            currentExerciseIndex++;
            console.log('New index:', currentExerciseIndex);
            loadExercise(currentExerciseIndex);
        }, 1500);
    } else {
        currentAttempts++;
        if (currentAttempts === 1) {
            showFeedback(false, 'Inte riktigt. Försök igen!');
            setTimeout(() => {
                // Reload same exercise
                loadExercise(currentExerciseIndex);
            }, 2000);
        } else {
            // Get current exercise data for explanation
            const exercise = lessonData.exercises[currentExerciseIndex];
            const data = JSON.parse(exercise.data);
            const correctAnswerText = data.options[correct];
            let explanation = `Det rätta svaret var "${correctAnswerText}".`;
            
            // Add explanation if it's an explanation-type exercise
            if (data.explanation) {
                explanation = data.explanation;
            }
            
            showFeedback(false, 'Tyvärr inte rätt...');
            setTimeout(() => {
                showExplanationModal(correctAnswerText, explanation);
            }, 1500);
        }
    }
}

function checkTranslation(correct) {
    const input = document.getElementById('translationInput');
    const userAnswer = normalizeText(input.value);
    const acceptedAnswers = correct.split('|').map(a => normalizeText(a));
    const isCorrect = acceptedAnswers.includes(userAnswer);
    
    if (isCorrect) {
        correctAnswersCount++;
        showFeedback(true, 'Perfekt! 🎉');
        input.disabled = true;
        setTimeout(() => {
            currentExerciseIndex++;
            loadExercise(currentExerciseIndex);
        }, 1500);
    } else {
        currentAttempts++;
        currentCorrectAnswer = acceptedAnswers[0];
        
        if (currentAttempts === 1) {
            showFeedback(false, 'Inte riktigt. Försök igen!');
            input.value = '';
            input.focus();
        } else if (currentAttempts === 2) {
            // Show hint - first letter(s)
            const hint = currentCorrectAnswer.substring(0, Math.ceil(currentCorrectAnswer.length / 3));
            showFeedback(false, `Ledtråd: Börjar med "${hint}..."`);
            input.value = '';
            input.focus();
        } else {
            // After third attempt, show explanation modal
            const exercise = lessonData.exercises[currentExerciseIndex];
            const allAcceptedAnswers = acceptedAnswers.join(' / ');
            const explanation = `Möjliga översättningar: ${allAcceptedAnswers}`;
            
            input.disabled = true;
            showFeedback(false, 'Tyvärr inte rätt...');
            setTimeout(() => {
                showExplanationModal(allAcceptedAnswers, explanation);
            }, 1500);
        }
    }
}

let selectedMatches = {};

function selectMatch(btn) {
    const allBtns = document.querySelectorAll('.matching-item.right');
    allBtns.forEach(b => b.classList.remove('selected'));
    btn.classList.add('selected');
    
    document.getElementById('checkMatchBtn').style.display = 'block';
}

function checkMatching(correctPairs) {
    // Simplified matching check - always counts as correct for now
    correctAnswersCount++;
    showFeedback(true, 'Bra jobbat! 🎉');
    setTimeout(() => {
        currentExerciseIndex++;
        loadExercise(currentExerciseIndex);
    }, 1500);
}

let sentenceWords = [];

function addWord(word, btn) {
    sentenceWords.push(word);
    btn.disabled = true;
    btn.style.opacity = '0.3';
    document.getElementById('sentenceArea').innerHTML = sentenceWords.join(' ');
}

function checkWordOrder(correct) {
    const userSentence = normalizeText(sentenceWords.join(' '));
    const correctSentence = normalizeText(correct);
    const isCorrect = userSentence === correctSentence;
    
    if (isCorrect) {
        correctAnswersCount++;
        showFeedback(true, 'Utmärkt! 🎉');
        setTimeout(() => {
            currentExerciseIndex++;
            loadExercise(currentExerciseIndex);
        }, 1500);
    } else {
        currentAttempts++;
        
        if (currentAttempts === 1) {
            showFeedback(false, 'Inte rätt ordning. Försök igen!');
            sentenceWords = [];
            document.querySelectorAll('.word-chip').forEach(btn => {
                btn.disabled = false;
                btn.style.opacity = '1';
            });
            document.getElementById('sentenceArea').innerHTML = '';
        } else if (currentAttempts === 2) {
            // Show hint - first two words
            const words = correct.split(' ');
            const hint = words.slice(0, 2).join(' ');
            showFeedback(false, `Ledtråd: Börjar med "${hint}..."`);
            sentenceWords = [];
            document.querySelectorAll('.word-chip').forEach(btn => {
                btn.disabled = false;
                btn.style.opacity = '1';
            });
            document.getElementById('sentenceArea').innerHTML = '';
        } else {
            // Show explanation modal
            const explanation = `Den rätta ordningen är: "${correct}"`;
            showFeedback(false, 'Tyvärr inte rätt...');
            setTimeout(() => {
                showExplanationModal(correct, explanation);
            }, 1500);
        }
    }
}

function checkFillBlank(correct) {
    const input = document.getElementById('blankInput');
    const userAnswer = normalizeText(input.value);
    const acceptedAnswers = correct.split('|').map(a => normalizeText(a));
    const isCorrect = acceptedAnswers.includes(userAnswer);
    
    if (isCorrect) {
        correctAnswersCount++;
        showFeedback(true, 'Riktigt bra! 🎉');
        input.disabled = true;
        setTimeout(() => {
            currentExerciseIndex++;
            loadExercise(currentExerciseIndex);
        }, 1500);
    } else {
        currentAttempts++;
        currentCorrectAnswer = acceptedAnswers[0];
        
        if (currentAttempts === 1) {
            showFeedback(false, 'Inte rätt. Försök igen!');
            input.value = '';
            input.focus();
        } else if (currentAttempts === 2) {
            // Show hint
            const hint = currentCorrectAnswer.substring(0, 2);
            showFeedback(false, `Ledtråd: Börjar med "${hint}..."`);
            input.value = '';
            input.focus();
        } else {
            // Show explanation modal
            const allAcceptedAnswers = acceptedAnswers.join(' / ');
            const explanation = `Möjliga svar: ${allAcceptedAnswers}`;
            
            input.disabled = true;
            showFeedback(false, 'Tyvärr inte rätt...');
            setTimeout(() => {
                showExplanationModal(allAcceptedAnswers, explanation);
            }, 1500);
        }
    }
}

function showFeedback(isCorrect, message) {
    const feedback = document.getElementById('feedback');
    feedback.className = 'feedback ' + (isCorrect ? 'correct' : 'incorrect');
    feedback.textContent = message;
    feedback.style.display = 'block';
}

function showExplanationModal(correctAnswer, explanation) {
    const modal = document.createElement('div');
    modal.className = 'explanation-modal';
    modal.innerHTML = `
        <div class="explanation-modal-content">
            <h2>📖 Rätt svar</h2>
            <div class="correct-answer-box">
                <strong>Rätt svar:</strong> ${correctAnswer}
            </div>
            ${explanation ? `
                <div class="explanation-text-box">
                    <strong>Förklaring:</strong>
                    <p>${explanation}</p>
                </div>
            ` : ''}
            <button class="btn btn-primary" onclick="closeExplanationAndContinue()">OK, jag förstår! →</button>
        </div>
    `;
    document.body.appendChild(modal);
}

function closeExplanationAndContinue() {
    const modal = document.querySelector('.explanation-modal');
    if (modal) {
        modal.remove();
    }
    currentExerciseIndex++;
    loadExercise(currentExerciseIndex);
}

function showHint(exerciseType, correctAnswer, options = null) {
    let hintText = '';
    
    switch(exerciseType) {
        case 'multiple_choice':
            // Show which option is correct (by number)
            const correctIndex = parseInt(correctAnswer);
            hintText = `Ledtråd: Det rätta svaret är alternativ nummer ${correctIndex + 1}.`;
            break;
            
        case 'translation':
            // Show first half of the answer
            const answers = correctAnswer.split('|');
            const mainAnswer = answers[0];
            const halfLength = Math.ceil(mainAnswer.length / 2);
            const hint = mainAnswer.substring(0, halfLength);
            hintText = `Ledtråd: Svaret börjar med "${hint}..."`;
            if (answers.length > 1) {
                hintText += `\n\nDet finns flera möjliga svar.`;
            }
            break;
            
        case 'word_order':
            // Show first 2-3 words
            const words = correctAnswer.split(' ');
            const firstWords = words.slice(0, Math.min(3, words.length));
            hintText = `Ledtråd: Meningen börjar med: "${firstWords.join(' ')}..."`;
            break;
            
        case 'fill_blank':
            // Show first 2-3 letters and word length
            const blankAnswers = correctAnswer.split('|');
            const blankMain = blankAnswers[0];
            const blankHint = blankMain.substring(0, Math.min(3, blankMain.length));
            hintText = `Ledtråd: Ordet börjar med "${blankHint}..." och är ${blankMain.length} bokstäver långt.`;
            if (blankAnswers.length > 1) {
                hintText += `\n\nDet finns flera möjliga svar.`;
            }
            break;
    }
    
    showFeedback(false, hintText);
    
    // Hide hint button after use
    const hintBtn = document.querySelector('.hint-btn');
    if (hintBtn) {
        hintBtn.style.display = 'none';
    }
}

async function showResults() {
    const score = Math.round((correctAnswersCount / lessonData.totalExercises) * 100);
    
    // Save progress to database
    const formData = new FormData();
    formData.append('lesson_id', lessonData.lessonId);
    formData.append('score', score);
    formData.append('completed', score >= 50 ? 1 : 0);
    
    await fetch('includes/save_progress.php', {
        method: 'POST',
        body: formData
    });
    
    document.getElementById('exerciseArea').innerHTML = `
        <div class="results-card">
            <h1>Lektion genomförd! 🎉</h1>
            <div class="score-circle">
                <div class="score-number">${score}%</div>
            </div>
            <p class="results-text">Du fick ${correctAnswersCount} av ${lessonData.totalExercises} rätt!</p>
            ${score >= 80 ? '<p class="results-message">Fantastiskt resultat! 🌟</p>' : 
              score >= 50 ? '<p class="results-message">Bra jobbat! 👍</p>' : 
              '<p class="results-message">Fortsätt öva! 💪</p>'}
            <div class="results-actions">
                <a href="lesson.php?id=<?php echo $lesson_id; ?>" class="btn btn-outline">Gör om lektionen</a>
                <a href="dashboard.php" class="btn btn-primary">Tillbaka till dashboard</a>
            </div>
        </div>
    `;
    
    document.getElementById('progressBar').style.width = '100%';
    document.getElementById('progressText').textContent = `${lessonData.totalExercises} / ${lessonData.totalExercises}`;
}

// Load first exercise
loadExercise(0);
</script>

<?php include 'includes/footer.php'; ?>
