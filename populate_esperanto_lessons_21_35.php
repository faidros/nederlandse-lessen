<?php
require_once 'config.php';

$db = getLanguageDB();

// Get the Esperanto language ID
$stmt = $db->query("SELECT id FROM languages WHERE code = 'eo'");
$language = $stmt->fetch(PDO::FETCH_ASSOC);
$language_id = $language['id'];

// Esperanto A2 lessons (21-35)
$lessons = [
    // Lesson 21 - Animals
    [
        'title' => 'Bestoj',
        'description' => 'Djur',
        'theme' => 'Natur',
        'exercises' => [
            [
                'type' => 'multiple_choice',
                'question' => 'Vad betyder "hundo"?',
                'data' => [
                    'options' => ['Katt', 'Hund', 'Fågel', 'Fisk'],
                    'correct' => 1
                ]
            ],
            [
                'type' => 'translation',
                'question' => 'Översätt: "Jag har en katt"',
                'data' => [
                    'correct' => 'mi havas katon'
                ]
            ],
            [
                'type' => 'fill_blank',
                'question' => 'Fyll i: "La ___ kantas" (fågeln)',
                'data' => [
                    'sentence' => 'La ___ kantas.',
                    'correct' => 'birdo'
                ]
            ],
            [
                'type' => 'word_order',
                'question' => 'Ordna orden: "Hästen springer snabbt"',
                'data' => [
                    'words' => ['La', 'ĉevalo', 'kuras', 'rapide'],
                    'correct' => 'La ĉevalo kuras rapide'
                ]
            ],
            [
                'type' => 'multiple_choice',
                'question' => 'Hur säger man "elefant"?',
                'data' => [
                    'options' => ['elefanto', 'leono', 'tigro', 'urso'],
                    'correct' => 0
                ]
            ]
        ]
    ],

    // Lesson 22 - At home
    [
        'title' => 'Hejme',
        'description' => 'Hemma',
        'theme' => 'Vardagsliv',
        'exercises' => [
            [
                'type' => 'multiple_choice',
                'question' => 'Vad betyder "ĉambro"?',
                'data' => [
                    'options' => ['Kök', 'Rum', 'Badrum', 'Trädgård'],
                    'correct' => 1
                ]
            ],
            [
                'type' => 'translation',
                'question' => 'Översätt: "Köket är rent"',
                'data' => [
                    'correct' => 'la kuirejo estas pura'
                ]
            ],
            [
                'type' => 'fill_blank',
                'question' => 'Fyll i: "Mi dormas en la ___" (sovrum)',
                'data' => [
                    'sentence' => 'Mi dormas en la ___.',
                    'correct' => 'dormoĉambro'
                ]
            ],
            [
                'type' => 'word_order',
                'question' => 'Ordna orden: "Jag städar mitt rum"',
                'data' => [
                    'words' => ['Mi', 'purigas', 'mian', 'ĉambron'],
                    'correct' => 'Mi purigas mian ĉambron'
                ]
            ],
            [
                'type' => 'multiple_choice',
                'question' => 'Hur säger man "trädgård"?',
                'data' => [
                    'options' => ['ĝardeno', 'korto', 'balkono', 'fenestro'],
                    'correct' => 0
                ]
            ]
        ]
    ],

    // Lesson 23 - Accusative case (-n)
    [
        'title' => 'Akuzativo',
        'description' => 'Ackusativ (objekt)',
        'theme' => 'Grammatik',
        'exercises' => [
            [
                'type' => 'explanation',
                'question' => 'Ackusativ i Esperanto',
                'data' => [
                    'explanation' => 'I Esperanto använder man ändelsen "-n" för att visa direkt objekt. Till exempel: "Mi vidas kato" (fel) → "Mi vidas katon" (rätt - jag ser en katt).',
                    'example' => 'Mi amas vin (Jag älskar dig) - "vin" får -n eftersom det är objektet',
                    'question' => 'Vilket är rätt? "Jag äter bröd"',
                    'options' => ['Mi manĝas pano', 'Mi manĝas panon', 'Mi manĝas panojn', 'Mi manĝas de pano'],
                    'correct' => 1
                ]
            ],
            [
                'type' => 'translation',
                'question' => 'Översätt: "Hon ser en blomma"',
                'data' => [
                    'correct' => 'ŝi vidas floron'
                ]
            ],
            [
                'type' => 'fill_blank',
                'question' => 'Fyll i: "Mi amas ___" (dig)',
                'data' => [
                    'sentence' => 'Mi amas ___.',
                    'correct' => 'vin'
                ]
            ],
            [
                'type' => 'multiple_choice',
                'question' => 'Vilket är rätt? "Jag läser en bok"',
                'data' => [
                    'options' => ['Mi legas libro', 'Mi legas libron', 'Mi legas de libro', 'Mi legas la libro'],
                    'correct' => 1
                ]
            ],
            [
                'type' => 'translation',
                'question' => 'Översätt: "Vi dricker vatten"',
                'data' => [
                    'correct' => 'ni trinkas akvon'
                ]
            ]
        ]
    ],

    // Lesson 24 - Sports and activities
    [
        'title' => 'Sportoj kaj aktivecoj',
        'description' => 'Sport och aktiviteter',
        'theme' => 'Vardagsliv',
        'exercises' => [
            [
                'type' => 'multiple_choice',
                'question' => 'Vad betyder "naĝi"?',
                'data' => [
                    'options' => ['Att springa', 'Att simma', 'Att hoppa', 'Att dansa'],
                    'correct' => 1
                ]
            ],
            [
                'type' => 'translation',
                'question' => 'Översätt: "Jag spelar tennis"',
                'data' => [
                    'correct' => 'mi ludas tenison'
                ]
            ],
            [
                'type' => 'fill_blank',
                'question' => 'Fyll i: "Ŝi ŝatas ___" (cykla)',
                'data' => [
                    'sentence' => 'Ŝi ŝatas ___.',
                    'correct' => 'bicikli'
                ]
            ],
            [
                'type' => 'word_order',
                'question' => 'Ordna orden: "Vi springer varje morgon"',
                'data' => [
                    'words' => ['Vi', 'kuras', 'ĉiun', 'matenon'],
                    'correct' => 'Vi kuras ĉiun matenon'
                ]
            ],
            [
                'type' => 'multiple_choice',
                'question' => 'Hur säger man "fotboll"?',
                'data' => [
                    'options' => ['futbalo', 'basketbalo', 'volvojbalo', 'rugbeo'],
                    'correct' => 0
                ]
            ]
        ]
    ],

    // Lesson 25 - Days and months
    [
        'title' => 'Tagoj kaj monatoj',
        'description' => 'Dagar och månader',
        'theme' => 'Tid',
        'exercises' => [
            [
                'type' => 'multiple_choice',
                'question' => 'Vad betyder "lundo"?',
                'data' => [
                    'options' => ['Söndag', 'Måndag', 'Tisdag', 'Onsdag'],
                    'correct' => 1
                ]
            ],
            [
                'type' => 'translation',
                'question' => 'Översätt: "Idag är fredag"',
                'data' => [
                    'correct' => 'hodiaŭ estas vendredo|estas vendredo hodiaŭ'
                ]
            ],
            [
                'type' => 'fill_blank',
                'question' => 'Fyll i: "Mia naskiĝtago estas en ___" (januari)',
                'data' => [
                    'sentence' => 'Mia naskiĝtago estas en ___.',
                    'correct' => 'januaro'
                ]
            ],
            [
                'type' => 'multiple_choice',
                'question' => 'Hur säger man "söndag"?',
                'data' => [
                    'options' => ['dimanĉo', 'sabato', 'vendredo', 'ĵaŭdo'],
                    'correct' => 0
                ]
            ],
            [
                'type' => 'translation',
                'question' => 'Översätt: "December är kall"',
                'data' => [
                    'correct' => 'decembro estas malvarma'
                ]
            ]
        ]
    ],

    // Lesson 26 - Body parts
    [
        'title' => 'Korpopartoj',
        'description' => 'Kroppsdelar',
        'theme' => 'Kropp',
        'exercises' => [
            [
                'type' => 'multiple_choice',
                'question' => 'Vad betyder "kapo"?',
                'data' => [
                    'options' => ['Hand', 'Fot', 'Huvud', 'Öga'],
                    'correct' => 2
                ]
            ],
            [
                'type' => 'translation',
                'question' => 'Översätt: "Jag har ont i benet"',
                'data' => [
                    'correct' => 'mi havas kruron dolorantan|mia kruro doloras'
                ]
            ],
            [
                'type' => 'fill_blank',
                'question' => 'Fyll i: "Mi lavas miajn ___" (händerna)',
                'data' => [
                    'sentence' => 'Mi lavas miajn ___.',
                    'correct' => 'manojn'
                ]
            ],
            [
                'type' => 'word_order',
                'question' => 'Ordna orden: "Hon har blå ögon"',
                'data' => [
                    'words' => ['Ŝi', 'havas', 'bluajn', 'okulojn'],
                    'correct' => 'Ŝi havas bluajn okulojn'
                ]
            ],
            [
                'type' => 'multiple_choice',
                'question' => 'Hur säger man "öra"?',
                'data' => [
                    'options' => ['orelo', 'nazo', 'buŝo', 'brako'],
                    'correct' => 0
                ]
            ]
        ]
    ],

    // Lesson 27 - Professions
    [
        'title' => 'Profesioj',
        'description' => 'Yrken',
        'theme' => 'Arbete',
        'exercises' => [
            [
                'type' => 'multiple_choice',
                'question' => 'Vad betyder "kuiristo"?',
                'data' => [
                    'options' => ['Lärare', 'Kock', 'Läkare', 'Ingenjör'],
                    'correct' => 1
                ]
            ],
            [
                'type' => 'translation',
                'question' => 'Översätt: "Hon är advokat"',
                'data' => [
                    'correct' => 'ŝi estas advokato|ŝi estas advokatino'
                ]
            ],
            [
                'type' => 'fill_blank',
                'question' => 'Fyll i: "Mi volas esti ___" (ingenjör)',
                'data' => [
                    'sentence' => 'Mi volas esti ___.',
                    'correct' => 'inĝeniero'
                ]
            ],
            [
                'type' => 'word_order',
                'question' => 'Ordna orden: "Min bror är polis"',
                'data' => [
                    'words' => ['Mia', 'frato', 'estas', 'policano'],
                    'correct' => 'Mia frato estas policano'
                ]
            ],
            [
                'type' => 'multiple_choice',
                'question' => 'Hur säger man "konstnär"?',
                'data' => [
                    'options' => ['artisto', 'muzikisto', 'aktoro', 'verkisto'],
                    'correct' => 0
                ]
            ]
        ]
    ],

    // Lesson 28 - Prepositions
    [
        'title' => 'Prepozicioj',
        'description' => 'Prepositioner',
        'theme' => 'Grammatik',
        'exercises' => [
            [
                'type' => 'explanation',
                'question' => 'Prepositioner i Esperanto',
                'data' => [
                    'explanation' => 'Vanliga prepositioner: en (i), sur (på), sub (under), apud (bredvid), inter (mellan), antaŭ (före/framför), post (efter/bakom), ĉe (vid/hos).',
                    'example' => 'La libro estas sur la tablo (Boken är på bordet)',
                    'question' => 'Vilket är rätt? "Katten är under bordet"',
                    'options' => ['La kato estas sur la tablo', 'La kato estas sub la tablo', 'La kato estas en la tablo', 'La kato estas ĉe la tablo'],
                    'correct' => 1
                ]
            ],
            [
                'type' => 'translation',
                'question' => 'Översätt: "Jag bor i Stockholm"',
                'data' => [
                    'correct' => 'mi loĝas en stokholmo'
                ]
            ],
            [
                'type' => 'fill_blank',
                'question' => 'Fyll i: "La hundo estas ___ la domo" (framför)',
                'data' => [
                    'sentence' => 'La hundo estas ___ la domo.',
                    'correct' => 'antaŭ'
                ]
            ],
            [
                'type' => 'multiple_choice',
                'question' => 'Vad betyder "inter"?',
                'data' => [
                    'options' => ['Över', 'Mellan', 'Bakom', 'Bredvid'],
                    'correct' => 1
                ]
            ],
            [
                'type' => 'translation',
                'question' => 'Översätt: "Bredvid huset"',
                'data' => [
                    'correct' => 'apud la domo'
                ]
            ]
        ]
    ],

    // Lesson 29 - At the hotel
    [
        'title' => 'En la hotelo',
        'description' => 'På hotellet',
        'theme' => 'Resande',
        'exercises' => [
            [
                'type' => 'multiple_choice',
                'question' => 'Vad betyder "ĉambro"?',
                'data' => [
                    'options' => ['Nyckel', 'Rum', 'Lobby', 'Säng'],
                    'correct' => 1
                ]
            ],
            [
                'type' => 'translation',
                'question' => 'Översätt: "Jag har en reservation"',
                'data' => [
                    'correct' => 'mi havas rezervon|mi havas rezervadon'
                ]
            ],
            [
                'type' => 'fill_blank',
                'question' => 'Fyll i: "Kie estas la ___?" (hissen)',
                'data' => [
                    'sentence' => 'Kie estas la ___?',
                    'correct' => 'lifto'
                ]
            ],
            [
                'type' => 'word_order',
                'question' => 'Ordna orden: "Rummet är på tredje våningen"',
                'data' => [
                    'words' => ['La', 'ĉambro', 'estas', 'sur', 'la', 'tria', 'etaĝo'],
                    'correct' => 'La ĉambro estas sur la tria etaĝo'
                ]
            ],
            [
                'type' => 'multiple_choice',
                'question' => 'Hur säger man "nyckel"?',
                'data' => [
                    'options' => ['ŝlosilo', 'pordo', 'fenestro', 'lito'],
                    'correct' => 0
                ]
            ]
        ]
    ],

    // Lesson 30 - Comparative and superlative
    [
        'title' => 'Komparativo kaj superlativo',
        'description' => 'Komparativ och superlativ',
        'theme' => 'Grammatik',
        'exercises' => [
            [
                'type' => 'explanation',
                'question' => 'Jämförelseformer i Esperanto',
                'data' => [
                    'explanation' => 'Komparativ (mer): pli... ol (mer... än). Superlativ (mest): plej (mest). Exempel: granda (stor), pli granda (större), plej granda (störst).',
                    'example' => 'Ŝi estas pli alta ol mi (Hon är längre än jag). Li estas la plej rapida (Han är den snabbaste).',
                    'question' => 'Hur säger man "större än"?',
                    'options' => ['pli granda de', 'pli granda ol', 'plej granda', 'granda ol'],
                    'correct' => 1
                ]
            ],
            [
                'type' => 'translation',
                'question' => 'Översätt: "Det här huset är större"',
                'data' => [
                    'correct' => 'ĉi tiu domo estas pli granda|tiu ĉi domo estas pli granda'
                ]
            ],
            [
                'type' => 'fill_blank',
                'question' => 'Fyll i: "Ŝi estas la ___ bela" (vackraste)',
                'data' => [
                    'sentence' => 'Ŝi estas la ___ bela.',
                    'correct' => 'plej'
                ]
            ],
            [
                'type' => 'multiple_choice',
                'question' => 'Vad betyder "malpli... ol"?',
                'data' => [
                    'options' => ['Mer... än', 'Mindre... än', 'Mest', 'Minst'],
                    'correct' => 1
                ]
            ],
            [
                'type' => 'translation',
                'question' => 'Översätt: "Han är den snabbaste"',
                'data' => [
                    'correct' => 'li estas la plej rapida'
                ]
            ]
        ]
    ],

    // Lesson 31 - Technology
    [
        'title' => 'Teknologio',
        'description' => 'Teknologi',
        'theme' => 'Modern värld',
        'exercises' => [
            [
                'type' => 'multiple_choice',
                'question' => 'Vad betyder "komputilo"?',
                'data' => [
                    'options' => ['Telefon', 'Dator', 'Surfplatta', 'TV'],
                    'correct' => 1
                ]
            ],
            [
                'type' => 'translation',
                'question' => 'Översätt: "Jag använder internet"',
                'data' => [
                    'correct' => 'mi uzas interreton|mi uzas la interreton'
                ]
            ],
            [
                'type' => 'fill_blank',
                'question' => 'Fyll i: "Kie estas mia ___?" (mobil)',
                'data' => [
                    'sentence' => 'Kie estas mia ___?',
                    'correct' => 'poŝtelefono'
                ]
            ],
            [
                'type' => 'word_order',
                'question' => 'Ordna orden: "Jag skickar ett e-postmeddelande"',
                'data' => [
                    'words' => ['Mi', 'sendas', 'retpoŝton'],
                    'correct' => 'Mi sendas retpoŝton'
                ]
            ],
            [
                'type' => 'multiple_choice',
                'question' => 'Hur säger man "webbplats"?',
                'data' => [
                    'options' => ['retejo', 'retpoŝto', 'programo', 'dosiero'],
                    'correct' => 0
                ]
            ]
        ]
    ],

    // Lesson 32 - Modal verbs
    [
        'title' => 'Modalaj verboj',
        'description' => 'Modala verb',
        'theme' => 'Grammatik',
        'exercises' => [
            [
                'type' => 'explanation',
                'question' => 'Modala verb i Esperanto',
                'data' => [
                    'explanation' => 'Vanliga modala verb: povi (kunna/få), devi (måste), voli (vilja), ŝati (tycka om), scii (kunna/veta). Följs av infinitiv utan "to".',
                    'example' => 'Mi povas paroli Esperanton (Jag kan tala Esperanto). Vi devas lerni (Du måste lära dig).',
                    'question' => 'Hur säger man "Jag vill äta"?',
                    'options' => ['Mi volas manĝi', 'Mi volas manĝas', 'Mi volos manĝi', 'Mi volu manĝi'],
                    'correct' => 0
                ]
            ],
            [
                'type' => 'translation',
                'question' => 'Översätt: "Hon kan simma"',
                'data' => [
                    'correct' => 'ŝi povas naĝi'
                ]
            ],
            [
                'type' => 'fill_blank',
                'question' => 'Fyll i: "Ni ___ iri nun" (måste)',
                'data' => [
                    'sentence' => 'Ni ___ iri nun.',
                    'correct' => 'devas'
                ]
            ],
            [
                'type' => 'multiple_choice',
                'question' => 'Vad betyder "scii"?',
                'data' => [
                    'options' => ['Att vilja', 'Att måste', 'Att kunna/veta', 'Att få'],
                    'correct' => 2
                ]
            ],
            [
                'type' => 'translation',
                'question' => 'Översätt: "Jag måste arbeta"',
                'data' => [
                    'correct' => 'mi devas labori'
                ]
            ]
        ]
    ],

    // Lesson 33 - At the bank
    [
        'title' => 'Ĉe la banko',
        'description' => 'På banken',
        'theme' => 'Vardagsliv',
        'exercises' => [
            [
                'type' => 'multiple_choice',
                'question' => 'Vad betyder "konto"?',
                'data' => [
                    'options' => ['Pengar', 'Konto', 'Kort', 'Lån'],
                    'correct' => 1
                ]
            ],
            [
                'type' => 'translation',
                'question' => 'Översätt: "Jag vill öppna ett konto"',
                'data' => [
                    'correct' => 'mi volas malfermi konton'
                ]
            ],
            [
                'type' => 'fill_blank',
                'question' => 'Fyll i: "Mi bezonas ___" (pengar)',
                'data' => [
                    'sentence' => 'Mi bezonas ___.',
                    'correct' => 'monon'
                ]
            ],
            [
                'type' => 'word_order',
                'question' => 'Ordna orden: "Var är bankomaten?"',
                'data' => [
                    'words' => ['Kie', 'estas', 'la', 'monaŭtomato'],
                    'correct' => 'Kie estas la monaŭtomato'
                ]
            ],
            [
                'type' => 'multiple_choice',
                'question' => 'Hur säger man "kreditkort"?',
                'data' => [
                    'options' => ['kreditkarto', 'monkarto', 'bankkarto', 'pagkarto'],
                    'correct' => 0
                ]
            ]
        ]
    ],

    // Lesson 34 - Conjunctions
    [
        'title' => 'Konjunkcioj',
        'description' => 'Konjunktioner',
        'theme' => 'Grammatik',
        'exercises' => [
            [
                'type' => 'explanation',
                'question' => 'Konjunktioner i Esperanto',
                'data' => [
                    'explanation' => 'Vanliga konjunktioner: kaj (och), aŭ (eller), sed (men), ĉar (eftersom/för att), se (om), ke (att).',
                    'example' => 'Mi ŝatas teon kaj kafon (Jag gillar te och kaffe). Mi venas, se vi volas (Jag kommer om du vill).',
                    'question' => 'Hur säger man "men"?',
                    'options' => ['kaj', 'aŭ', 'sed', 'ĉar'],
                    'correct' => 2
                ]
            ],
            [
                'type' => 'translation',
                'question' => 'Översätt: "Te eller kaffe?"',
                'data' => [
                    'correct' => 'teo aŭ kafo'
                ]
            ],
            [
                'type' => 'fill_blank',
                'question' => 'Fyll i: "Mi restas hejme, ___ pluvas" (eftersom)',
                'data' => [
                    'sentence' => 'Mi restas hejme, ___ pluvas.',
                    'correct' => 'ĉar'
                ]
            ],
            [
                'type' => 'multiple_choice',
                'question' => 'Vad betyder "ke"?',
                'data' => [
                    'options' => ['Och', 'Eller', 'Att', 'Om'],
                    'correct' => 2
                ]
            ],
            [
                'type' => 'translation',
                'question' => 'Översätt: "Jag tror att det är sant"',
                'data' => [
                    'correct' => 'mi kredas ke ĝi estas vera|mi pensas ke tio estas vera'
                ]
            ]
        ]
    ],

    // Lesson 35 - Review and conversation
    [
        'title' => 'Revizio kaj konversacio',
        'description' => 'Repetition och konversation',
        'theme' => 'Sammansättning',
        'exercises' => [
            [
                'type' => 'translation',
                'question' => 'Översätt: "God morgon! Hur mår du?"',
                'data' => [
                    'correct' => 'bonan matenon kiel vi fartas|bonan matenon kiel fartas vi'
                ]
            ],
            [
                'type' => 'multiple_choice',
                'question' => 'Vilket är rätt? "Jag kan tala Esperanto"',
                'data' => [
                    'options' => ['Mi povas paroli Esperanton', 'Mi povas parolas Esperanton', 'Mi povis paroli Esperanton', 'Mi povu paroli Esperanton'],
                    'correct' => 0
                ]
            ],
            [
                'type' => 'fill_blank',
                'question' => 'Fyll i: "Ĉu vi ___ helpi min?" (kan)',
                'data' => [
                    'sentence' => 'Ĉu vi ___ helpi min?',
                    'correct' => 'povas'
                ]
            ],
            [
                'type' => 'word_order',
                'question' => 'Ordna orden: "Jag bor i ett stort hus"',
                'data' => [
                    'words' => ['Mi', 'loĝas', 'en', 'granda', 'domo'],
                    'correct' => 'Mi loĝas en granda domo'
                ]
            ],
            [
                'type' => 'translation',
                'question' => 'Översätt: "Tack så mycket och hej då!"',
                'data' => [
                    'correct' => 'dankon kaj ĝis revido|multe da dankoj kaj ĝis revido'
                ]
            ]
        ]
    ]
];

// Insert all lessons
$lesson_number = 21;
foreach ($lessons as $lesson) {
    // Insert lesson
    $stmt = $db->prepare("INSERT INTO lessons (language_id, lesson_number, title, description, theme) VALUES (?, ?, ?, ?, ?)");
    $stmt->execute([
        $language_id,
        $lesson_number,
        $lesson['title'],
        $lesson['description'],
        $lesson['theme']
    ]);
    
    $lesson_id = $db->lastInsertId();
    
    // Insert exercises for this lesson
    foreach ($lesson['exercises'] as $index => $exercise) {
        $stmt = $db->prepare("INSERT INTO exercises (lesson_id, exercise_number, type, question, data) VALUES (?, ?, ?, ?, ?)");
        $stmt->execute([
            $lesson_id,
            $index + 1,
            $exercise['type'],
            $exercise['question'],
            json_encode($exercise['data'])
        ]);
    }
    
    echo "✓ Leciono {$lesson_number}: {$lesson['title']} aldonis\n";
    $lesson_number++;
}

echo "\n🎉 15 pliaj Esperanto-lecionoj (21-35) aldonitaj!\n";
echo "Totalo nun: 35 lecionoj kun 175 ekzercoj por Esperanto\n";
echo "Novaj temoj: Bestoj, hejmo, akuzativo, sportoj, tagoj/monatoj, korpo, profesioj, prepozicioj, hotelo, komparoj, teknologio, modalaj verboj, banko, konjunkcioj\n";
?>
