<?php
require_once 'config.php';

$db = getLanguageDB();

// Get the Dutch language ID
$stmt = $db->query("SELECT id FROM languages WHERE code = 'nl'");
$language = $stmt->fetch(PDO::FETCH_ASSOC);
$language_id = $language['id'];

// Lessons 31-45 - More idioms, practical situations, and grammar
$lessons = [
    // Lesson 31 - Idiomatiska uttryck: Färger
    [
        'title' => 'Idiomatiska uttryck: Kleuren',
        'description' => 'Uttryck med färger',
        'theme' => 'Idiom',
        'exercises' => [
            [
                'type' => 'explanation',
                'question' => 'Idiomatiskt uttryck: "Groen van jaloezie"',
                'data' => [
                    'explanation' => 'Bokstavligen: "Grön av avundsjuka". Detta uttryck betyder att vara väldigt avundsjuk, precis som på svenska.',
                    'example' => 'Hij was groen van jaloezie toen hij haar nieuwe auto zag.',
                    'question' => 'Vad betyder "groen van jaloezie"?',
                    'options' => ['Att vara sjuk', 'Att vara mycket avundsjuk', 'Att gilla grönt', 'Att vara arg'],
                    'correct' => 1
                ]
            ],
            [
                'type' => 'explanation',
                'question' => 'Idiomatiskt uttryck: "Een zwart schaap"',
                'data' => [
                    'explanation' => 'Bokstavligen: "Ett svart får". Detta betyder "det svarta fåret i familjen" - någon som inte passar in eller uppför sig annorlunda än resten.',
                    'example' => 'Hij is het zwarte schaap van de familie.',
                    'question' => 'Vad är "een zwart schaap"?',
                    'options' => ['Ett verkligt får', 'Någon som inte passar in', 'En färg', 'Ett djur'],
                    'correct' => 1
                ]
            ],
            [
                'type' => 'multiple_choice',
                'question' => 'Als je "wit van schrik" bent, hoe voel je je dan?',
                'data' => [
                    'options' => ['Blij', 'Boos', 'Erg geschrokken', 'Moe'],
                    'correct' => 2
                ]
            ],
            [
                'type' => 'translation',
                'question' => 'Översätt: "Han blev vit av skräck"',
                'data' => [
                    'correct' => 'hij werd wit van schrik|hij was wit van schrik'
                ]
            ],
            [
                'type' => 'fill_blank',
                'question' => 'Fyll i: "Zij is ___ van jaloezie."',
                'data' => [
                    'sentence' => 'Zij is ___ van jaloezie.',
                    'correct' => 'groen'
                ]
            ]
        ]
    ],

    // Lesson 32 - På gymmet
    [
        'title' => 'In de sportschool',
        'description' => 'Träna och vara aktiv',
        'theme' => 'Praktisk',
        'exercises' => [
            [
                'type' => 'multiple_choice',
                'question' => 'Wat betekent "krachttraining"?',
                'data' => [
                    'options' => ['Löpträning', 'Styrketräning', 'Yoga', 'Simning'],
                    'correct' => 1
                ]
            ],
            [
                'type' => 'translation',
                'question' => 'Översätt: "Jag tränar tre gånger i veckan"',
                'data' => [
                    'correct' => 'ik train drie keer per week|ik sport drie keer per week'
                ]
            ],
            [
                'type' => 'fill_blank',
                'question' => 'Fyll i: "Ik wil graag ___ worden van deze sportschool."',
                'data' => [
                    'sentence' => 'Ik wil graag ___ worden van deze sportschool.',
                    'correct' => 'lid'
                ]
            ],
            [
                'type' => 'word_order',
                'question' => 'Ordna orden: "Hoe laat gaat de sportschool open"',
                'data' => [
                    'words' => ['Hoe', 'laat', 'gaat', 'de', 'sportschool', 'open'],
                    'correct' => 'Hoe laat gaat de sportschool open'
                ]
            ],
            [
                'type' => 'multiple_choice',
                'question' => 'Wat is "een loopband"?',
                'data' => [
                    'options' => ['Ett löpband', 'En hantel', 'En yogamatta', 'En boll'],
                    'correct' => 0
                ]
            ]
        ]
    ],

    // Lesson 33 - Reflexiva verb
    [
        'title' => 'Wederkerend werkwoorden',
        'description' => 'Reflexiva verb på nederländska',
        'theme' => 'Grammatik',
        'exercises' => [
            [
                'type' => 'multiple_choice',
                'question' => 'Welk werkwoord is wederkerend: "Ik ___ me elke dag"?',
                'data' => [
                    'options' => ['loop', 'was', 'eet', 'schrijf'],
                    'correct' => 1
                ]
            ],
            [
                'type' => 'translation',
                'question' => 'Översätt: "Jag känner mig trött"',
                'data' => [
                    'correct' => 'ik voel me moe|ik voel mij moe'
                ]
            ],
            [
                'type' => 'fill_blank',
                'question' => 'Fyll i rätt reflexivt pronomen: "Zij vergist ___ vaak."',
                'data' => [
                    'sentence' => 'Zij vergist ___ vaak.',
                    'correct' => 'zich'
                ]
            ],
            [
                'type' => 'word_order',
                'question' => 'Ordna orden: "Ik moet me haasten"',
                'data' => [
                    'words' => ['Ik', 'moet', 'me', 'haasten'],
                    'correct' => 'Ik moet me haasten'
                ]
            ],
            [
                'type' => 'multiple_choice',
                'question' => 'Wat betekent "zich vervelen"?',
                'data' => [
                    'options' => ['Att tråkna sig', 'Att skynda sig', 'Att klä sig', 'Att tveka'],
                    'correct' => 0
                ]
            ]
        ]
    ],

    // Lesson 34 - På biblioteket
    [
        'title' => 'In de bibliotheek',
        'description' => 'Låna böcker och studera',
        'theme' => 'Praktisk',
        'exercises' => [
            [
                'type' => 'multiple_choice',
                'question' => 'Wat doe je als je een boek "leent"?',
                'data' => [
                    'options' => ['Je koopt het', 'Je lånar det', 'Je leest het', 'Je schrijft het'],
                    'correct' => 1
                ]
            ],
            [
                'type' => 'translation',
                'question' => 'Översätt: "Hur länge kan jag låna den här boken?"',
                'data' => [
                    'correct' => 'hoe lang kan ik dit boek lenen|hoe lang mag ik dit boek lenen'
                ]
            ],
            [
                'type' => 'fill_blank',
                'question' => 'Fyll i: "Ik wil mijn ___ verlengen."',
                'data' => [
                    'sentence' => 'Ik wil mijn ___ verlengen.',
                    'correct' => 'lidmaatschap|pas'
                ]
            ],
            [
                'type' => 'word_order',
                'question' => 'Ordna orden: "Waar kan ik deze boeken inleveren"',
                'data' => [
                    'words' => ['Waar', 'kan', 'ik', 'deze', 'boeken', 'inleveren'],
                    'correct' => 'Waar kan ik deze boeken inleveren'
                ]
            ],
            [
                'type' => 'multiple_choice',
                'question' => 'Wat is een "uitleentermijn"?',
                'data' => [
                    'options' => ['En bok', 'Lånetid', 'Ett bibliotekskort', 'En hylla'],
                    'correct' => 1
                ]
            ]
        ]
    ],

    // Lesson 35 - Idiomatiska uttryck: Tal
    [
        'title' => 'Idiomatiska uttryck: Getallen',
        'description' => 'Uttryck med tal',
        'theme' => 'Idiom',
        'exercises' => [
            [
                'type' => 'explanation',
                'question' => 'Idiomatiskt uttryck: "Op één lijn zitten"',
                'data' => [
                    'explanation' => 'Bokstavligen: "Sitta på samma linje". Detta betyder att vara överens, ha samma åsikt. Ungefär som "vara på samma våglängd".',
                    'example' => 'Gelukkig zitten we op één lijn over dit onderwerp.',
                    'question' => 'Vad betyder "op één lijn zitten"?',
                    'options' => ['Att sitta bredvid varandra', 'Att vara överens', 'Att vänta i kö', 'Att arbeta tillsammans'],
                    'correct' => 1
                ]
            ],
            [
                'type' => 'explanation',
                'question' => 'Idiomatiskt uttryck: "Iemand de duimschroeven aandraaien"',
                'data' => [
                    'explanation' => 'Bokstavligen: "Dra åt tumskruvarna på någon". Detta betyder att sätta press på någon, tvinga någon att göra något.',
                    'example' => 'Ze draaiden hem de duimschroeven aan om te betalen.',
                    'question' => 'Vad betyder detta uttryck?',
                    'options' => ['Att hjälpa någon', 'Att sätta press på någon', 'Att lära någon', 'Att ignorera någon'],
                    'correct' => 1
                ]
            ],
            [
                'type' => 'multiple_choice',
                'question' => 'Als je "met twee maten meet", wat doe je dan?',
                'data' => [
                    'options' => ['Je behandelt mensen verschillend', 'Je meet iets twee keer', 'Je bent eerlijk', 'Je kookt'],
                    'correct' => 0
                ]
            ],
            [
                'type' => 'translation',
                'question' => 'Översätt: "Vi är överens" (använd "lijn")',
                'data' => [
                    'correct' => 'we zitten op één lijn|wij zitten op één lijn'
                ]
            ],
            [
                'type' => 'fill_blank',
                'question' => 'Fyll i: "Gelukkig zitten we op ___ lijn."',
                'data' => [
                    'sentence' => 'Gelukkig zitten we op ___ lijn.',
                    'correct' => 'één'
                ]
            ]
        ]
    ],

    // Lesson 36 - Modalverb
    [
        'title' => 'Modale werkwoorden',
        'description' => 'Kunnen, moeten, mogen, willen',
        'theme' => 'Grammatik',
        'exercises' => [
            [
                'type' => 'multiple_choice',
                'question' => 'Welk woord betekent "att kunna/att få lov"?',
                'data' => [
                    'options' => ['moeten', 'kunnen', 'mogen', 'willen'],
                    'correct' => 2
                ]
            ],
            [
                'type' => 'translation',
                'question' => 'Översätt: "Jag kan inte komma idag"',
                'data' => [
                    'correct' => 'ik kan vandaag niet komen|ik kan niet vandaag komen'
                ]
            ],
            [
                'type' => 'fill_blank',
                'question' => 'Fyll i rätt modalverb: "Je ___ hier niet roken." (får inte)',
                'data' => [
                    'sentence' => 'Je ___ hier niet roken.',
                    'correct' => 'mag'
                ]
            ],
            [
                'type' => 'word_order',
                'question' => 'Ordna orden: "Ik wil graag Nederlands leren"',
                'data' => [
                    'words' => ['Ik', 'wil', 'graag', 'Nederlands', 'leren'],
                    'correct' => 'Ik wil graag Nederlands leren'
                ]
            ],
            [
                'type' => 'multiple_choice',
                'question' => 'Wat is het verschil tussen "kunnen" en "mogen"?',
                'data' => [
                    'options' => ['Geen verschil', 'Kunnen = kunna, mogen = få lov', 'Kunnen = måste, mogen = kunna', 'Kunnen = vilja, mogen = kunna'],
                    'correct' => 1
                ]
            ]
        ]
    ],

    // Lesson 37 - Hos tandläkaren
    [
        'title' => 'Bij de tandarts',
        'description' => 'Tandvård och besök',
        'theme' => 'Praktisk',
        'exercises' => [
            [
                'type' => 'multiple_choice',
                'question' => 'Wat is "gaatje" in deze context?',
                'data' => [
                    'options' => ['Ett hål i tanden', 'En tand', 'Tandkött', 'Tandborste'],
                    'correct' => 0
                ]
            ],
            [
                'type' => 'translation',
                'question' => 'Översätt: "Jag har tandvärk"',
                'data' => [
                    'correct' => 'ik heb kiespijn|ik heb tandpijn'
                ]
            ],
            [
                'type' => 'fill_blank',
                'question' => 'Fyll i: "Ik moet een ___ laten trekken."',
                'data' => [
                    'sentence' => 'Ik moet een ___ laten trekken.',
                    'correct' => 'tand|kies'
                ]
            ],
            [
                'type' => 'word_order',
                'question' => 'Ordna orden: "Doet het veel pijn"',
                'data' => [
                    'words' => ['Doet', 'het', 'veel', 'pijn'],
                    'correct' => 'Doet het veel pijn'
                ]
            ],
            [
                'type' => 'multiple_choice',
                'question' => 'Wat betekent "vulling"?',
                'data' => [
                    'options' => ['Plombering', 'Tandborste', 'Tandkräm', 'Tandtråd'],
                    'correct' => 0
                ]
            ]
        ]
    ],

    // Lesson 38 - Idiomatiska uttryck: Hem och möbler
    [
        'title' => 'Idiomatiska uttryck: Huis',
        'description' => 'Uttryck om hem och inredning',
        'theme' => 'Idiom',
        'exercises' => [
            [
                'type' => 'explanation',
                'question' => 'Idiomatiskt uttryck: "Het huis uit de hand lopen"',
                'data' => [
                    'explanation' => 'Bokstavligen: "Huset springer ur händerna". Detta betyder att saker går ur kontroll, särskilt när barn beter sig illa hemma.',
                    'example' => 'De kinderen lopen het huis uit de hand!',
                    'question' => 'Vad betyder "het huis uit de hand lopen"?',
                    'options' => ['Att springa ut ur huset', 'Att saker går ur kontroll', 'Att städa', 'Att flytta'],
                    'correct' => 1
                ]
            ],
            [
                'type' => 'explanation',
                'question' => 'Idiomatiskt uttryck: "Ergens geen touw aan vast kunnen knopen"',
                'data' => [
                    'explanation' => 'Bokstavligen: "Inte kunna knyta något rep vid något". Detta betyder att inte förstå något alls, att något är helt obegripligt.',
                    'example' => 'Ik kan er geen touw aan vast knopen wat hij bedoelt.',
                    'question' => 'När använder man detta uttryck?',
                    'options' => ['När man förstår allt', 'När man inte förstår något', 'När man knyter rep', 'När man är hemma'],
                    'correct' => 1
                ]
            ],
            [
                'type' => 'multiple_choice',
                'question' => 'Als je "achter de geraniums zit", wat doe je?',
                'data' => [
                    'options' => ['Je werkt in de tuin', 'Je bent gepensioneerd en verveeld thuis', 'Je bent ziek', 'Je bent blij'],
                    'correct' => 1
                ]
            ],
            [
                'type' => 'translation',
                'question' => 'Översätt: "Det gick ur kontroll" (använd "hand")',
                'data' => [
                    'correct' => 'het liep uit de hand|dat liep uit de hand'
                ]
            ],
            [
                'type' => 'fill_blank',
                'question' => 'Fyll i: "Ik kan er geen ___ aan vast knopen."',
                'data' => [
                    'sentence' => 'Ik kan er geen ___ aan vast knopen.',
                    'correct' => 'touw'
                ]
            ]
        ]
    ],

    // Lesson 39 - Separerbara verb
    [
        'title' => 'Scheidbare werkwoorden',
        'description' => 'Separerbara verb på nederländska',
        'theme' => 'Grammatik',
        'exercises' => [
            [
                'type' => 'multiple_choice',
                'question' => 'Welk werkwoord is scheidbaar?',
                'data' => [
                    'options' => ['begrijpen', 'opbellen', 'vertellen', 'geloven'],
                    'correct' => 1
                ]
            ],
            [
                'type' => 'translation',
                'question' => 'Översätt: "Jag ringer upp dig senare"',
                'data' => [
                    'correct' => 'ik bel je later op|ik bel je straks op'
                ]
            ],
            [
                'type' => 'fill_blank',
                'question' => 'Fyll i rätt form: "Ik sta om 7 uur ___." (stå upp)',
                'data' => [
                    'sentence' => 'Ik sta om 7 uur ___.',
                    'correct' => 'op'
                ]
            ],
            [
                'type' => 'word_order',
                'question' => 'Ordna orden: "Doe je de deur dicht"',
                'data' => [
                    'words' => ['Doe', 'je', 'de', 'deur', 'dicht'],
                    'correct' => 'Doe je de deur dicht'
                ]
            ],
            [
                'type' => 'multiple_choice',
                'question' => 'Waar staat het voorzetsel in "Ik kom morgen terug"?',
                'data' => [
                    'options' => ['Voor het werkwoord', 'Achter in de zin', 'Aan het begin', 'Er is geen voorzetsel'],
                    'correct' => 1
                ]
            ]
        ]
    ],

    // Lesson 40 - Börja nytt jobb
    [
        'title' => 'Beginnen met een nieuwe baan',
        'description' => 'Första dagen på jobbet',
        'theme' => 'Praktisk',
        'exercises' => [
            [
                'type' => 'multiple_choice',
                'question' => 'Wat is een "inwerktijd"?',
                'data' => [
                    'options' => ['Lön', 'Inskolningstid', 'Arbetstid', 'Semester'],
                    'correct' => 1
                ]
            ],
            [
                'type' => 'translation',
                'question' => 'Översätt: "Trevligt att träffas!"',
                'data' => [
                    'correct' => 'leuk je te ontmoeten|aangenaam kennis te maken'
                ]
            ],
            [
                'type' => 'fill_blank',
                'question' => 'Fyll i: "Ik begin volgende week met mijn nieuwe ___."',
                'data' => [
                    'sentence' => 'Ik begin volgende week met mijn nieuwe ___.',
                    'correct' => 'baan|werk|functie'
                ]
            ],
            [
                'type' => 'word_order',
                'question' => 'Ordna orden: "Waar is de koffieautomaat"',
                'data' => [
                    'words' => ['Waar', 'is', 'de', 'koffieautomaat'],
                    'correct' => 'Waar is de koffieautomaat'
                ]
            ],
            [
                'type' => 'multiple_choice',
                'question' => 'Wat betekent "collega"?',
                'data' => [
                    'options' => ['Chef', 'Kollega', 'Kund', 'Anställd'],
                    'correct' => 1
                ]
            ]
        ]
    ],

    // Lesson 41 - Idiomatiska uttryck: Kläder
    [
        'title' => 'Idiomatiska uttryck: Kleding',
        'description' => 'Uttryck med kläder',
        'theme' => 'Idiom',
        'exercises' => [
            [
                'type' => 'explanation',
                'question' => 'Idiomatiskt uttryck: "Iemand de maat nemen"',
                'data' => [
                    'explanation' => 'Bokstavligen: "Ta måtten på någon". Detta betyder att sätta någon på plats, visa vem som bestämmer.',
                    'example' => 'Hij nam zijn brutale zoon eens flink de maat.',
                    'question' => 'Vad betyder "iemand de maat nemen"?',
                    'options' => ['Att sy kläder', 'Att sätta någon på plats', 'Att hjälpa någon', 'Att mäta något'],
                    'correct' => 1
                ]
            ],
            [
                'type' => 'explanation',
                'question' => 'Idiomatiskt uttryck: "Iets uit de mouw schudden"',
                'data' => [
                    'explanation' => 'Bokstavligen: "Skaka något ur ärmen". Detta betyder att snabbt hitta på eller improvisera en lösning.',
                    'example' => 'We moeten snel iets uit de mouw schudden.',
                    'question' => 'Vad betyder detta uttryck?',
                    'options' => ['Att klä sig', 'Att snabbt hitta en lösning', 'Att tvätta kläder', 'Att dansa'],
                    'correct' => 1
                ]
            ],
            [
                'type' => 'multiple_choice',
                'question' => 'Als iemand "een oude sok" is, wat betekent dat?',
                'data' => [
                    'options' => ['Hij is oud', 'Hij is saai en tråkig', 'Hij is smutsig', 'Hij bär gamla strumpor'],
                    'correct' => 1
                ]
            ],
            [
                'type' => 'translation',
                'question' => 'Översätt: "Vi måste hitta en lösning snabbt" (använd "mouw")',
                'data' => [
                    'correct' => 'we moeten snel iets uit de mouw schudden'
                ]
            ],
            [
                'type' => 'fill_blank',
                'question' => 'Fyll i: "Ik zal hem eens de ___ nemen!"',
                'data' => [
                    'sentence' => 'Ik zal hem eens de ___ nemen!',
                    'correct' => 'maat'
                ]
            ]
        ]
    ],

    // Lesson 42 - Ordföljd i bisatser
    [
        'title' => 'Woordvolgorde in bijzinnen',
        'description' => 'Ordföljd i bisatser',
        'theme' => 'Grammatik',
        'exercises' => [
            [
                'type' => 'multiple_choice',
                'question' => 'Waar staat het werkwoord in een bijzin?',
                'data' => [
                    'options' => ['Aan het begin', 'In het midden', 'Aan het einde', 'Het maakt niet uit'],
                    'correct' => 2
                ]
            ],
            [
                'type' => 'translation',
                'question' => 'Översätt: "Jag vet att han kommer"',
                'data' => [
                    'correct' => 'ik weet dat hij komt'
                ]
            ],
            [
                'type' => 'fill_blank',
                'question' => 'Fyll i: "Ik weet niet of hij morgen ___." (kommer)',
                'data' => [
                    'sentence' => 'Ik weet niet of hij morgen ___.',
                    'correct' => 'komt'
                ]
            ],
            [
                'type' => 'word_order',
                'question' => 'Ordna orden: "omdat ik ziek ben"',
                'data' => [
                    'words' => ['omdat', 'ik', 'ziek', 'ben'],
                    'correct' => 'omdat ik ziek ben'
                ]
            ],
            [
                'type' => 'multiple_choice',
                'question' => 'Welke zin is correct?',
                'data' => [
                    'options' => ['Ik blijf thuis omdat ik ben ziek', 'Ik blijf thuis omdat ik ziek ben', 'Ik blijf thuis omdat ben ik ziek', 'Ik blijf omdat thuis ik ziek ben'],
                    'correct' => 1
                ]
            ]
        ]
    ],

    // Lesson 43 - Flytta
    [
        'title' => 'Verhuizen',
        'description' => 'Att flytta till nytt boende',
        'theme' => 'Praktisk',
        'exercises' => [
            [
                'type' => 'multiple_choice',
                'question' => 'Wat is een "verhuiswagen"?',
                'data' => [
                    'options' => ['En bil', 'En flyttbil', 'En lastbil', 'En buss'],
                    'correct' => 1
                ]
            ],
            [
                'type' => 'translation',
                'question' => 'Översätt: "Vi flyttar nästa månad"',
                'data' => [
                    'correct' => 'we verhuizen volgende maand|wij verhuizen volgende maand'
                ]
            ],
            [
                'type' => 'fill_blank',
                'question' => 'Fyll i: "Kun je me helpen met ___?"',
                'data' => [
                    'sentence' => 'Kun je me helpen met ___?',
                    'correct' => 'verhuizen|de verhuizing'
                ]
            ],
            [
                'type' => 'word_order',
                'question' => 'Ordna orden: "Ik moet dozen inpakken"',
                'data' => [
                    'words' => ['Ik', 'moet', 'dozen', 'inpakken'],
                    'correct' => 'Ik moet dozen inpakken'
                ]
            ],
            [
                'type' => 'multiple_choice',
                'question' => 'Wat doe je als je "inpakt"?',
                'data' => [
                    'options' => ['Packa upp', 'Packa', 'Flytta', 'Städa'],
                    'correct' => 1
                ]
            ]
        ]
    ],

    // Lesson 44 - Idiomatiska uttryck: Transport
    [
        'title' => 'Idiomatiska uttryck: Vervoer',
        'description' => 'Uttryck om transport',
        'theme' => 'Idiom',
        'exercises' => [
            [
                'type' => 'explanation',
                'question' => 'Idiomatiskt uttryck: "Op de rem trappen"',
                'data' => [
                    'explanation' => 'Bokstavligen: "Trampa på bromsen". Detta betyder att bromsasnabbt, avbryta något plötsligt, eller dra ner på utgifter.',
                    'example' => 'We moeten op de rem trappen met onze uitgaven.',
                    'question' => 'Vad betyder "op de rem trappen"?',
                    'options' => ['Att köra fort', 'Att bromsa/dra ner på något', 'Att cykla', 'Att resa'],
                    'correct' => 1
                ]
            ],
            [
                'type' => 'explanation',
                'question' => 'Idiomatiskt uttryck: "Gas geven"',
                'data' => [
                    'explanation' => 'Bokstavligen: "Ge gas". Detta betyder att accelerera, skynda på, sätta fart på något.',
                    'example' => 'We moeten nu echt gas geven om het op tijd af te krijgen.',
                    'question' => 'När använder man "gas geven"?',
                    'options' => ['När man ska sakta ner', 'När man ska skynda på', 'När man tankar', 'När man är trött'],
                    'correct' => 1
                ]
            ],
            [
                'type' => 'multiple_choice',
                'question' => 'Als je "vaart maken", wat doe je dan?',
                'data' => [
                    'options' => ['Je zeilt', 'Je skyndar dig', 'Je reist', 'Je zwemt'],
                    'correct' => 1
                ]
            ],
            [
                'type' => 'translation',
                'question' => 'Översätt: "Vi måste skynda på nu" (använd "gas")',
                'data' => [
                    'correct' => 'we moeten nu gas geven|nu moeten we gas geven'
                ]
            ],
            [
                'type' => 'fill_blank',
                'question' => 'Fyll i: "We moeten op de ___ trappen."',
                'data' => [
                    'sentence' => 'We moeten op de ___ trappen.',
                    'correct' => 'rem'
                ]
            ]
        ]
    ],

    // Lesson 45 - Sammanfattning: Blandat
    [
        'title' => 'Gemengde oefeningen',
        'description' => 'Repetition av allt vi lärt oss',
        'theme' => 'Sammansättning',
        'exercises' => [
            [
                'type' => 'multiple_choice',
                'question' => 'Welk werkwoord is wederkerend?',
                'data' => [
                    'options' => ['lopen', 'zich haasten', 'werken', 'eten'],
                    'correct' => 1
                ]
            ],
            [
                'type' => 'translation',
                'question' => 'Översätt: "Vi är överens om det"',
                'data' => [
                    'correct' => 'we zijn het eens|we zijn het daarover eens|wij zijn het eens'
                ]
            ],
            [
                'type' => 'multiple_choice',
                'question' => 'Wat betekent "groen van jaloezie"?',
                'data' => [
                    'options' => ['Ziek zijn', 'Zeer jaloers zijn', 'Blij zijn', 'Boos zijn'],
                    'correct' => 1
                ]
            ],
            [
                'type' => 'fill_blank',
                'question' => 'Fyll i rätt ordföljd: "Ik weet niet of hij morgen ___." (kommer)',
                'data' => [
                    'sentence' => 'Ik weet niet of hij morgen ___.',
                    'correct' => 'komt'
                ]
            ],
            [
                'type' => 'word_order',
                'question' => 'Ordna orden: "omdat ik geen tijd heb"',
                'data' => [
                    'words' => ['omdat', 'ik', 'geen', 'tijd', 'heb'],
                    'correct' => 'omdat ik geen tijd heb'
                ]
            ]
        ]
    ]
];

// Insert all lessons
$lesson_number = 31; // Start from lesson 31
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

echo "\n🎉 Alla 15 nya lektioner (31-45) har lagts till!\n";
echo "Totalt: 45 lektioner med 225 övningar.\n";
echo "Teman: Färger, tal, kläder, transport, reflexiva verb, modalverb, separerbara verb, ordföljd i bisatser\n";
echo "Praktiska situationer: Gym, bibliotek, tandläkare, nytt jobb, flytta\n";
?>
