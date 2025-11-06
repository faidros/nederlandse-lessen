<?php
require_once 'config.php';

$db = getLanguageDB();

// Get the Dutch language ID
$stmt = $db->query("SELECT id FROM languages WHERE code = 'nl'");
$language = $stmt->fetch(PDO::FETCH_ASSOC);
$language_id = $language['id'];

// Lessons 46-60 - More variety: idioms, situations, and advanced grammar
$lessons = [
    // Lesson 46 - På polisstationen
    [
        'title' => 'Op het politiebureau',
        'description' => 'Polisanmälan och hjälp',
        'theme' => 'Praktisk',
        'exercises' => [
            [
                'type' => 'multiple_choice',
                'question' => 'Wat doe je als je "aangifte doet"?',
                'data' => [
                    'options' => ['Je vraagt om hulp', 'Je gör en polisanmälan', 'Je betaalt een boete', 'Je werkt bij de politie'],
                    'correct' => 1
                ]
            ],
            [
                'type' => 'translation',
                'question' => 'Översätt: "Min plånbok blev stulen"',
                'data' => [
                    'correct' => 'mijn portemonnee is gestolen|mijn portefeuille is gestolen'
                ]
            ],
            [
                'type' => 'fill_blank',
                'question' => 'Fyll i: "Ik wil ___ doen van diefstal."',
                'data' => [
                    'sentence' => 'Ik wil ___ doen van diefstal.',
                    'correct' => 'aangifte'
                ]
            ],
            [
                'type' => 'word_order',
                'question' => 'Ordna orden: "Mijn fiets is vannacht gestolen"',
                'data' => [
                    'words' => ['Mijn', 'fiets', 'is', 'vannacht', 'gestolen'],
                    'correct' => 'Mijn fiets is vannacht gestolen'
                ]
            ],
            [
                'type' => 'multiple_choice',
                'question' => 'Wat is een "dief"?',
                'data' => [
                    'options' => ['En polis', 'En tjuv', 'Ett vittne', 'En advokat'],
                    'correct' => 1
                ]
            ]
        ]
    ],

    // Lesson 47 - Idiomatiska uttryck: Natur
    [
        'title' => 'Idiomatiska uttryck: Natuur',
        'description' => 'Uttryck om naturen',
        'theme' => 'Idiom',
        'exercises' => [
            [
                'type' => 'explanation',
                'question' => 'Idiomatiskt uttryck: "In de wolken zijn"',
                'data' => [
                    'explanation' => 'Bokstavligen: "Vara i molnen". Detta betyder att vara överlycklig, gå på moln. Precis som det svenska "gå på moln".',
                    'example' => 'Sinds ze die baan heeft gekregen, is ze in de wolken!',
                    'question' => 'Vad betyder "in de wolken zijn"?',
                    'options' => ['Att flyga', 'Att vara överlycklig', 'Att vara förvirrad', 'Att drömma'],
                    'correct' => 1
                ]
            ],
            [
                'type' => 'explanation',
                'question' => 'Idiomatiskt uttryck: "Als paddenstoelen uit de grond schieten"',
                'data' => [
                    'explanation' => 'Bokstavligen: "Skjuta upp som svampar ur marken". Detta betyder att något ökar eller sprider sig mycket snabbt.',
                    'example' => 'Nieuwe winkels schieten als paddenstoelen uit de grond.',
                    'question' => 'När använder man detta uttryck?',
                    'options' => ['När något växer långsamt', 'När något ökar mycket snabbt', 'När man plockar svamp', 'När det regnar'],
                    'correct' => 1
                ]
            ],
            [
                'type' => 'multiple_choice',
                'question' => 'Als je zegt "het regent pijpenstelen", wat bedoel je?',
                'data' => [
                    'options' => ['Het regent een beetje', 'Het regent heel hard', 'Het sneeuwt', 'Het is bewolkt'],
                    'correct' => 1
                ]
            ],
            [
                'type' => 'translation',
                'question' => 'Översätt: "Hon är överlycklig" (använd "wolken")',
                'data' => [
                    'correct' => 'zij is in de wolken|ze is in de wolken'
                ]
            ],
            [
                'type' => 'fill_blank',
                'question' => 'Fyll i: "Nieuwe bedrijven schieten als ___ uit de grond."',
                'data' => [
                    'sentence' => 'Nieuwe bedrijven schieten als ___ uit de grond.',
                    'correct' => 'paddenstoelen'
                ]
            ]
        ]
    ],

    // Lesson 48 - Presens perfekt
    [
        'title' => 'Voltooid tegenwoordige tijd',
        'description' => 'Perfekt (har gjort)',
        'theme' => 'Grammatik',
        'exercises' => [
            [
                'type' => 'multiple_choice',
                'question' => 'Hoe maak je de voltooid tegenwoordige tijd?',
                'data' => [
                    'options' => ['hebben/zijn + infinitief', 'hebben/zijn + voltooid deelwoord', 'zullen + infinitief', 'worden + voltooid deelwoord'],
                    'correct' => 1
                ]
            ],
            [
                'type' => 'translation',
                'question' => 'Översätt: "Jag har ätit"',
                'data' => [
                    'correct' => 'ik heb gegeten'
                ]
            ],
            [
                'type' => 'fill_blank',
                'question' => 'Fyll i: "Zij ___ naar Amsterdam gereden." (är)',
                'data' => [
                    'sentence' => 'Zij ___ naar Amsterdam gereden.',
                    'correct' => 'is'
                ]
            ],
            [
                'type' => 'word_order',
                'question' => 'Ordna orden: "Ik heb het boek gelezen"',
                'data' => [
                    'words' => ['Ik', 'heb', 'het', 'boek', 'gelezen'],
                    'correct' => 'Ik heb het boek gelezen'
                ]
            ],
            [
                'type' => 'multiple_choice',
                'question' => 'Welke werkwoorden gebruiken "zijn" in plaats van "hebben"?',
                'data' => [
                    'options' => ['Alle werkwoorden', 'Verplaatsing en verandering', 'Alleen eten en drinken', 'Alleen denken en voelen'],
                    'correct' => 1
                ]
            ]
        ]
    ],

    // Lesson 49 - Köpa kläder
    [
        'title' => 'Kleren kopen',
        'description' => 'Shopping för kläder',
        'theme' => 'Praktisk',
        'exercises' => [
            [
                'type' => 'multiple_choice',
                'question' => 'Wat vraag je als iets te groot is?',
                'data' => [
                    'options' => ['Heeft u dit in een grotere maat?', 'Heeft u dit in een kleinere maat?', 'Heeft u dit in een andere kleur?', 'Hoeveel kost dit?'],
                    'correct' => 1
                ]
            ],
            [
                'type' => 'translation',
                'question' => 'Översätt: "Kan jag prova detta?"',
                'data' => [
                    'correct' => 'kan ik dit passen|mag ik dit passen'
                ]
            ],
            [
                'type' => 'fill_blank',
                'question' => 'Fyll i: "Waar is de ___?" (provrum)',
                'data' => [
                    'sentence' => 'Waar is de ___?',
                    'correct' => 'paskamer|kleedkamer'
                ]
            ],
            [
                'type' => 'word_order',
                'question' => 'Ordna orden: "Dit staat je goed"',
                'data' => [
                    'words' => ['Dit', 'staat', 'je', 'goed'],
                    'correct' => 'Dit staat je goed'
                ]
            ],
            [
                'type' => 'multiple_choice',
                'question' => 'Wat betekent "in de uitverkoop"?',
                'data' => [
                    'options' => ['Duur', 'På rea', 'Nieuw', 'Oud'],
                    'correct' => 1
                ]
            ]
        ]
    ],

    // Lesson 50 - Idiomatiska uttryck: Hus och hem
    [
        'title' => 'Idiomatiska uttryck: Wonen',
        'description' => 'Mer uttryck om boende',
        'theme' => 'Idiom',
        'exercises' => [
            [
                'type' => 'explanation',
                'question' => 'Idiomatiskt uttryck: "Een dak boven je hoofd hebben"',
                'data' => [
                    'explanation' => 'Bokstavligen: "Ha ett tak över huvudet". Detta betyder att ha någonstans att bo, ha en bostad.',
                    'example' => 'Iedereen verdient een dak boven zijn hoofd.',
                    'question' => 'Vad betyder detta uttryck?',
                    'options' => ['Att ha en hatt', 'Att ha en bostad', 'Att arbeta på ett tak', 'Att vara utomhus'],
                    'correct' => 1
                ]
            ],
            [
                'type' => 'explanation',
                'question' => 'Idiomatiskt uttryck: "Ergens zijn draai vinden"',
                'data' => [
                    'explanation' => 'Bokstavligen: "Hitta sin vändning någonstans". Detta betyder att anpassa sig, känna sig hemma på en ny plats eller i en ny situation.',
                    'example' => 'Na een paar maanden heeft hij zijn draai gevonden in Amsterdam.',
                    'question' => 'Vad betyder "zijn draai vinden"?',
                    'options' => ['Att hitta något', 'Att anpassa sig/känna sig hemma', 'Att dansa', 'Att bli yr'],
                    'correct' => 1
                ]
            ],
            [
                'type' => 'multiple_choice',
                'question' => 'Als je "je thuis voelt", wat betekent dat?',
                'data' => [
                    'options' => ['Je bent ziek', 'Je känner dig hemma', 'Je bent alleen', 'Je werkt thuis'],
                    'correct' => 1
                ]
            ],
            [
                'type' => 'translation',
                'question' => 'Översätt: "Jag känner mig hemma här" (använd "thuis")',
                'data' => [
                    'correct' => 'ik voel me hier thuis|ik voel mij hier thuis'
                ]
            ],
            [
                'type' => 'fill_blank',
                'question' => 'Fyll i: "Iedereen verdient een ___ boven zijn hoofd."',
                'data' => [
                    'sentence' => 'Iedereen verdient een ___ boven zijn hoofd.',
                    'correct' => 'dak'
                ]
            ]
        ]
    ],

    // Lesson 51 - På apoteket
    [
        'title' => 'In de apotheek',
        'description' => 'Köpa medicin',
        'theme' => 'Praktisk',
        'exercises' => [
            [
                'type' => 'multiple_choice',
                'question' => 'Wat is een "recept" in deze context?',
                'data' => [
                    'options' => ['Een kookrecept', 'Ett läkarrecept', 'Een briefje', 'Een factuur'],
                    'correct' => 1
                ]
            ],
            [
                'type' => 'translation',
                'question' => 'Översätt: "Har du något mot huvudvärk?"',
                'data' => [
                    'correct' => 'heeft u iets tegen hoofdpijn|heb je iets tegen hoofdpijn'
                ]
            ],
            [
                'type' => 'fill_blank',
                'question' => 'Fyll i: "Ik heb een ___ van de dokter." (recept)',
                'data' => [
                    'sentence' => 'Ik heb een ___ van de dokter.',
                    'correct' => 'recept'
                ]
            ],
            [
                'type' => 'word_order',
                'question' => 'Ordna orden: "Hoe vaak moet ik dit innemen"',
                'data' => [
                    'words' => ['Hoe', 'vaak', 'moet', 'ik', 'dit', 'innemen'],
                    'correct' => 'Hoe vaak moet ik dit innemen'
                ]
            ],
            [
                'type' => 'multiple_choice',
                'question' => 'Wat betekent "bijwerkingen"?',
                'data' => [
                    'options' => ['Pris', 'Biverkningar', 'Ingredienser', 'Instruktioner'],
                    'correct' => 1
                ]
            ]
        ]
    ],

    // Lesson 52 - Imperfekt (dåtid)
    [
        'title' => 'Onvoltooid verleden tijd',
        'description' => 'Imperfekt (gjorde)',
        'theme' => 'Grammatik',
        'exercises' => [
            [
                'type' => 'multiple_choice',
                'question' => 'Hoe maak je de onvoltooid verleden tijd van zwakke werkwoorden?',
                'data' => [
                    'options' => ['Stam + -de/-te', 'Stam + -en', 'ge- + stam + -t/-d', 'Stam + -ing'],
                    'correct' => 0
                ]
            ],
            [
                'type' => 'translation',
                'question' => 'Översätt: "Jag arbetade igår"',
                'data' => [
                    'correct' => 'ik werkte gisteren|gisteren werkte ik'
                ]
            ],
            [
                'type' => 'fill_blank',
                'question' => 'Fyll i: "Wij ___ vorig jaar in Amsterdam." (bodde)',
                'data' => [
                    'sentence' => 'Wij ___ vorig jaar in Amsterdam.',
                    'correct' => 'woonden'
                ]
            ],
            [
                'type' => 'word_order',
                'question' => 'Ordna orden: "Gisteren maakte ik het huiswerk"',
                'data' => [
                    'words' => ['Gisteren', 'maakte', 'ik', 'het', 'huiswerk'],
                    'correct' => 'Gisteren maakte ik het huiswerk'
                ]
            ],
            [
                'type' => 'multiple_choice',
                'question' => 'Welk werkwoord is sterk (onregelmatig)?',
                'data' => [
                    'options' => ['werken - werkte', 'lopen - liep', 'maken - maakte', 'spelen - speelde'],
                    'correct' => 1
                ]
            ]
        ]
    ],

    // Lesson 53 - Idiomatiska uttryck: Mat och dryck
    [
        'title' => 'Idiomatiska uttryck: Eten en drinken',
        'description' => 'Mer uttryck om mat',
        'theme' => 'Idiom',
        'exercises' => [
            [
                'type' => 'explanation',
                'question' => 'Idiomatiskt uttryck: "Voor de bakker werken"',
                'data' => [
                    'explanation' => 'Bokstavligen: "Arbeta för bagaren". Detta betyder att arbeta gratis, få ingenting för sitt arbete.',
                    'example' => 'Ik werk niet voor de bakker hoor!',
                    'question' => 'Vad betyder "voor de bakker werken"?',
                    'options' => ['Att arbeta i ett bageri', 'Att arbeta gratis', 'Att baka bröd', 'Att äta mycket'],
                    'correct' => 1
                ]
            ],
            [
                'type' => 'explanation',
                'question' => 'Idiomatiskt uttryck: "Mosterd na de maaltijd"',
                'data' => [
                    'explanation' => 'Bokstavligen: "Senap efter måltiden". Detta betyder att något kommer för sent, att det inte längre är till nytta. Som "skicka kråkorna efter skjutna råkor".',
                    'example' => 'Je excuses zijn mosterd na de maaltijd.',
                    'question' => 'När använder man detta uttryck?',
                    'options' => ['När man äter', 'När något kommer för sent', 'När man lagar mat', 'När man är hungrig'],
                    'correct' => 1
                ]
            ],
            [
                'type' => 'multiple_choice',
                'question' => 'Als iemand "zijn brood verdient", wat doet hij?',
                'data' => [
                    'options' => ['Hij bakt brood', 'Hij försörjer sig', 'Hij eet brood', 'Hij koopt brood'],
                    'correct' => 1
                ]
            ],
            [
                'type' => 'translation',
                'question' => 'Översätt: "Det kommer för sent" (använd "mosterd")',
                'data' => [
                    'correct' => 'dat is mosterd na de maaltijd|het is mosterd na de maaltijd'
                ]
            ],
            [
                'type' => 'fill_blank',
                'question' => 'Fyll i: "Ik werk niet voor de ___!"',
                'data' => [
                    'sentence' => 'Ik werk niet voor de ___!',
                    'correct' => 'bakker'
                ]
            ]
        ]
    ],

    // Lesson 54 - Boka hotell
    [
        'title' => 'Een hotel boeken',
        'description' => 'Boka och checka in',
        'theme' => 'Praktisk',
        'exercises' => [
            [
                'type' => 'multiple_choice',
                'question' => 'Wat is een "tweepersoonskamer"?',
                'data' => [
                    'options' => ['Ett enkelrum', 'Ett dubbelrum', 'En svit', 'Ett rum med frukost'],
                    'correct' => 1
                ]
            ],
            [
                'type' => 'translation',
                'question' => 'Översätt: "Jag har bokat ett rum"',
                'data' => [
                    'correct' => 'ik heb een kamer geboekt|ik heb een kamer gereserveerd'
                ]
            ],
            [
                'type' => 'fill_blank',
                'question' => 'Fyll i: "Is het ___ inbegrepen?" (frukost)',
                'data' => [
                    'sentence' => 'Is het ___ inbegrepen?',
                    'correct' => 'ontbijt'
                ]
            ],
            [
                'type' => 'word_order',
                'question' => 'Ordna orden: "Hoe laat moet ik uitchecken"',
                'data' => [
                    'words' => ['Hoe', 'laat', 'moet', 'ik', 'uitchecken'],
                    'correct' => 'Hoe laat moet ik uitchecken'
                ]
            ],
            [
                'type' => 'multiple_choice',
                'question' => 'Wat betekent "volpension"?',
                'data' => [
                    'options' => ['Alleen ontbijt', 'Alleen kamer', 'Helpension', 'Helpension'],
                    'correct' => 3
                ]
            ]
        ]
    ],

    // Lesson 55 - Komparativ och superlativ
    [
        'title' => 'Vergrotende en overtreffende trap',
        'description' => 'Komparation av adjektiv',
        'theme' => 'Grammatik',
        'exercises' => [
            [
                'type' => 'multiple_choice',
                'question' => 'Hoe maak je de vergrotende trap?',
                'data' => [
                    'options' => ['Adjektiv + -er', 'meer + adjektiv', 'Både -er och meer är rätt', 'Adjektiv + -st'],
                    'correct' => 2
                ]
            ],
            [
                'type' => 'translation',
                'question' => 'Översätt: "Detta hus är större"',
                'data' => [
                    'correct' => 'dit huis is groter|deze huis is groter'
                ]
            ],
            [
                'type' => 'fill_blank',
                'question' => 'Fyll i: "Zij is de ___ van de klas." (smartast)',
                'data' => [
                    'sentence' => 'Zij is de ___ van de klas.',
                    'correct' => 'slimste'
                ]
            ],
            [
                'type' => 'word_order',
                'question' => 'Ordna orden: "Dit is het mooiste huis"',
                'data' => [
                    'words' => ['Dit', 'is', 'het', 'mooiste', 'huis'],
                    'correct' => 'Dit is het mooiste huis'
                ]
            ],
            [
                'type' => 'multiple_choice',
                'question' => 'Welk woord is onregelmatig?',
                'data' => [
                    'options' => ['mooi - mooier - mooist', 'goed - beter - best', 'groot - groter - grootst', 'klein - kleiner - kleinst'],
                    'correct' => 1
                ]
            ]
        ]
    ],

    // Lesson 56 - Idiomatiska uttryck: Kropp och hälsa
    [
        'title' => 'Idiomatiska uttryck: Lichaam',
        'description' => 'Mer uttryck om kroppen',
        'theme' => 'Idiom',
        'exercises' => [
            [
                'type' => 'explanation',
                'question' => 'Idiomatiskt uttryck: "Iets achter de oren hebben"',
                'data' => [
                    'explanation' => 'Bokstavligen: "Ha något bakom öronen". Detta betyder att vara smart, erfaren eller slug.',
                    'example' => 'Onderschat hem niet, hij heeft het achter de oren.',
                    'question' => 'Vad betyder "iets achter de oren hebben"?',
                    'options' => ['Att vara dum', 'Att vara smart/erfaren', 'Att ha smutsiga öron', 'Att lyssna'],
                    'correct' => 1
                ]
            ],
            [
                'type' => 'explanation',
                'question' => 'Idiomatiskt uttryck: "Op je tenen lopen"',
                'data' => [
                    'explanation' => 'Bokstavligen: "Gå på tå". Detta betyder att vara försiktig, vara rädd för att göra någon arg eller stöta sig med någon.',
                    'example' => 'Bij die baas moet je op je tenen lopen.',
                    'question' => 'Vad betyder "op je tenen lopen"?',
                    'options' => ['Att dansa', 'Att vara försiktig/passa sig', 'Att springa', 'Att vara tyst'],
                    'correct' => 1
                ]
            ],
            [
                'type' => 'multiple_choice',
                'question' => 'Als je "over je nek gaat", wat gebeurt er?',
                'data' => [
                    'options' => ['Je valt', 'Je kräks', 'Je buigt', 'Je danst'],
                    'correct' => 1
                ]
            ],
            [
                'type' => 'translation',
                'question' => 'Översätt: "Han är smart" (använd "oren")',
                'data' => [
                    'correct' => 'hij heeft het achter de oren|hij heeft het wel achter de oren'
                ]
            ],
            [
                'type' => 'fill_blank',
                'question' => 'Fyll i: "Bij hem moet je op je ___ lopen."',
                'data' => [
                    'sentence' => 'Bij hem moet je op je ___ lopen.',
                    'correct' => 'tenen'
                ]
            ]
        ]
    ],

    // Lesson 57 - På restaurang (avancerat)
    [
        'title' => 'In het restaurant (gevorderd)',
        'description' => 'Beställa och betala',
        'theme' => 'Praktisk',
        'exercises' => [
            [
                'type' => 'multiple_choice',
                'question' => 'Wat vraag je als je de rekening wilt?',
                'data' => [
                    'options' => ['De kaart alstublieft', 'De rekening alstublieft', 'De reservering alstublieft', 'Het menu alstublieft'],
                    'correct' => 1
                ]
            ],
            [
                'type' => 'translation',
                'question' => 'Översätt: "Smaklig måltid!"',
                'data' => [
                    'correct' => 'eetsmakelijk|smakelijk eten'
                ]
            ],
            [
                'type' => 'fill_blank',
                'question' => 'Fyll i: "Is de ___ inbegrepen?" (dricks)',
                'data' => [
                    'sentence' => 'Is de ___ inbegrepen?',
                    'correct' => 'fooi|tip'
                ]
            ],
            [
                'type' => 'word_order',
                'question' => 'Ordna orden: "Mag ik de wijnkaart zien"',
                'data' => [
                    'words' => ['Mag', 'ik', 'de', 'wijnkaart', 'zien'],
                    'correct' => 'Mag ik de wijnkaart zien'
                ]
            ],
            [
                'type' => 'multiple_choice',
                'question' => 'Wat is "nagerecht"?',
                'data' => [
                    'options' => ['Förrätt', 'Huvudrätt', 'Efterrätt', 'Dryck'],
                    'correct' => 2
                ]
            ]
        ]
    ],

    // Lesson 58 - Passiv form
    [
        'title' => 'Lijdende vorm',
        'description' => 'Passiv (blir gjord)',
        'theme' => 'Grammatik',
        'exercises' => [
            [
                'type' => 'multiple_choice',
                'question' => 'Hoe maak je de passief?',
                'data' => [
                    'options' => ['worden + voltooid deelwoord', 'zijn + voltooid deelwoord', 'hebben + infinitief', 'zullen + infinitief'],
                    'correct' => 0
                ]
            ],
            [
                'type' => 'translation',
                'question' => 'Översätt: "Huset byggs" (presens)',
                'data' => [
                    'correct' => 'het huis wordt gebouwd'
                ]
            ],
            [
                'type' => 'fill_blank',
                'question' => 'Fyll i: "De auto ___ gerepareerd." (blir)',
                'data' => [
                    'sentence' => 'De auto ___ gerepareerd.',
                    'correct' => 'wordt'
                ]
            ],
            [
                'type' => 'word_order',
                'question' => 'Ordna orden: "Het boek werd geschreven in 1990"',
                'data' => [
                    'words' => ['Het', 'boek', 'werd', 'geschreven', 'in', '1990'],
                    'correct' => 'Het boek werd geschreven in 1990'
                ]
            ],
            [
                'type' => 'multiple_choice',
                'question' => 'Wat is het verschil tussen "worden" en "zijn" in passief?',
                'data' => [
                    'options' => ['Geen verschil', 'worden = process, zijn = tillstånd', 'worden = dåtid, zijn = nutid', 'worden = aktiv, zijn = passiv'],
                    'correct' => 1
                ]
            ]
        ]
    ],

    // Lesson 59 - Idiomatiska uttryck: Samtal och kommunikation
    [
        'title' => 'Idiomatiska uttryck: Praten',
        'description' => 'Uttryck om att prata',
        'theme' => 'Idiom',
        'exercises' => [
            [
                'type' => 'explanation',
                'question' => 'Idiomatiskt uttryck: "Ergens omheen draaien"',
                'data' => [
                    'explanation' => 'Bokstavligen: "Vandra runt något". Detta betyder att inte komma till saken, prata runt omkring något utan att säga vad man menar.',
                    'example' => 'Draai er niet omheen, zeg gewoon wat je bedoelt!',
                    'question' => 'Vad betyder "ergens omheen draaien"?',
                    'options' => ['Att dansa', 'Att inte komma till saken', 'Att gå vilse', 'Att springa runt'],
                    'correct' => 1
                ]
            ],
            [
                'type' => 'explanation',
                'question' => 'Idiomatiskt uttryck: "Iemand de mond snoeren"',
                'data' => [
                    'explanation' => 'Bokstavligen: "Snöra munnen på någon". Detta betyder att tysta någon, stoppa någon från att prata.',
                    'example' => 'Hij probeerde haar de mond te snoeren.',
                    'question' => 'Vad betyder detta uttryck?',
                    'options' => ['Att prata med någon', 'Att tysta någon', 'Att kyssa någon', 'Att äta'],
                    'correct' => 1
                ]
            ],
            [
                'type' => 'multiple_choice',
                'question' => 'Als je "een woordje meepraat", wat doe je?',
                'data' => [
                    'options' => ['Je zwijgt', 'Je har något att säga till om', 'Je luistert', 'Je praat veel'],
                    'correct' => 1
                ]
            ],
            [
                'type' => 'translation',
                'question' => 'Översätt: "Kom till saken!" (använd "omheen")',
                'data' => [
                    'correct' => 'draai er niet omheen|kom ter zake'
                ]
            ],
            [
                'type' => 'fill_blank',
                'question' => 'Fyll i: "Ik wil ook een woordje ___."',
                'data' => [
                    'sentence' => 'Ik wil ook een woordje ___.',
                    'correct' => 'meepraten'
                ]
            ]
        ]
    ],

    // Lesson 60 - Sammanfattning och repetition
    [
        'title' => 'Grote herhaling',
        'description' => 'Repetition av allt',
        'theme' => 'Sammansättning',
        'exercises' => [
            [
                'type' => 'multiple_choice',
                'question' => 'Welke tijd gebruik je voor "Ik heb gegeten"?',
                'data' => [
                    'options' => ['Onvoltooid tegenwoordige tijd', 'Voltooid tegenwoordige tijd', 'Onvoltooid verleden tijd', 'Toekomende tijd'],
                    'correct' => 1
                ]
            ],
            [
                'type' => 'translation',
                'question' => 'Översätt: "Boken blev skriven 1990"',
                'data' => [
                    'correct' => 'het boek werd geschreven in 1990|het boek is geschreven in 1990'
                ]
            ],
            [
                'type' => 'multiple_choice',
                'question' => 'Wat betekent "in de wolken zijn"?',
                'data' => [
                    'options' => ['Att flyga', 'Att vara överlycklig', 'Att drömma', 'Att vara förvirrad'],
                    'correct' => 1
                ]
            ],
            [
                'type' => 'fill_blank',
                'question' => 'Fyll i: "Dit is het ___ huis van de stad." (vackrast)',
                'data' => [
                    'sentence' => 'Dit is het ___ huis van de stad.',
                    'correct' => 'mooiste'
                ]
            ],
            [
                'type' => 'word_order',
                'question' => 'Ordna orden: "Ik weet dat hij morgen komt"',
                'data' => [
                    'words' => ['Ik', 'weet', 'dat', 'hij', 'morgen', 'komt'],
                    'correct' => 'Ik weet dat hij morgen komt'
                ]
            ]
        ]
    ]
];

// Insert all lessons
$lesson_number = 46; // Start from lesson 46
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

echo "\n🎉 Alla 15 nya lektioner (46-60) har lagts till!\n";
echo "Totalt: 60 lektioner med 300 övningar.\n";
echo "Nya teman: Natur, mat, kropp, kommunikation, boende\n";
echo "Grammatik: Perfekt, imperfekt, komparation, passiv\n";
echo "Praktiskt: Polis, apotek, kläder, hotell, restaurang\n";
?>
