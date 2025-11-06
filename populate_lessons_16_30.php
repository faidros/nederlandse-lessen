<?php
require_once 'config.php';

$db = getLanguageDB();

// Get the Dutch language ID
$stmt = $db->query("SELECT id FROM languages WHERE code = 'nl'");
$language = $stmt->fetch(PDO::FETCH_ASSOC);
$language_id = $language['id'];

// Lessons 16-30 - Focus on idiomatic expressions and B1 consolidation
$lessons = [
    // Lesson 16 - Idiomatiska uttryck: Väder
    [
        'title' => 'Idiomatiska uttryck: Väder',
        'description' => 'Lär dig vanliga väderbetydelser och metaforer',
        'theme' => 'Idiom',
        'level' => 'B1',
        'exercises' => [
            [
                'type' => 'explanation',
                'question' => 'Idiomatiskt uttryck: "Het regent pijpenstelen"',
                'data' => [
                    'explanation' => 'Bokstavligen: "Det regnar pipskaft". Detta uttryck betyder att det regnar mycket kraftigt, ungefär som det svenska "det öser ner" eller "skyfall".',
                    'example' => 'Neem een paraplu mee, het regent pijpenstelen!',
                    'question' => 'Vad betyder "het regent pijpenstelen"?',
                    'options' => ['Det regnar lite', 'Det regnar mycket kraftigt', 'Det har slutat regna', 'Det snöar'],
                    'correct' => 1
                ]
            ],
            [
                'type' => 'multiple_choice',
                'question' => 'Als je zegt "Ik heb het door de wind", wat bedoel je dan?',
                'data' => [
                    'options' => ['Ik ben koud', 'Ik ben moe', 'Ik begrijpt het niet meer', 'Ik ben ziek'],
                    'correct' => 2
                ]
            ],
            [
                'type' => 'translation',
                'question' => 'Översätt till nederländska: "Det är mulet idag"',
                'data' => [
                    'correct' => 'het is bewolkt vandaag|vandaag is het bewolkt'
                ]
            ],
            [
                'type' => 'explanation',
                'question' => 'Idiomatiskt uttryck: "Na regen komt zonneschijn"',
                'data' => [
                    'explanation' => 'Bokstavligen: "Efter regn kommer solsken". Detta ordspråk betyder att efter svåra tider kommer bättre tider. Motsvarar det svenska "efter skuren kommer solen".',
                    'example' => 'Maak je geen zorgen, na regen komt zonneschijn!',
                    'question' => 'När använder man "na regen komt zonneschijn"?',
                    'options' => ['När det börjar regna', 'För att trösta någon', 'När man pratar om vädret', 'När man är arg'],
                    'correct' => 1
                ]
            ],
            [
                'type' => 'fill_blank',
                'question' => 'Fyll i: "Het is ___ buiten, doe je jas aan!"',
                'data' => [
                    'sentence' => 'Het is ___ buiten, doe je jas aan!',
                    'correct' => 'koud|ijskoud|fris'
                ]
            ]
        ]
    ],

    // Lesson 17 - Idiomatiska uttryck: Kroppen
    [
        'title' => 'Idiomatiska uttryck: Kroppen',
        'description' => 'Uttryck med kroppsdelar',
        'theme' => 'Idiom',
        'level' => 'B1',
        'exercises' => [
            [
                'type' => 'explanation',
                'question' => 'Idiomatiskt uttryck: "Iemand een handje helpen"',
                'data' => [
                    'explanation' => 'Bokstavligen: "Ge någon en liten hand". Detta betyder att hjälpa någon, ungefär som "ge någon en hand" på svenska.',
                    'example' => 'Kan je me een handje helpen met deze dozen?',
                    'question' => 'Vad betyder "een handje helpen"?',
                    'options' => ['Att skaka hand', 'Att hjälpa någon', 'Att vinka', 'Att peka'],
                    'correct' => 1
                ]
            ],
            [
                'type' => 'multiple_choice',
                'question' => 'Als iemand "zijn nek uitsteekt", wat doet hij dan?',
                'data' => [
                    'options' => ['Hij kijkt naar boven', 'Hij neemt een risico', 'Hij is moe', 'Hij zwemt'],
                    'correct' => 1
                ]
            ],
            [
                'type' => 'explanation',
                'question' => 'Idiomatiskt uttryck: "Met de mond vol tanden staan"',
                'data' => [
                    'explanation' => 'Bokstavligen: "Stå med munnen full av tänder". Detta uttryck betyder att man inte vet vad man ska säga, att bli mållös eller tystnad av förvåning.',
                    'example' => 'Na die vraag stond ik met de mond vol tanden.',
                    'question' => 'Vad betyder "met de mond vol tanden staan"?',
                    'options' => ['Att äta mycket', 'Att inte veta vad man ska säga', 'Att prata mycket', 'Att borsta tänderna'],
                    'correct' => 1
                ]
            ],
            [
                'type' => 'translation',
                'question' => 'Översätt: "Kan du mig hjälpa?" (använd "handje")',
                'data' => [
                    'correct' => 'kun je me een handje helpen|kan je me een handje helpen'
                ]
            ],
            [
                'type' => 'fill_blank',
                'question' => 'Fyll i: "Hij steekt zijn ___ uit voor dit project."',
                'data' => [
                    'sentence' => 'Hij steekt zijn ___ uit voor dit project.',
                    'correct' => 'nek'
                ]
            ]
        ]
    ],

    // Lesson 18 - På banken och med pengar
    [
        'title' => 'Op de bank',
        'description' => 'Hantera pengar och banktjänster',
        'theme' => 'Praktisk',
        'level' => 'B1',
        'exercises' => [
            [
                'type' => 'multiple_choice',
                'question' => 'Wat betekent "pinnen"?',
                'data' => [
                    'options' => ['Sparen', 'Contant betalen', 'Met een bankpas betalen', 'Geld lenen'],
                    'correct' => 2
                ]
            ],
            [
                'type' => 'translation',
                'question' => 'Översätt: "Jag vill öppna ett konto"',
                'data' => [
                    'correct' => 'ik wil een rekening openen|ik wil graag een rekening openen'
                ]
            ],
            [
                'type' => 'fill_blank',
                'question' => 'Fyll i: "Kan ik hier ___ ? Ik heb geen contant geld."',
                'data' => [
                    'sentence' => 'Kan ik hier ___ ? Ik heb geen contant geld.',
                    'correct' => 'pinnen'
                ]
            ],
            [
                'type' => 'word_order',
                'question' => 'Ordna orden: "Ik moet geld van de bank halen"',
                'data' => [
                    'words' => ['Ik', 'moet', 'geld', 'van', 'de', 'bank', 'halen'],
                    'correct' => 'Ik moet geld van de bank halen'
                ]
            ],
            [
                'type' => 'multiple_choice',
                'question' => 'Wat is een "spaarpot"?',
                'data' => [
                    'options' => ['Een bankrekening', 'Een spaarvarkentje', 'Een creditcard', 'Een geldbuidel'],
                    'correct' => 1
                ]
            ]
        ]
    ],

    // Lesson 19 - Idiomatiska uttryck: Djur
    [
        'title' => 'Idiomatiska uttryck: Dieren',
        'description' => 'Uttryck med djur',
        'theme' => 'Idiom',
        'level' => 'B1',
        'exercises' => [
            [
                'type' => 'explanation',
                'question' => 'Idiomatiskt uttryck: "Een kat in de zak kopen"',
                'data' => [
                    'explanation' => 'Bokstavligen: "Köpa en katt i säcken". Detta betyder att köpa något utan att först kontrollera det, precis som det svenska uttrycket "köpa grisen i säcken".',
                    'example' => 'Test de auto eerst, koop geen kat in de zak!',
                    'question' => 'Vad betyder "een kat in de zak kopen"?',
                    'options' => ['Köpa en katt', 'Köpa något utan att kontrollera det', 'Köpa billigt', 'Köpa en present'],
                    'correct' => 1
                ]
            ],
            [
                'type' => 'explanation',
                'question' => 'Idiomatiskt uttryck: "Als de kat van huis is, dansen de muizen"',
                'data' => [
                    'explanation' => 'Bokstavligen: "När katten är borta dansar mössen". Detta ordspråk betyder att när chefen/läraren är borta gör folk vad de vill. Samma som svenska "när katten är borta dansar råttorna på bordet".',
                    'example' => 'De baas is weg, als de kat van huis is, dansen de muizen!',
                    'question' => 'När använder man detta ordspråk?',
                    'options' => ['När man har husdjur', 'När chefen är borta', 'När man dansar', 'När man är ensam'],
                    'correct' => 1
                ]
            ],
            [
                'type' => 'multiple_choice',
                'question' => 'Als je "twee vliegen in één klap slaat", wat doe je dan?',
                'data' => [
                    'options' => ['Je doodt insecten', 'Je doet twee dingen tegelijk', 'Je bent erg snel', 'Je maakt een fout'],
                    'correct' => 1
                ]
            ],
            [
                'type' => 'translation',
                'question' => 'Översätt det idiomatiska uttrycket: "köpa grisen i säcken"',
                'data' => [
                    'correct' => 'een kat in de zak kopen|de kat in de zak kopen'
                ]
            ],
            [
                'type' => 'fill_blank',
                'question' => 'Fyll i: "Ik sla twee ___ in één klap."',
                'data' => [
                    'sentence' => 'Ik sla twee ___ in één klap.',
                    'correct' => 'vliegen'
                ]
            ]
        ]
    ],

    // Lesson 20 - På frisören
    [
        'title' => 'Bij de kapper',
        'description' => 'Besök hos frisören',
        'theme' => 'Praktisk',
        'level' => 'B1',
        'exercises' => [
            [
                'type' => 'multiple_choice',
                'question' => 'Wat vraagt de kapper: "Hoe wilt u het?"',
                'data' => [
                    'options' => ['Hoe wilt u betalen?', 'Hoe wilt u uw haar?', 'Hoe voelt u zich?', 'Hoe laat wilt u komen?'],
                    'correct' => 1
                ]
            ],
            [
                'type' => 'translation',
                'question' => 'Översätt: "Bara lite kortare tack"',
                'data' => [
                    'correct' => 'iets korter graag|een beetje korter alstublieft'
                ]
            ],
            [
                'type' => 'fill_blank',
                'question' => 'Fyll i: "Kan je mijn ___ ook knippen?"',
                'data' => [
                    'sentence' => 'Kan je mijn ___ ook knippen?',
                    'correct' => 'baard|pony'
                ]
            ],
            [
                'type' => 'word_order',
                'question' => 'Ordna orden: "Ik wil graag een afspraak maken"',
                'data' => [
                    'words' => ['Ik', 'wil', 'graag', 'een', 'afspraak', 'maken'],
                    'correct' => 'Ik wil graag een afspraak maken'
                ]
            ],
            [
                'type' => 'multiple_choice',
                'question' => 'Wat betekent "bijknippen"?',
                'data' => [
                    'options' => ['Alles afknippen', 'Een beetje knippen', 'Verven', 'Föhnen'],
                    'correct' => 1
                ]
            ]
        ]
    ],

    // Lesson 21 - Idiomatiska uttryck: Mat
    [
        'title' => 'Idiomatiska uttryck: Eten',
        'description' => 'Uttryck med mat och dryck',
        'theme' => 'Idiom',
        'level' => 'B1',
        'exercises' => [
            [
                'type' => 'explanation',
                'question' => 'Idiomatiskt uttryck: "Appeltje voor de dorst"',
                'data' => [
                    'explanation' => 'Bokstavligen: "Ett litet äpple för törsten". Detta betyder pengar som man sparar för framtiden, som en buffert. Ungefär som "ha något på lut" på svenska.',
                    'example' => 'Ik spaar dit geld als appeltje voor de dorst.',
                    'question' => 'Vad betyder "appeltje voor de dorst"?',
                    'options' => ['En snacks', 'Pengar sparade för framtiden', 'Något att dricka', 'Ett äpple'],
                    'correct' => 1
                ]
            ],
            [
                'type' => 'explanation',
                'question' => 'Idiomatiskt uttryck: "Boter bij de vis"',
                'data' => [
                    'explanation' => 'Bokstavligen: "Smör vid fisken". Detta betyder att betala direkt, kontant. Ungefär som "cash on delivery".',
                    'example' => 'Deze winkel accepteert alleen boter bij de vis.',
                    'question' => 'Vad betyder "boter bij de vis"?',
                    'options' => ['En maträtt', 'Betala direkt', 'Gratis mat', 'Handla på kredit'],
                    'correct' => 1
                ]
            ],
            [
                'type' => 'multiple_choice',
                'question' => 'Als iets "een peulenschil" is, wat betekent dat?',
                'data' => [
                    'options' => ['Het is moeilijk', 'Het is makkelijk', 'Het is eetbaar', 'Het is groen'],
                    'correct' => 1
                ]
            ],
            [
                'type' => 'translation',
                'question' => 'Översätt uttrycket: "Det är lätt som en plätt" (använd "peulenschil")',
                'data' => [
                    'correct' => 'dat is een peulenschil|het is een peulenschil'
                ]
            ],
            [
                'type' => 'fill_blank',
                'question' => 'Fyll i: "Spaar wat geld als ___ voor de dorst."',
                'data' => [
                    'sentence' => 'Spaar wat geld als ___ voor de dorst.',
                    'correct' => 'appeltje'
                ]
            ]
        ]
    ],

    // Lesson 22 - På sjukhuset
    [
        'title' => 'In het ziekenhuis',
        'description' => 'Sjukhusvård och medicinska termer',
        'theme' => 'Praktisk',
        'level' => 'B1',
        'exercises' => [
            [
                'type' => 'multiple_choice',
                'question' => 'Wat is een "spoedeisende hulp"?',
                'data' => [
                    'options' => ['Een apotheek', 'Een huisarts', 'Een akutmottagning', 'Een specialist'],
                    'correct' => 2
                ]
            ],
            [
                'type' => 'translation',
                'question' => 'Översätt: "Jag måste opereras"',
                'data' => [
                    'correct' => 'ik moet geopereerd worden|ik moet een operatie hebben'
                ]
            ],
            [
                'type' => 'fill_blank',
                'question' => 'Fyll i: "De ___ heeft mijn been onderzocht."',
                'data' => [
                    'sentence' => 'De ___ heeft mijn been onderzocht.',
                    'correct' => 'dokter|arts|verpleegkundige'
                ]
            ],
            [
                'type' => 'word_order',
                'question' => 'Ordna orden: "Ik heb een afspraak met de specialist"',
                'data' => [
                    'words' => ['Ik', 'heb', 'een', 'afspraak', 'met', 'de', 'specialist'],
                    'correct' => 'Ik heb een afspraak met de specialist'
                ]
            ],
            [
                'type' => 'multiple_choice',
                'question' => 'Wat doe je als je "een recept ophaalt"?',
                'data' => [
                    'options' => ['Je kookt eten', 'Je haalt medicijnen op', 'Je maakt een afspraak', 'Je leest een boek'],
                    'correct' => 1
                ]
            ]
        ]
    ],

    // Lesson 23 - Idiomatiska uttryck: Tid
    [
        'title' => 'Idiomatiska uttryck: Tijd',
        'description' => 'Uttryck om tid',
        'theme' => 'Idiom',
        'level' => 'B1',
        'exercises' => [
            [
                'type' => 'explanation',
                'question' => 'Idiomatiskt uttryck: "De tijd vliegt"',
                'data' => [
                    'explanation' => 'Bokstavligen: "Tiden flyger". Detta betyder att tiden går snabbt, precis som det svenska "tiden flyger".',
                    'example' => 'Wat gaat de tijd snel, hij vliegt!',
                    'question' => 'Vad betyder "de tijd vliegt"?',
                    'options' => ['Tiden står still', 'Tiden går snabbt', 'Tiden går långsamt', 'Klockan är fel'],
                    'correct' => 1
                ]
            ],
            [
                'type' => 'explanation',
                'question' => 'Idiomatiskt uttryck: "Beter laat dan nooit"',
                'data' => [
                    'explanation' => 'Bokstavligen: "Bättre sent än aldrig". Detta ordspråk är identiskt med det svenska uttrycket och betyder att det är bättre att göra något sent än att inte göra det alls.',
                    'example' => 'Sorry dat ik te laat ben, maar beter laat dan nooit!',
                    'question' => 'När använder man "beter laat dan nooit"?',
                    'options' => ['När man är för tidig', 'När man är för sen', 'När man glömmer något', 'När man är trött'],
                    'correct' => 1
                ]
            ],
            [
                'type' => 'multiple_choice',
                'question' => 'Als je zegt "Ik heb alle tijd van de wereld", wat bedoel je?',
                'data' => [
                    'options' => ['Ik ben heel erg druk', 'Ik heb veel tijd', 'Ik heb geen tijd', 'Ik ben te laat'],
                    'correct' => 1
                ]
            ],
            [
                'type' => 'translation',
                'question' => 'Översätt ordspråket: "Bättre sent än aldrig"',
                'data' => [
                    'correct' => 'beter laat dan nooit'
                ]
            ],
            [
                'type' => 'fill_blank',
                'question' => 'Fyll i: "Wat gaat de ___ snel!"',
                'data' => [
                    'sentence' => 'Wat gaat de ___ snel!',
                    'correct' => 'tijd'
                ]
            ]
        ]
    ],

    // Lesson 24 - Hyra lägenhet
    [
        'title' => 'Een huis huren',
        'description' => 'Hitta och hyra boende',
        'theme' => 'Praktisk',
        'level' => 'B1',
        'exercises' => [
            [
                'type' => 'multiple_choice',
                'question' => 'Wat is een "huurcontract"?',
                'data' => [
                    'options' => ['Een hypotheek', 'Een hyreskontrakt', 'Een elektriciteitrekening', 'Een verzekering'],
                    'correct' => 1
                ]
            ],
            [
                'type' => 'translation',
                'question' => 'Översätt: "Hur mycket är hyran per månad?"',
                'data' => [
                    'correct' => 'hoeveel is de huur per maand|wat is de huur per maand'
                ]
            ],
            [
                'type' => 'fill_blank',
                'question' => 'Fyll i: "Ik zoek een ___ met twee slaapkamers."',
                'data' => [
                    'sentence' => 'Ik zoek een ___ met twee slaapkamers.',
                    'correct' => 'appartement|woning|huis'
                ]
            ],
            [
                'type' => 'word_order',
                'question' => 'Ordna orden: "Zijn de kosten inclusief gas en licht"',
                'data' => [
                    'words' => ['Zijn', 'de', 'kosten', 'inclusief', 'gas', 'en', 'licht'],
                    'correct' => 'Zijn de kosten inclusief gas en licht'
                ]
            ],
            [
                'type' => 'multiple_choice',
                'question' => 'Wat betekent "borg" in deze context?',
                'data' => [
                    'options' => ['Huur', 'Depositie', 'Hypotheek', 'Belasting'],
                    'correct' => 1
                ]
            ]
        ]
    ],

    // Lesson 25 - Idiomatiska uttryck: Pengar
    [
        'title' => 'Idiomatiska uttryck: Geld',
        'description' => 'Uttryck om pengar',
        'theme' => 'Idiom',
        'level' => 'B1',
        'exercises' => [
            [
                'type' => 'explanation',
                'question' => 'Idiomatiskt uttryck: "Geld groeit niet op mijn rug"',
                'data' => [
                    'explanation' => 'Bokstavligen: "Pengar växer inte på min rygg". Detta betyder att pengar inte kommer lätt, att man måste arbeta för dem. Ungefär som "pengar växer inte på träd".',
                    'example' => 'Nee, ik kan geen nieuwe telefoon kopen, geld groeit niet op mijn rug!',
                    'question' => 'Vad betyder detta uttryck?',
                    'options' => ['Jag är rik', 'Pengar kommer inte lätt', 'Jag sparar pengar', 'Jag lånar pengar'],
                    'correct' => 1
                ]
            ],
            [
                'type' => 'explanation',
                'question' => 'Idiomatiskt uttryck: "Voor een appel en een ei"',
                'data' => [
                    'explanation' => 'Bokstavligen: "För ett äpple och ett ägg". Detta betyder mycket billigt, nästan gratis. Ungefär som "för en spottstyver" på svenska.',
                    'example' => 'Ik heb deze fiets voor een appel en een ei gekocht!',
                    'question' => 'Vad betyder "voor een appel en een ei"?',
                    'options' => ['Mycket dyrt', 'Mycket billigt', 'Gratis', 'Normal pris'],
                    'correct' => 1
                ]
            ],
            [
                'type' => 'multiple_choice',
                'question' => 'Als iemand "geld als water uitgeven" doet, wat betekent dat?',
                'data' => [
                    'options' => ['Hij spaart veel', 'Hij geeft veel uit', 'Hij werkt hard', 'Hij is zuinig'],
                    'correct' => 1
                ]
            ],
            [
                'type' => 'translation',
                'question' => 'Översätt: "Det var jättebilligt!" (använd "appel en ei")',
                'data' => [
                    'correct' => 'het was voor een appel en een ei|dat was voor een appel en een ei'
                ]
            ],
            [
                'type' => 'fill_blank',
                'question' => 'Fyll i: "Geld groeit niet op mijn ___!"',
                'data' => [
                    'sentence' => 'Geld groeit niet op mijn ___!',
                    'correct' => 'rug'
                ]
            ]
        ]
    ],

    // Lesson 26 - På posten
    [
        'title' => 'Op het postkantoor',
        'description' => 'Skicka brev och paket',
        'theme' => 'Praktisk',
        'level' => 'B1',
        'exercises' => [
            [
                'type' => 'multiple_choice',
                'question' => 'Wat is een "postzegel"?',
                'data' => [
                    'options' => ['Ett brev', 'Ett frimärke', 'En brevlåda', 'Ett paket'],
                    'correct' => 1
                ]
            ],
            [
                'type' => 'translation',
                'question' => 'Översätt: "Jag vill skicka detta paket till Sverige"',
                'data' => [
                    'correct' => 'ik wil dit pakket naar zweden versturen|ik wil dit pakket naar zweden sturen'
                ]
            ],
            [
                'type' => 'fill_blank',
                'question' => 'Fyll i: "Hoeveel kost een ___ naar het buitenland?"',
                'data' => [
                    'sentence' => 'Hoeveel kost een ___ naar het buitenland?',
                    'correct' => 'postzegel|brief'
                ]
            ],
            [
                'type' => 'word_order',
                'question' => 'Ordna orden: "Ik wil dit aangetekend versturen"',
                'data' => [
                    'words' => ['Ik', 'wil', 'dit', 'aangetekend', 'versturen'],
                    'correct' => 'Ik wil dit aangetekend versturen'
                ]
            ],
            [
                'type' => 'multiple_choice',
                'question' => 'Wat betekent "aangetekend"?',
                'data' => [
                    'options' => ['Snel', 'Rekommenderat', 'Langzaam', 'Goedkoop'],
                    'correct' => 1
                ]
            ]
        ]
    ],

    // Lesson 27 - Idiomatiska uttryck: Arbete
    [
        'title' => 'Idiomatiska uttryck: Werk',
        'description' => 'Uttryck om arbete',
        'theme' => 'Idiom',
        'level' => 'B1',
        'exercises' => [
            [
                'type' => 'explanation',
                'question' => 'Idiomatiskt uttryck: "Met de handen in het haar zitten"',
                'data' => [
                    'explanation' => 'Bokstavligen: "Sitta med händerna i håret". Detta betyder att vara stressad eller inte veta vad man ska göra. Ungefär som "dra sig i håret" på svenska.',
                    'example' => 'Door dit probleem zit ik echt met de handen in het haar.',
                    'question' => 'Vad betyder detta uttryck?',
                    'options' => ['Vara stressad', 'Vara trött', 'Vara glad', 'Vara arg'],
                    'correct' => 0
                ]
            ],
            [
                'type' => 'explanation',
                'question' => 'Idiomatiskt uttryck: "De handen uit de mouwen steken"',
                'data' => [
                    'explanation' => 'Bokstavligen: "Sticka händerna ur ärmarna". Detta betyder att kavla upp ärmarna och börja arbeta hårt. Ungefär som "kavla upp ärmarna" på svenska.',
                    'example' => 'We moeten de handen uit de mouwen steken om dit af te maken.',
                    'question' => 'Vad betyder detta uttryck?',
                    'options' => ['Att ta av sig tröjan', 'Att börja arbeta hårt', 'Att ta paus', 'Att vara lat'],
                    'correct' => 1
                ]
            ],
            [
                'type' => 'multiple_choice',
                'question' => 'Als je "op je lauweren rust", wat doe je dan?',
                'data' => [
                    'options' => ['Je werkt hard', 'Je rust op dina lagrar', 'Je slaapt', 'Je bent moe'],
                    'correct' => 1
                ]
            ],
            [
                'type' => 'translation',
                'question' => 'Översätt: "Vi måste kavla upp ärmarna" (använd "mouwen")',
                'data' => [
                    'correct' => 'we moeten de handen uit de mouwen steken'
                ]
            ],
            [
                'type' => 'fill_blank',
                'question' => 'Fyll i: "Ik zit met de ___ in het haar."',
                'data' => [
                    'sentence' => 'Ik zit met de ___ in het haar.',
                    'correct' => 'handen'
                ]
            ]
        ]
    ],

    // Lesson 28 - Boka biljetter
    [
        'title' => 'Tickets boeken',
        'description' => 'Boka tåg, bio, konsert',
        'theme' => 'Praktisk',
        'level' => 'B1',
        'exercises' => [
            [
                'type' => 'multiple_choice',
                'question' => 'Wat is een "retourtje"?',
                'data' => [
                    'options' => ['En enkelbiljett', 'En returbiljett', 'En månadsbiljett', 'En rabatt'],
                    'correct' => 1
                ]
            ],
            [
                'type' => 'translation',
                'question' => 'Översätt: "Två biljetter för klockan 8 tack"',
                'data' => [
                    'correct' => 'twee kaartjes voor 8 uur alstublieft|twee tickets voor 8 uur graag'
                ]
            ],
            [
                'type' => 'fill_blank',
                'question' => 'Fyll i: "Ik wil graag een ___ naar Amsterdam."',
                'data' => [
                    'sentence' => 'Ik wil graag een ___ naar Amsterdam.',
                    'correct' => 'retourtje|kaartje|ticket'
                ]
            ],
            [
                'type' => 'word_order',
                'question' => 'Ordna orden: "Zijn er nog plaatsen beschikbaar voor vanavond"',
                'data' => [
                    'words' => ['Zijn', 'er', 'nog', 'plaatsen', 'beschikbaar', 'voor', 'vanavond'],
                    'correct' => 'Zijn er nog plaatsen beschikbaar voor vanavond'
                ]
            ],
            [
                'type' => 'multiple_choice',
                'question' => 'Wat betekent "uitverkocht"?',
                'data' => [
                    'options' => ['Goedkoop', 'Utsåld', 'Open', 'Gratis'],
                    'correct' => 1
                ]
            ]
        ]
    ],

    // Lesson 29 - Idiomatiska uttryck: Känslor
    [
        'title' => 'Idiomatiska uttryck: Gevoelens',
        'description' => 'Uttryck om känslor',
        'theme' => 'Idiom',
        'level' => 'B1',
        'exercises' => [
            [
                'type' => 'explanation',
                'question' => 'Idiomatiskt uttryck: "Een gat in de lucht springen"',
                'data' => [
                    'explanation' => 'Bokstavligen: "Hoppa ett hål i luften". Detta betyder att vara extremt glad, att hoppa av glädje. Ungefär som "hoppa av glädje" på svenska.',
                    'example' => 'Toen ik het goede nieuws hoorde, sprong ik een gat in de lucht!',
                    'question' => 'Vad betyder detta uttryck?',
                    'options' => ['Vara ledsen', 'Vara extremt glad', 'Vara arg', 'Vara rädd'],
                    'correct' => 1
                ]
            ],
            [
                'type' => 'explanation',
                'question' => 'Idiomatiskt uttryck: "Iets met een korreltje zout nemen"',
                'data' => [
                    'explanation' => 'Bokstavligen: "Ta något med en nypa salt". Detta betyder att inte ta något helt på allvar, att vara skeptisk. Identiskt med det svenska uttrycket "ta med en nypa salt".',
                    'example' => 'Neem zijn verhaal met een korreltje zout.',
                    'question' => 'Vad betyder detta uttryck?',
                    'options' => ['Att lita på något helt', 'Att vara skeptisk', 'Att vara hungrig', 'Att krydda mat'],
                    'correct' => 1
                ]
            ],
            [
                'type' => 'multiple_choice',
                'question' => 'Als je "het land hebben" bij iemand, wat betekent dat?',
                'data' => [
                    'options' => ['Je houdt van hem/haar', 'Je bent boos op hem/haar', 'Je bent verdrietig', 'Je bent blij'],
                    'correct' => 1
                ]
            ],
            [
                'type' => 'translation',
                'question' => 'Översätt: "Jag hoppade av glädje!" (använd "gat in de lucht")',
                'data' => [
                    'correct' => 'ik sprong een gat in de lucht'
                ]
            ],
            [
                'type' => 'fill_blank',
                'question' => 'Fyll i: "Neem zijn verhaal met een ___ zout."',
                'data' => [
                    'sentence' => 'Neem zijn verhaal met een ___ zout.',
                    'correct' => 'korreltje'
                ]
            ]
        ]
    ],

    // Lesson 30 - Sammanfattning och blandat
    [
        'title' => 'Herhaling en verdieping',
        'description' => 'Repetition av idiom och praktiska situationer',
        'theme' => 'Sammansättning',
        'level' => 'B1',
        'exercises' => [
            [
                'type' => 'multiple_choice',
                'question' => 'Welke uitdrukking betekent "köpa grisen i säcken"?',
                'data' => [
                    'options' => ['Een kat in de zak kopen', 'Twee vliegen in één klap slaan', 'Met de handen in het haar zitten', 'De handen uit de mouwen steken'],
                    'correct' => 0
                ]
            ],
            [
                'type' => 'translation',
                'question' => 'Översätt: "Bättre sent än aldrig"',
                'data' => [
                    'correct' => 'beter laat dan nooit'
                ]
            ],
            [
                'type' => 'multiple_choice',
                'question' => 'Wat betekent "voor een appel en een ei"?',
                'data' => [
                    'options' => ['Duur', 'Heel goedkoop', 'Gratis', 'Normaal'],
                    'correct' => 1
                ]
            ],
            [
                'type' => 'fill_blank',
                'question' => 'Fyll i: "Na regen komt ___."',
                'data' => [
                    'sentence' => 'Na regen komt ___.',
                    'correct' => 'zonneschijn'
                ]
            ],
            [
                'type' => 'word_order',
                'question' => 'Ordna orden: "De tijd vliegt als je plezier hebt"',
                'data' => [
                    'words' => ['De', 'tijd', 'vliegt', 'als', 'je', 'plezier', 'hebt'],
                    'correct' => 'De tijd vliegt als je plezier hebt'
                ]
            ]
        ]
    ]
];

// Insert all lessons
$lesson_number = 16; // Start from lesson 16
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
    
    echo "✓ Lektion {$lesson_number}: {$lesson['title']} tillagd\n";
    $lesson_number++;
}

echo "\n🎉 Alla 15 nya lektioner (16-30) har lagts till!\n";
echo "Totalt: 30 lektioner med fokus på idiomatiska uttryck och praktiska situationer.\n";
?>
