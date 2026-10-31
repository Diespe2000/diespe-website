# DIESPE Omgevingsprojecten — WordPress-thema

## Preview direct bekijken (zonder zip)

Zodra GitHub Pages aanstaat, bekijk je de site direct in de browser:

- Homepage: <https://diespe2000.github.io/diespe-website/>
- Projectenpagina: <https://diespe2000.github.io/diespe-website/projecten.html>

**Eenmalig activeren (1 klik):** ga in deze repository naar
**Settings → Pages → Source → "GitHub Actions"** en kies eventueel de workflow
"Preview-site via GitHub Pages". Daarna wordt bij elke push de preview automatisch
ververst — geen downloaden of uitpakken meer nodig.

Aangepast WordPress-thema voor **DIESPE Omgevingsprojecten** — *Partner in duurzame
omgevingsprojecten* (Lichtenvoorde). Gebaseerd op de huisstijl van diespe.nl:
Project-, Technisch- en Omgevingsmanagement van omgevings- en energieprojecten,
algemene voorwaarden volgens DNR 2011.

## Huisstijl

Het thema gebruikt de officiële huisstijl van DIESPE Management & Advies:

| Kleur | HEX |
|---|---|
| Oranje | `#ff8000` |
| Donkerblauw | `#001f99` |
| Lichtblauw | `#2b97d9` |
| Groen | `#41d92c` |
| Zwart | `#1a1a1a` |

- **Lettertype logo**: Tw Cen MT Condensed Extra Bold. Bezoekers zonder dit font zien
  een gebundelde condensed webfont (Oswald, SIL OFL 1.1) zodat het woordmerk overal
  gelijk rendert — zie `assets/css/fonts.css` en `assets/fonts/`.
- **Lettertype documenten**: Nirmala UI (fallback: Segoe UI / systeemfonts)
- **Favicon & app-iconen**: complete set in `assets/img/favicons/` (favicon.ico,
  16/32/48/64/180/192/512 px PNG, `site.webmanifest` voor PWA-installatie). WordPress
  laadt ze automatisch via `functions.php`.

## Voorbeeldinhoud (WXR-import)

In `sample-content/` staan twee WordPress-importbestanden met de volledige
inhoudelijke content van DIESPE:

- `diespe-portfolio.xml` — **44 projecten** uit het projectenportfolio, verdeeld over
  vijf projecttypes: Watersysteem, Energietransitie, Waterketen, Waterveiligheid en
  Overige. Elk project bevat omschrijving, opdrachtgever, projectfasen, rol,
  contractvorm en een kaartlink.
- `diespe-pages.xml` — de pagina **Over Diederik Speksnijder** (persoonlijk profiel,
 volledige werkervaring, secundaire activiteiten, opleidingen en trainingen), de
  pagina **Werkvelden** en een welkomstbericht.

**Importeren:** ga in WordPress naar **Tools → Importeren → WordPress** (installeer
de importeur bij eerste gebruik), upload beide bestanden en vink "Download and import
file attachments" niet aan (alle content is tekst). Importeer eerst
`diespe-pages.xml`, daarna `diespe-portfolio.xml`.

**Projectcategorieën:** Watersysteem, Energietransitie, Waterketen, Waterveiligheid,
Utiliteit — dezelfde namen als de werkgebieden-balk op de homepage (plus de term
Natuurherstel, klaar voor toekomstige projecten).

**Projectafbeeldingen:** heeft een project geen eigen uitgelichte afbeelding, dan toont
het thema automatisch een categorie-illustratie in huisstijl (zie
`assets/img/projecten/`). Eigen foto's uploaden via het project-scherm heeft altijd
de voorkeur.

**Nieuwsberichten:** `diespe-pages.xml` bevat naast de pagina's ook drie nieuwsberichten
op basis van het CV en portfolio, plus menu-items voor hoofd- en footermenu. Wijs na
import het menu toe via **Weergave → Menu's** (menu "Hoofdmenu" → locatie *Hoofdmenu*).

## Homepage-teksten aanpassen

Alle inhoudelijke teksten op de homepage zijn **zonder code aan te passen** via
**Customizer → Homepage-teksten** (Weergave → Customizer):

- Hero: titel en tekst
- Werkgebieden-balk: één werkgebied per regel (vul je eigen lijst in)
- Werkvelden: intro en per kaart titel, omschrijving, punten (één per regel) en
  praktijkvoorbeeld
- Over DIESPE: intro, naam en twee tekstblokken

Laat je een veld leeg, dan geldt de ingebouwde standaardtekst. De Customizer toont
live een voorvertoning naast het aanpassen.

## Projecten toevoegen

Nieuwe projecten voeg je in WordPress toe via **Projecten → Nieuw project**:

1. **Titel + omschrijving** invullen (Gutenberg)
2. **Projectgegevens**-box: opdrachtgever, projectfasen, rol en contractvorm — deze verschijnen op de tegel-achterkant en de projectpagina
3. **Projecttype** (rechts) aanvinken: Watersysteem, Energietransitie, Waterketen, Waterveiligheid, Gebiedsontwikkeling of Natuurherstel
4. **Uitgelichte afbeelding**: eigen projectfoto uploaden; zonder foto toont de tegel automatisch de categorie-illustratie
5. Publiceren — de tegel verschijnt direct in het projectenoverzicht (nieuwste bovenaan, de drie showcase-projecten op de homepage blijven apart ingesteld)

Het overzicht is een naadloos tegelmozaiek met filterknoppen per categorie; tegels draaien bij een klik om met de projectgegevens.

## Contactformulier

De contactpagina toont **automatisch** een formulier:

- **Zonder plugin**: een ingebouwd formulier (shortcode `[diespe_contactformulier]`)
  met honeypot- en nonce-spambescherming. Verstuurde berichten gaan naar het
  e-mailadres uit de Customizer (**Contactgegevens → E-mailadres*) of anders het
  beheerdersadres.
- **Met Contact Form 7**: na activering van de plugin CF7 (Plugins → Nieuwe → "Contact
  Form 7") en aanmaken van een formulier (Contact → Contactformulieren) toont de
  contactpagina automatisch het eerste CF7-formulier; het ingebouwde formulier
  schakelt zichzelf uit.

### Spambescherming

Het ingebouwde formulier beschermt met honeypot, tijdcheck en nonce. Optioneel op
top: **Cloudflare Turnstile** (gratis, privacyvriendelijk):

1. Maak een Turnstile-site aan op [dash.cloudflare.com](https://dash.cloudflare.com) → Turnstile
   (kies widget "Managed", domein: je websitedomein)
2. Vul de **site-sleutel** en **secret-sleutel** in via **Customizer → Contactgegevens →
   Turnstile site-/secret-sleutel**
3. Vanaf dat moment verschijnt de Turnstile-controle in het formulier en wordt elke
   inzending serverzijde geverifieerd. Zonder sleutels werkt het formulier gewoon
   met honeypot + tijdcheck.
- **Strepen**: de kenmerkende 4-kleurige streep (oranje, groen, lichtblauw, donkerblauw)
  komt terug onder de header, in de hero en boven de footer.
- **Logo**: bij gebrek aan een geüpload logo toont het thema een gestapeld woordmerk
  (DIESPE in oranje/donkerblauw met "omgevingsprojecten" eronder). Het officiële
  logo staat in `assets/img/logo-diespe.svg` — upload het via de Customizer
  (Site-identiteit) voor het echte logo.

## Installatie

1. Zip de map `diespe` (met daarin `style.css` en `functions.php`).
2. Ga in WordPress naar **Weergave → Thema's → Thema toevoegen → Thema uploaden**.
3. Upload de zip en klik op **Activeren**.
4. Ga naar **Instellingen → Permanente links** en klik opslaan (voor de projecten-URL's).

## Na activering

- **Instellingen → Lezen**: kies een statische pagina als voorpagina (het thema toont
  dan de homepage-secties: hero, werkvelden, projecten, over en nieuws).
- **Weergave → Menu's**: maak een hoofdmenu (bijv. Home, Projecten, Nieuws, Contact)
  en wijs dit toe aan de locatie *Hoofdmenu*; maak eventueel een apart footermenu.
- **Weergave → Projecten**: beheer hier de projectportfolio; wijzig de projecttype
  via **Projecttypes** (bijv. Omgeving, Energie).
- **Weergave → Customizer → Contactgegevens**: stel telefoonnummer, e-mailadres,
  adres, postcode/plaats en payoff in (standaard: Mercurius 19, 7131 HS
  Lichtenvoorde).
- Maak een pagina met slug `contact` aan en wijs het sjabloon *Contactpagina* toe
  (of gebruik de ingebouwde contactgegevens uit de Customizer).
- Upload een logo via **Customizer → Site-identiteit**.

## Structuur

| Bestand | Functie |
|---|---|
| `style.css` | Header + volledige thema-stijl (CSS-variabelen, responsive) |
| `functions.php` | Setup, CPT *Projecten*, customizer-contactvelden, widgets |
| `front-page.php` | Homepage met hero, werkvelden, projecten, over, nieuws |
| `archive-diespe_project.php` / `single-diespe_project.php` | Projectenoverzicht en -detail |
| `page-contact.php` | Contactpagina met bedrijfsgegevens |
| `archive.php`, `single.php`, `page.php`, `search.php`, `404.php` | Overige sjablonen |
| `template-parts/` | Project- en berichtkaarten |
| `assets/js/nav.js` | Mobiel hamburgermenu |

## Kenmerken

- Custom Post Type **Projecten** met taxonomy **Projecttypes** (Gutenberg-ready).
- Responsive, toegankelijk (skip link, ARIA, toetsenbordnavigatie).
- Contactgegevens centraal beheerbaar via de Customizer.
- Nederstalige teksten, vertaalbaar via text domain `diespe`.
