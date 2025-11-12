<?php
require_once 'config.php';

$db = getLanguageDB();

echo "🇳🇱 Lägger till teorimaterial för nederländska lektioner...\n\n";

// Theory content for Dutch lessons (B1 level)
$theory_content = [
    1 => [
        'title' => 'Grundläggande hälsningsfraser',
        'content' => '
<h3>Välkommen till nederländska!</h3>
<p>Nederländska är ett germanskt språk som talas av cirka 24 miljoner människor i Nederländerna, Belgien (flamländska) och Surinam. Det är nära besläktat med tyska och engelska.</p>

<h4>📚 Viktiga hälsningsfraser:</h4>
<table class="grammar-table">
    <tr><th>Nederländska</th><th>Svenska</th><th>När används det?</th></tr>
    <tr><td>Hallo / Hoi</td><td>Hej</td><td>Informellt</td></tr>
    <tr><td>Goedemorgen</td><td>God morgon</td><td>Till ca kl 12</td></tr>
    <tr><td>Goedemiddag</td><td>God eftermiddag</td><td>12-18</td></tr>
    <tr><td>Goedenavond</td><td>God kväll</td><td>Efter 18</td></tr>
    <tr><td>Tot ziens</td><td>Hejdå</td><td>Formellt</td></tr>
    <tr><td>Dag / Doei</td><td>Hejdå</td><td>Informellt</td></tr>
</table>

<h4>💡 Exempel:</h4>
<div class="example">
    <p><strong>Formell situation:</strong><br>
    "Goedemorgen, meneer. Hoe gaat het met u?"<br>
    <em>(God morgon, herr. Hur mår ni?)</em></p>
    
    <p><strong>Informell situation:</strong><br>
    "Hoi! Hoe gaat het?"<br>
    <em>(Hej! Hur mår du?)</em></p>
</div>

<h4>📖 Grammatisk observation:</h4>
<p>Nederländska använder två pronomen för "du":</p>
<ul>
    <li><strong>jij/je</strong> - informellt (vänner, familj)</li>
    <li><strong>u</strong> - formellt (okända, äldre personer, formella situationer)</li>
</ul>
'
    ],
    2 => [
        'title' => 'Presens - nutid',
        'content' => '
<h3>Presens i nederländska</h3>
<p>Presens används för handlingar som sker nu eller regelbundet. Det är enklare än på svenska - färre ändelser att komma ihåg!</p>

<h4>📊 Verbböjning i presens:</h4>
<table class="grammar-table">
    <tr><th>Person</th><th>Ändelse</th><th>Exempel: werken (arbeta)</th></tr>
    <tr><td>ik (jag)</td><td>stam</td><td>ik werk</td></tr>
    <tr><td>jij/je (du)</td><td>stam + t</td><td>jij werkt</td></tr>
    <tr><td>u (ni formellt)</td><td>stam + t</td><td>u werkt</td></tr>
    <tr><td>hij/zij/het (han/hon/den)</td><td>stam + t</td><td>hij werkt</td></tr>
    <tr><td>wij/we (vi)</td><td>infinitiv</td><td>wij werken</td></tr>
    <tr><td>jullie (ni)</td><td>infinitiv</td><td>jullie werken</td></tr>
    <tr><td>zij/ze (de)</td><td>infinitiv</td><td>zij werken</td></tr>
</table>

<h4>🔑 Viktig regel - hitta stammen:</h4>
<ol>
    <li>Ta infinitiven: <strong>werken</strong></li>
    <li>Ta bort -en: <strong>werk</strong></li>
    <li>Detta är stammen!</li>
</ol>

<h4>💡 Exempel:</h4>
<div class="example">
    <p><strong>Infinitiv: wonen</strong> (bo)<br>
    Stam: <strong>woon</strong><br>
    ik woon, jij woont, wij wonen</p>
    
    <p><strong>Infinitiv: studeren</strong> (studera)<br>
    Stam: <strong>studeer</strong><br>
    ik studeer, jij studeert, wij studeren</p>
</div>

<h4>⚠️ Specialfall - inversionen:</h4>
<p>När frågan börjar med verbet försvinner -t efter jij/je:</p>
<ul>
    <li>Jij werkt → <strong>Werk jij?</strong></li>
    <li>Jij woont → <strong>Woon jij?</strong></li>
</ul>
'
    ],
    3 => [
        'title' => 'Ordföljd i huvudsatser',
        'content' => '
<h3>Ordföljd i nederländska huvudsatser</h3>
<p>Nederländska har striktare ordföljd än svenska. Den viktigaste regeln är <strong>V2</strong> - verbet ska alltid stå på andra plats i huvudsatsen!</p>

<h4>📋 V2-regeln:</h4>
<table class="grammar-table">
    <tr><th>Position 1</th><th>Position 2 (VERB)</th><th>Position 3+</th></tr>
    <tr><td>Ik</td><td>werk</td><td>in Amsterdam</td></tr>
    <tr><td>In Amsterdam</td><td>werk</td><td>ik</td></tr>
    <tr><td>Vandaag</td><td>ga</td><td>ik naar huis</td></tr>
</table>

<h4>💡 Exempel med inversion:</h4>
<div class="example">
    <p><strong>Normal ordföljd (subjekt först):</strong><br>
    Ik ga vandaag naar de winkel.<br>
    <em>(Jag går idag till affären.)</em></p>
    
    <p><strong>Inversion (tidsadverbial först):</strong><br>
    Vandaag ga ik naar de winkel.<br>
    <em>(Idag går jag till affären.)</em></p>
    
    <p><strong>Inversion (platsadverbial först):</strong><br>
    Naar de winkel ga ik vandaag.<br>
    <em>(Till affären går jag idag.)</em></p>
</div>

<h4>🔑 Viktiga punkter:</h4>
<ul>
    <li>Verbet är <strong>alltid</strong> på plats 2 i huvudsatser</li>
    <li>Om något annat än subjektet står först, kommer subjektet efter verbet</li>
    <li>Detta kallas <strong>inversion</strong></li>
</ul>
'
    ],
    4 => [
        'title' => 'Possessiva pronomen',
        'content' => '
<h3>Possessiva pronomen - ägande ord</h3>
<p>Possessiva pronomen visar vem något tillhör. I nederländska böjs de efter substantivets genus (de-ord eller het-ord).</p>

<h4>📊 Översikt:</h4>
<table class="grammar-table">
    <tr><th>Person</th><th>de-ord</th><th>het-ord</th><th>Plural</th></tr>
    <tr><td>mijn (min/mitt)</td><td>mijn auto</td><td>mijn huis</td><td>mijn auto\'s</td></tr>
    <tr><td>jouw/je (din/ditt)</td><td>jouw auto</td><td>jouw huis</td><td>jouw auto\'s</td></tr>
    <tr><td>zijn (hans)</td><td>zijn auto</td><td>zijn huis</td><td>zijn auto\'s</td></tr>
    <tr><td>haar (hennes)</td><td>haar auto</td><td>haar huis</td><td>haar auto\'s</td></tr>
    <tr><td>ons/onze (vår/vårt)</td><td>onze auto</td><td>ons huis</td><td>onze auto\'s</td></tr>
    <tr><td>jullie (er)</td><td>jullie auto</td><td>jullie huis</td><td>jullie auto\'s</td></tr>
    <tr><td>hun (deras)</td><td>hun auto</td><td>hun huis</td><td>hun auto\'s</td></tr>
</table>

<h4>⚠️ Viktig skillnad - ons vs onze:</h4>
<ul>
    <li><strong>onze</strong> + de-ord: <em>onze auto, onze tafel</em></li>
    <li><strong>ons</strong> + het-ord: <em>ons huis, ons boek</em></li>
</ul>

<h4>💡 Exempel:</h4>
<div class="example">
    <p>Dit is <strong>mijn</strong> fiets. (Detta är min cykel.)<br>
    Waar is <strong>jouw</strong> tas? (Var är din väska?)<br>
    <strong>Haar</strong> naam is Anna. (Hennes namn är Anna.)<br>
    <strong>Onze</strong> stad is groot. (Vår stad är stor.)<br>
    <strong>Ons</strong> huis is klein. (Vårt hus är litet.)</p>
</div>
'
    ],
    5 => [
        'title' => 'Perfekt - dåtid',
        'content' => '
<h3>Perfekt - sammansatt dåtid</h3>
<p>Perfekt används för handlingar som har hänt och är avslutade. Det bildas med hjälpverb (hebben/zijn) + perfekt particip.</p>

<h4>📊 Bildning av perfekt particip:</h4>
<table class="grammar-table">
    <tr><th>Typ</th><th>Regel</th><th>Exempel</th></tr>
    <tr><td>Regelbundna (stark stam)</td><td>ge- + stam + -t</td><td>werken → gewerkt</td></tr>
    <tr><td>Regelbundna (svag stam)</td><td>ge- + stam + -d</td><td>wonen → gewoond</td></tr>
    <tr><td>Utan ge-</td><td>Verb med obetonad prefix</td><td>betalen → betaald</td></tr>
    <tr><td>Oregelbundna</td><td>Måste memoreras</td><td>gaan → gegaan</td></tr>
</table>

<h4>🔑 Vilket hjälpverb - hebben eller zijn?</h4>
<p><strong>Zijn</strong> används med:</p>
<ul>
    <li>Förflyttningsverb: gaan, komen, rijden, lopen, vliegen</li>
    <li>Förändring: worden, groeien, sterven</li>
    <li>Tillstånd: zijn, blijven</li>
</ul>
<p><strong>Hebben</strong> används med allt annat!</p>

<h4>💡 Exempel:</h4>
<div class="example">
    <p><strong>Med hebben:</strong><br>
    Ik heb vandaag <strong>gewerkt</strong>. (Jag har arbetat idag.)<br>
    Hij heeft een boek <strong>gelezen</strong>. (Han har läst en bok.)</p>
    
    <p><strong>Med zijn:</strong><br>
    Ik ben naar Amsterdam <strong>gegaan</strong>. (Jag har åkt till Amsterdam.)<br>
    Zij is oud <strong>geworden</strong>. (Hon har blivit gammal.)</p>
</div>

<h4>📋 Ordföljd i perfekt:</h4>
<p>Hjälpverbet står på plats 2, particip i slutet:</p>
<ul>
    <li>Ik <strong>heb</strong> gisteren hard <strong>gewerkt</strong>.</li>
    <li>Vandaag <strong>ben</strong> ik naar de winkel <strong>gegaan</strong>.</li>
</ul>
'
    ],
    // Lägg till fler lektioner här...
    10 => [
        'title' => 'Separerbara verb',
        'content' => '
<h3>Separerbara verb</h3>
<p>En speciell egenskap i nederländska är separerbara verb - verb med prefix som kan separeras i vissa situationer.</p>

<h4>📋 Vanliga separerbara prefix:</h4>
<table class="grammar-table">
    <tr><th>Prefix</th><th>Exempel</th><th>Betydelse</th></tr>
    <tr><td>aan-</td><td>aankomen</td><td>anlända</td></tr>
    <tr><td>af-</td><td>afwassen</td><td>diska</td></tr>
    <tr><td>mee-</td><td>meegaan</td><td>följa med</td></tr>
    <tr><td>op-</td><td>opstaan</td><td>stiga upp</td></tr>
    <tr><td>uit-</td><td>uitgaan</td><td>gå ut</td></tr>
    <tr><td>binnen-</td><td>binnenkomen</td><td>komma in</td></tr>
</table>

<h4>🔑 När separeras de?</h4>
<p><strong>JA - separation i:</strong></p>
<ul>
    <li>Presens: Ik sta om 7 uur <strong>op</strong>.</li>
    <li>Imperfekt: Ik stond om 7 uur <strong>op</strong>.</li>
    <li>Imperativ: Sta <strong>op</strong>!</li>
</ul>

<p><strong>NEJ - ingen separation i:</strong></p>
<ul>
    <li>Perfekt: Ik ben om 7 uur <strong>opgestaan</strong>.</li>
    <li>Infinitiv: Ik moet <strong>opstaan</strong>.</li>
    <li>Bisats: ...omdat ik <strong>opsta</strong>.</li>
</ul>

<h4>💡 Exempel:</h4>
<div class="example">
    <p><strong>uitgaan</strong> (gå ut):<br>
    Presens: Ik ga vanavond <strong>uit</strong>.<br>
    Perfekt: Ik ben gisteren <strong>uitgegaan</strong>.<br>
    Infinitiv: Ik wil <strong>uitgaan</strong>.</p>
</div>
'
    ],
    15 => [
        'title' => 'Bisatser och ordföljd',
        'content' => '
<h3>Bisatser och ordföljd</h3>
<p>I nederländska bisatser ändras ordföljden - verbet flyttas till slutet! Detta är annorlunda mot svenska.</p>

<h4>📋 Vanliga bisatskonjunktioner:</h4>
<table class="grammar-table">
    <tr><th>Konjunktion</th><th>Betydelse</th><th>Typ</th></tr>
    <tr><td>omdat</td><td>eftersom</td><td>orsak</td></tr>
    <tr><td>als</td><td>om/när</td><td>villkor/tid</td></tr>
    <tr><td>wanneer</td><td>när</td><td>tid</td></tr>
    <tr><td>dat</td><td>att</td><td>innehåll</td></tr>
    <tr><td>of</td><td>om</td><td>fråga</td></tr>
    <tr><td>terwijl</td><td>medan</td><td>tid</td></tr>
    <tr><td>hoewel</td><td>fastän</td><td>kontrast</td></tr>
</table>

<h4>🔑 Ordföljd i bisats:</h4>
<p><strong>Huvudregel: Verb sist i bisatsen!</strong></p>

<h4>💡 Jämförelse:</h4>
<div class="example">
    <p><strong>Huvudsats (V2):</strong><br>
    Ik <strong>ga</strong> niet naar het feest.<br>
    <em>(Jag går inte på festen.)</em></p>
    
    <p><strong>Bisats (verb sist):</strong><br>
    ...omdat ik niet naar het feest <strong>ga</strong>.<br>
    <em>(...eftersom jag inte går på festen.)</em></p>
    
    <p><strong>Helt exempel:</strong><br>
    Ik blijf thuis omdat ik ziek <strong>ben</strong>.<br>
    <em>(Jag stannar hemma eftersom jag är sjuk.)</em></p>
</div>

<h4>⚠️ Med hjälpverb:</h4>
<p>När det finns hjälpverb kommer båda i slutet:</p>
<div class="example">
    <p>...omdat ik morgen moet <strong>werken</strong>.<br>
    <em>(...eftersom jag måste arbeta imorgon.)</em></p>
    
    <p>...dat hij het boek heeft <strong>gelezen</strong>.<br>
    <em>(...att han har läst boken.)</em></p>
</div>
'
    ],
];

// Update lessons with theory content
$count = 0;
foreach ($theory_content as $lesson_num => $theory) {
    $stmt = $db->prepare("UPDATE lessons SET theory_content = ? WHERE language_id = 1 AND lesson_number = ?");
    $stmt->execute([json_encode($theory, JSON_UNESCAPED_UNICODE), $lesson_num]);
    
    if ($stmt->rowCount() > 0) {
        echo "✓ Lektion $lesson_num: {$theory['title']}\n";
        $count++;
    }
}

echo "\n✅ Teorimaterial tillagt för $count nederländska lektioner!\n";
echo "📚 Varje lektion har nu förklaringar, tabeller och exempel.\n";
