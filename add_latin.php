<?php
require_once 'config.php';

$db = getLanguageDB();

// Add Latin language
$stmt = $db->prepare("INSERT INTO languages (code, name, flag_emoji, active) VALUES (?, ?, ?, ?)");
$stmt->execute(['la', 'Latin', '🏛️', 1]);

$language_id = $db->lastInsertId();

echo "✅ Latin tillagt med ID: $language_id\n";
echo "Nu skapar jag 55 lektioner med extra förklaringar...\n\n";

// Array of lessons for Latin with focus on grammar and context
$lessons = [
    // Basic Introduction (1-10)
    ['Latin-alfabetet', 'Grunder', 'Lär dig det latinska alfabetet och uttal'],
    ['Substantiv: första deklinationen', 'Grammatik', 'Feminina substantiv som slutar på -a (rosa, puella)'],
    ['Substantiv: andra deklinationen', 'Grammatik', 'Maskulina och neutra substantiv (dominus, templum)'],
    ['Verb: presens aktiv', 'Grammatik', 'Presensformer av verb (amo, amas, amat)'],
    ['Adjektiv och kongruens', 'Grammatik', 'Hur adjektiv böjs efter substantiv'],
    ['De fem fallen: introduktion', 'Grammatik', 'Nominativ, genitiv, dativ, ackusativ, ablativ'],
    ['Nominativ och ackusativ', 'Grammatik', 'Subjekt och objekt i latinska meningar'],
    ['Genitiv - ägande', 'Grammatik', 'Hur man uttrycker ägande och tillhörighet'],
    ['Dativ - indirekt objekt', 'Grammatik', 'Att ge till någon, för någon'],
    ['Ablativ - många funktioner', 'Grammatik', 'Med, från, av - ablativens användningar'],

    // Verbs and Tenses (11-20)
    ['Verb: imperfekt', 'Grammatik', 'Dåtid som pågick (jag brukade älska)'],
    ['Verb: perfekt', 'Grammatik', 'Avslutad handling i dåtid (jag älskade)'],
    ['Verb: futurum', 'Grammatik', 'Framtidsformer av verb'],
    ['Konjugationer: översikt', 'Grammatik', 'De fyra verbkonjugationerna'],
    ['Esse - att vara', 'Grammatik', 'Det viktigaste verbet: sum, es, est'],
    ['Infinitiv och imperativ', 'Grammatik', 'Grundform och befallande form'],
    ['Deponenta verb', 'Grammatik', 'Verb med passiv form men aktiv betydelse'],
    ['Irreguljära verb', 'Grammatik', 'Possum, volo, eo och andra oregelbundna'],
    ['Passiv form', 'Grammatik', 'När handlingen utförs på subjektet'],
    ['Particip', 'Grammatik', 'Presens och perfekt particip'],

    // More Declensions (21-30)
    ['Tredje deklinationen', 'Grammatik', 'Den mest varierande deklinationen'],
    ['Fjärde deklinationen', 'Grammatik', 'Substantiv på -us (fruktus, manus)'],
    ['Femte deklinationen', 'Grammatik', 'Substantiv på -es (res, dies)'],
    ['Pronomen: personliga', 'Grammatik', 'Ego, tu, nos, vos - jag, du, vi, ni'],
    ['Pronomen: possessiva', 'Grammatik', 'Meus, tuus, suus - min, din, sin'],
    ['Pronomen: demonstrativa', 'Grammatik', 'Hic, ille, iste - denna, den där'],
    ['Pronomen: relativa', 'Grammatik', 'Qui, quae, quod - som, vilken'],
    ['Komparation av adjektiv', 'Grammatik', 'Positiv, komparativ, superlativ'],
    ['Adverb', 'Grammatik', 'Hur adjektiv blir till adverb'],
    ['Prepositioner', 'Grammatik', 'Med ackusativ eller ablativ'],

    // Syntax and Complex Structures (31-40)
    ['Accusativus cum infinitivo (ACI)', 'Syntax', 'Indirekt tal i latin'],
    ['Ablativus absolutus', 'Syntax', 'Fristående ablativ med particip'],
    ['Gerundium och gerundivum', 'Grammatik', 'Verbsubstantiv och verbaladjektiv'],
    ['Konjunktiv: presens', 'Grammatik', 'Möjlighetsform och önskningar'],
    ['Konjunktiv: imperfekt och perfekt', 'Grammatik', 'Konjunktiv i bisatser'],
    ['Cum-satser', 'Syntax', 'Tids- och orsaksatser med cum'],
    ['Ut-satser', 'Syntax', 'Syftessatser och följdsatser'],
    ['Konsekutiva satser', 'Syntax', 'Följd och resultat'],
    ['Konditionalsatser', 'Syntax', 'Om-satser: realis, irrealis, potentialis'],
    ['Indirekt fråga', 'Syntax', 'Frågor i bisats med konjunktiv'],

    // Roman Culture and Vocabulary (41-50)
    ['Romersk familj', 'Kultur', 'Pater familias, matrona, liberi'],
    ['Romerska gudar', 'Kultur', 'Jupiter, Mars, Venus och panteon'],
    ['Romersk politik', 'Kultur', 'Senatus, consul, imperator'],
    ['Militära termer', 'Kultur', 'Legio, centurio, bellum'],
    ['Romersk arkitektur', 'Kultur', 'Forum, templum, amphitheatrum'],
    ['Romersk tid och kalender', 'Kultur', 'Kalendae, nonae, idus'],
    ['Romersk mat', 'Kultur', 'Panis, vinum, oliva'],
    ['Romersk utbildning', 'Kultur', 'Grammaticus, rhetor, ludus'],
    ['Romersk juridik', 'Kultur', 'Lex, iustitia, advocatus'],
    ['Romerska spel', 'Kultur', 'Ludi, gladiatores, circus'],

    // Advanced and Literary (51-55)
    ['Poetisk ordföljd', 'Stilistik', 'Hur poesi skiljer sig från prosa'],
    ['Retoriska figurer', 'Stilistik', 'Metafor, metonym, anafor'],
    ['Läsa Vergilius', 'Litteratur', 'Introduktion till Aeneiden'],
    ['Läsa Cicero', 'Litteratur', 'Retoriskt tal och filosofi'],
    ['Latinska ordspråk', 'Kultur', 'Vanliga uttryck som används idag']
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
    
    // Create 5 exercises for each lesson with detailed explanations
    createExercisesForLesson($db, $lesson_id, $lesson_number, $lesson[0], $lesson[1]);
    
    $lesson_number++;
}

echo "\n✅ Alla 55 latinska lektioner skapade!\n";

function createExercisesForLesson($db, $lesson_id, $lesson_num, $title, $theme) {
    $exercises = [];
    
    // Exercise templates based on lesson theme with detailed explanations
    switch ($lesson_num) {
        case 1: // Alfabetet
            $exercises = [
                ['multiple_choice', 'Hur många bokstäver hade det klassiska latinska alfabetet?', 
                    ['23', '26', '21', '25'], 0, 'Det klassiska latinska alfabetet hade 23 bokstäver. J, U och W saknades i det klassiska latinet.'],
                ['translation', 'Vilket latinskt ord betyder "vatten"?', 'aqua', 
                    'Aqua (uttalas akva) betyder vatten. Detta ord finns i många moderna ord som akvarell och akvarium.'],
                ['fill_blank', 'Salve betyder ___', 'hej', 
                    'Salve är en hälsningsfras som används både för en person (salve) och flera (salvete).'],
                ['multiple_choice', 'Hur uttalas bokstaven "C" i klassiskt latin?',
                    ['Alltid som K', 'Som S före E och I', 'Som TJ', 'Som SJ'], 0,
                    'I klassiskt latin uttalas C alltid som K, även före E och I. Cicero uttalas alltså "Kikero".'],
                ['translation', 'Översätt: Vale', 'farväl', 
                    'Vale betyder farväl eller lev väl. Plural: valete. Kommer från verbet valere (må bra).']
            ];
            break;
            
        case 2: // Första deklinationen
            $exercises = [
                ['multiple_choice', 'Vilken ändelse har nominativ singular i första deklinationen?', 
                    ['-a', '-us', '-um', '-is'], 0, 
                    'Första deklinationen har -a i nominativ singular. Exempel: puella (flicka), rosa (ros).'],
                ['translation', 'Böj puella (flicka) i genitiv singular', 'puellae', 
                    'Puellae är genitiv singular och betyder "flickans". Genitiv uttrycker ägande.'],
                ['fill_blank', 'Rosa, ros___, ros___ (nom, gen, dat sg)', 'ae', 
                    'Rosa, rosae, rosae. Genitiv och dativ singular har samma form i första deklinationen.'],
                ['multiple_choice', 'Vilken genus är substantiv i första deklinationen oftast?',
                    ['Femininum', 'Maskulinum', 'Neutrum', 'Varierar'], 0,
                    'Första deklinationen är nästan alltid femininum. Undantag: några ord för manliga yrken som "nauta" (sjöman).'],
                ['translation', 'Vad betyder "puellae" (nominativ plural)?', 'flickorna', 
                    'Puellae i nominativ plural betyder "flickorna". Samma form som genitiv och dativ singular!']
            ];
            break;
            
        case 3: // Andra deklinationen
            $exercises = [
                ['multiple_choice', 'Vilka ändelser har andra deklinationen i nominativ singular?', 
                    ['-us och -um', '-a och -ae', '-is och -es', '-er och -or'], 0, 
                    'Andra deklinationen har -us (maskulinum) och -um (neutrum). Exempel: dominus (herren), templum (templet).'],
                ['translation', 'Böj dominus (herre) i ackusativ singular', 'dominum', 
                    'Dominum är ackusativ singular. Ackusativ är objektsform och slutar på -um i andra deklinationen maskulinum.'],
                ['fill_blank', 'Neutrum nominativ och ackusativ är alltid ___', 'lika', 
                    'En viktig regel: neutrum har alltid samma form i nominativ och ackusativ, både singular och plural.'],
                ['multiple_choice', 'Vad betyder "templum"?',
                    ['tempel', 'tid', 'storm', 'örn'], 0,
                    'Templum betyder tempel. Ett neutrum ord i andra deklinationen. Notera att engelskans "temple" kommer härifrån.'],
                ['translation', 'Översätt: amicus (i nominativ)', 'vän', 
                    'Amicus betyder vän. Ett maskulinum ord i andra deklinationen. Plural: amici (vännerna).']
            ];
            break;
            
        case 4: // Presens aktiv
            $exercises = [
                ['multiple_choice', 'Vilka ändelser har presens aktiv i första konjugationen?', 
                    ['-o, -as, -at, -amus, -atis, -ant', '-eo, -es, -et', '-io, -is, -it', '-m, -s, -t'], 0, 
                    'Första konjugationen (som amo) har ändelserna -o, -as, -at, -amus, -atis, -ant i presens aktiv.'],
                ['translation', 'Översätt: amo', 'jag älskar', 
                    'Amo betyder "jag älskar". Verbet amo, amare är typexemplet för första konjugationen.'],
                ['fill_blank', 'Amo, am___, am___ (jag, du, han/hon)', 'as, at', 
                    'Amo, amas, amat. Personändelserna -o, -s, -t är grundläggande i latin.'],
                ['multiple_choice', 'Vad betyder "amamus"?',
                    ['vi älskar', 'ni älskar', 'de älskar', 'jag älskade'], 0,
                    'Amamus betyder "vi älskar". Ändelsen -mus markerar 1:a person plural i alla tempus.'],
                ['translation', 'Böj "laudo" (berömma) i 3:e person plural', 'laudant', 
                    'Laudant betyder "de berömmer". Ändelsen -nt markerar 3:e person plural.']
            ];
            break;
            
        case 5: // Adjektiv
            $exercises = [
                ['multiple_choice', 'Vad betyder kongruens för adjektiv?', 
                    ['Samma kön, tal och fall som substantivet', 'Står efter substantivet', 'Böjs annorlunda', 'Är indeklinabla'], 0, 
                    'Kongruens betyder att adjektivet måste ha samma genus, numerus och kasus som det substantiv det beskriver.'],
                ['translation', 'Översätt: puella bona', 'den goda flickan', 
                    'Puella bona betyder "den goda flickan". Bonus, -a, -um är ett vanligt adjektiv som böjs i första/andra deklinationen.'],
                ['fill_blank', 'Bonus, bon___, bon___ (mask, fem, neutr nom sg)', 'a, um', 
                    'Bonus, bona, bonum. Adjektiv i första/andra deklinationen har tre former beroende på genus.'],
                ['multiple_choice', 'Vilken form har "magnus" i "puellae magnae"?',
                    ['magnae', 'magna', 'magnum', 'magni'], 0,
                    'Magnae eftersom puellae är femininum genitiv/dativ singular eller nominativ plural. Adjektivet måste följa substantivets form.'],
                ['translation', 'Vad betyder "templum magnum"?', 'det stora templet', 
                    'Templum magnum = det stora templet. Magnus blir magnum i neutrum för att matcha templum.']
            ];
            break;
            
        default:
            // Generic exercises for other lessons with detailed explanations
            $exercises = [
                ['multiple_choice', "Vilken aspekt är viktigast i '$title'?",
                    ["Grammatisk förståelse", "Ordkunskap", "Kulturell kontext", "Uttal"], 0,
                    "Grammatisk förståelse är central i latin eftersom det är ett högst flekterat språk med många böjningsformer."],
                ['translation', "Översätt ett nyckelord från '$title'", "verbum",
                    "Verbum betyder ord. Latin är grunden för många moderna språk och termer."],
                ['fill_blank', "I latin är ordföljden ofta ___ än i svenska", "friare",
                    "Ordföljden är friare i latin eftersom ändelserna visar funktionen. Subjekt kan komma sist!"],
                ['multiple_choice', "Varför är latin viktigt att studera?",
                    ["Grunden för romanska språk och terminologi", "Talas av många", "Lätt att lära", "Har få regler"], 0,
                    "Latin är grunden för italienska, franska, spanska, portugisiska och rumänska. Dessutom används latin inom vetenskap, juridik och medicin."],
                ['translation', "Översätt: semper", "alltid",
                    "Semper betyder alltid. Semper fidelis = alltid trogen (US Marines motto)."]
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
                'sentence' => $question,
                'correct' => $ex[2],
                'explanation' => $ex[3]
            ];
        }
        
        $stmt = $db->prepare("INSERT INTO exercises (lesson_id, exercise_number, type, question, data) VALUES (?, ?, ?, ?, ?)");
        $stmt->execute([$lesson_id, $exercise_num, $ex[0], $question, json_encode($data, JSON_UNESCAPED_UNICODE)]);
        $exercise_num++;
    }
}
