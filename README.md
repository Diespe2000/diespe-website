# DIESPE Omgevingsprojecten — WordPress-thema

Aangepast WordPress-thema voor **DIESPE Omgevingsprojecten** — *Partner in duurzame
omgevingsprojecten* (Lichtenvoorde). Gebaseerd op de huisstijl van diespe.nl:
Project-, Technisch- en Omgevingsmanagement van omgevings- en energieprojecten,
algemene voorwaarden volgens DNR 2011.

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
