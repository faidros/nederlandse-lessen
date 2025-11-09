<?php
require_once '../config.php';
requireAdmin();

$db_lang = getLanguageDB();
$db_users = getUserDB();

$lesson_id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
$is_edit = $lesson_id > 0;

// Get lesson if editing
$lesson = null;
$exercises = [];
if ($is_edit) {
    $stmt = $db_lang->prepare("SELECT * FROM lessons WHERE id = ?");
    $stmt->execute([$lesson_id]);
    $lesson = $stmt->fetch(PDO::FETCH_ASSOC);
    
    if (!$lesson) {
        redirect('lessons.php');
    }
    
    // Get exercises
    $stmt = $db_lang->prepare("SELECT * FROM exercises WHERE lesson_id = ? ORDER BY exercise_number");
    $stmt->execute([$lesson_id]);
    $exercises = $stmt->fetchAll(PDO::FETCH_ASSOC);
}

// Get all languages
$languages = $db_lang->query("SELECT * FROM languages WHERE active = 1 ORDER BY name")->fetchAll(PDO::FETCH_ASSOC);

// Handle form submission
$error = '';
$success = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['save_lesson'])) {
    $language_id = (int)$_POST['language_id'];
    $lesson_number = (int)$_POST['lesson_number'];
    $theme = trim($_POST['theme']);
    $title = trim($_POST['title']);
    $description = trim($_POST['description']);
    
    if ($language_id && $lesson_number && $theme && $title && $description) {
        if ($is_edit) {
            // Update existing lesson
            $stmt = $db_lang->prepare("UPDATE lessons SET language_id = ?, lesson_number = ?, theme = ?, title = ?, description = ? WHERE id = ?");
            $stmt->execute([$language_id, $lesson_number, $theme, $title, $description, $lesson_id]);
            
            logAdminActivity('update_lesson', "Updated lesson: $title (ID: $lesson_id)");
            $success = "Lektion uppdaterad!";
        } else {
            // Create new lesson
            $stmt = $db_lang->prepare("INSERT INTO lessons (language_id, lesson_number, theme, title, description) VALUES (?, ?, ?, ?, ?)");
            $stmt->execute([$language_id, $lesson_number, $theme, $title, $description]);
            $lesson_id = $db_lang->lastInsertId();
            
            logAdminActivity('create_lesson', "Created lesson: $title (ID: $lesson_id)");
            $success = "Lektion skapad! ID: $lesson_id";
            $is_edit = true;
            
            // Reload lesson data
            $stmt = $db_lang->prepare("SELECT * FROM lessons WHERE id = ?");
            $stmt->execute([$lesson_id]);
            $lesson = $stmt->fetch(PDO::FETCH_ASSOC);
        }
    } else {
        $error = "Alla fält måste fyllas i.";
    }
}

// Handle exercise deletion
if (isset($_POST['delete_exercise'])) {
    $exercise_id = (int)$_POST['exercise_id'];
    $db_lang->prepare("DELETE FROM exercises WHERE id = ?")->execute([$exercise_id]);
    
    logAdminActivity('delete_exercise', "Deleted exercise ID: $exercise_id from lesson ID: $lesson_id");
    $success = "Övning borttagen!";
    
    // Reload exercises
    $stmt = $db_lang->prepare("SELECT * FROM exercises WHERE lesson_id = ? ORDER BY exercise_number");
    $stmt->execute([$lesson_id]);
    $exercises = $stmt->fetchAll(PDO::FETCH_ASSOC);
}

// Handle add/update exercise
if (isset($_POST['save_exercise'])) {
    $exercise_id = isset($_POST['exercise_id']) ? (int)$_POST['exercise_id'] : 0;
    $exercise_number = (int)$_POST['exercise_number'];
    $type = $_POST['exercise_type'];
    $question = trim($_POST['question']);
    
    // Build data JSON based on type
    $data = [];
    
    if ($type === 'multiple_choice') {
        $options = array_filter(array_map('trim', [
            $_POST['option_0'] ?? '',
            $_POST['option_1'] ?? '',
            $_POST['option_2'] ?? '',
            $_POST['option_3'] ?? ''
        ]));
        $correct_index = (int)$_POST['correct_index'];
        $explanation = trim($_POST['explanation']);
        
        $data = [
            'options' => array_values($options),
            'correct' => $correct_index,
            'explanation' => $explanation
        ];
    } elseif ($type === 'translation') {
        $data = [
            'correct' => trim($_POST['correct_answer']),
            'explanation' => trim($_POST['explanation'])
        ];
    } elseif ($type === 'fill_blank') {
        $sentence = trim($_POST['sentence']);
        $data = [
            'sentence' => $sentence,
            'correct' => trim($_POST['correct_answer']),
            'explanation' => trim($_POST['explanation'])
        ];
    }
    
    $data_json = json_encode($data, JSON_UNESCAPED_UNICODE);
    
    if ($exercise_id > 0) {
        // Update existing exercise
        $stmt = $db_lang->prepare("UPDATE exercises SET exercise_number = ?, type = ?, question = ?, data = ? WHERE id = ?");
        $stmt->execute([$exercise_number, $type, $question, $data_json, $exercise_id]);
        
        logAdminActivity('update_exercise', "Updated exercise ID: $exercise_id in lesson ID: $lesson_id");
        $success = "Övning uppdaterad!";
    } else {
        // Create new exercise
        $stmt = $db_lang->prepare("INSERT INTO exercises (lesson_id, exercise_number, type, question, data) VALUES (?, ?, ?, ?, ?)");
        $stmt->execute([$lesson_id, $exercise_number, $type, $question, $data_json]);
        
        logAdminActivity('create_exercise', "Created exercise in lesson ID: $lesson_id");
        $success = "Övning tillagd!";
    }
    
    // Reload exercises
    $stmt = $db_lang->prepare("SELECT * FROM exercises WHERE lesson_id = ? ORDER BY exercise_number");
    $stmt->execute([$lesson_id]);
    $exercises = $stmt->fetchAll(PDO::FETCH_ASSOC);
}

$page_title = ($is_edit ? 'Redigera' : 'Skapa') . ' Lektion - Admin - ' . SITE_NAME;
include '../includes/header.php';
?>

<style>
.admin-container {
    max-width: 1200px;
    margin: 0 auto;
    padding: 30px 20px;
}

.admin-nav {
    background: white;
    padding: 20px;
    border-radius: 12px;
    margin-bottom: 30px;
    box-shadow: 0 2px 8px rgba(0,0,0,0.1);
}

.admin-nav-links {
    display: flex;
    gap: 15px;
    flex-wrap: wrap;
}

.admin-nav-links a {
    padding: 10px 20px;
    background: #58cc02;
    color: white;
    text-decoration: none;
    border-radius: 8px;
    font-weight: 600;
}

.admin-section {
    background: white;
    padding: 25px;
    border-radius: 12px;
    box-shadow: 0 2px 8px rgba(0,0,0,0.1);
    margin-bottom: 25px;
}

.admin-section h2 {
    margin: 0 0 20px 0;
    color: #333;
    border-bottom: 2px solid #58cc02;
    padding-bottom: 10px;
}

.form-group {
    margin-bottom: 20px;
}

.form-group label {
    display: block;
    margin-bottom: 8px;
    font-weight: 600;
    color: #333;
}

.form-group input,
.form-group select,
.form-group textarea {
    width: 100%;
    padding: 12px;
    border: 1px solid #ddd;
    border-radius: 8px;
    font-size: 14px;
    font-family: inherit;
}

.form-group textarea {
    min-height: 80px;
    resize: vertical;
}

.form-row {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 20px;
}

.success-message {
    background: #d4edda;
    color: #155724;
    padding: 15px;
    border-radius: 8px;
    margin-bottom: 20px;
    border: 1px solid #c3e6cb;
}

.error-message {
    background: #f8d7da;
    color: #721c24;
    padding: 15px;
    border-radius: 8px;
    margin-bottom: 20px;
    border: 1px solid #f5c6cb;
}

.exercise-item {
    padding: 15px;
    border: 2px solid #ddd;
    border-radius: 8px;
    margin-bottom: 15px;
    background: #f9f9f9;
}

.exercise-item h4 {
    margin: 0 0 10px 0;
    color: #333;
}

.exercise-actions {
    display: flex;
    gap: 10px;
    margin-top: 10px;
}

.btn-small {
    padding: 6px 12px;
    font-size: 13px;
}

.btn-danger {
    background: #dc3545;
    color: white;
}

.btn-danger:hover {
    background: #c82333;
}

.exercise-form {
    display: none;
    padding: 20px;
    background: #f0f8ff;
    border: 2px solid #58cc02;
    border-radius: 8px;
    margin-top: 20px;
}

.exercise-form.active {
    display: block;
}

.option-group {
    display: flex;
    align-items: center;
    gap: 10px;
    margin-bottom: 10px;
}

.option-group input[type="text"] {
    flex: 1;
}

.option-group input[type="radio"] {
    width: auto;
}
</style>

<div class="admin-container">
    <div class="admin-nav">
        <div class="admin-nav-links">
            <a href="lessons.php">← Tillbaka till lektioner</a>
        </div>
    </div>

    <?php if ($error): ?>
        <div class="error-message"><?php echo htmlspecialchars($error); ?></div>
    <?php endif; ?>
    
    <?php if ($success): ?>
        <div class="success-message"><?php echo htmlspecialchars($success); ?></div>
    <?php endif; ?>

    <!-- Lesson Details Form -->
    <div class="admin-section">
        <h2><?php echo $is_edit ? '✏️ Redigera' : '➕ Skapa'; ?> Lektion</h2>
        
        <form method="POST">
            <div class="form-row">
                <div class="form-group">
                    <label for="language_id">Språk *</label>
                    <select id="language_id" name="language_id" required>
                        <option value="">Välj språk...</option>
                        <?php foreach ($languages as $lang): ?>
                            <option value="<?php echo $lang['id']; ?>" <?php echo ($lesson && $lesson['language_id'] == $lang['id']) ? 'selected' : ''; ?>>
                                <?php echo htmlspecialchars($lang['flag_emoji'] . ' ' . $lang['name']); ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>
                
                <div class="form-group">
                    <label for="lesson_number">Lektionsnummer *</label>
                    <input type="number" id="lesson_number" name="lesson_number" min="1" 
                           value="<?php echo $lesson ? $lesson['lesson_number'] : ''; ?>" required>
                </div>
            </div>
            
            <div class="form-group">
                <label for="theme">Tema *</label>
                <input type="text" id="theme" name="theme" placeholder="t.ex. Grammatik, Vardagsliv, Kultur" 
                       value="<?php echo $lesson ? htmlspecialchars($lesson['theme']) : ''; ?>" required>
            </div>
            
            <div class="form-group">
                <label for="title">Titel *</label>
                <input type="text" id="title" name="title" placeholder="t.ex. Presens, Hälsningar, Mat och dryck" 
                       value="<?php echo $lesson ? htmlspecialchars($lesson['title']) : ''; ?>" required>
            </div>
            
            <div class="form-group">
                <label for="description">Beskrivning *</label>
                <textarea id="description" name="description" placeholder="Beskriv vad lektionen handlar om..." required><?php echo $lesson ? htmlspecialchars($lesson['description']) : ''; ?></textarea>
            </div>
            
            <button type="submit" name="save_lesson" class="btn btn-primary">💾 Spara lektion</button>
        </form>
    </div>

    <?php if ($is_edit): ?>
    <!-- Exercises Section -->
    <div class="admin-section">
        <h2>✨ Övningar (<?php echo count($exercises); ?>)</h2>
        
        <?php foreach ($exercises as $exercise): 
            $data = json_decode($exercise['data'], true);
        ?>
        <div class="exercise-item">
            <h4><?php echo $exercise['exercise_number']; ?>. <?php echo htmlspecialchars($exercise['question']); ?></h4>
            <p><strong>Typ:</strong> <?php echo $exercise['type']; ?></p>
            <?php if ($exercise['type'] === 'multiple_choice' && isset($data['options'])): ?>
                <p><strong>Alternativ:</strong> <?php echo implode(', ', $data['options']); ?></p>
                <p><strong>Rätt svar:</strong> Alternativ <?php echo ($data['correct'] + 1); ?></p>
            <?php elseif ($exercise['type'] === 'translation'): ?>
                <p><strong>Rätt svar:</strong> <?php echo htmlspecialchars($data['correct']); ?></p>
            <?php elseif ($exercise['type'] === 'fill_blank'): ?>
                <p><strong>Mening:</strong> <?php echo htmlspecialchars($data['sentence'] ?? ''); ?></p>
                <p><strong>Rätt svar:</strong> <?php echo htmlspecialchars($data['correct']); ?></p>
            <?php endif; ?>
            
            <div class="exercise-actions">
                <form method="POST" style="display: inline;" onsubmit="return confirm('Ta bort denna övning?');">
                    <input type="hidden" name="exercise_id" value="<?php echo $exercise['id']; ?>">
                    <button type="submit" name="delete_exercise" class="btn btn-danger btn-small">🗑️ Ta bort</button>
                </form>
            </div>
        </div>
        <?php endforeach; ?>
        
        <button type="button" class="btn btn-primary" onclick="document.getElementById('exercise-form').classList.add('active')">
            ➕ Lägg till ny övning
        </button>
        
        <!-- Add Exercise Form -->
        <div id="exercise-form" class="exercise-form">
            <h3>Ny övning</h3>
            <form method="POST">
                <div class="form-row">
                    <div class="form-group">
                        <label for="exercise_number">Övningsnummer *</label>
                        <input type="number" id="exercise_number" name="exercise_number" min="1" value="<?php echo count($exercises) + 1; ?>" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="exercise_type">Övningstyp *</label>
                        <select id="exercise_type" name="exercise_type" required onchange="updateExerciseForm(this.value)">
                            <option value="">Välj typ...</option>
                            <option value="multiple_choice">Flervalsfråga</option>
                            <option value="translation">Översättning</option>
                            <option value="fill_blank">Fyll i lucka</option>
                        </select>
                    </div>
                </div>
                
                <div class="form-group">
                    <label for="question">Fråga/Instruktion *</label>
                    <input type="text" id="question" name="question" placeholder="t.ex. Översätt: god morgon" required>
                </div>
                
                <!-- Multiple Choice Fields -->
                <div id="mc-fields" style="display: none;">
                    <label>Svarsalternativ *</label>
                    <div class="option-group">
                        <input type="radio" name="correct_index" value="0" required>
                        <input type="text" name="option_0" placeholder="Alternativ 1">
                    </div>
                    <div class="option-group">
                        <input type="radio" name="correct_index" value="1">
                        <input type="text" name="option_1" placeholder="Alternativ 2">
                    </div>
                    <div class="option-group">
                        <input type="radio" name="correct_index" value="2">
                        <input type="text" name="option_2" placeholder="Alternativ 3">
                    </div>
                    <div class="option-group">
                        <input type="radio" name="correct_index" value="3">
                        <input type="text" name="option_3" placeholder="Alternativ 4">
                    </div>
                </div>
                
                <!-- Translation/Fill Blank Fields -->
                <div id="text-fields" style="display: none;">
                    <div class="form-group">
                        <label for="sentence" id="sentence-label">Mening med ___ (för fill_blank)</label>
                        <input type="text" id="sentence" name="sentence" placeholder="t.ex. Jag ___ från Sverige">
                    </div>
                    <div class="form-group">
                        <label for="correct_answer">Rätt svar *</label>
                        <input type="text" id="correct_answer" name="correct_answer" placeholder="Rätt svar">
                    </div>
                </div>
                
                <div class="form-group">
                    <label for="explanation">Förklaring</label>
                    <textarea id="explanation" name="explanation" placeholder="Förklara varför detta är rätt..."></textarea>
                </div>
                
                <button type="submit" name="save_exercise" class="btn btn-primary">💾 Spara övning</button>
                <button type="button" class="btn btn-outline" onclick="document.getElementById('exercise-form').classList.remove('active')">Avbryt</button>
            </form>
        </div>
    </div>
    <?php endif; ?>
</div>

<script>
function updateExerciseForm(type) {
    const mcFields = document.getElementById('mc-fields');
    const textFields = document.getElementById('text-fields');
    const sentenceLabel = document.getElementById('sentence-label');
    const sentence = document.getElementById('sentence');
    
    mcFields.style.display = 'none';
    textFields.style.display = 'none';
    sentence.required = false;
    
    if (type === 'multiple_choice') {
        mcFields.style.display = 'block';
    } else if (type === 'translation') {
        textFields.style.display = 'block';
        sentenceLabel.style.display = 'none';
        document.querySelector('[for="sentence"]').parentElement.style.display = 'none';
    } else if (type === 'fill_blank') {
        textFields.style.display = 'block';
        sentenceLabel.style.display = 'block';
        document.querySelector('[for="sentence"]').parentElement.style.display = 'block';
        sentence.required = true;
    }
}
</script>

<?php include '../includes/footer.php'; ?>
