<?php
require_once 'config.php';

$db = getLanguageDB();

echo "🏛️ Uppdaterar latinska lektioner med utförligt teoriinnehåll...\n\n";

// Array of theory content for each Latin lesson
$theories = [
    1 => [ // Alfabetet
        'title' => 'Det latinska alfabetet och uttal',
        'content' => <<<EOT
<h3>Det klassiska latinska alfabetet</h3>
<p>Det klassiska latinska alfabetet hade <strong>23 bokstäver</strong>. De bokstäver som saknades jämfört med vårt moderna alfabet var J, U och W.</p>

<h4>Uttal</h4>
<ul>
    <li><strong>A</strong> - alltid som i "far" (aldrig som i "mat")</li>
    <li><strong>C</strong> - alltid som K (aldrig som S). "Cicero" uttalas "Kikero"</li>
    <li><strong>G</strong> - alltid hårt som i "går" (aldrig som J)</li>
    <li><strong>I</strong> - både som vokal (i) och konsonant (j-ljud)</li>
    <li><strong>V</strong> - uttalas som W. "Veni" uttalas "weni"</li>
    <li><strong>AE</strong> - diftong som uttalas "ai" eller "ä"</li>
    <li><strong>OE</strong> - diftong som uttalas "oi" eller "ö"</li>
</ul>

<h4>Viktiga ord att kunna</h4>
<table border="1" cellpadding="5">
    <tr><th>Latin</th><th>Svenska</th><th>Uttal</th></tr>
    <tr><td>Salve</td><td>Hej (till en person)</td><td>sal-we</td></tr>
    <tr><td>Salvete</td><td>Hej (till flera)</td><td>sal-we-te</td></tr>
    <tr><td>Vale</td><td>Farväl (till en)</td><td>wa-le</td></tr>
    <tr><td>Valete</td><td>Farväl (till flera)</td><td>wa-le-te</td></tr>
    <tr><td>Aqua</td><td>Vatten</td><td>ak-wa</td></tr>
    <tr><td>Terra</td><td>Jord</td><td>ter-ra</td></tr>
</table>

<p><em>Tips: I kyrkligt latin (från medeltiden) uttalas C som S före E och I, precis som i romanska språk.</em></p>
EOT
    ],
    
    2 => [ // Första deklinationen
        'title' => 'Första deklinationen - feminina substantiv på -a',
        'content' => <<<EOT
<h3>Introduktion</h3>
<p>Latin har <strong>fem deklinationer</strong> - olika sätt att böja substantiv. Första deklinationen består nästan uteslutande av <strong>feminina substantiv</strong> som slutar på <strong>-a</strong> i nominativ singular.</p>

<h4>Komplett böjningstabell: puella (flicka)</h4>
<table border="1" cellpadding="5">
    <tr><th>Fall</th><th>Singular</th><th>Plural</th><th>Användning</th></tr>
    <tr><td><strong>Nominativ</strong></td><td>puell<strong>a</strong></td><td>puell<strong>ae</strong></td><td>Subjekt: "flickan/flickorna"</td></tr>
    <tr><td><strong>Genitiv</strong></td><td>puell<strong>ae</strong></td><td>puell<strong>ārum</strong></td><td>Ägande: "flickans/flickornas"</td></tr>
    <tr><td><strong>Dativ</strong></td><td>puell<strong>ae</strong></td><td>puell<strong>īs</strong></td><td>Indirekt objekt: "till flickan"</td></tr>
    <tr><td><strong>Ackusativ</strong></td><td>puell<strong>am</strong></td><td>puell<strong>ās</strong></td><td>Direkt objekt: "flickan"</td></tr>
    <tr><td><strong>Ablativ</strong></td><td>puell<strong>ā</strong></td><td>puell<strong>īs</strong></td><td>Med/från/av: "med flickan"</td></tr>
</table>

<h4>Fler exempel från första deklinationen</h4>
<ul>
    <li><strong>rosa, rosae</strong> (f) - ros</li>
    <li><strong>aqua, aquae</strong> (f) - vatten</li>
    <li><strong>terra, terrae</strong> (f) - jord, land</li>
    <li><strong>filia, filiae</strong> (f) - dotter</li>
    <li><strong>domina, dominae</strong> (f) - fru, härskarinna</li>
</ul>

<h4>Undantag: maskulina ord i första deklinationen</h4>
<p>Några ord för manliga yrken följer första deklinationen men är maskulinum:</p>
<ul>
    <li><strong>nauta, nautae</strong> (m) - sjöman</li>
    <li><strong>agricola, agricolae</strong> (m) - bonde</li>
    <li><strong>poeta, poetae</strong> (m) - poet</li>
</ul>

<h4>Exempel på meningar</h4>
<ul>
    <li><strong>Puella rosam amat.</strong> - Flickan älskar rosen.</li>
    <li><strong>Rosa est pulchra.</strong> - Rosen är vacker.</li>
    <li><strong>Puellae aquam portant.</strong> - Flickorna bär vatten.</li>
</ul>
EOT
    ],
    
    3 => [ // Andra deklinationen
        'title' => 'Andra deklinationen - maskulinum och neutrum',
        'content' => <<<EOT
<h3>Introduktion</h3>
<p>Andra deklinationen innehåller både <strong>maskulina</strong> ord (slutar på -us eller -er) och <strong>neutra</strong> ord (slutar på -um).</p>

<h4>Maskulinum: dominus (herre)</h4>
<table border="1" cellpadding="5">
    <tr><th>Fall</th><th>Singular</th><th>Plural</th></tr>
    <tr><td><strong>Nominativ</strong></td><td>domin<strong>us</strong></td><td>domin<strong>ī</strong></td></tr>
    <tr><td><strong>Genitiv</strong></td><td>domin<strong>ī</strong></td><td>domin<strong>ōrum</strong></td></tr>
    <tr><td><strong>Dativ</strong></td><td>domin<strong>ō</strong></td><td>domin<strong>īs</strong></td></tr>
    <tr><td><strong>Ackusativ</strong></td><td>domin<strong>um</strong></td><td>domin<strong>ōs</strong></td></tr>
    <tr><td><strong>Ablativ</strong></td><td>domin<strong>ō</strong></td><td>domin<strong>īs</strong></td></tr>
</table>

<h4>Neutrum: templum (tempel)</h4>
<table border="1" cellpadding="5">
    <tr><th>Fall</th><th>Singular</th><th>Plural</th></tr>
    <tr><td><strong>Nominativ</strong></td><td>templ<strong>um</strong></td><td>templ<strong>a</strong></td></tr>
    <tr><td><strong>Genitiv</strong></td><td>templ<strong>ī</strong></td><td>templ<strong>ōrum</strong></td></tr>
    <tr><td><strong>Dativ</strong></td><td>templ<strong>ō</strong></td><td>templ<strong>īs</strong></td></tr>
    <tr><td><strong>Ackusativ</strong></td><td>templ<strong>um</strong></td><td>templ<strong>a</strong></td></tr>
    <tr><td><strong>Ablativ</strong></td><td>templ<strong>ō</strong></td><td>templ<strong>īs</strong></td></tr>
</table>

<p><strong>⚠️ VIKTIG REGEL:</strong> Neutrum har alltid samma form i nominativ och ackusativ, både i singular och plural!</p>

<h4>Vanliga ord i andra deklinationen</h4>
<p><em>Maskulinum:</em></p>
<ul>
    <li><strong>amicus, amici</strong> - vän</li>
    <li><strong>servus, servi</strong> - slav, tjänare</li>
    <li><strong>filius, filii</strong> - son</li>
    <li><strong>puer, pueri</strong> - pojke (slutar på -er!)</li>
    <li><strong>ager, agri</strong> - åker (slutar på -er, stammen är agr-)</li>
</ul>

<p><em>Neutrum:</em></p>
<ul>
    <li><strong>bellum, belli</strong> - krig</li>
    <li><strong>donum, doni</strong> - gåva</li>
    <li><strong>verbum, verbi</strong> - ord</li>
    <li><strong>regnum, regni</strong> - kungarike</li>
</ul>

<h4>Exempel på meningar</h4>
<ul>
    <li><strong>Dominus servum vocat.</strong> - Herren kallar på slaven.</li>
    <li><strong>Templum magnum est.</strong> - Templet är stort.</li>
    <li><strong>Amici dona portant.</strong> - Vännerna bär gåvor.</li>
</ul>
EOT
    ],
    
    4 => [ // Presens aktiv
        'title' => 'Verb i presens aktiv - nutidens handling',
        'content' => <<<EOT
<h3>De fyra konjugationerna</h3>
<p>Latinska verb delas in i <strong>fyra konjugationer</strong> beroende på stammens vokal:</p>
<ul>
    <li><strong>1:a konjugationen:</strong> stam + <strong>ā</strong> (am<strong>ā</strong>re - älska)</li>
    <li><strong>2:a konjugationen:</strong> stam + <strong>ē</strong> (mon<strong>ē</strong>re - påminna)</li>
    <li><strong>3:e konjugationen:</strong> stam + <strong>e</strong> (leg<strong>e</strong>re - läsa)</li>
    <li><strong>4:e konjugationen:</strong> stam + <strong>ī</strong> (aud<strong>ī</strong>re - höra)</li>
</ul>

<h4>Första konjugationen: amo (jag älskar)</h4>
<table border="1" cellpadding="5">
    <tr><th>Person</th><th>Singular</th><th>Plural</th></tr>
    <tr><td><strong>1:a</strong></td><td>am<strong>o</strong> (jag älskar)</td><td>am<strong>amus</strong> (vi älskar)</td></tr>
    <tr><td><strong>2:a</strong></td><td>am<strong>as</strong> (du älskar)</td><td>am<strong>atis</strong> (ni älskar)</td></tr>
    <tr><td><strong>3:e</strong></td><td>am<strong>at</strong> (han/hon älskar)</td><td>am<strong>ant</strong> (de älskar)</td></tr>
</table>

<h4>Andra konjugationen: moneo (jag påminner)</h4>
<table border="1" cellpadding="5">
    <tr><th>Person</th><th>Singular</th><th>Plural</th></tr>
    <tr><td><strong>1:a</strong></td><td>mone<strong>o</strong></td><td>mone<strong>mus</strong></td></tr>
    <tr><td><strong>2:a</strong></td><td>mone<strong>s</strong></td><td>mone<strong>tis</strong></td></tr>
    <tr><td><strong>3:e</strong></td><td>mone<strong>t</strong></td><td>mone<strong>nt</strong></td></tr>
</table>

<h4>Personändelser att komma ihåg</h4>
<p>Dessa ändelser används i nästan alla tempus:</p>
<ul>
    <li><strong>-o/-m</strong> = jag</li>
    <li><strong>-s</strong> = du</li>
    <li><strong>-t</strong> = han/hon/det</li>
    <li><strong>-mus</strong> = vi</li>
    <li><strong>-tis</strong> = ni</li>
    <li><strong>-nt</strong> = de</li>
</ul>

<h4>Vanliga verb att lära sig</h4>
<ul>
    <li><strong>laudo, laudare</strong> - berömma, prisa</li>
    <li><strong>paro, parare</strong> - förbereda</li>
    <li><strong>porto, portare</strong> - bära</li>
    <li><strong>habeo, habere</strong> - ha</li>
    <li><strong>video, videre</strong> - se</li>
    <li><strong>lego, legere</strong> - läsa</li>
    <li><strong>audio, audire</strong> - höra</li>
</ul>

<h4>Exempel på meningar</h4>
<ul>
    <li><strong>Puella rosam amat.</strong> - Flickan älskar rosen.</li>
    <li><strong>Magistra discipulos monet.</strong> - Läraren påminner eleverna.</li>
    <li><strong>Servus aquam portat.</strong> - Slaven bär vatten.</li>
    <li><strong>Amici libros legunt.</strong> - Vännerna läser böcker.</li>
</ul>
EOT
    ],
    
    5 => [ // Adjektiv och kongruens
        'title' => 'Adjektiv och kongruens - överensstämmelse',
        'content' => <<<EOT
<h3>Vad är kongruens?</h3>
<p><strong>Kongruens</strong> betyder att adjektivet måste överensstämma med substantivet i tre kategorier:</p>
<ul>
    <li><strong>Genus</strong> (kön): maskulinum, femininum eller neutrum</li>
    <li><strong>Numerus</strong> (tal): singular eller plural</li>
    <li><strong>Kasus</strong> (fall): nominativ, genitiv, dativ, ackusativ eller ablativ</li>
</ul>

<h4>Adjektiv av 1:a och 2:a deklinationen</h4>
<p>De flesta adjektiv böjs som första deklinationen (femininum) och andra deklinationen (maskulinum och neutrum).</p>

<p><strong>Exempel: bonus, bona, bonum (god)</strong></p>
<table border="1" cellpadding="5">
    <tr><th>Fall</th><th>Mask. sg</th><th>Fem. sg</th><th>Neutr. sg</th></tr>
    <tr><td><strong>Nom</strong></td><td>bon<strong>us</strong></td><td>bon<strong>a</strong></td><td>bon<strong>um</strong></td></tr>
    <tr><td><strong>Gen</strong></td><td>bon<strong>ī</strong></td><td>bon<strong>ae</strong></td><td>bon<strong>ī</strong></td></tr>
    <tr><td><strong>Dat</strong></td><td>bon<strong>ō</strong></td><td>bon<strong>ae</strong></td><td>bon<strong>ō</strong></td></tr>
    <tr><td><strong>Ack</strong></td><td>bon<strong>um</strong></td><td>bon<strong>am</strong></td><td>bon<strong>um</strong></td></tr>
    <tr><td><strong>Abl</strong></td><td>bon<strong>ō</strong></td><td>bon<strong>ā</strong></td><td>bon<strong>ō</strong></td></tr>
</table>

<h4>Exempel på kongruens i praktiken</h4>
<ul>
    <li><strong>puella bona</strong> - den goda flickan (femininum nominativ singular)</li>
    <li><strong>dominus bonus</strong> - den gode herren (maskulinum nominativ singular)</li>
    <li><strong>templum bonum</strong> - det goda templet (neutrum nominativ singular)</li>
    <li><strong>puellae bonae</strong> - de goda flickorna (femininum nominativ plural)</li>
    <li><strong>puellam bonam</strong> - den goda flickan (ackusativ - objekt!)</li>
</ul>

<h4>Vanliga adjektiv att lära sig</h4>
<table border="1" cellpadding="5">
    <tr><th>Maskulinum</th><th>Femininum</th><th>Neutrum</th><th>Betydelse</th></tr>
    <tr><td>magnus</td><td>magna</td><td>magnum</td><td>stor</td></tr>
    <tr><td>parvus</td><td>parva</td><td>parvum</td><td>liten</td></tr>
    <tr><td>bonus</td><td>bona</td><td>bonum</td><td>god</td></tr>
    <tr><td>malus</td><td>mala</td><td>malum</td><td>ond, dålig</td></tr>
    <tr><td>pulcher</td><td>pulchra</td><td>pulchrum</td><td>vacker</td></tr>
    <tr><td>longus</td><td>longa</td><td>longum</td><td>lång</td></tr>
</table>

<h4>Ordföljd</h4>
<p>Adjektivet kan stå både före och efter substantivet:</p>
<ul>
    <li><strong>puella pulchra</strong> = <strong>pulchra puella</strong> - den vackra flickan</li>
</ul>
<p><em>Tips: Adjektiv som står före substantivet betonas ofta mer.</em></p>

<h4>Meningar att studera</h4>
<ul>
    <li><strong>Puella parva rosam pulchram amat.</strong> - Den lilla flickan älskar den vackra rosen.</li>
    <li><strong>Dominus bonus servos bonos habet.</strong> - Den gode herren har goda slavar.</li>
    <li><strong>Templum magnum deorum est.</strong> - Det stora templet är gudarnas.</li>
</ul>
EOT
    ]
];

// Update lessons with theory content
foreach ($theories as $lesson_num => $theory) {
    $stmt = $db->prepare("UPDATE lessons SET theory_content = ? WHERE language_id = 5 AND lesson_number = ?");
    $stmt->execute([$theory['content'], $lesson_num]);
    echo "✓ Lektion $lesson_num: {$theory['title']}\n";
}

echo "\n✅ Uppdaterat de första 5 lektionerna med detaljerat teoriinnehåll!\n";
echo "📚 Nu har varje lektion en föreläsning med tabeller, exempel och förklaringar.\n";
