<?php
require_once 'config.php';

$db = getLanguageDB();

// Get the Esperanto language ID
$stmt = $db->query("SELECT id FROM languages WHERE code = 'eo'");
$language = $stmt->fetch(PDO::FETCH_ASSOC);
$language_id = $language['id'];

// Esperanto A2-B1 lessons (36-55) - Moving towards B1 level
$lessons = [
    // Lesson 36 - Conditional mood
    [
        'title' => 'Kondicionalo',
        'description' => 'Konditionalis (-us)',
        'theme' => 'Grammatik',
        'exercises' => [
            [
                'type' => 'explanation',
                'question' => 'Konditionalis i Esperanto',
                'data' => [
                    'explanation' => 'Konditionalis uttrycker önskan, hypotetiska situationer eller artighet. Bildas med ändelsen -us. Exempel: mi estus (jag skulle vara), vi venus (du skulle komma).',
                    'example' => 'Se mi havus monon, mi aĉetus aŭton (Om jag hade pengar skulle jag köpa en bil)',
                    'question' => 'Hur säger man "Jag skulle gå"?',
                    'options' => ['mi iras', 'mi iris', 'mi iros', 'mi irus'],
                    'correct' => 3
                ]
            ],
            [
                'type' => 'translation',
                'question' => 'Översätt: "Skulle du vilja kaffe?"',
                'data' => [
                    'correct' => 'ĉu vi ŝatus kafon|ĉu vi volus kafon'
                ]
            ],
            [
                'type' => 'fill_blank',
                'question' => 'Fyll i: "Mi ___ helpi vin" (skulle vilja)',
                'data' => [
                    'sentence' => 'Mi ___ helpi vin.',
                    'correct' => 'ŝatus|volus'
                ]
            ],
            [
                'type' => 'word_order',
                'question' => 'Ordna orden: "Det skulle vara trevligt"',
                'data' => [
                    'words' => ['Tio', 'estus', 'agrabla'],
                    'correct' => 'Tio estus agrabla'
                ]
            ],
            [
                'type' => 'translation',
                'question' => 'Översätt: "Jag skulle köpa det"',
                'data' => [
                    'correct' => 'mi aĉetus tion|mi aĉetus ĝin'
                ]
            ]
        ]
    ],

    // Lesson 37 - Traveling by train/bus
    [
        'title' => 'Vojaĝado per trajno kaj buso',
        'description' => 'Resa med tåg och buss',
        'theme' => 'Resande',
        'exercises' => [
            [
                'type' => 'multiple_choice',
                'question' => 'Vad betyder "haltejo"?',
                'data' => [
                    'options' => ['Station', 'Hållplats', 'Perrong', 'Tidtabell'],
                    'correct' => 1
                ]
            ],
            [
                'type' => 'translation',
                'question' => 'Översätt: "När avgår nästa tåg?"',
                'data' => [
                    'correct' => 'kiam foriras la venonta trajno|kiam iras la sekva trajno'
                ]
            ],
            [
                'type' => 'fill_blank',
                'question' => 'Fyll i: "Mi bezonas ___ al Parizo" (biljett)',
                'data' => [
                    'sentence' => 'Mi bezonas ___ al Parizo.',
                    'correct' => 'bileton'
                ]
            ],
            [
                'type' => 'word_order',
                'question' => 'Ordna orden: "Tåget är försenat"',
                'data' => [
                    'words' => ['La', 'trajno', 'estas', 'malfrua'],
                    'correct' => 'La trajno estas malfrua'
                ]
            ],
            [
                'type' => 'multiple_choice',
                'question' => 'Hur säger man "tidtabell"?',
                'data' => [
                    'options' => ['horaro', 'bileto', 'perono', 'vojo'],
                    'correct' => 0
                ]
            ]
        ]
    ],

    // Lesson 38 - Participles (present)
    [
        'title' => 'Participoj (nuna)',
        'description' => 'Particip (presens)',
        'theme' => 'Grammatik',
        'exercises' => [
            [
                'type' => 'explanation',
                'question' => 'Presensparticip i Esperanto',
                'data' => [
                    'explanation' => 'Presensparticip beskriver pågående handling. Aktiv: -anta (som gör), Passiv: -ata (som blir gjord). Exempel: leganta (läsande), legata (som läses).',
                    'example' => 'La kantanta birdo (Den sjungande fågeln). La legata libro (Boken som läses).',
                    'question' => 'Vad betyder "la kuranta hundo"?',
                    'options' => ['Den springande hunden', 'Hunden sprang', 'Hunden kommer springa', 'Den sprungna hunden'],
                    'correct' => 0
                ]
            ],
            [
                'type' => 'translation',
                'question' => 'Översätt: "Den sovande katten"',
                'data' => [
                    'correct' => 'la dormanta kato'
                ]
            ],
            [
                'type' => 'fill_blank',
                'question' => 'Fyll i: "La ___ infano" (gråtande)',
                'data' => [
                    'sentence' => 'La ___ infano.',
                    'correct' => 'ploranta'
                ]
            ],
            [
                'type' => 'multiple_choice',
                'question' => 'Vad betyder "skribata"?',
                'data' => [
                    'options' => ['Skrivande', 'Som skrivs/blir skriven', 'Skriven', 'Har skrivit'],
                    'correct' => 1
                ]
            ],
            [
                'type' => 'translation',
                'question' => 'Översätt: "Den arbetande mannen"',
                'data' => [
                    'correct' => 'la laboranta viro'
                ]
            ]
        ]
    ],

    // Lesson 39 - At the doctor
    [
        'title' => 'Ĉe la kuracisto',
        'description' => 'Hos doktorn',
        'theme' => 'Hälsa',
        'exercises' => [
            [
                'type' => 'multiple_choice',
                'question' => 'Vad betyder "malsano"?',
                'data' => [
                    'options' => ['Sjukdom', 'Medicin', 'Undersökning', 'Smärta'],
                    'correct' => 0
                ]
            ],
            [
                'type' => 'translation',
                'question' => 'Översätt: "Jag har feber"',
                'data' => [
                    'correct' => 'mi havas febron'
                ]
            ],
            [
                'type' => 'fill_blank',
                'question' => 'Fyll i: "Mi bezonas ___" (recept)',
                'data' => [
                    'sentence' => 'Mi bezonas ___.',
                    'correct' => 'recepton'
                ]
            ],
            [
                'type' => 'word_order',
                'question' => 'Ordna orden: "Jag mår inte bra"',
                'data' => [
                    'words' => ['Mi', 'ne', 'fartas', 'bone'],
                    'correct' => 'Mi ne fartas bone'
                ]
            ],
            [
                'type' => 'multiple_choice',
                'question' => 'Hur säger man "hosta"?',
                'data' => [
                    'options' => ['tusi', 'febri', 'dolori', 'malsani'],
                    'correct' => 0
                ]
            ]
        ]
    ],

    // Lesson 40 - Adverbs from adjectives
    [
        'title' => 'Adverboj el adjektivoj',
        'description' => 'Adverb från adjektiv',
        'theme' => 'Grammatik',
        'exercises' => [
            [
                'type' => 'explanation',
                'question' => 'Adverb i Esperanto',
                'data' => [
                    'explanation' => 'Adverb bildas genom att lägga till -e till en rot. Från adjektiv: rapida (snabb) → rapide (snabbt). Från substantiv: hejmo (hem) → hejme (hemma).',
                    'example' => 'Li kuras rapide (Han springer snabbt). Ŝi kantas bele (Hon sjunger vackert).',
                    'question' => 'Hur säger man "långsamt"?',
                    'options' => ['malrapida', 'malrapide', 'malrapidon', 'malrapidas'],
                    'correct' => 1
                ]
            ],
            [
                'type' => 'translation',
                'question' => 'Översätt: "Hon talar tyst"',
                'data' => [
                    'correct' => 'ŝi parolas silente|ŝi parolas kviete'
                ]
            ],
            [
                'type' => 'fill_blank',
                'question' => 'Fyll i: "Li laboras ___" (hårt/flitigt)',
                'data' => [
                    'sentence' => 'Li laboras ___.',
                    'correct' => 'diligente|multe'
                ]
            ],
            [
                'type' => 'multiple_choice',
                'question' => 'Vad betyder "bone"?',
                'data' => [
                    'options' => ['Bra (adjektiv)', 'Bra (adverb)/väl', 'Gott', 'Godhet'],
                    'correct' => 1
                ]
            ],
            [
                'type' => 'translation',
                'question' => 'Översätt: "Jag förstår lätt"',
                'data' => [
                    'correct' => 'mi komprenas facile'
                ]
            ]
        ]
    ],

    // Lesson 41 - Expressing opinions
    [
        'title' => 'Esprimi opiniojn',
        'description' => 'Uttrycka åsikter',
        'theme' => 'Kommunikation',
        'exercises' => [
            [
                'type' => 'multiple_choice',
                'question' => 'Vad betyder "laŭ mi"?',
                'data' => [
                    'options' => ['Enligt mig/Jag tycker', 'Med mig', 'För mig', 'Från mig'],
                    'correct' => 0
                ]
            ],
            [
                'type' => 'translation',
                'question' => 'Översätt: "Jag håller med"',
                'data' => [
                    'correct' => 'mi konsentas|mi akordas'
                ]
            ],
            [
                'type' => 'fill_blank',
                'question' => 'Fyll i: "Mi ___ ke tio estas bona ideo" (tycker)',
                'data' => [
                    'sentence' => 'Mi ___ ke tio estas bona ideo.',
                    'correct' => 'pensas|opinias|kredas'
                ]
            ],
            [
                'type' => 'word_order',
                'question' => 'Ordna orden: "Jag håller inte med"',
                'data' => [
                    'words' => ['Mi', 'ne', 'konsentas'],
                    'correct' => 'Mi ne konsentas'
                ]
            ],
            [
                'type' => 'multiple_choice',
                'question' => 'Hur säger man "Du har rätt"?',
                'data' => [
                    'options' => ['Vi pravas', 'Vi rajtas', 'Vi korektas', 'Vi veras'],
                    'correct' => 0
                ]
            ]
        ]
    ],

    // Lesson 42 - Housing and living
    [
        'title' => 'Loĝado',
        'description' => 'Boende',
        'theme' => 'Vardagsliv',
        'exercises' => [
            [
                'type' => 'multiple_choice',
                'question' => 'Vad betyder "luanto"?',
                'data' => [
                    'options' => ['Hyresvärd', 'Hyresgäst', 'Granne', 'Rumskamrat'],
                    'correct' => 1
                ]
            ],
            [
                'type' => 'translation',
                'question' => 'Översätt: "Jag letar efter en lägenhet"',
                'data' => [
                    'correct' => 'mi serĉas apartamenton|mi serĉas loĝejon'
                ]
            ],
            [
                'type' => 'fill_blank',
                'question' => 'Fyll i: "Kiom kostas la ___?" (hyran)',
                'data' => [
                    'sentence' => 'Kiom kostas la ___?',
                    'correct' => 'luo'
                ]
            ],
            [
                'type' => 'word_order',
                'question' => 'Ordna orden: "Lägenheten har två rum"',
                'data' => [
                    'words' => ['La', 'apartamento', 'havas', 'du', 'ĉambrojn'],
                    'correct' => 'La apartamento havas du ĉambrojn'
                ]
            ],
            [
                'type' => 'multiple_choice',
                'question' => 'Hur säger man "möblerad"?',
                'data' => [
                    'options' => ['meblita', 'mebligita', 'meblata', 'meblanta'],
                    'correct' => 0
                ]
            ]
        ]
    ],

    // Lesson 43 - Correlatives (part 1)
    [
        'title' => 'Tabelaj vortoj (parto 1)',
        'description' => 'Korrelativer (del 1)',
        'theme' => 'Grammatik',
        'exercises' => [
            [
                'type' => 'explanation',
                'question' => 'Korrelativer - Ki-serien',
                'data' => [
                    'explanation' => 'Esperanto har ett systematiskt korrelativsystem. Ki-serien: kio (vad), kiu (vem/vilken), kie (var), kiam (när), kiel (hur), kial (varför), kies (vems), kiom (hur mycket).',
                    'example' => 'Kio estas tio? (Vad är det?) Kiu venas? (Vem kommer?) Kie vi loĝas? (Var bor du?)',
                    'question' => 'Vad betyder "kies"?',
                    'options' => ['Vems', 'Vem', 'Var', 'När'],
                    'correct' => 0
                ]
            ],
            [
                'type' => 'translation',
                'question' => 'Översätt: "Vems bok är detta?"',
                'data' => [
                    'correct' => 'kies libro estas ĉi tio|kies libro tio estas'
                ]
            ],
            [
                'type' => 'fill_blank',
                'question' => 'Fyll i: "___ vi faris tion?" (Varför)',
                'data' => [
                    'sentence' => '___ vi faris tion?',
                    'correct' => 'kial'
                ]
            ],
            [
                'type' => 'multiple_choice',
                'question' => 'Vad betyder "kiom da mono"?',
                'data' => [
                    'options' => ['Vad är pengar', 'Vilka pengar', 'Hur mycket pengar', 'Vars pengar'],
                    'correct' => 2
                ]
            ],
            [
                'type' => 'translation',
                'question' => 'Översätt: "Vilken är din bil?"',
                'data' => [
                    'correct' => 'kiu estas via aŭto'
                ]
            ]
        ]
    ],

    // Lesson 44 - Correlatives (part 2)
    [
        'title' => 'Tabelaj vortoj (parto 2)',
        'description' => 'Korrelativer (del 2)',
        'theme' => 'Grammatik',
        'exercises' => [
            [
                'type' => 'explanation',
                'question' => 'Korrelativer - Ti/Ĉi-serien',
                'data' => [
                    'explanation' => 'Ti-serien (den där): tio (det där), tiu (den där), tie (där), tiam (då), tiel (så). Ĉi-serien (varje): ĉio (allt), ĉiu (alla/var och en), ĉie (överallt), ĉiam (alltid).',
                    'example' => 'Mi volas ĉion (Jag vill ha allt). Ĉiu scias tion (Alla vet det). Ĉiam mi pensas pri vi (Jag tänker alltid på dig).',
                    'question' => 'Vad betyder "ĉie"?',
                    'options' => ['Alltid', 'Alla', 'Överallt', 'Allt'],
                    'correct' => 2
                ]
            ],
            [
                'type' => 'translation',
                'question' => 'Översätt: "Jag ser dig överallt"',
                'data' => [
                    'correct' => 'mi vidas vin ĉie'
                ]
            ],
            [
                'type' => 'fill_blank',
                'question' => 'Fyll i: "___ estas mia amiko" (Var och en/Alla)',
                'data' => [
                    'sentence' => '___ estas mia amiko.',
                    'correct' => 'ĉiu'
                ]
            ],
            [
                'type' => 'multiple_choice',
                'question' => 'Vad betyder "nenio"?',
                'data' => [
                    'options' => ['Inget', 'Något', 'Allt', 'Ingenting'],
                    'correct' => 3
                ]
            ],
            [
                'type' => 'translation',
                'question' => 'Översätt: "Något är bättre än ingenting"',
                'data' => [
                    'correct' => 'io estas pli bona ol nenio'
                ]
            ]
        ]
    ],

    // Lesson 45 - Making plans
    [
        'title' => 'Fari planojn',
        'description' => 'Göra planer',
        'theme' => 'Kommunikation',
        'exercises' => [
            [
                'type' => 'multiple_choice',
                'question' => 'Vad betyder "intenci"?',
                'data' => [
                    'options' => ['Att planera', 'Att ämna/avse', 'Att vilja', 'Att hoppas'],
                    'correct' => 1
                ]
            ],
            [
                'type' => 'translation',
                'question' => 'Översätt: "Ska vi träffas imorgon?"',
                'data' => [
                    'correct' => 'ĉu ni renkontiĝos morgaŭ|ĉu ni renkontiĝu morgaŭ'
                ]
            ],
            [
                'type' => 'fill_blank',
                'question' => 'Fyll i: "Mi ___ veturi al Parizo" (planerar)',
                'data' => [
                    'sentence' => 'Mi ___ veturi al Parizo.',
                    'correct' => 'planas|intencas'
                ]
            ],
            [
                'type' => 'word_order',
                'question' => 'Ordna orden: "Vad ska vi göra ikväll?"',
                'data' => [
                    'words' => ['Kion', 'ni', 'faros', 'ĉi-vespere'],
                    'correct' => 'Kion ni faros ĉi-vespere'
                ]
            ],
            [
                'type' => 'translation',
                'question' => 'Översätt: "Jag hoppas vi ses snart"',
                'data' => [
                    'correct' => 'mi esperas ke ni baldaŭ vidos nin|mi esperas nin baldaŭ vidi'
                ]
            ]
        ]
    ],

    // Lesson 46 - Past participles
    [
        'title' => 'Participoj (pasinta)',
        'description' => 'Particip (perfekt)',
        'theme' => 'Grammatik',
        'exercises' => [
            [
                'type' => 'explanation',
                'question' => 'Perfektparticip i Esperanto',
                'data' => [
                    'explanation' => 'Perfektparticip beskriver avslutat tillstånd. Aktiv: -inta (som gjort), Passiv: -ita (som blivit gjord). Exempel: manĝinta (som ätit), manĝita (uppäten).',
                    'example' => 'La falinta folio (Det fallna bladet). La skribita letero (Det skrivna brevet).',
                    'question' => 'Vad betyder "la rompita fenestro"?',
                    'options' => ['Det brytande fönstret', 'Fönstret som bryts', 'Det trasiga/sönderslagna fönstret', 'Fönstret ska brytas'],
                    'correct' => 2
                ]
            ],
            [
                'type' => 'translation',
                'question' => 'Översätt: "Den förlorade nyckeln"',
                'data' => [
                    'correct' => 'la perdita ŝlosilo'
                ]
            ],
            [
                'type' => 'fill_blank',
                'question' => 'Fyll i: "La ___ libro" (läst/uppläst)',
                'data' => [
                    'sentence' => 'La ___ libro.',
                    'correct' => 'legita'
                ]
            ],
            [
                'type' => 'multiple_choice',
                'question' => 'Vad betyder "veninta"?',
                'data' => [
                    'options' => ['Kommande', 'Som kommer', 'Som har kommit', 'Ska komma'],
                    'correct' => 2
                ]
            ],
            [
                'type' => 'translation',
                'question' => 'Översätt: "Den stängda dörren"',
                'data' => [
                    'correct' => 'la fermita pordo'
                ]
            ]
        ]
    ],

    // Lesson 47 - Education
    [
        'title' => 'Edukado',
        'description' => 'Utbildning',
        'theme' => 'Samhälle',
        'exercises' => [
            [
                'type' => 'multiple_choice',
                'question' => 'Vad betyder "lernejo"?',
                'data' => [
                    'options' => ['Universitet', 'Skola', 'Bibliotek', 'Klass'],
                    'correct' => 1
                ]
            ],
            [
                'type' => 'translation',
                'question' => 'Översätt: "Jag studerar historia"',
                'data' => [
                    'correct' => 'mi studas historion'
                ]
            ],
            [
                'type' => 'fill_blank',
                'question' => 'Fyll i: "Mi havas ___ morgaŭ" (prov)',
                'data' => [
                    'sentence' => 'Mi havas ___ morgaŭ.',
                    'correct' => 'ekzamenon'
                ]
            ],
            [
                'type' => 'word_order',
                'question' => 'Ordna orden: "Hon går på universitetet"',
                'data' => [
                    'words' => ['Ŝi', 'studas', 'en', 'universitato'],
                    'correct' => 'Ŝi studas en universitato'
                ]
            ],
            [
                'type' => 'multiple_choice',
                'question' => 'Hur säger man "examen/tentamen"?',
                'data' => [
                    'options' => ['ekzameno', 'diplomo', 'leciono', 'kurso'],
                    'correct' => 0
                ]
            ]
        ]
    ],

    // Lesson 48 - Imperative and commands
    [
        'title' => 'Imperativo kaj ordoj',
        'description' => 'Imperativ och kommandon',
        'theme' => 'Grammatik',
        'exercises' => [
            [
                'type' => 'explanation',
                'question' => 'Imperativ i Esperanto',
                'data' => [
                    'explanation' => 'Imperativ (uppmaning) bildas med ändelsen -u. Exempel: Iru! (Gå!), Manĝu! (Ät!), Venu! (Kom!). Kan användas med "ni" för "låt oss": Ni iru (Låt oss gå).',
                    'example' => 'Helpu min! (Hjälp mig!) Ni kantu kune! (Låt oss sjunga tillsammans!)',
                    'question' => 'Hur säger man "Läs!"?',
                    'options' => ['Legi', 'Legas', 'Legis', 'Legu'],
                    'correct' => 3
                ]
            ],
            [
                'type' => 'translation',
                'question' => 'Översätt: "Kom hit!"',
                'data' => [
                    'correct' => 'venu ĉi tien|venu ĉi tie'
                ]
            ],
            [
                'type' => 'fill_blank',
                'question' => 'Fyll i: "___ silenta!" (Var)',
                'data' => [
                    'sentence' => '___ silenta!',
                    'correct' => 'estu'
                ]
            ],
            [
                'type' => 'multiple_choice',
                'question' => 'Vad betyder "Ni iru hejmen"?',
                'data' => [
                    'options' => ['Vi går hem', 'Låt oss gå hem', 'Gå hem!', 'De går hem'],
                    'correct' => 1
                ]
            ],
            [
                'type' => 'translation',
                'question' => 'Översätt: "Sitt ner!"',
                'data' => [
                    'correct' => 'sidiĝu'
                ]
            ]
        ]
    ],

    // Lesson 49 - Environment
    [
        'title' => 'Medio',
        'description' => 'Miljö',
        'theme' => 'Samhälle',
        'exercises' => [
            [
                'type' => 'multiple_choice',
                'question' => 'Vad betyder "poluado"?',
                'data' => [
                    'options' => ['Föroreningar', 'Återvinning', 'Klimat', 'Natur'],
                    'correct' => 0
                ]
            ],
            [
                'type' => 'translation',
                'question' => 'Översätt: "Vi måste skydda naturen"',
                'data' => [
                    'correct' => 'ni devas protekti la naturon'
                ]
            ],
            [
                'type' => 'fill_blank',
                'question' => 'Fyll i: "Mi ___ rubon" (återvinner)',
                'data' => [
                    'sentence' => 'Mi ___ rubon.',
                    'correct' => 'recikligas'
                ]
            ],
            [
                'type' => 'word_order',
                'question' => 'Ordna orden: "Klimatförändring är ett problem"',
                'data' => [
                    'words' => ['Klimata', 'ŝanĝo', 'estas', 'problemo'],
                    'correct' => 'Klimata ŝanĝo estas problemo'
                ]
            ],
            [
                'type' => 'multiple_choice',
                'question' => 'Hur säger man "återvinning"?',
                'data' => [
                    'options' => ['recikligo', 'poluado', 'rubo', 'naturo'],
                    'correct' => 0
                ]
            ]
        ]
    ],

    // Lesson 50 - Cause and effect
    [
        'title' => 'Kaŭzo kaj efiko',
        'description' => 'Orsak och verkan',
        'theme' => 'Kommunikation',
        'exercises' => [
            [
                'type' => 'multiple_choice',
                'question' => 'Vad betyder "pro"?',
                'data' => [
                    'options' => ['För (till förmån)', 'På grund av/för', 'Från', 'Med'],
                    'correct' => 1
                ]
            ],
            [
                'type' => 'translation',
                'question' => 'Översätt: "Jag är trött på grund av arbetet"',
                'data' => [
                    'correct' => 'mi estas laca pro la laboro'
                ]
            ],
            [
                'type' => 'fill_blank',
                'question' => 'Fyll i: "Tio ___ problemojn" (orsakar)',
                'data' => [
                    'sentence' => 'Tio ___ problemojn.',
                    'correct' => 'kaŭzas'
                ]
            ],
            [
                'type' => 'word_order',
                'question' => 'Ordna orden: "Därför stannar jag hemma"',
                'data' => [
                    'words' => ['Tial', 'mi', 'restas', 'hejme'],
                    'correct' => 'Tial mi restas hejme'
                ]
            ],
            [
                'type' => 'multiple_choice',
                'question' => 'Vad betyder "sekve"?',
                'data' => [
                    'options' => ['Därför/följaktligen', 'Eftersom', 'Tvärtom', 'Dock'],
                    'correct' => 0
                ]
            ]
        ]
    ],

    // Lesson 51 - Relative pronouns
    [
        'title' => 'Rilataj pronomoj',
        'description' => 'Relativpronomen',
        'theme' => 'Grammatik',
        'exercises' => [
            [
                'type' => 'explanation',
                'question' => 'Relativpronomen i Esperanto',
                'data' => [
                    'explanation' => 'Kiu används som relativpronomen för personer och saker (som). Exempel: La viro, kiu venis (Mannen som kom). La libro, kiun mi legis (Boken som jag läste).',
                    'example' => 'La domo, en kiu mi loĝas, estas granda (Huset som jag bor i är stort)',
                    'question' => 'Vad betyder "La hundo, kiun mi vidis"?',
                    'options' => ['Hunden som såg mig', 'Hunden som jag såg', 'Hunden som ser', 'Hunden ser'],
                    'correct' => 1
                ]
            ],
            [
                'type' => 'translation',
                'question' => 'Översätt: "Kvinnan som jag träffade"',
                'data' => [
                    'correct' => 'la virino kiun mi renkontis'
                ]
            ],
            [
                'type' => 'fill_blank',
                'question' => 'Fyll i: "La libro, ___ estas sur la tablo" (som)',
                'data' => [
                    'sentence' => 'La libro, ___ estas sur la tablo.',
                    'correct' => 'kiu'
                ]
            ],
            [
                'type' => 'multiple_choice',
                'question' => 'När använder man "kiun" istället för "kiu"?',
                'data' => [
                    'options' => ['När det är subjekt', 'När det är objekt (ackusativ)', 'När det är plural', 'När det är fråga'],
                    'correct' => 1
                ]
            ],
            [
                'type' => 'translation',
                'question' => 'Översätt: "Staden där jag bor"',
                'data' => [
                    'correct' => 'la urbo en kiu mi loĝas|la urbo kie mi loĝas'
                ]
            ]
        ]
    ],

    // Lesson 52 - Culture and traditions
    [
        'title' => 'Kulturo kaj tradicioj',
        'description' => 'Kultur och traditioner',
        'theme' => 'Samhälle',
        'exercises' => [
            [
                'type' => 'multiple_choice',
                'question' => 'Vad betyder "kutimo"?',
                'data' => [
                    'options' => ['Kultur', 'Tradition/sed', 'Festival', 'Historia'],
                    'correct' => 1
                ]
            ],
            [
                'type' => 'translation',
                'question' => 'Översätt: "Varje land har sina traditioner"',
                'data' => [
                    'correct' => 'ĉiu lando havas siajn tradiciojn'
                ]
            ],
            [
                'type' => 'fill_blank',
                'question' => 'Fyll i: "Mi ŝatas ___ festojn" (lokala)',
                'data' => [
                    'sentence' => 'Mi ŝatas ___ festojn.',
                    'correct' => 'lokajn'
                ]
            ],
            [
                'type' => 'word_order',
                'question' => 'Ordna orden: "Vi måste respektera kulturen"',
                'data' => [
                    'words' => ['Vi', 'devas', 'respekti', 'la', 'kulturon'],
                    'correct' => 'Vi devas respekti la kulturon'
                ]
            ],
            [
                'type' => 'multiple_choice',
                'question' => 'Hur säger man "firande/fest"?',
                'data' => [
                    'options' => ['festado', 'festo', 'tago', 'kulturo'],
                    'correct' => 0
                ]
            ]
        ]
    ],

    // Lesson 53 - Reported speech
    [
        'title' => 'Referata parolo',
        'description' => 'Indirekt tal',
        'theme' => 'Grammatik',
        'exercises' => [
            [
                'type' => 'explanation',
                'question' => 'Indirekt tal i Esperanto',
                'data' => [
                    'explanation' => 'Vid indirekt tal används "ke" (att). Tiderna förändras inte som i många andra språk. Exempel: Li diris: "Mi venas" → Li diris, ke li venas.',
                    'example' => 'Ŝi diris, ke ŝi estas feliĉa (Hon sa att hon är lycklig)',
                    'question' => 'Hur säger man "Han sa att han är trött"?',
                    'options' => ['Li diris ke li laca', 'Li diris ke li estas laca', 'Li diris estas laca', 'Li diras ke li laca'],
                    'correct' => 1
                ]
            ],
            [
                'type' => 'translation',
                'question' => 'Översätt: "Hon sa att hon kommer imorgon"',
                'data' => [
                    'correct' => 'ŝi diris ke ŝi venos morgaŭ'
                ]
            ],
            [
                'type' => 'fill_blank',
                'question' => 'Fyll i: "Mi pensas ___ tio estas bona ideo" (att)',
                'data' => [
                    'sentence' => 'Mi pensas ___ tio estas bona ideo.',
                    'correct' => 'ke'
                ]
            ],
            [
                'type' => 'word_order',
                'question' => 'Ordna orden: "De frågade var jag bor"',
                'data' => [
                    'words' => ['Ili', 'demandis', 'kie', 'mi', 'loĝas'],
                    'correct' => 'Ili demandis kie mi loĝas'
                ]
            ],
            [
                'type' => 'translation',
                'question' => 'Översätt: "Jag tror att du har rätt"',
                'data' => [
                    'correct' => 'mi kredas ke vi pravas'
                ]
            ]
        ]
    ],

    // Lesson 54 - Problem solving
    [
        'title' => 'Problemsolvado',
        'description' => 'Problemlösning',
        'theme' => 'Kommunikation',
        'exercises' => [
            [
                'type' => 'multiple_choice',
                'question' => 'Vad betyder "solvi"?',
                'data' => [
                    'options' => ['Att lösa (problem)', 'Att skapa', 'Att förstå', 'Att fråga'],
                    'correct' => 0
                ]
            ],
            [
                'type' => 'translation',
                'question' => 'Översätt: "Kan du hjälpa mig med detta problem?"',
                'data' => [
                    'correct' => 'ĉu vi povas helpi min kun ĉi tiu problemo|ĉu vi povas helpi min pri tio ĉi problemo'
                ]
            ],
            [
                'type' => 'fill_blank',
                'question' => 'Fyll i: "Mi trovis ___" (lösning)',
                'data' => [
                    'sentence' => 'Mi trovis ___.',
                    'correct' => 'solvon'
                ]
            ],
            [
                'type' => 'word_order',
                'question' => 'Ordna orden: "Vad är problemet?"',
                'data' => [
                    'words' => ['Kio', 'estas', 'la', 'problemo'],
                    'correct' => 'Kio estas la problemo'
                ]
            ],
            [
                'type' => 'multiple_choice',
                'question' => 'Hur säger man "svårighet"?',
                'data' => [
                    'options' => ['malfacilo', 'facilo', 'problemo', 'demando'],
                    'correct' => 0
                ]
            ]
        ]
    ],

    // Lesson 55 - Review and comprehensive practice
    [
        'title' => 'Revizio kaj ampleksa praktiko',
        'description' => 'Repetition och omfattande övning',
        'theme' => 'Sammansättning',
        'exercises' => [
            [
                'type' => 'translation',
                'question' => 'Översätt: "Om jag vore rik skulle jag resa runt i världen"',
                'data' => [
                    'correct' => 'se mi estus riĉa mi vojaĝus tra la mondo'
                ]
            ],
            [
                'type' => 'multiple_choice',
                'question' => 'Vilket är rätt? "Den arbetande kvinnan som jag såg"',
                'data' => [
                    'options' => ['La laboranta virino, kiu mi vidis', 'La laboranta virino, kiun mi vidis', 'La laborinta virino, kiu mi vidis', 'La laboranta virino, kion mi vidis'],
                    'correct' => 1
                ]
            ],
            [
                'type' => 'fill_blank',
                'question' => 'Fyll i: "Mi ŝatus ___ pli bone Esperanton" (att kunna)',
                'data' => [
                    'sentence' => 'Mi ŝatus ___ pli bone Esperanton.',
                    'correct' => 'povi paroli|paroli'
                ]
            ],
            [
                'type' => 'word_order',
                'question' => 'Ordna orden: "Alla vet att det är sant"',
                'data' => [
                    'words' => ['Ĉiuj', 'scias', 'ke', 'tio', 'estas', 'vera'],
                    'correct' => 'Ĉiuj scias ke tio estas vera'
                ]
            ],
            [
                'type' => 'translation',
                'question' => 'Översätt: "Låt oss göra något intressant tillsammans!"',
                'data' => [
                    'correct' => 'ni faru ion interesan kune'
                ]
            ]
        ]
    ]
];

// Insert all lessons
$lesson_number = 36;
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

echo "\n🎉 20 pliaj Esperanto-lecionoj (36-55) aldonitaj!\n";
echo "Totalo nun: 55 lecionoj kun 275 ekzercoj por Esperanto (A2-B1 nivelo)\n";
echo "Novaj temoj: Kondicionalis, participoj, korrelativer, imperativ, relativpronomen, indirekt tal, resande, hälsa, utbildning, miljö, kultur, problemlösning\n";
?>
