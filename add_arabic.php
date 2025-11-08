<?php
require_once 'config.php';

$db = getLanguageDB();

// Add Arabic language
$stmt = $db->prepare("INSERT INTO languages (code, name, flag_emoji, active) VALUES (?, ?, ?, ?)");
$stmt->execute(['ar', 'Arabiska', '🇸🇦', 1]);

$language_id = $db->lastInsertId();

echo "✅ Arabiska tillagt med ID: $language_id\n";
echo "Nu skapar jag 55 lektioner...\n\n";

// Array of lessons for Arabic A2 level
$lessons = [
    // Basic Communication (1-10)
    ['Hälsningar och introduktioner', 'Presentation', 'Lär dig grundläggande hälsningsfraser och presentera dig själv'],
    ['Siffror och räkning', 'Nummer', 'Räkna från 1-100 och använd siffror i vardagen'],
    ['Veckodagar och tid', 'Tid', 'Dagar, månader och hur man berättar tid på arabiska'],
    ['Min familj', 'Familj', 'Ord för familjemedlemmar och släktingar'],
    ['Mat och dryck', 'Mat', 'Vanliga livsmedel och hur man beställer på restaurang'],
    ['Färger och former', 'Beskrivningar', 'Adjektiv för färger, storlekar och former'],
    ['Kläder och shopping', 'Shopping', 'Klädplagg och uttryck för att handla'],
    ['Kroppen och hälsa', 'Hälsa', 'Kroppsdelar och vanliga hälsouttryck'],
    ['Mitt hem', 'Hem', 'Rum, möbler och beskriva ditt hem'],
    ['Väder och årstider', 'Väder', 'Väderord och samtala om klimat'],

    // Daily Life (11-20)
    ['Dagliga rutiner', 'Vardagsliv', 'Beskriv din morgonrutin och dagliga aktiviteter'],
    ['På jobbet', 'Arbete', 'Yrken, arbetsplatser och arbetsrelaterade fraser'],
    ['I skolan', 'Utbildning', 'Skolämnen, klassrum och studier'],
    ['Transport och resor', 'Resor', 'Fordon, riktningar och resande'],
    ['Hobby och fritid', 'Fritid', 'Sport, intressen och fritidsaktiviteter'],
    ['På marknaden', 'Shopping', 'Förhandla priser och handla på souken'],
    ['Telefon och internet', 'Kommunikation', 'Moderna kommunikationsmedel'],
    ['Bank och pengar', 'Ekonomi', 'Valutor, priser och banktjänster'],
    ['På hotellet', 'Boende', 'Boka rum och hotellservice'],
    ['På restaurangen', 'Mat', 'Beställa mat och dryck, menyord'],

    // Grammar & Structures (21-30)
    ['Presens', 'Grammatik', 'Nutidsformer av vanliga verb'],
    ['Förflutet tempus', 'Grammatik', 'Preteritum och berättande i dåtid'],
    ['Framtid', 'Grammatik', 'Framtidsformer och planer'],
    ['Possessiva pronomen', 'Grammatik', 'Min, din, hans, hennes på arabiska'],
    ['Prepositioner', 'Grammatik', 'I, på, under, bredvid och lägesord'],
    ['Komparativ och superlativ', 'Grammatik', 'Jämförelse: större, störst'],
    ['Frågeord', 'Grammatik', 'Vem, vad, var, när, varför, hur'],
    ['Negation', 'Grammatik', 'Hur man säger "inte" och negerar meningar'],
    ['Imperativ', 'Grammatik', 'Beordra och ge instruktioner'],
    ['Konjunktioner', 'Grammatik', 'Och, men, eller, därför att'],

    // Cultural & Practical (31-40)
    ['Arabisk kultur', 'Kultur', 'Traditioner, seder och högtider'],
    ['Ramadan och Eid', 'Högtider', 'Religiösa högtider och firanden'],
    ['Arabisk mat', 'Mat', 'Traditionella rätter och matkultur'],
    ['Arabiskt kaffe', 'Kultur', 'Kaffekultur och gästfrihet'],
    ['På sjukhuset', 'Hälsa', 'Medicinska termer och söka vård'],
    ['Nödsituationer', 'Säkerhet', 'Viktiga fraser i nödsituationer'],
    ['Riktningar och platser', 'Navigation', 'Vägbeskrivningar i staden'],
    ['Arabisk musik', 'Kultur', 'Musikinstrument och musiktermer'],
    ['Religion och moskén', 'Kultur', 'Religiösa termer och uttryck'],
    ['Arabisk kalligrafi', 'Konst', 'Skrivkonst och alfabetet'],

    // Advanced Communication (41-55)
    ['Åsikter och känslor', 'Samtal', 'Uttrycka känslor och åsikter'],
    ['Att diskutera', 'Samtal', 'Hålla med, hålla emot, argumentera'],
    ['Berättelser', 'Narrativ', 'Berätta historier i förfluten tid'],
    ['Framtidsplaner', 'Planer', 'Prata om drömmar och mål'],
    ['Medier och nyheter', 'Media', 'Läsa och diskutera nyheter'],
    ['Teknologi', 'Moderna livet', 'Datorer, internet och appar'],
    ['Miljö och natur', 'Natur', 'Djur, växter och miljöfrågor'],
    ['Politik och samhälle', 'Samhälle', 'Grundläggande samhällstermer'],
    ['Historia', 'Kultur', 'Arabisk historia och civilisation'],
    ['Idiomatiska uttryck 1', 'Idiom', 'Vanliga talesätt och ordspråk'],
    ['Idiomatiska uttryck 2', 'Idiom', 'Metaforer och bildspråk'],
    ['Formellt språk', 'Register', 'Artigt och formellt arabiskt språk'],
    ['Informellt språk', 'Register', 'Talspråk och dialekter'],
    ['Poesi och litteratur', 'Litteratur', 'Arabisk poesi och klassiker'],
    ['Sammanfattning A2', 'Repetition', 'Sammanfattning av viktiga koncept']
];

$lesson_number = 1;
foreach ($lessons as $lesson) {
    $stmt = $db->prepare("INSERT INTO lessons (language_id, lesson_number, theme, title, description) VALUES (?, ?, ?, ?, ?)");
    $stmt->execute([
        $language_id,
        $lesson_number,
        $lesson[1], // theme
        $lesson[0], // title
        $lesson[2]  // description
    ]);
    
    $lesson_id = $db->lastInsertId();
    echo "✓ Lektion $lesson_number: {$lesson[0]} (ID: $lesson_id)\n";
    
    // Create 5 exercises for each lesson
    createExercisesForLesson($db, $lesson_id, $lesson_number, $lesson[0], $lesson[1]);
    
    $lesson_number++;
}

echo "\n✅ Alla 55 arabiska lektioner skapade!\n";

function createExercisesForLesson($db, $lesson_id, $lesson_num, $title, $theme) {
    $exercises = [];
    
    // Exercise templates based on lesson theme
    switch ($lesson_num) {
        case 1: // Hälsningar
            $exercises = [
                ['multiple_choice', 'Vad betyder "مرحبا" (marhaban)?', 
                    ['Hej', 'Adjö', 'Tack', 'Ursäkta'], 'Hej', 'Det är den vanligaste hälsningsfrasen på arabiska.'],
                ['translation', 'Översätt till arabiska: God morgon', 'صباح الخير', 
                    'صباح الخير (sabah al-khayr) betyder "god morgon"'],
                ['multiple_choice', 'Hur säger man "Vad heter du?" på arabiska?',
                    ['ما اسمك؟', 'من أين أنت؟', 'كيف حالك؟', 'شكرا'], 'ما اسمك؟', 
                    'ما اسمك؟ (ma ismuka/ismuki) betyder "Vad heter du?"'],
                ['translation', 'Översätt: شكرا', 'tack', 
                    'شكرا (shukran) är det vanligaste sättet att säga tack.'],
                ['fill_blank', 'مع السلامة betyder ___', 'adjö', 
                    'مع السلامة (ma\'a as-salama) betyder "med friden" = adjö']
            ];
            break;
            
        case 2: // Siffror
            $exercises = [
                ['multiple_choice', 'Vad är ٥ (arabisk femma)?', 
                    ['5', '3', '7', '9'], '5', 'Arabiska siffror ser annorlunda ut än våra.'],
                ['translation', 'Skriv på arabiska: tio', 'عشرة', 
                    'عشرة (\'ashara) betyder tio'],
                ['multiple_choice', 'واحد، اثنان، ___', 
                    ['ثلاثة', 'أربعة', 'خمسة', 'ستة'], 'ثلاثة', 
                    'واحد (1), اثنان (2), ثلاثة (3) - ett, två, tre'],
                ['fill_blank', 'عشرون betyder ___', 'tjugo', 
                    'عشرون (\'ishrun) = tjugo'],
                ['translation', 'Översätt: مئة', 'hundra', 
                    'مئة (mi\'a) betyder hundra']
            ];
            break;
            
        case 3: // Dagar och tid
            $exercises = [
                ['multiple_choice', 'Vad betyder يوم (yawm)?', 
                    ['Dag', 'Natt', 'Vecka', 'Månad'], 'Dag', 'Grundordet för "dag"'],
                ['translation', 'Översätt: الأحد', 'söndag', 
                    'الأحد (al-ahad) är första dagen i den arabiska veckan = söndag'],
                ['multiple_choice', 'Hur säger man "Måndag" på arabiska?',
                    ['الاثنين', 'الثلاثاء', 'الأربعاء', 'الخميس'], 'الاثنين',
                    'الاثنين (al-ithnayn) betyder måndag'],
                ['fill_blank', 'Vecka på arabiska: ___', 'أسبوع',
                    'أسبوع (usbu\') betyder vecka'],
                ['translation', 'Skriv på arabiska: tid', 'وقت',
                    'وقت (waqt) betyder tid']
            ];
            break;
            
        default:
            // Generic exercises for other lessons
            $exercises = [
                ['multiple_choice', "Vilken fras hör till temat '$theme'?",
                    ["مرحبا", "شكرا", "نعم", "لا"], "مرحبا",
                    "Detta är en vanlig fras inom detta tema."],
                ['translation', "Översätt ett ord från '$title'", "مرحبا",
                    "Detta ord är centralt för lektionen."],
                ['fill_blank', "Fyll i det arabiska ordet som passar: ___", "الكلمة",
                    "Detta ord används ofta i denna lektion."],
                ['multiple_choice', "Välj rätt översättning:",
                    ["Ja", "Nej", "Tack", "Varsågod"], "Ja",
                    "نعم (na\'am) betyder ja."],
                ['translation', "Översätt: لا", "nej",
                    "لا (la) betyder nej på arabiska"]
            ];
    }
    
    $exercise_num = 1;
    foreach ($exercises as $ex) {
        $question = $ex[1];
        $data = [];
        
        if ($ex[0] === 'multiple_choice') {
            $data = [
                'options' => $ex[2],
                'correct' => $ex[3],
                'explanation' => $ex[4]
            ];
        } elseif ($ex[0] === 'translation') {
            $data = [
                'correct' => $ex[2],
                'explanation' => $ex[3]
            ];
        } elseif ($ex[0] === 'fill_blank') {
            $data = [
                'correct' => $ex[2],
                'explanation' => $ex[3]
            ];
        }
        
        $stmt = $db->prepare("INSERT INTO exercises (lesson_id, exercise_number, type, question, data) VALUES (?, ?, ?, ?, ?)");
        $stmt->execute([$lesson_id, $exercise_num, $ex[0], $question, json_encode($data, JSON_UNESCAPED_UNICODE)]);
        $exercise_num++;
    }
}
