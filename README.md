# DIESPE Omgevingsprojecten — WordPress-thema

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
Utiliteit, Natuurherstel, Overige — dezelfde namen als de werkgebieden-balk op de
homepage. Wijs projecten handmatig toe aan Utiliteit/Natuurherstel zodra van
toepassing.

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
