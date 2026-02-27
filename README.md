# Livenet Solutions – Website

A modern, responsive multi-page website for **Livenet Solutions**, an internet service provider (Home Internet & Business Internet). Design is inspired by [DreamHost](https://www.dreamhost.com/) with a top contact bar similar to [Veenet Africa](https://veenet.africa/).

The site is built with **Laravel Blade** templates. Static HTML copies are also in the project root for reference or non-Laravel hosting.

## Blade structure (Laravel)

| Item | Path |
|------|------|
| Layout | `resources/views/layouts/app.blade.php` |
| Partials | `resources/views/partials/` (top-bar, header, footer) |
| Pages | `resources/views/home.blade.php`, `home-internet.blade.php`, `business-internet.blade.php`, `articles.blade.php`, `contact.blade.php` |
| Routes | `routes/web.php` |
| CSS | `public/css/styles.css` (same as `css/styles.css`) |

**Named routes:** `home`, `home-internet`, `business-internet`, `articles`, `contact`, `contact.store` (POST).

## Pages

| Page | Route / URL | Description |
|------|-------------|-------------|
| Home | `/` | Hero, features, testimonials, CTAs |
| Home Internet | `/home-internet` | Plans, benefits, pricing, CTA |
| Business Internet | `/business-internet` | SLA, uptime, dedicated support, pricing table |
| Articles | `/articles` | Blog listing, search, category filters |
| Contact Us | `/contact` | Contact form, company details, map placeholder |

## Design

- **Brand colors:** Blues and whites (high-speed internet theme)
- **Fonts:** DM Sans (body), Plus Jakarta Sans (headings) via Google Fonts
- **Layout:** Sticky transparent-style header, full-width hero, clean sections, footer with links and newsletter
- **Responsive:** Mobile-friendly with hamburger menu and stacked layouts

## Header

- **Top bar:** Phone, email, physical address (veenet-style)
- **Main nav:** Home | Home Internet | Business Internet | Articles | Contact Us
- **CTA button:** “Apply for Connection” in the menu

## SEO

- Title and meta description on every page
- Canonical URLs
- H1/H2 heading structure
- SEO-friendly paths: `/home-internet`, `/business-internet`, `/articles`, `/contact`
- Internal links between pages
- Alt text / `aria-label` for visuals (hero uses CSS pattern; article cards use `aria-label` on thumb divs)
- JSON-LD: Organization (home), BreadcrumbList (inner pages)

## Images & Icons

The site uses:

- **Hero:** CSS gradient and subtle pattern (no image). For a custom hero image, add a full-width photo (e.g. fiber cables, family using internet) and set it as `background-image` in `.hero`.
- **Feature cards:** Emoji icons (🏠, 🏢, ⚡, etc.). Replace with SVG or icon font by swapping the `.icon` content and optionally adding `<img alt="...">` or icon fonts.
- **Article thumbnails:** Gradient blocks with emoji. Replace with real images: add an `<img>` inside `.thumb` with descriptive `alt` text.
- **Logo:** Text “Livenet Solutions”. Add `images/logo.png` and use `<img src="images/logo.png" alt="Livenet Solutions">` in the header and footer.

Suggested image specs:

- Hero: 1920×800px, high-speed internet or happy customers
- Article thumbnails: 640×400px per post
- Logo: SVG or PNG with transparent background, ~200×50px

## Google Map

On `contact.html`, the map is a placeholder. To embed Google Maps:

1. Open [Google Maps](https://www.google.com/maps), find your location, click Share → Embed map.
2. Copy the `<iframe>` code.
3. Replace the placeholder div in the “Find Us” section with that iframe.

## Running Locally

**With Laravel** (Blade templates):

```bash
composer install
cp .env.example .env
php artisan key:generate
php artisan serve
```

Then visit `http://localhost:8000`. Ensure `resources/views`, `routes/web.php`, and `public/css/styles.css` are in place (they are in this repo).

**Static HTML only:** Open `index.html` in a browser, or run:

```bash
npx serve .
# or: python -m http.server 8080
```

Then visit the URL shown (e.g. `http://localhost:3000`).

## File Structure

```
livenet/
├── index.html
├── home-internet.html
├── business-internet.html
├── articles.html
├── contact.html
├── css/
│   └── styles.css
├── images/          (optional – add logo, hero, article images)
└── README.md
```

## Customization

- **Phone/email/address:** Update in the top bar and footer on every page (or use a build step to include a shared partial).
- **Form:** `contact.html` form currently shows an alert on submit. Point the form `action` to your backend or form service (e.g. Formspree, Netlify Forms).
- **Newsletter:** Hook the footer “Subscribe” inputs to your email provider’s API or signup endpoint.
