<?php
require_once 'config.php';

// This script populates the database with Dutch B1 lessons

echo "Starting to populate lessons...\n\n";

$db = getLanguageDB();

// Get Dutch language ID
$stmt = $db->prepare("SELECT id FROM languages WHERE code = 'nl'");
$stmt->execute();
$language = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$language) {
    die("Dutch language not found in database. Please run setup.php first.\n");
}

$lang_id = $language['id'];

// Delete existing lessons for fresh start (optional)
$db->exec("DELETE FROM exercises WHERE lesson_id IN (SELECT id FROM lessons WHERE language_id = $lang_id)");
$db->exec("DELETE FROM lessons WHERE language_id = $lang_id");

// Lessons data - simplified matching exercises (we'll just check if clicked)
$lessons = [
    [
        'lesson_number' => 1,
        'title' => 'Op reis',
        'description' => 'Lär dig ord och fraser för att resa i Nederländerna',
        'theme' => 'Resor',
        'exercises' => [
            [
                'type' => 'multiple_choice',
                'question' => 'Wat betekent "Ik wil graag een kaartje naar Amsterdam"?',
                'data' => json_encode([
                    'options' => [
                        'Jag vill ha en biljett till Amsterdam',
                        'Jag vill ha en karta över Amsterdam',
                        'Jag vill gärna gå till Amsterdam',
                        'Jag gillar Amsterdam'
                    ],
                    'correct' => '0'
                ], JSON_UNESCAPED_UNICODE)
            ],
            [
                'type' => 'translation',
                'question' => 'Översätt till nederländska: "Var är tågstationen?"',
                'data' => json_encode([
                    'correct' => 'Waar is het station?|Waar is het treinstation?'
                ], JSON_UNESCAPED_UNICODE)
            ],
            [
                'type' => 'fill_blank',
                'question' => 'Fyll i det rätta ordet:',
                'data' => json_encode([
                    'sentence' => 'Hoe laat ___ de trein naar Utrecht?',
                    'correct' => 'vertrekt|gaat'
                ], JSON_UNESCAPED_UNICODE)
            ],
            [
                'type' => 'word_order',
                'question' => 'Ordna orden till en korrekt mening:',
                'data' => json_encode([
                    'words' => ['Ik', 'wil', 'graag', 'een', 'retourtje'],
                    'correct' => 'Ik wil graag een retourtje'
                ], JSON_UNESCAPED_UNICODE)
            ],
            [
                'type' => 'multiple_choice',
                'question' => 'Hur säger man "enkelresa" på nederländska?',
                'data' => json_encode([
                    'options' => ['een retourtje', 'een enkele reis', 'een dagkaart', 'een abonnement'],
                    'correct' => '1'
                ], JSON_UNESCAPED_UNICODE)
            ]
        ]
    ],
    [
        'lesson_number' => 2,
        'title' => 'In het restaurant',
        'description' => 'Beställ mat och dryck på nederländska',
        'theme' => 'Mat & Dryck',
        'exercises' => [
            [
                'type' => 'multiple_choice',
                'question' => 'Wat betekent "De rekening, alstublieft"?',
                'data' => json_encode([
                    'options' => ['Menyn tack', 'Notan tack', 'Maten tack', 'Vattnet tack'],
                    'correct' => '1'
                ], JSON_UNESCAPED_UNICODE)
            ],
            [
                'type' => 'translation',
                'question' => 'Översätt: "Jag skulle vilja beställa"',
                'data' => json_encode([
                    'correct' => 'Ik wil graag bestellen|Ik zou graag willen bestellen'
                ], JSON_UNESCAPED_UNICODE)
            ],
            [
                'type' => 'fill_blank',
                'question' => 'Fyll i det rätta ordet:',
                'data' => json_encode([
                    'sentence' => 'Mag ik de ___ zien?',
                    'correct' => 'menukaart|kaart|menu'
                ], JSON_UNESCAPED_UNICODE)
            ],
            [
                'type' => 'word_order',
                'question' => 'Ordna orden till en korrekt mening:',
                'data' => json_encode([
                    'words' => ['Ik', 'ben', 'allergisch', 'voor', 'noten'],
                    'correct' => 'Ik ben allergisch voor noten'
                ], JSON_UNESCAPED_UNICODE)
            ],
            [
                'type' => 'multiple_choice',
                'question' => 'Vad är "huvudrätt" på nederländska?',
                'data' => json_encode([
                    'options' => ['voorgerecht', 'hoofdgerecht', 'nagerecht', 'drankje'],
                    'correct' => '1'
                ], JSON_UNESCAPED_UNICODE)
            ]
        ]
    ],
    [
        'lesson_number' => 3,
        'title' => 'Op het werk',
        'description' => 'Arbetsvokabulär och fraser',
        'theme' => 'Arbete',
        'exercises' => [
            [
                'type' => 'translation',
                'question' => 'Översätt: "Jag har ett möte klockan tre"',
                'data' => json_encode([
                    'correct' => 'Ik heb een vergadering om drie uur|Ik heb om drie uur een vergadering'
                ], JSON_UNESCAPED_UNICODE)
            ],
            [
                'type' => 'multiple_choice',
                'question' => 'Wat is "kollega" på svenska?',
                'data' => json_encode([
                    'options' => ['chef', 'kollega', 'anställd', 'arbetare'],
                    'correct' => '1'
                ], JSON_UNESCAPED_UNICODE)
            ],
            [
                'type' => 'fill_blank',
                'question' => 'Fyll i rätt preposition:',
                'data' => json_encode([
                    'sentence' => 'Ik werk ___ een grote bedrijf.',
                    'correct' => 'bij|voor'
                ], JSON_UNESCAPED_UNICODE)
            ],
            [
                'type' => 'word_order',
                'question' => 'Ordna orden till en korrekt fråga:',
                'data' => json_encode([
                    'words' => ['Kunnen', 'we', 'de', 'deadline', 'verlengen?'],
                    'correct' => 'Kunnen we de deadline verlengen?'
                ], JSON_UNESCAPED_UNICODE)
            ],
            [
                'type' => 'multiple_choice',
                'question' => 'Hur säger man "arbetsgivare" på nederländska?',
                'data' => json_encode([
                    'options' => ['werknemer', 'werkgever', 'werker', 'arbeider'],
                    'correct' => '1'
                ], JSON_UNESCAPED_UNICODE)
            ]
        ]
    ],
    [
        'lesson_number' => 4,
        'title' => 'Gezondheid',
        'description' => 'Prata om hälsa och välmående',
        'theme' => 'Hälsa',
        'exercises' => [
            [
                'type' => 'translation',
                'question' => 'Översätt: "Jag mår inte bra"',
                'data' => json_encode([
                    'correct' => 'Ik voel me niet goed|Ik voel me niet lekker'
                ], JSON_UNESCAPED_UNICODE)
            ],
            [
                'type' => 'multiple_choice',
                'question' => 'Wat betekent "Ik heb hoofdpijn"?',
                'data' => json_encode([
                    'options' => ['Jag har ont i magen', 'Jag har huvudvärk', 'Jag har feber', 'Jag är trött'],
                    'correct' => '1'
                ], JSON_UNESCAPED_UNICODE)
            ],
            [
                'type' => 'fill_blank',
                'question' => 'Fyll i rätt ord:',
                'data' => json_encode([
                    'sentence' => 'Ik moet naar de ___.',
                    'correct' => 'dokter|arts'
                ], JSON_UNESCAPED_UNICODE)
            ],
            [
                'type' => 'word_order',
                'question' => 'Ordna orden:',
                'data' => json_encode([
                    'words' => ['Sinds', 'wanneer', 'heeft', 'u', 'deze', 'klachten?'],
                    'correct' => 'Sinds wanneer heeft u deze klachten?'
                ], JSON_UNESCAPED_UNICODE)
            ],
            [
                'type' => 'multiple_choice',
                'question' => 'Vad är "hand" på nederländska?',
                'data' => json_encode([
                    'options' => ['hoofd', 'hand', 'voet', 'rug'],
                    'correct' => '1'
                ], JSON_UNESCAPED_UNICODE)
            ]
        ]
    ],
    [
        'lesson_number' => 5,
        'title' => 'Winkelen',
        'description' => 'Shopping och priser',
        'theme' => 'Shopping',
        'exercises' => [
            [
                'type' => 'multiple_choice',
                'question' => 'Wat betekent "Hoeveel kost dit?"?',
                'data' => json_encode([
                    'options' => ['Hur mycket väger det här?', 'Hur mycket kostar det här?', 'Var finns det här?', 'Vad är det här?'],
                    'correct' => '1'
                ], JSON_UNESCAPED_UNICODE)
            ],
            [
                'type' => 'translation',
                'question' => 'Översätt: "Kan jag prova det här?"',
                'data' => json_encode([
                    'correct' => 'Mag ik dit passen?|Kan ik dit passen?'
                ], JSON_UNESCAPED_UNICODE)
            ],
            [
                'type' => 'fill_blank',
                'question' => 'Fyll i rätt ord:',
                'data' => json_encode([
                    'sentence' => 'Heeft u dit in een andere ___?',
                    'correct' => 'maat|kleur'
                ], JSON_UNESCAPED_UNICODE)
            ],
            [
                'type' => 'word_order',
                'question' => 'Ordna orden:',
                'data' => json_encode([
                    'words' => ['Waar', 'kan', 'ik', 'betalen?'],
                    'correct' => 'Waar kan ik betalen?'
                ], JSON_UNESCAPED_UNICODE)
            ],
            [
                'type' => 'multiple_choice',
                'question' => 'Hur säger man "rea/utförsäljning" på nederländska?',
                'data' => json_encode([
                    'options' => ['de verkoop', 'de uitverkoop', 'de winkel', 'de prijs'],
                    'correct' => '1'
                ], JSON_UNESCAPED_UNICODE)
            ]
        ]
    ],
    [
        'lesson_number' => 6,
        'title' => 'Het weer',
        'description' => 'Prata om vädret',
        'theme' => 'Väder',
        'exercises' => [
            [
                'type' => 'translation',
                'question' => 'Översätt: "Det regnar idag"',
                'data' => json_encode([
                    'correct' => 'Het regent vandaag|Vandaag regent het'
                ], JSON_UNESCAPED_UNICODE)
            ],
            [
                'type' => 'multiple_choice',
                'question' => 'Wat is "snö" på nederländska?',
                'data' => json_encode([
                    'options' => ['regen', 'sneeuw', 'hagel', 'ijs'],
                    'correct' => '1'
                ], JSON_UNESCAPED_UNICODE)
            ],
            [
                'type' => 'fill_blank',
                'question' => 'Fyll i ett lämpligt ord:',
                'data' => json_encode([
                    'sentence' => 'Morgen wordt het ___.',
                    'correct' => 'warmer|kouder|zonnig|bewolkt'
                ], JSON_UNESCAPED_UNICODE)
            ],
            [
                'type' => 'word_order',
                'question' => 'Ordna orden:',
                'data' => json_encode([
                    'words' => ['Het', 'is', 'vandaag', 'twintig', 'graden'],
                    'correct' => 'Het is vandaag twintig graden'
                ], JSON_UNESCAPED_UNICODE)
            ],
            [
                'type' => 'multiple_choice',
                'question' => 'Vad betyder "zonnig"?',
                'data' => json_encode([
                    'options' => ['molnigt', 'soligt', 'blåsigt', 'kallt'],
                    'correct' => '1'
                ], JSON_UNESCAPED_UNICODE)
            ]
        ]
    ],
    [
        'lesson_number' => 7,
        'title' => 'Vrije tijd',
        'description' => 'Hobbies och fritidsaktiviteter',
        'theme' => 'Fritid',
        'exercises' => [
            [
                'type' => 'multiple_choice',
                'question' => 'Wat betekent "Ik houd van lezen"?',
                'data' => json_encode([
                    'options' => ['Jag tycker om att läsa', 'Jag tycker om att resa', 'Jag tycker om att laga mat', 'Jag tycker om att spela'],
                    'correct' => '0'
                ], JSON_UNESCAPED_UNICODE)
            ],
            [
                'type' => 'translation',
                'question' => 'Översätt: "På min fritid spelar jag fotboll"',
                'data' => json_encode([
                    'correct' => 'In mijn vrije tijd voetbal ik|In mijn vrije tijd speel ik voetbal'
                ], JSON_UNESCAPED_UNICODE)
            ],
            [
                'type' => 'fill_blank',
                'question' => 'Fyll i ett lämpligt verb:',
                'data' => json_encode([
                    'sentence' => 'In het weekend ga ik graag ___.',
                    'correct' => 'wandelen|fietsen|zwemmen|sporten'
                ], JSON_UNESCAPED_UNICODE)
            ],
            [
                'type' => 'word_order',
                'question' => 'Ordna orden:',
                'data' => json_encode([
                    'words' => ['Wat', 'doe', 'je', 'in', 'je', 'vrije', 'tijd?'],
                    'correct' => 'Wat doe je in je vrije tijd?'
                ], JSON_UNESCAPED_UNICODE)
            ],
            [
                'type' => 'multiple_choice',
                'question' => 'Vad betyder "zwemmen"?',
                'data' => json_encode([
                    'options' => ['cykla', 'simma', 'laga mat', 'rita'],
                    'correct' => '1'
                ], JSON_UNESCAPED_UNICODE)
            ]
        ]
    ],
    [
        'lesson_number' => 8,
        'title' => 'Familie en vrienden',
        'description' => 'Prata om familj och vänner',
        'theme' => 'Familj',
        'exercises' => [
            [
                'type' => 'translation',
                'question' => 'Översätt: "Mina föräldrar bor i Sverige"',
                'data' => json_encode([
                    'correct' => 'Mijn ouders wonen in Zweden'
                ], JSON_UNESCAPED_UNICODE)
            ],
            [
                'type' => 'multiple_choice',
                'question' => 'Hur säger man "syskonbarn" på nederländska?',
                'data' => json_encode([
                    'options' => ['neef of nicht', 'broer of zus', 'kind', 'vriend'],
                    'correct' => '0'
                ], JSON_UNESCAPED_UNICODE)
            ],
            [
                'type' => 'fill_blank',
                'question' => 'Fyll i rätt ord:',
                'data' => json_encode([
                    'sentence' => 'Ik heb twee ___ en één zus.',
                    'correct' => 'broers|broertjes'
                ], JSON_UNESCAPED_UNICODE)
            ],
            [
                'type' => 'word_order',
                'question' => 'Ordna orden:',
                'data' => json_encode([
                    'words' => ['Mijn', 'beste', 'vriend', 'woont', 'in', 'Amsterdam'],
                    'correct' => 'Mijn beste vriend woont in Amsterdam'
                ], JSON_UNESCAPED_UNICODE)
            ],
            [
                'type' => 'multiple_choice',
                'question' => 'Vad är "syster" på nederländska?',
                'data' => json_encode([
                    'options' => ['broer', 'zus', 'oma', 'nicht'],
                    'correct' => '1'
                ], JSON_UNESCAPED_UNICODE)
            ]
        ]
    ],
    [
        'lesson_number' => 9,
        'title' => 'Huishouden',
        'description' => 'Hem och hushåll',
        'theme' => 'Hem',
        'exercises' => [
            [
                'type' => 'multiple_choice',
                'question' => 'Wat is "keuken" på svenska?',
                'data' => json_encode([
                    'options' => ['sovrum', 'kök', 'vardagsrum', 'badrum'],
                    'correct' => '1'
                ], JSON_UNESCAPED_UNICODE)
            ],
            [
                'type' => 'translation',
                'question' => 'Översätt: "Jag bor i en lägenhet"',
                'data' => json_encode([
                    'correct' => 'Ik woon in een flat|Ik woon in een appartement'
                ], JSON_UNESCAPED_UNICODE)
            ],
            [
                'type' => 'fill_blank',
                'question' => 'Fyll i rätt verb:',
                'data' => json_encode([
                    'sentence' => 'Ik moet de afwas ___.',
                    'correct' => 'doen'
                ], JSON_UNESCAPED_UNICODE)
            ],
            [
                'type' => 'word_order',
                'question' => 'Ordna orden:',
                'data' => json_encode([
                    'words' => ['Het', 'huis', 'heeft', 'drie', 'slaapkamers'],
                    'correct' => 'Het huis heeft drie slaapkamers'
                ], JSON_UNESCAPED_UNICODE)
            ],
            [
                'type' => 'multiple_choice',
                'question' => 'Vad betyder "woonkamer"?',
                'data' => json_encode([
                    'options' => ['sovrum', 'vardagsrum', 'badrum', 'trädgård'],
                    'correct' => '1'
                ], JSON_UNESCAPED_UNICODE)
            ]
        ]
    ],
    [
        'lesson_number' => 10,
        'title' => 'Verleden tijd',
        'description' => 'Prata om det förflutna',
        'theme' => 'Grammatik',
        'exercises' => [
            [
                'type' => 'multiple_choice',
                'question' => 'Welke zin is correct in de verleden tijd?',
                'data' => json_encode([
                    'options' => ['Ik werk gisteren', 'Ik werkte gisteren', 'Ik werkten gisteren', 'Ik gewerkt gisteren'],
                    'correct' => '1'
                ], JSON_UNESCAPED_UNICODE)
            ],
            [
                'type' => 'translation',
                'question' => 'Översätt: "Jag åt igår"',
                'data' => json_encode([
                    'correct' => 'Ik at gisteren|Gisteren at ik'
                ], JSON_UNESCAPED_UNICODE)
            ],
            [
                'type' => 'fill_blank',
                'question' => 'Fyll i rätt form av verbet "gaan":',
                'data' => json_encode([
                    'sentence' => 'Vorige week ___ ik naar Parijs.',
                    'correct' => 'ging'
                ], JSON_UNESCAPED_UNICODE)
            ],
            [
                'type' => 'word_order',
                'question' => 'Ordna orden (perfekt):',
                'data' => json_encode([
                    'words' => ['Gisteren', 'heb', 'ik', 'een', 'boek', 'gelezen'],
                    'correct' => 'Gisteren heb ik een boek gelezen'
                ], JSON_UNESCAPED_UNICODE)
            ],
            [
                'type' => 'multiple_choice',
                'question' => 'Wat is de verleden tijd van "zijn" (1:a person singular)?',
                'data' => json_encode([
                    'options' => ['ben', 'was', 'word', 'geweest'],
                    'correct' => '1'
                ], JSON_UNESCAPED_UNICODE)
            ]
        ]
    ],
    [
        'lesson_number' => 11,
        'title' => 'Toekomst plannen',
        'description' => 'Framtidsplaner och avsikter',
        'theme' => 'Framtid',
        'exercises' => [
            [
                'type' => 'translation',
                'question' => 'Översätt: "Nästa år ska jag studera"',
                'data' => json_encode([
                    'correct' => 'Volgend jaar ga ik studeren|Volgend jaar zal ik studeren'
                ], JSON_UNESCAPED_UNICODE)
            ],
            [
                'type' => 'multiple_choice',
                'question' => 'Hoe zeg je "Ik ben van plan om..."?',
                'data' => json_encode([
                    'options' => ['Jag planerar att...', 'Jag tänker på...', 'Jag vill...', 'Jag kan...'],
                    'correct' => '0'
                ], JSON_UNESCAPED_UNICODE)
            ],
            [
                'type' => 'fill_blank',
                'question' => 'Fyll i rätt verb:',
                'data' => json_encode([
                    'sentence' => 'Morgen ___ ik naar de bioscoop.',
                    'correct' => 'ga|zal gaan'
                ], JSON_UNESCAPED_UNICODE)
            ],
            [
                'type' => 'word_order',
                'question' => 'Ordna orden:',
                'data' => json_encode([
                    'words' => ['Ik', 'wil', 'graag', 'Nederlands', 'leren'],
                    'correct' => 'Ik wil graag Nederlands leren'
                ], JSON_UNESCAPED_UNICODE)
            ],
            [
                'type' => 'multiple_choice',
                'question' => 'Wat betekent "Ik hoop dat..."?',
                'data' => json_encode([
                    'options' => ['Jag tror att...', 'Jag hoppas att...', 'Jag vet att...', 'Jag tycker att...'],
                    'correct' => '1'
                ], JSON_UNESCAPED_UNICODE)
            ]
        ]
    ],
    [
        'lesson_number' => 12,
        'title' => 'Cultuur en tradities',
        'description' => 'Nederländsk kultur och traditioner',
        'theme' => 'Kultur',
        'exercises' => [
            [
                'type' => 'multiple_choice',
                'question' => 'Wanneer vieren Nederlanders Sinterklaas?',
                'data' => json_encode([
                    'options' => ['25 december', '5 december', '31 december', '1 januari'],
                    'correct' => '1'
                ], JSON_UNESCAPED_UNICODE)
            ],
            [
                'type' => 'translation',
                'question' => 'Översätt: "Koningsdag är den 27 april"',
                'data' => json_encode([
                    'correct' => 'Koningsdag is op 27 april|Koningsdag is 27 april'
                ], JSON_UNESCAPED_UNICODE)
            ],
            [
                'type' => 'fill_blank',
                'question' => 'Fyll i rätt ord:',
                'data' => json_encode([
                    'sentence' => 'Nederland is beroemd om zijn ___.',
                    'correct' => 'kaas|tulpen|molens|fietsen'
                ], JSON_UNESCAPED_UNICODE)
            ],
            [
                'type' => 'word_order',
                'question' => 'Ordna orden:',
                'data' => json_encode([
                    'words' => ['Amsterdam', 'is', 'de', 'hoofdstad', 'van', 'Nederland'],
                    'correct' => 'Amsterdam is de hoofdstad van Nederland'
                ], JSON_UNESCAPED_UNICODE)
            ],
            [
                'type' => 'multiple_choice',
                'question' => 'Vad är "stroopwafel"?',
                'data' => json_encode([
                    'options' => ['träskor', 'sirapsvåffla', 'ost', 'tulpan'],
                    'correct' => '1'
                ], JSON_UNESCAPED_UNICODE)
            ]
        ]
    ],
    [
        'lesson_number' => 13,
        'title' => 'Meningen geven',
        'description' => 'Uttrycka åsikter och argument',
        'theme' => 'Diskussion',
        'exercises' => [
            [
                'type' => 'translation',
                'question' => 'Översätt: "Jag tycker att det är intressant"',
                'data' => json_encode([
                    'correct' => 'Ik vind het interessant|Ik vind dat het interessant is'
                ], JSON_UNESCAPED_UNICODE)
            ],
            [
                'type' => 'multiple_choice',
                'question' => 'Hoe zeg je "Jag håller med"?',
                'data' => json_encode([
                    'options' => ['Ik ben het eens', 'Ik denk het niet', 'Misschien', 'Dat weet ik niet'],
                    'correct' => '0'
                ], JSON_UNESCAPED_UNICODE)
            ],
            [
                'type' => 'fill_blank',
                'question' => 'Fyll i rätt ord:',
                'data' => json_encode([
                    'sentence' => 'Naar mijn ___ is dit de beste oplossing.',
                    'correct' => 'mening|idee'
                ], JSON_UNESCAPED_UNICODE)
            ],
            [
                'type' => 'word_order',
                'question' => 'Ordna orden:',
                'data' => json_encode([
                    'words' => ['Ik', 'ben', 'het', 'daar', 'niet', 'mee', 'eens'],
                    'correct' => 'Ik ben het daar niet mee eens'
                ], JSON_UNESCAPED_UNICODE)
            ],
            [
                'type' => 'multiple_choice',
                'question' => 'Wat betekent "Dat klopt"?',
                'data' => json_encode([
                    'options' => ['Det är fel', 'Det stämmer', 'Det är möjligt', 'Det är svårt'],
                    'correct' => '1'
                ], JSON_UNESCAPED_UNICODE)
            ]
        ]
    ],
    [
        'lesson_number' => 14,
        'title' => 'Telefoon en email',
        'description' => 'Kommunikation via telefon och e-post',
        'theme' => 'Kommunikation',
        'exercises' => [
            [
                'type' => 'multiple_choice',
                'question' => 'Hoe begin je een formele email?',
                'data' => json_encode([
                    'options' => ['Hoi', 'Geachte heer/mevrouw', 'Hey', 'Dag'],
                    'correct' => '1'
                ], JSON_UNESCAPED_UNICODE)
            ],
            [
                'type' => 'translation',
                'question' => 'Översätt: "Kan jag lämna ett meddelande?"',
                'data' => json_encode([
                    'correct' => 'Kan ik een boodschap achterlaten?|Mag ik een bericht achterlaten?'
                ], JSON_UNESCAPED_UNICODE)
            ],
            [
                'type' => 'fill_blank',
                'question' => 'Fyll i rätt ord:',
                'data' => json_encode([
                    'sentence' => 'U spreekt met ___ van bedrijf X.',
                    'correct' => 'de heer|mevrouw'
                ], JSON_UNESCAPED_UNICODE)
            ],
            [
                'type' => 'word_order',
                'question' => 'Ordna orden:',
                'data' => json_encode([
                    'words' => ['Kunt', 'u', 'mij', 'terugbellen?'],
                    'correct' => 'Kunt u mij terugbellen?'
                ], JSON_UNESCAPED_UNICODE)
            ],
            [
                'type' => 'multiple_choice',
                'question' => 'Hoe sluit je een formele email af?',
                'data' => json_encode([
                    'options' => ['Doei', 'Met vriendelijke groet', 'Groetjes', 'Later'],
                    'correct' => '1'
                ], JSON_UNESCAPED_UNICODE)
            ]
        ]
    ],
    [
        'lesson_number' => 15,
        'title' => 'Milieu en duurzaamheid',
        'description' => 'Miljö och hållbarhet',
        'theme' => 'Miljö',
        'exercises' => [
            [
                'type' => 'translation',
                'question' => 'Översätt: "Jag sorterar sopor"',
                'data' => json_encode([
                    'correct' => 'Ik scheid afval|Ik sorteer afval'
                ], JSON_UNESCAPED_UNICODE)
            ],
            [
                'type' => 'multiple_choice',
                'question' => 'Wat betekent "duurzaam"?',
                'data' => json_encode([
                    'options' => ['dyrt', 'hållbart', 'långsamt', 'svårt'],
                    'correct' => '1'
                ], JSON_UNESCAPED_UNICODE)
            ],
            [
                'type' => 'fill_blank',
                'question' => 'Fyll i rätt adjektiv:',
                'data' => json_encode([
                    'sentence' => 'We moeten ___ energie gebruiken.',
                    'correct' => 'hernieuwbare|groene|schone'
                ], JSON_UNESCAPED_UNICODE)
            ],
            [
                'type' => 'word_order',
                'question' => 'Ordna orden:',
                'data' => json_encode([
                    'words' => ['Het', 'is', 'belangrijk', 'om', 'het', 'milieu', 'te', 'beschermen'],
                    'correct' => 'Het is belangrijk om het milieu te beschermen'
                ], JSON_UNESCAPED_UNICODE)
            ],
            [
                'type' => 'multiple_choice',
                'question' => 'Vad är "återvinning" på nederländska?',
                'data' => json_encode([
                    'options' => ['afval', 'recycling', 'uitstoot', 'vervuiling'],
                    'correct' => '1'
                ], JSON_UNESCAPED_UNICODE)
            ]
        ]
    ]
];

// Insert lessons and exercises
$db->beginTransaction();

try {
    foreach ($lessons as $lessonData) {
        // Insert lesson
        $stmt = $db->prepare("INSERT INTO lessons (language_id, lesson_number, title, description, theme, difficulty_level) VALUES (?, ?, ?, ?, ?, 'B1')");
        $stmt->execute([
            $lang_id,
            $lessonData['lesson_number'],
            $lessonData['title'],
            $lessonData['description'],
            $lessonData['theme']
        ]);
        
        $lesson_id = $db->lastInsertId();
        
        // Insert exercises
        foreach ($lessonData['exercises'] as $index => $exercise) {
            $stmt = $db->prepare("INSERT INTO exercises (lesson_id, exercise_number, type, question, data) VALUES (?, ?, ?, ?, ?)");
            $stmt->execute([
                $lesson_id,
                $index + 1,
                $exercise['type'],
                $exercise['question'],
                $exercise['data']
            ]);
        }
        
        echo "✓ Lektion {$lessonData['lesson_number']}: {$lessonData['title']} ({$lessonData['theme']})\n";
    }
    
    $db->commit();
    echo "\n🎉 Alla 15 lektioner har lagts till i databasen!\n";
    echo "Totalt " . (count($lessons) * 5) . " övningar skapade.\n";
    
} catch (Exception $e) {
    $db->rollBack();
    echo "❌ Fel: " . $e->getMessage() . "\n";
}
