<?php
require_once 'config.php';

$db = getLanguageDB();

echo "🇸🇦 Lägger till teorimaterial för arabiska lektioner...\n\n";

// Theory content for Arabic lessons
$theory_content = [
    1 => [
        'title' => 'Det arabiska alfabetet',
        'content' => '
<h3>Välkommen till arabiska!</h3>
<p>Arabiska är ett semitiskt språk som talas av över 400 miljoner människor i Mellanöstern och Nordafrika. Det skrivs från <strong>höger till vänster</strong> med ett eget alfabet på 28 bokstäver.</p>

<h4>📚 Viktiga skillnader från svenska:</h4>
<ul>
    <li><strong>Riktning:</strong> Text skrivs och läses från höger till vänster ←</li>
    <li><strong>Bokstavsformer:</strong> Varje bokstav har 2-4 olika former beroende på position (början, mitten, slutet, isolerad)</li>
    <li><strong>Vokaler:</strong> Korta vokaler skrivs inte ut i normal text (bara i läroböcker)</li>
    <li><strong>Rotmönster:</strong> Ord bildas från 3-bokstavsrötter med mönster</li>
</ul>

<h4>📊 Alfabetet (28 bokstäver):</h4>
<table class="grammar-table">
    <tr><th>Bokstav</th><th>Namn</th><th>Ljud</th><th>Exempel</th></tr>
    <tr><td>ا</td><td>alif</td><td>å, a</td><td>أنا (ana) = jag</td></tr>
    <tr><td>ب</td><td>ba</td><td>b</td><td>باب (bab) = dörr</td></tr>
    <tr><td>ت</td><td>ta</td><td>t</td><td>تفاح (tuffah) = äpple</td></tr>
    <tr><td>ث</td><td>tha</td><td>th (som think)</td><td>ثلاثة (thalatha) = tre</td></tr>
    <tr><td>ج</td><td>jim</td><td>dj (eller g)</td><td>جميل (jamil) = vacker</td></tr>
    <tr><td>ح</td><td>ha</td><td>h (från halsen)</td><td>حب (hubb) = kärlek</td></tr>
    <tr><td>خ</td><td>kha</td><td>ch (som tyska Bach)</td><td>خبز (khubz) = bröd</td></tr>
    <tr><td>د</td><td>dal</td><td>d</td><td>دار (dar) = hus</td></tr>
</table>

<h4>💡 Bokstavsformer exempel med ب (ba):</h4>
<div class="example">
    <p><strong>Isolerad:</strong> ب<br>
    <strong>I början:</strong> بـ (som i بيت = hus)<br>
    <strong>I mitten:</strong> ـبـ (som i كتاب = bok)<br>
    <strong>I slutet:</strong> ـب (som i حب = kärlek)</p>
</div>

<h4>🔑 Viktiga fakta:</h4>
<ul>
    <li>6 bokstäver kopplar inte ihop till nästa: ا د ذ ر ز و</li>
    <li>Korta vokaler (a, i, u) markeras med tecken över/under bokstäver</li>
    <li>Dubbelkonsonant markeras med shadda: ّ</li>
</ul>
'
    ],
    2 => [
        'title' => 'Pronomen och grundläggande fraser',
        'content' => '
<h3>Personliga pronomen i arabiska</h3>
<p>Arabiska har personliga pronomen för olika personer och kön. Observera att arabiska skiljer på maskulint och feminint i 2:a och 3:e person!</p>

<h4>📊 Personliga pronomen:</h4>
<table class="grammar-table">
    <tr><th>Arabiska</th><th>Uttal</th><th>Svenska</th><th>Person</th></tr>
    <tr><td>أنا</td><td>ana</td><td>jag</td><td>1:a singular</td></tr>
    <tr><td>أنتَ</td><td>anta</td><td>du (m)</td><td>2:a singular maskulin</td></tr>
    <tr><td>أنتِ</td><td>anti</td><td>du (f)</td><td>2:a singular feminin</td></tr>
    <tr><td>هو</td><td>huwa</td><td>han</td><td>3:e singular maskulin</td></tr>
    <tr><td>هي</td><td>hiya</td><td>hon</td><td>3:e singular feminin</td></tr>
    <tr><td>نحن</td><td>nahnu</td><td>vi</td><td>1:a plural</td></tr>
    <tr><td>أنتم</td><td>antum</td><td>ni (m)</td><td>2:a plural maskulin</td></tr>
    <tr><td>أنتنّ</td><td>antunna</td><td>ni (f)</td><td>2:a plural feminin</td></tr>
    <tr><td>هم</td><td>hum</td><td>de (m)</td><td>3:e plural maskulin</td></tr>
    <tr><td>هنّ</td><td>hunna</td><td>de (f)</td><td>3:e plural feminin</td></tr>
</table>

<h4>💡 Grundläggande hälsningar:</h4>
<div class="example">
    <p><strong>السلام عليكم</strong> (as-salamu alaykum) = Fred vare med er<br>
    <em>Svar: وعليكم السلام (wa alaykum as-salam)</em></p>
    
    <p><strong>صباح الخير</strong> (sabah al-khayr) = God morgon<br>
    <em>Svar: صباح النور (sabah an-nur)</em></p>
    
    <p><strong>مساء الخير</strong> (masa\' al-khayr) = God kväll<br>
    <em>Svar: مساء النور (masa\' an-nur)</em></p>
    
    <p><strong>كيف حالك؟</strong> (kayfa haluk?) = Hur mår du?<br>
    <em>Svar: بخير، الحمد لله (bi-khayr, al-hamdu lillah) = Bra, tack gode Gud</em></p>
</div>

<h4>⚠️ Viktigt att veta:</h4>
<ul>
    <li>Arabiska skiljer på maskulint och feminint i tilltal</li>
    <li>Använd أنتَ (anta) när du pratar med en man</li>
    <li>Använd أنتِ (anti) när du pratar med en kvinna</li>
    <li>Plural har också könsformer, men maskulin plural används ofta för blandade grupper</li>
</ul>
'
    ],
    3 => [
        'title' => 'Nominala meningar (är-meningar)',
        'content' => '
<h3>Nominala meningar i arabiska</h3>
<p>I arabiska finns två typer av meningar: nominala meningar (جملة اسمية) och verbala meningar. Nominala meningar beskriver tillstånd och <strong>behöver inte verbet "vara"</strong>!</p>

<h4>🔑 Struktur av nominal mening:</h4>
<p><strong>Subjekt (المبتدأ) + Predikat (الخبر)</strong></p>

<h4>📊 Exempel på nominala meningar:</h4>
<table class="grammar-table">
    <tr><th>Arabiska</th><th>Ordagrann</th><th>Svenska</th></tr>
    <tr><td>أنا طالب</td><td>Jag student</td><td>Jag är student</td></tr>
    <tr><td>هو طبيب</td><td>Han läkare</td><td>Han är läkare</td></tr>
    <tr><td>البيت كبير</td><td>Huset stort</td><td>Huset är stort</td></tr>
    <tr><td>الكتاب جديد</td><td>Boken ny</td><td>Boken är ny</td></tr>
    <tr><td>المدينة جميلة</td><td>Staden vacker</td><td>Staden är vacker</td></tr>
</table>

<h4>💡 Exempel med kongruens:</h4>
<div class="example">
    <p><strong>Maskulinum:</strong><br>
    الولد طويل (al-walad tawil) = Pojken är lång<br>
    الكتاب كبير (al-kitab kabir) = Boken är stor</p>
    
    <p><strong>Femininum:</strong><br>
    البنت طويلة (al-bint tawila) = Flickan är lång<br>
    المدينة كبيرة (al-madina kabira) = Staden är stor</p>
</div>

<h4>⚠️ Viktiga regler:</h4>
<ul>
    <li>Inget verb "vara" behövs i presens (nutid)</li>
    <li>Adjektivet måste matcha substantivets kön och tal</li>
    <li>Femininum bildas ofta genom att lägga till ة (ta marbuta)</li>
    <li>För dåtid och framtid används verbet كان (kana = vara)</li>
</ul>

<h4>📋 Negation:</h4>
<p>För att negera en nominal mening, använd <strong>ليس</strong> (laysa) = är inte:</p>
<div class="example">
    <p>أنا لست طالباً (ana lastu taliban) = Jag är inte student<br>
    هو ليس طبيباً (huwa laysa tabiban) = Han är inte läkare</p>
</div>
'
    ],
    5 => [
        'title' => 'Verbböjning - presens',
        'content' => '
<h3>Verb i presens (المضارع)</h3>
<p>Arabiska verb böjs för person, kön och tal genom prefix och suffix. Alla verb kommer från en 3-bokstavsrot (rotmönster är centralt i arabiska).</p>

<h4>📊 Verbböjning - exempel: كتب (kataba = skriva):</h4>
<table class="grammar-table">
    <tr><th>Person</th><th>Arabiska</th><th>Uttal</th><th>Svenska</th></tr>
    <tr><td>أنا</td><td>أكتب</td><td>aktubu</td><td>jag skriver</td></tr>
    <tr><td>أنتَ</td><td>تكتب</td><td>taktubu</td><td>du (m) skriver</td></tr>
    <tr><td>أنتِ</td><td>تكتبين</td><td>taktubina</td><td>du (f) skriver</td></tr>
    <tr><td>هو</td><td>يكتب</td><td>yaktubu</td><td>han skriver</td></tr>
    <tr><td>هي</td><td>تكتب</td><td>taktubu</td><td>hon skriver</td></tr>
    <tr><td>نحن</td><td>نكتب</td><td>naktubu</td><td>vi skriver</td></tr>
    <tr><td>أنتم</td><td>تكتبون</td><td>taktubuna</td><td>ni skriver</td></tr>
    <tr><td>هم</td><td>يكتبون</td><td>yaktubuna</td><td>de (m) skriver</td></tr>
</table>

<h4>🔑 Prefix i presens:</h4>
<ul>
    <li><strong>أ</strong> (a-) = jag</li>
    <li><strong>ت</strong> (ta-) = du, hon, ni</li>
    <li><strong>ي</strong> (ya-) = han, de</li>
    <li><strong>ن</strong> (na-) = vi</li>
</ul>

<h4>💡 Rotmönstret:</h4>
<div class="example">
    <p><strong>Rot:</strong> ك-ت-ب (k-t-b) = relaterat till skrivande<br>
    <strong>Verb:</strong> كتب (kataba) = skriva<br>
    <strong>Substantiv:</strong> كتاب (kitab) = bok<br>
    <strong>Substantiv:</strong> مكتب (maktab) = skrivbord, kontor<br>
    <strong>Substantiv:</strong> كاتب (katib) = skribent</p>
    
    <p>Samma rot ger ord med relaterad betydelse!</p>
</div>

<h4>📋 Vanliga verb:</h4>
<table class="grammar-table">
    <tr><th>Infinitiv</th><th>Rot</th><th>Presens (jag)</th><th>Betydelse</th></tr>
    <tr><td>كتب</td><td>ك-ت-ب</td><td>أكتب</td><td>skriva</td></tr>
    <tr><td>قرأ</td><td>ق-ر-أ</td><td>أقرأ</td><td>läsa</td></tr>
    <tr><td>ذهب</td><td>ذ-ه-ب</td><td>أذهب</td><td>gå</td></tr>
    <tr><td>أكل</td><td>أ-ك-ل</td><td>آكل</td><td>äta</td></tr>
    <tr><td>شرب</td><td>ش-ر-ب</td><td>أشرب</td><td>dricka</td></tr>
</table>
'
    ],
    10 => [
        'title' => 'Bestämd och obestämd form',
        'content' => '
<h3>Bestämd och obestämd artikel</h3>
<p>Arabiska har ingen obestämd artikel (som "en/ett"). För bestämd form används prefixet <strong>ال</strong> (al-) = "den/det/de".</p>

<h4>📊 Jämförelse:</h4>
<table class="grammar-table">
    <tr><th>Obestämd</th><th>Uttal</th><th>Bestämd</th><th>Uttal</th><th>Svenska</th></tr>
    <tr><td>كتاب</td><td>kitab</td><td>الكتاب</td><td>al-kitab</td><td>en bok / boken</td></tr>
    <tr><td>بيت</td><td>bayt</td><td>البيت</td><td>al-bayt</td><td>ett hus / huset</td></tr>
    <tr><td>مدينة</td><td>madina</td><td>المدينة</td><td>al-madina</td><td>en stad / staden</td></tr>
    <tr><td>طالب</td><td>talib</td><td>الطالب</td><td>at-talib</td><td>en student / studenten</td></tr>
</table>

<h4>🌙 Solbokstäver och månbokstäver:</h4>
<p>Det finns 14 "solbokstäver" där <strong>l</strong> i al- assimileras:</p>

<div class="example">
    <p><strong>Solbokstäver:</strong> ت ث د ذ ر ز س ش ص ض ط ظ ل ن</p>
    
    <p><strong>Exempel:</strong><br>
    شمس (shams) + ال = الشمس uttalas <strong>ash-shams</strong> (inte al-shams)<br>
    طالب (talib) + ال = الطالب uttalas <strong>at-talib</strong> (inte al-talib)</p>
    
    <p><strong>Månbokstäver:</strong> Alla andra 14 bokstäver<br>
    قمر (qamar) + ال = القمر uttalas <strong>al-qamar</strong><br>
    بيت (bayt) + ال = البيت uttalas <strong>al-bayt</strong></p>
</div>

<h4>💡 Användning:</h4>
<ul>
    <li><strong>Obestämd:</strong> Första gången något nämns, eller generellt</li>
    <li><strong>Bestämd:</strong> Specifikt känt objekt, eller med possessiv</li>
</ul>

<h4>⚠️ Kongruens med adjektiv:</h4>
<div class="example">
    <p>كتاب كبير (kitab kabir) = en stor bok<br>
    الكتاب الكبير (al-kitab al-kabir) = den stora boken</p>
    
    <p><strong>Båda</strong> substantiv och adjektiv får ال!</p>
</div>
'
    ],
    15 => [
        'title' => 'Dual (tvåtal)',
        'content' => '
<h3>Dual - formen för två</h3>
<p>Arabiska har en speciell form för exakt två av något, kallad <strong>dual</strong> (المثنى). Detta är unikt för arabiska och skiljer sig från singular och plural!</p>

<h4>📊 Bildning av dual:</h4>
<table class="grammar-table">
    <tr><th>Form</th><th>Ändelse</th><th>Exempel (bok)</th><th>Uttal</th></tr>
    <tr><td>Singular</td><td>-</td><td>كتاب</td><td>kitab</td></tr>
    <tr><td>Dual nominativ</td><td>-ان</td><td>كتابان</td><td>kitaban</td></tr>
    <tr><td>Dual ackusativ/genitiv</td><td>-ين</td><td>كتابين</td><td>kitabayn</td></tr>
    <tr><td>Plural</td><td>varierar</td><td>كتب</td><td>kutub</td></tr>
</table>

<h4>💡 Fler exempel:</h4>
<div class="example">
    <p><strong>طالب</strong> (student)<br>
    En student: طالب (talib)<br>
    Två studenter: طالبان (taliban) / طالبين (talibayn)<br>
    Flera studenter: طلاب (tullab)</p>
    
    <p><strong>يوم</strong> (dag)<br>
    En dag: يوم (yawm)<br>
    Två dagar: يومان (yawman) / يومين (yawmayn)<br>
    Flera dagar: أيام (ayyam)</p>
</div>

<h4>🔑 När används dual?</h4>
<ul>
    <li>För exakt två av något: "två böcker", "två studenter"</li>
    <li>Kroppdelar som kommer i par: ögon, öron, händer, fötter</li>
    <li>Måste användas - man kan inte säga "två" + plural</li>
</ul>

<h4>📋 Dual med kroppdelar:</h4>
<table class="grammar-table">
    <tr><th>Singular</th><th>Dual</th><th>Svenska</th></tr>
    <tr><td>عين (ayn)</td><td>عينان (aynan)</td><td>ögon</td></tr>
    <tr><td>أذن (udhun)</td><td>أذنان (udhnan)</td><td>öron</td></tr>
    <tr><td>يد (yad)</td><td>يدان (yadan)</td><td>händer</td></tr>
    <tr><td>رجل (rijl)</td><td>رجلان (rijlan)</td><td>fötter</td></tr>
</table>

<h4>⚠️ Observera:</h4>
<p>Verb och adjektiv går till <strong>plural</strong> efter dual substantiv:</p>
<div class="example">
    <p>الطالبان يدرسان (at-taliban yadrusani) = De två studenterna studerar<br>
    <em>Verbet har dual-ändelse (-ani)</em></p>
</div>
'
    ],
    20 => [
        'title' => 'Broken plural (oregelbunden plural)',
        'content' => '
<h3>Broken Plural (جمع التكسير)</h3>
<p>Arabiska har två sätt att bilda plural: sound plural (regelbudet med ändelser) och <strong>broken plural</strong> där ordets inre struktur ändras. Broken plural är vanligast!</p>

<h4>📊 Jämförelse:</h4>
<table class="grammar-table">
    <tr><th>Typ</th><th>Singular</th><th>Plural</th><th>Mönster</th></tr>
    <tr><td colspan="4"><strong>Sound Plural (regelbunden):</strong></td></tr>
    <tr><td>Maskulin</td><td>مسلم (muslim)</td><td>مسلمون (muslimun)</td><td>-ون/-ين</td></tr>
    <tr><td>Feminin</td><td>مسلمة (muslima)</td><td>مسلمات (muslimat)</td><td>-ات</td></tr>
    <tr><td colspan="4"><strong>Broken Plural (oregelbunden):</strong></td></tr>
    <tr><td>-</td><td>كتاب (kitab) bok</td><td>كتب (kutub)</td><td>CuCuC</td></tr>
    <tr><td>-</td><td>ولد (walad) pojke</td><td>أولاد (awlad)</td><td>aCCaC</td></tr>
    <tr><td>-</td><td>رجل (rajul) man</td><td>رجال (rijal)</td><td>CiCaC</td></tr>
    <tr><td>-</td><td>بيت (bayt) hus</td><td>بيوت (buyut)</td><td>CuCuC</td></tr>
</table>

<h4>🔑 Vanliga broken plural-mönster:</h4>
<div class="example">
    <p><strong>Mönster: فُعُل (CuCuC)</strong><br>
    كتاب → كتب (böcker)<br>
    بيت → بيوت (hus)<br>
    درس → دروس (lektioner)</p>
    
    <p><strong>Mönster: أَفْعَال (aCCaC)</strong><br>
    ولد → أولاد (pojkar)<br>
    يوم → أيام (dagar)<br>
    قلم → أقلام (pennor)</p>
    
    <p><strong>Mönster: فِعَال (CiCaC)</strong><br>
    رجل → رجال (män)<br>
    جبل → جبال (berg)</p>
</div>

<h4>💡 När används vilken?</h4>
<ul>
    <li><strong>Sound plural:</strong> Mest för adjektiv, particip, professioner</li>
    <li><strong>Broken plural:</strong> Mest för vanliga substantiv - måste memoreras!</li>
    <li>Inget säkert sätt att förutsäga - lär dig plural tillsammans med singular</li>
</ul>

<h4>⚠️ Tips för inlärning:</h4>
<p>Lär dig alltid substantiv med deras plural:</p>
<div class="example">
    <p>طالب / طلاب (student/studenter)<br>
    معلم / معلمون (lärare)<br>
    سيارة / سيارات (bil/bilar)</p>
</div>
'
    ],
];

// Update lessons with theory content
$count = 0;
foreach ($theory_content as $lesson_num => $theory) {
    $stmt = $db->prepare("UPDATE lessons SET theory_content = ? WHERE language_id = 4 AND lesson_number = ?");
    $stmt->execute([json_encode($theory, JSON_UNESCAPED_UNICODE), $lesson_num]);
    
    if ($stmt->rowCount() > 0) {
        echo "✓ Lektion $lesson_num: {$theory['title']}\n";
        $count++;
    }
}

echo "\n✅ Teorimaterial tillagt för $count arabiska lektioner!\n";
echo "🇸🇦 Varje lektion har nu förklaringar om alfabet, grammatik och kulturella detaljer.\n";
