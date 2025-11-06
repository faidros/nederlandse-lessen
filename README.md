# Nederlandse Lessen - Duolingo-klon för nederländska (B1)

En komplett webbapplikation för att lära sig nederländska på B1-nivå, inspirerad av Duolingo.

## 🌟 Funktioner

- **Användarhantering**: Registrering, inloggning och framstegsspårning
- **15 Tematiska lektioner**: Varje lektion fokuserar på olika ämnen (resor, restaurang, arbete, etc.)
- **Flera övningstyper**:
  - Flervalsfrågor (multiple choice)
  - Översättningsövningar
  - Ordna ord i rätt ordning
  - Fyll i luckor
- **Framstegsspårning**: Följ antal genomförda lektioner och resultat
- **Responsiv design**: Optimerad för surfplattor och mobiler
- **Modulärt språksystem**: Lägg enkelt till fler språk

## 📋 Tekniska krav

- PHP 7.4 eller högre
- SQLite3 (ingår i PHP)
- Webbserver (Apache/Nginx eller gratis webhotell som Epizy)

## 🚀 Installation

### 1. Ladda upp filer
Ladda upp alla filer till din webbserver (t.ex. via FTP till Epizy).

### 2. Sätt rättigheter
Säkerställ att mappen `database/` är skrivbar:
```bash
chmod 755 database
```

### 3. Initiera databaser
Kör setup-skriptet genom att besöka i din webbläsare:
```
http://din-domän.se/setup.php
```

Eller via kommandoraden:
```bash
php setup.php
```

### 4. Lägg till lektioner
Kör skriptet för att populera databasen med nederländska lektioner:
```
http://din-domän.se/populate_lessons.php
```

Eller via kommandoraden:
```bash
php populate_lessons.php
```

### 5. Klart!
Besök `http://din-domän.se/` för att börja använda applikationen.

## 📁 Filstruktur

```
nederlands/
├── config.php              # Konfiguration och hjälpfunktioner
├── setup.php               # Databasinitiering
├── populate_lessons.php    # Lägg till lektioner
├── index.php               # Startsida
├── register.php            # Registrering
├── login.php               # Inloggning
├── logout.php              # Utloggning
├── dashboard.php           # Användarpanel
├── lesson.php              # Lektionsvy med övningar
├── .htaccess               # Apache-konfiguration
├── database/
│   ├── init_users.sql      # Användarschema
│   ├── init_languages.sql  # Språkschema
│   ├── users.db            # Användardatabas (skapas automatiskt)
│   └── languages.db        # Språkdatabas (skapas automatiskt)
├── includes/
│   ├── header.php          # Header-komponent
│   ├── footer.php          # Footer-komponent
│   ├── login.php           # Inloggningslogik
│   ├── register.php        # Registreringslogik
│   └── save_progress.php   # Spara framsteg
├── css/
│   └── style.css           # All styling
└── js/
    └── main.js             # JavaScript-funktionalitet
```

## 🎓 De 15 lektionerna

1. **Op reis** - Resor och transport
2. **In het restaurant** - Mat och dryck
3. **Op het werk** - Arbete och yrkesliv
4. **Gezondheid** - Hälsa och välmående
5. **Winkelen** - Shopping och priser
6. **Het weer** - Väder
7. **Vrije tijd** - Fritid och hobbies
8. **Familie en vrienden** - Familj och vänner
9. **Huishouden** - Hem och hushåll
10. **Verleden tijd** - Grammatik: förfluten tid
11. **Toekomst plannen** - Framtidsplaner
12. **Cultuur en tradities** - Nederländsk kultur
13. **Meningen geven** - Åsikter och diskussion
14. **Telefoon en email** - Kommunikation
15. **Milieu en duurzaamheid** - Miljö och hållbarhet

## 🔧 Lägga till fler språk

Systemet är byggt för att enkelt kunna utökas med fler språk:

1. Lägg till språket i databasen:
```sql
INSERT INTO languages (code, name, flag_emoji, active) VALUES ('es', 'Spanska', '🇪🇸', 1);
```

2. Skapa lektioner för det nya språket (använd `populate_lessons.php` som mall)

3. Användare kan sedan välja språk i sitt konto

## 🎨 Anpassning

### Ändra färgschema
Redigera CSS-variabler i `css/style.css`:
```css
:root {
    --primary-color: #58cc02;    /* Huvudfärg */
    --secondary-color: #1cb0f6;  /* Sekundärfärg */
    /* ... */
}
```

### Lägga till nya övningstyper
1. Lägg till ny typ i `lesson.php` (JavaScript)
2. Skapa motsvarande rendering-funktion
3. Lägg till i lektionsdatabasen

## 🔒 Säkerhet

- Lösenord hashas med `password_hash()` (bcrypt)
- SQL-injektionsskydd via PDO prepared statements
- XSS-skydd via `htmlspecialchars()`
- Session-säkerhet med HttpOnly cookies
- Databaser är skyddade via `.htaccess`

## 📱 Responsiv design

Appen är optimerad för:
- 📱 Mobiltelefoner
- 📱 Surfplattor
- 💻 Desktop

## 🌐 Webbhotell (Epizy)

Applikationen är testad och fungerar på gratis webhotell som Epizy:
- Använder SQLite istället för MySQL (inga databaskonfigurationer behövs)
- Ingen e-postfunktionalitet (epizy kan inte skicka e-post)
- Lätt att ladda upp via FTP

## 🤝 Bidra

Vill du lägga till fler lektioner, språk eller funktioner? Fantastiskt!

## 📄 Licens

Fri att använda för personligt bruk.

## 💡 Tips

- Gör minst 1-2 lektioner per dag för bästa resultat
- Repetera lektioner för att förbättra ditt resultat
- Använd översättningsverktygen som stöd
- Öva högt när du läser nederländska meningar

---

**God tur med din nederländska-inlärning! 🇳🇱**
