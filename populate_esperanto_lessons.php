<?php
require_once 'config.php';

$db = getLanguageDB();

// Get the Esperanto language ID
$stmt = $db->query("SELECT id FROM languages WHERE code = 'eo'");
$language = $stmt->fetch(PDO::FETCH_ASSOC);
$language_id = $language['id'];

// Esperanto A2 lessons (1-20)
$lessons = [
    // Lesson 1 - Basic greetings and introductions
    [
        'title' => 'Salutoj kaj prezentado',
        'description' => 'Hälsningar och presentationer',
        'theme' => 'Grundläggande',
        'exercises' => [
            [
                'type' => 'multiple_choice',
                'question' => 'Hur säger man "God morgon" på Esperanto?',
                'data' => [
                    'options' => ['Bonan tagon', 'Bonan matenon', 'Bonan vesperon', 'Saluton'],
                    'correct' => 1
                ]
            ],
            [
                'type' => 'translation',
                'question' => 'Översätt till Esperanto: "Jag heter Anna"',
                'data' => [
                    'correct' => 'mi nomiĝas anna|mia nomo estas anna'
                ]
            ],
            [
                'type' => 'fill_blank',
                'question' => 'Fyll i: "Mi ___ tre bone" (mår)',
                'data' => [
                    'sentence' => 'Mi ___ tre bone.',
                    'correct' => 'fartas'
                ]
            ],
            [
                'type' => 'word_order',
                'question' => 'Ordna orden: "Trevligt att träffas"',
                'data' => [
                    'words' => ['Estas', 'agrable', 'renkonti', 'vin'],
                    'correct' => 'Estas agrable renkonti vin'
                ]
            ],
            [
                'type' => 'multiple_choice',
                'question' => 'Vad betyder "Ĝis revido"?',
                'data' => [
                    'options' => ['Hej', 'Tack', 'Hej då', 'Förlåt'],
                    'correct' => 2
                ]
            ]
        ]
    ],

    // Lesson 2 - Numbers and time
    [
        'title' => 'Nombroj kaj tempo',
        'description' => 'Siffror och tid',
        'theme' => 'Grundläggande',
        'exercises' => [
            [
                'type' => 'multiple_choice',
                'question' => 'Hur säger man "10" på Esperanto?',
                'data' => [
                    'options' => ['dek', 'cent', 'mil', 'dudek'],
                    'correct' => 0
                ]
            ],
            [
                'type' => 'translation',
                'question' => 'Översätt: "Vad är klockan?"',
                'data' => [
                    'correct' => 'kioma horo estas|kio estas la horo'
                ]
            ],
            [
                'type' => 'fill_blank',
                'question' => 'Fyll i: "Estas la ___ horo" (första)',
                'data' => [
                    'sentence' => 'Estas la ___ horo.',
                    'correct' => 'unua'
                ]
            ],
            [
                'type' => 'multiple_choice',
                'question' => 'Vad betyder "tridek"?',
                'data' => [
                    'options' => ['13', '30', '3', '300'],
                    'correct' => 1
                ]
            ],
            [
                'type' => 'translation',
                'question' => 'Översätt: "Klockan är tre"',
                'data' => [
                    'correct' => 'estas la tria horo|la horo estas tri'
                ]
            ]
        ]
    ],

    // Lesson 3 - Family
    [
        'title' => 'Familio',
        'description' => 'Familj',
        'theme' => 'Vardagsliv',
        'exercises' => [
            [
                'type' => 'multiple_choice',
                'question' => 'Vad betyder "patro"?',
                'data' => [
                    'options' => ['Mamma', 'Pappa', 'Bror', 'Syster'],
                    'correct' => 1
                ]
            ],
            [
                'type' => 'translation',
                'question' => 'Översätt: "Min syster är läkare"',
                'data' => [
                    'correct' => 'mia fratino estas kuracisto|mia fratino estas doktoro'
                ]
            ],
            [
                'type' => 'fill_blank',
                'question' => 'Fyll i: "Mia ___ estas instruisto" (mor)',
                'data' => [
                    'sentence' => 'Mia ___ estas instruisto.',
                    'correct' => 'patrino'
                ]
            ],
            [
                'type' => 'word_order',
                'question' => 'Ordna orden: "Jag har två barn"',
                'data' => [
                    'words' => ['Mi', 'havas', 'du', 'infanojn'],
                    'correct' => 'Mi havas du infanojn'
                ]
            ],
            [
                'type' => 'multiple_choice',
                'question' => 'Hur säger man "mormor/farmor"?',
                'data' => [
                    'options' => ['avino', 'onklino', 'kuzo', 'nevo'],
                    'correct' => 0
                ]
            ]
        ]
    ],

    // Lesson 4 - Food and drinks
    [
        'title' => 'Manĝaĵo kaj trinkaĵo',
        'description' => 'Mat och dryck',
        'theme' => 'Vardagsliv',
        'exercises' => [
            [
                'type' => 'multiple_choice',
                'question' => 'Vad betyder "akvo"?',
                'data' => [
                    'options' => ['Bröd', 'Vatten', 'Mjölk', 'Kaffe'],
                    'correct' => 1
                ]
            ],
            [
                'type' => 'translation',
                'question' => 'Översätt: "Jag skulle vilja ha kaffe"',
                'data' => [
                    'correct' => 'mi ŝatus kafon|mi volas kafon'
                ]
            ],
            [
                'type' => 'fill_blank',
                'question' => 'Fyll i: "Mi manĝas ___" (bröd)',
                'data' => [
                    'sentence' => 'Mi manĝas ___.',
                    'correct' => 'panon'
                ]
            ],
            [
                'type' => 'multiple_choice',
                'question' => 'Hur säger man "äpple"?',
                'data' => [
                    'options' => ['pomo', 'banano', 'frago', 'orangaĵo'],
                    'correct' => 0
                ]
            ],
            [
                'type' => 'translation',
                'question' => 'Översätt: "Maten är god"',
                'data' => [
                    'correct' => 'la manĝaĵo estas bona|la manĝo estas bona'
                ]
            ]
        ]
    ],

    // Lesson 5 - Colors and descriptions
    [
        'title' => 'Koloroj kaj priskriboj',
        'description' => 'Färger och beskrivningar',
        'theme' => 'Grundläggande',
        'exercises' => [
            [
                'type' => 'multiple_choice',
                'question' => 'Vad betyder "ruĝa"?',
                'data' => [
                    'options' => ['Blå', 'Grön', 'Röd', 'Gul'],
                    'correct' => 2
                ]
            ],
            [
                'type' => 'translation',
                'question' => 'Översätt: "Huset är stort"',
                'data' => [
                    'correct' => 'la domo estas granda'
                ]
            ],
            [
                'type' => 'fill_blank',
                'question' => 'Fyll i: "La ĉielo estas ___" (blå)',
                'data' => [
                    'sentence' => 'La ĉielo estas ___.',
                    'correct' => 'blua'
                ]
            ],
            [
                'type' => 'word_order',
                'question' => 'Ordna orden: "Bilen är svart"',
                'data' => [
                    'words' => ['La', 'aŭto', 'estas', 'nigra'],
                    'correct' => 'La aŭto estas nigra'
                ]
            ],
            [
                'type' => 'multiple_choice',
                'question' => 'Hur säger man "vit"?',
                'data' => [
                    'options' => ['blanka', 'flava', 'verda', 'bruna'],
                    'correct' => 0
                ]
            ]
        ]
    ],

    // Lesson 6 - At the restaurant
    [
        'title' => 'En la restoracio',
        'description' => 'På restaurangen',
        'theme' => 'Vardagsliv',
        'exercises' => [
            [
                'type' => 'multiple_choice',
                'question' => 'Vad betyder "kelnero"?',
                'data' => [
                    'options' => ['Servitör', 'Kock', 'Kund', 'Restaurang'],
                    'correct' => 0
                ]
            ],
            [
                'type' => 'translation',
                'question' => 'Översätt: "Kan jag få menyn?"',
                'data' => [
                    'correct' => 'ĉu mi povas havi la menuon|mi ŝatus la menuon'
                ]
            ],
            [
                'type' => 'fill_blank',
                'question' => 'Fyll i: "La ___ bonvolu!" (nota)',
                'data' => [
                    'sentence' => 'La ___ bonvolu!',
                    'correct' => 'kalkulo'
                ]
            ],
            [
                'type' => 'word_order',
                'question' => 'Ordna orden: "Maten smakar jättegott"',
                'data' => [
                    'words' => ['La', 'manĝaĵo', 'estas', 'tre', 'bongusta'],
                    'correct' => 'La manĝaĵo estas tre bongusta'
                ]
            ],
            [
                'type' => 'translation',
                'question' => 'Översätt: "Jag är vegetarian"',
                'data' => [
                    'correct' => 'mi estas vegetarano|mi estas vegetaranino'
                ]
            ]
        ]
    ],

    // Lesson 7 - Weather
    [
        'title' => 'Vetero',
        'description' => 'Väder',
        'theme' => 'Vardagsliv',
        'exercises' => [
            [
                'type' => 'multiple_choice',
                'question' => 'Vad betyder "pluvas"?',
                'data' => [
                    'options' => ['Det snöar', 'Det regnar', 'Det blåser', 'Det är soligt'],
                    'correct' => 1
                ]
            ],
            [
                'type' => 'translation',
                'question' => 'Översätt: "Det är varmt idag"',
                'data' => [
                    'correct' => 'estas varme hodiaŭ|hodiaŭ estas varme'
                ]
            ],
            [
                'type' => 'fill_blank',
                'question' => 'Fyll i: "Estas tre ___ hodiaŭ" (kallt)',
                'data' => [
                    'sentence' => 'Estas tre ___ hodiaŭ.',
                    'correct' => 'malvarme|malvarma'
                ]
            ],
            [
                'type' => 'multiple_choice',
                'question' => 'Hur säger man "solen"?',
                'data' => [
                    'options' => ['la suno', 'la luno', 'la stelo', 'la nubo'],
                    'correct' => 0
                ]
            ],
            [
                'type' => 'translation',
                'question' => 'Översätt: "Det är molnigt"',
                'data' => [
                    'correct' => 'estas nube|estas nuba'
                ]
            ]
        ]
    ],

    // Lesson 8 - Shopping
    [
        'title' => 'Aĉetado',
        'description' => 'Shopping',
        'theme' => 'Vardagsliv',
        'exercises' => [
            [
                'type' => 'multiple_choice',
                'question' => 'Vad betyder "vendejo"?',
                'data' => [
                    'options' => ['Butik', 'Pris', 'Pengar', 'Köpare'],
                    'correct' => 0
                ]
            ],
            [
                'type' => 'translation',
                'question' => 'Översätt: "Hur mycket kostar det?"',
                'data' => [
                    'correct' => 'kiom kostas tio|kiom ĝi kostas'
                ]
            ],
            [
                'type' => 'fill_blank',
                'question' => 'Fyll i: "Mi volas ___ tion" (köpa)',
                'data' => [
                    'sentence' => 'Mi volas ___ tion.',
                    'correct' => 'aĉeti'
                ]
            ],
            [
                'type' => 'word_order',
                'question' => 'Ordna orden: "Det är för dyrt"',
                'data' => [
                    'words' => ['Tio', 'estas', 'tro', 'multekosta'],
                    'correct' => 'Tio estas tro multekosta'
                ]
            ],
            [
                'type' => 'multiple_choice',
                'question' => 'Hur säger man "billig"?',
                'data' => [
                    'options' => ['multekosta', 'malmultekosta', 'granda', 'malgranda'],
                    'correct' => 1
                ]
            ]
        ]
    ],

    // Lesson 9 - Directions
    [
        'title' => 'Direktoj',
        'description' => 'Vägbeskrivningar',
        'theme' => 'Resande',
        'exercises' => [
            [
                'type' => 'multiple_choice',
                'question' => 'Vad betyder "dekstra"?',
                'data' => [
                    'options' => ['Vänster', 'Höger', 'Rakt fram', 'Tillbaka'],
                    'correct' => 1
                ]
            ],
            [
                'type' => 'translation',
                'question' => 'Översätt: "Var är toaletten?"',
                'data' => [
                    'correct' => 'kie estas la necesejo|kie estas la toaleto'
                ]
            ],
            [
                'type' => 'fill_blank',
                'question' => 'Fyll i: "Iru ___ antaŭen" (rakt)',
                'data' => [
                    'sentence' => 'Iru ___ antaŭen.',
                    'correct' => 'rekte'
                ]
            ],
            [
                'type' => 'word_order',
                'question' => 'Ordna orden: "Sväng till vänster"',
                'data' => [
                    'words' => ['Turnu', 'vin', 'maldekstren'],
                    'correct' => 'Turnu vin maldekstren'
                ]
            ],
            [
                'type' => 'multiple_choice',
                'question' => 'Hur frågar man "Var är...?"',
                'data' => [
                    'options' => ['Kio estas', 'Kie estas', 'Kiam estas', 'Kial estas'],
                    'correct' => 1
                ]
            ]
        ]
    ],

    // Lesson 10 - Past tense
    [
        'title' => 'Pasinta tempo',
        'description' => 'Förfluten tid (dåtid)',
        'theme' => 'Grammatik',
        'exercises' => [
            [
                'type' => 'explanation',
                'question' => 'Dåtid i Esperanto',
                'data' => [
                    'explanation' => 'I Esperanto bildar man dåtid genom att lägga till ändelsen "-is" på verbstammen. Till exempel: "mi manĝas" (jag äter) blir "mi manĝis" (jag åt).',
                    'example' => 'Hieraŭ mi manĝis pomon (Igår åt jag ett äpple)',
                    'question' => 'Hur säger man "jag gick"?',
                    'options' => ['mi iras', 'mi iris', 'mi iros', 'mi iru'],
                    'correct' => 1
                ]
            ],
            [
                'type' => 'translation',
                'question' => 'Översätt: "Jag såg en film igår"',
                'data' => [
                    'correct' => 'mi vidis filmon hieraŭ|hieraŭ mi vidis filmon'
                ]
            ],
            [
                'type' => 'fill_blank',
                'question' => 'Fyll i rätt form: "Ili ___ al la parko" (gick)',
                'data' => [
                    'sentence' => 'Ili ___ al la parko.',
                    'correct' => 'iris'
                ]
            ],
            [
                'type' => 'multiple_choice',
                'question' => 'Vad betyder "mi legis"?',
                'data' => [
                    'options' => ['Jag läser', 'Jag läste', 'Jag ska läsa', 'Jag läs'],
                    'correct' => 1
                ]
            ],
            [
                'type' => 'translation',
                'question' => 'Översätt: "De pratade mycket"',
                'data' => [
                    'correct' => 'ili parolis multe|ili multe parolis'
                ]
            ]
        ]
    ],

    // Lesson 11 - Future tense
    [
        'title' => 'Estonta tempo',
        'description' => 'Framtid',
        'theme' => 'Grammatik',
        'exercises' => [
            [
                'type' => 'explanation',
                'question' => 'Framtid i Esperanto',
                'data' => [
                    'explanation' => 'Framtid bildar man med ändelsen "-os". Till exempel: "mi manĝos" (jag ska äta), "vi legos" (du ska läsa).',
                    'example' => 'Morgaŭ mi lernos Esperanton (Imorgon ska jag lära mig Esperanto)',
                    'question' => 'Hur säger man "jag kommer att gå"?',
                    'options' => ['mi iras', 'mi iris', 'mi iros', 'mi iru'],
                    'correct' => 2
                ]
            ],
            [
                'type' => 'translation',
                'question' => 'Översätt: "Jag ska resa till Paris"',
                'data' => [
                    'correct' => 'mi vojaĝos al parizo|mi iros al parizo'
                ]
            ],
            [
                'type' => 'fill_blank',
                'question' => 'Fyll i: "Morgaŭ ni ___ en la parko" (spelar)',
                'data' => [
                    'sentence' => 'Morgaŭ ni ___ en la parko.',
                    'correct' => 'ludos'
                ]
            ],
            [
                'type' => 'multiple_choice',
                'question' => 'Vad betyder "ŝi venos"?',
                'data' => [
                    'options' => ['Hon kommer', 'Hon kom', 'Hon kommer att komma', 'Hon vill komma'],
                    'correct' => 2
                ]
            ],
            [
                'type' => 'translation',
                'question' => 'Översätt: "Vi ska träffas imorgon"',
                'data' => [
                    'correct' => 'ni renkontiĝos morgaŭ|morgaŭ ni renkontiĝos'
                ]
            ]
        ]
    ],

    // Lesson 12 - Hobbies
    [
        'title' => 'Ŝatokupoj',
        'description' => 'Hobbyer',
        'theme' => 'Vardagsliv',
        'exercises' => [
            [
                'type' => 'multiple_choice',
                'question' => 'Vad betyder "legi"?',
                'data' => [
                    'options' => ['Att skriva', 'Att läsa', 'Att lyssna', 'Att tala'],
                    'correct' => 1
                ]
            ],
            [
                'type' => 'translation',
                'question' => 'Översätt: "Jag gillar att sjunga"',
                'data' => [
                    'correct' => 'mi ŝatas kanti|mi amas kanti'
                ]
            ],
            [
                'type' => 'fill_blank',
                'question' => 'Fyll i: "Ŝi ŝatas ___ muzikon" (lyssna)',
                'data' => [
                    'sentence' => 'Ŝi ŝatas ___ muzikon.',
                    'correct' => 'aŭskulti'
                ]
            ],
            [
                'type' => 'word_order',
                'question' => 'Ordna orden: "Jag spelar fotboll varje dag"',
                'data' => [
                    'words' => ['Mi', 'ludas', 'futbalon', 'ĉiutage'],
                    'correct' => 'Mi ludas futbalon ĉiutage'
                ]
            ],
            [
                'type' => 'multiple_choice',
                'question' => 'Hur säger man "att måla"?',
                'data' => [
                    'options' => ['pentri', 'desegni', 'skribi', 'ludi'],
                    'correct' => 0
                ]
            ]
        ]
    ],

    // Lesson 13 - Clothing
    [
        'title' => 'Vestoj',
        'description' => 'Kläder',
        'theme' => 'Vardagsliv',
        'exercises' => [
            [
                'type' => 'multiple_choice',
                'question' => 'Vad betyder "ŝuoj"?',
                'data' => [
                    'options' => ['Strumpor', 'Skor', 'Handskar', 'Hatt'],
                    'correct' => 1
                ]
            ],
            [
                'type' => 'translation',
                'question' => 'Översätt: "Jag bär en röd tröja"',
                'data' => [
                    'correct' => 'mi portas ruĝan ĵaketon|mi portas ruĝan ĵakon'
                ]
            ],
            [
                'type' => 'fill_blank',
                'question' => 'Fyll i: "Kie estas mia ___?" (kjol)',
                'data' => [
                    'sentence' => 'Kie estas mia ___?',
                    'correct' => 'jupo'
                ]
            ],
            [
                'type' => 'multiple_choice',
                'question' => 'Hur säger man "byxor"?',
                'data' => [
                    'options' => ['pantalono', 'robo', 'jako', 'ĉemizo'],
                    'correct' => 0
                ]
            ],
            [
                'type' => 'translation',
                'question' => 'Översätt: "Det är för litet"',
                'data' => [
                    'correct' => 'ĝi estas tro malgranda|tio estas tro malgranda'
                ]
            ]
        ]
    ],

    // Lesson 14 - At work
    [
        'title' => 'Ĉe la laboro',
        'description' => 'På jobbet',
        'theme' => 'Vardagsliv',
        'exercises' => [
            [
                'type' => 'multiple_choice',
                'question' => 'Vad betyder "oficejo"?',
                'data' => [
                    'options' => ['Kontor', 'Fabrik', 'Affär', 'Skola'],
                    'correct' => 0
                ]
            ],
            [
                'type' => 'translation',
                'question' => 'Översätt: "Jag arbetar som lärare"',
                'data' => [
                    'correct' => 'mi laboras kiel instruisto|mi estas instruisto'
                ]
            ],
            [
                'type' => 'fill_blank',
                'question' => 'Fyll i: "Mi havas ___ hodiaŭ" (möte)',
                'data' => [
                    'sentence' => 'Mi havas ___ hodiaŭ.',
                    'correct' => 'kunvenon|renkontiĝon'
                ]
            ],
            [
                'type' => 'word_order',
                'question' => 'Ordna orden: "Jag börjar arbeta klockan åtta"',
                'data' => [
                    'words' => ['Mi', 'komencas', 'labori', 'je', 'la', 'oka'],
                    'correct' => 'Mi komencas labori je la oka'
                ]
            ],
            [
                'type' => 'multiple_choice',
                'question' => 'Hur säger man "kollega"?',
                'data' => [
                    'options' => ['kunlaboranto', 'estro', 'dungito', 'helpanto'],
                    'correct' => 0
                ]
            ]
        ]
    ],

    // Lesson 15 - Health
    [
        'title' => 'Sano',
        'description' => 'Hälsa',
        'theme' => 'Vardagsliv',
        'exercises' => [
            [
                'type' => 'multiple_choice',
                'question' => 'Vad betyder "kuracisto"?',
                'data' => [
                    'options' => ['Sjuksköterska', 'Läkare', 'Patient', 'Sjukhus'],
                    'correct' => 1
                ]
            ],
            [
                'type' => 'translation',
                'question' => 'Översätt: "Jag har ont i huvudet"',
                'data' => [
                    'correct' => 'mi havas kapdoloron|mia kapo doloras'
                ]
            ],
            [
                'type' => 'fill_blank',
                'question' => 'Fyll i: "Mi estas ___" (sjuk)',
                'data' => [
                    'sentence' => 'Mi estas ___.',
                    'correct' => 'malsana'
                ]
            ],
            [
                'type' => 'multiple_choice',
                'question' => 'Hur säger man "apotek"?',
                'data' => [
                    'options' => ['apoteko', 'hospitalo', 'kuracejo', 'vendejo'],
                    'correct' => 0
                ]
            ],
            [
                'type' => 'translation',
                'question' => 'Översätt: "Jag behöver medicin"',
                'data' => [
                    'correct' => 'mi bezonas medikamenton|mi bezonas kuracilaron'
                ]
            ]
        ]
    ],

    // Lesson 16 - Question words
    [
        'title' => 'Demandaj vortoj',
        'description' => 'Frågeord',
        'theme' => 'Grammatik',
        'exercises' => [
            [
                'type' => 'explanation',
                'question' => 'Frågeord i Esperanto',
                'data' => [
                    'explanation' => 'Esperanto har systematiska frågeord som alla börjar med "K": kio (vad), kiu (vem), kie (var), kiam (när), kiel (hur), kial (varför), kiom (hur mycket).',
                    'example' => 'Kio estas via nomo? (Vad är ditt namn?)',
                    'question' => 'Vilket ord betyder "var"?',
                    'options' => ['kio', 'kie', 'kiam', 'kiel'],
                    'correct' => 1
                ]
            ],
            [
                'type' => 'translation',
                'question' => 'Översätt: "När kommer du?"',
                'data' => [
                    'correct' => 'kiam vi venos|kiam vi venas'
                ]
            ],
            [
                'type' => 'fill_blank',
                'question' => 'Fyll i: "___ vi fartas?" (Hur)',
                'data' => [
                    'sentence' => '___ vi fartas?',
                    'correct' => 'kiel'
                ]
            ],
            [
                'type' => 'multiple_choice',
                'question' => 'Vad betyder "kial"?',
                'data' => [
                    'options' => ['Vad', 'Varför', 'När', 'Hur'],
                    'correct' => 1
                ]
            ],
            [
                'type' => 'translation',
                'question' => 'Översätt: "Vem är du?"',
                'data' => [
                    'correct' => 'kiu vi estas|kiu estas vi'
                ]
            ]
        ]
    ],

    // Lesson 17 - Transportation
    [
        'title' => 'Transporto',
        'description' => 'Transport',
        'theme' => 'Resande',
        'exercises' => [
            [
                'type' => 'multiple_choice',
                'question' => 'Vad betyder "trajno"?',
                'data' => [
                    'options' => ['Buss', 'Tåg', 'Bil', 'Cykel'],
                    'correct' => 1
                ]
            ],
            [
                'type' => 'translation',
                'question' => 'Översätt: "Jag åker buss till jobbet"',
                'data' => [
                    'correct' => 'mi veturas per buso al la laboro|mi iras per buso al laboro'
                ]
            ],
            [
                'type' => 'fill_blank',
                'question' => 'Fyll i: "Kie estas la ___?" (station)',
                'data' => [
                    'sentence' => 'Kie estas la ___?',
                    'correct' => 'stacidomo|stacio'
                ]
            ],
            [
                'type' => 'word_order',
                'question' => 'Ordna orden: "Flyget är försenat"',
                'data' => [
                    'words' => ['La', 'flugo', 'estas', 'malfrua'],
                    'correct' => 'La flugo estas malfrua'
                ]
            ],
            [
                'type' => 'multiple_choice',
                'question' => 'Hur säger man "biljett"?',
                'data' => [
                    'options' => ['bileto', 'karto', 'mono', 'vojaĝo'],
                    'correct' => 0
                ]
            ]
        ]
    ],

    // Lesson 18 - Emotions
    [
        'title' => 'Emocioj',
        'description' => 'Känslor',
        'theme' => 'Vardagsliv',
        'exercises' => [
            [
                'type' => 'multiple_choice',
                'question' => 'Vad betyder "feliĉa"?',
                'data' => [
                    'options' => ['Ledsen', 'Lycklig', 'Arg', 'Rädd'],
                    'correct' => 1
                ]
            ],
            [
                'type' => 'translation',
                'question' => 'Översätt: "Jag är mycket glad"',
                'data' => [
                    'correct' => 'mi estas tre feliĉa|mi estas tre ĝoja'
                ]
            ],
            [
                'type' => 'fill_blank',
                'question' => 'Fyll i: "Ŝi estas ___" (ledsen)',
                'data' => [
                    'sentence' => 'Ŝi estas ___.',
                    'correct' => 'malgaja|malfeliĉa|trista'
                ]
            ],
            [
                'type' => 'multiple_choice',
                'question' => 'Hur säger man "arg"?',
                'data' => [
                    'options' => ['kolera', 'tima', 'surprizita', 'enuigita'],
                    'correct' => 0
                ]
            ],
            [
                'type' => 'translation',
                'question' => 'Översätt: "Jag är trött"',
                'data' => [
                    'correct' => 'mi estas laca'
                ]
            ]
        ]
    ],

    // Lesson 19 - Nature
    [
        'title' => 'Naturo',
        'description' => 'Natur',
        'theme' => 'Vardagsliv',
        'exercises' => [
            [
                'type' => 'multiple_choice',
                'question' => 'Vad betyder "arbaro"?',
                'data' => [
                    'options' => ['Berg', 'Skog', 'Sjö', 'Flod'],
                    'correct' => 1
                ]
            ],
            [
                'type' => 'translation',
                'question' => 'Översätt: "Havet är vackert"',
                'data' => [
                    'correct' => 'la maro estas bela'
                ]
            ],
            [
                'type' => 'fill_blank',
                'question' => 'Fyll i: "La ___ estas alta" (berget)',
                'data' => [
                    'sentence' => 'La ___ estas alta.',
                    'correct' => 'monto'
                ]
            ],
            [
                'type' => 'word_order',
                'question' => 'Ordna orden: "Blommorna är färgglada"',
                'data' => [
                    'words' => ['La', 'floroj', 'estas', 'koloraj'],
                    'correct' => 'La floroj estas koloraj'
                ]
            ],
            [
                'type' => 'multiple_choice',
                'question' => 'Hur säger man "flod"?',
                'data' => [
                    'options' => ['rivero', 'lago', 'maro', 'oceano'],
                    'correct' => 0
                ]
            ]
        ]
    ],

    // Lesson 20 - Review and mixed exercises
    [
        'title' => 'Revizio kaj miksitaj ekzercoj',
        'description' => 'Repetition och blandade övningar',
        'theme' => 'Sammansättning',
        'exercises' => [
            [
                'type' => 'multiple_choice',
                'question' => 'Hur bildar man dåtid i Esperanto?',
                'data' => [
                    'options' => ['Slutar med -as', 'Slutar med -is', 'Slutar med -os', 'Slutar med -us'],
                    'correct' => 1
                ]
            ],
            [
                'type' => 'translation',
                'question' => 'Översätt: "Var är tågstationen?"',
                'data' => [
                    'correct' => 'kie estas la stacidomo|kie estas la trajnstacio'
                ]
            ],
            [
                'type' => 'fill_blank',
                'question' => 'Fyll i: "Mi ___ tre feliĉa hieraŭ" (var)',
                'data' => [
                    'sentence' => 'Mi ___ tre feliĉa hieraŭ.',
                    'correct' => 'estis'
                ]
            ],
            [
                'type' => 'word_order',
                'question' => 'Ordna orden: "Jag ska lära mig Esperanto imorgon"',
                'data' => [
                    'words' => ['Mi', 'lernos', 'Esperanton', 'morgaŭ'],
                    'correct' => 'Mi lernos Esperanton morgaŭ'
                ]
            ],
            [
                'type' => 'multiple_choice',
                'question' => 'Vad betyder "Bonan tagon"?',
                'data' => [
                    'options' => ['God morgon', 'God dag', 'God kväll', 'God natt'],
                    'correct' => 1
                ]
            ]
        ]
    ]
];

// Insert all lessons
$lesson_number = 1;
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

echo "\n🎉 Ĉiuj 20 Esperanto-lecionoj (A2-nivelo) aldonitaj!\n";
echo "Totalo: 100 ekzercoj por Esperanto\n";
echo "Temoj: Salutoj, nombro, familio, manĝo, koloroj, vetero, aĉetado, direktoj, tempoj, demandoj\n";
?>
