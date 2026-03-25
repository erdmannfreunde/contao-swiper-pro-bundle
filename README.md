# Contao Swiper Pro Bundle

Eine Contao-Erweiterung zum Erstellen von Swiper-Slidern mit individuellen YAML-Konfigurationen.

## Funktionen

- **Swiper-Einstellungen** als Backend-Modul zur zentralen Verwaltung von Slider-Konfigurationen
- **Inhaltselement „Swiper Pro"** mit Unterstützung für verschachtelte Inhaltselemente (jedes Kind-Element wird zu einer Slide)
- Konfiguration über YAML im ACE-Editor
- Pagination und Navigation (Prev/Next) sind standardmäßig enthalten
- Swiper CSS und JS werden automatisch geladen (`contao-components/swiper`)

## Voraussetzungen

- PHP >= 8.2
- Contao >= 5.3
- [contao-components/swiper](https://packagist.org/packages/contao-components/swiper)

## Installation

```bash
composer require erdmannfreunde/contao-swiper-pro-bundle
```

Alternativ über den **Contao Manager**: Nach `erdmannfreunde/contao-swiper-pro-bundle` suchen und installieren.

## Verwendung

### 1. Swiper-Konfiguration anlegen

Im Backend unter **Layout → Swiper-Einstellungen** eine neue Konfiguration erstellen. Die Konfiguration wird im YAML-Format eingegeben und entspricht den [Swiper-Parametern](https://swiperjs.com/swiper-api#parameters):

```yaml
slidesPerView: 3
spaceBetween: 20
loop: true
autoplay:
    delay: 3000
    disableOnInteraction: false
breakpoints:
    768:
        slidesPerView: 2
    480:
        slidesPerView: 1
```

### 2. Inhaltselement erstellen

Ein neues Inhaltselement vom Typ **Swiper Pro** erstellen und die gewünschte Swiper-Konfiguration auswählen. Anschließend Kind-Elemente anlegen – jedes wird automatisch zu einer Slide.

## Template-Anpassung

Das Standard-Template `content_element/swiper_pro.html.twig` kann im Projekt überschrieben werden. Folgende Blöcke stehen zur Verfügung:

| Block | Beschreibung |
|---|---|
| `content` | Gesamter Slider-Inhalt |
| `slides` | Schleife über alle Slides |
| `slide` | Einzelne Slide |
| `slide_inner` | Inhalt einer Slide |
| `controls` | Navigation (Prev/Next-Buttons) |
| `init_options` | Standard-JavaScript-Optionen für die Swiper-Initialisierung |
| `script` | JavaScript-Block (Swiper-Library + Initialisierung) |
| `style` | CSS-Block (Swiper-Stylesheet) |

## Lizenz

MIT
