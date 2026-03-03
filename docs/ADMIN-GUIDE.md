# Livenet Admin Panel – User Guide

Simple guide to the admin panel: what each section does and **where it appears on the website**.

---

## How to open the admin panel

1. Go to: **`/login`** (e.g. `http://localhost:8000/login`).
2. Log in with your admin account.
3. You’ll land on the **Dashboard**. Use the left sidebar to open any section.

---

## Homepage map – where admin content appears

Use this to see which part of the admin controls which part of the site.

| **On the homepage / site** | **Controlled in admin** |
|---------------------------|--------------------------|
| **Hero** (top banner, “Apply for Connection”) | Fixed in design (no admin). |
| **Intro block** – “About Livenet Solutions” text | **Site Settings** → “Intro section (after hero)” → *About Livenet Solutions*. |
| **Intro block** – image on the right | **Site Settings** → “Homepage images” → *Decorative image 1*. |
| **“Internet Services” section** – title, subtitle, image next to Home/Business cards | **Home Sections** → edit section named **features**. |
| **“Internet Packages”** – Home plans (name, price, speed, features, image) | **Internet Plans** → **Home Internet** tab. |
| **“Internet Packages”** – Business plans | **Internet Plans** → **Business Internet** tab. |
| **“Why Choose Livenet”** (Fast & Reliable, Secure, 24/7 Support) | Fixed in design (no admin). |
| **“What Our Customers Say”** (testimonial quotes) | Fixed in design (no admin). *Testimonials* in admin are for future use. |
| **Stats row** (e.g. 99.9% Uptime, 50K+ Customers, 24/7 Support) | **Site Settings** → “Homepage stats” (Stat 1–3 number and label). |
| **“Ready to Get Connected?” CTA strip** | Fixed in design (no admin). |
| **Header** – logo, site name | **Site Settings** → Branding (Site name, Logo). |
| **Footer** – company name, phone, email, address | **Site Settings** → Contact. |
| **Footer** – social icons | **Site Settings** → Social links (Facebook, Twitter, LinkedIn URLs). |
| **Our Coverage page** – list of areas + map | **Coverage** (area names and map polygons). |
| **Our Coverage page** – decorative image in spotlight | **Site Settings** → “Homepage images” → *Decorative image 2*. |
| **Contact page** – map embed | **Site Settings** → “Contact page map” (Google Map embed URL). |
| **Apply for Connection** – where submissions go | **Site Settings** → Contact email; submissions also in **Application Requests**. |
| **Articles listing** (`/articles`) | **Articles** (create/edit posts; they appear on the Articles page). |
| **Home Internet page** (`/home-internet`) | Uses **Internet Plans** → Home Internet (same plans as on homepage). |
| **Business Internet page** (`/business-internet`) | Uses **Internet Plans** → Business Internet (same plans as on homepage). |

---

## Admin sections – what to do in each

### Dashboard
- **URL:** `/admin`
- **What it is:** Overview and quick links to Pages, Internet Plans, Articles, Testimonials.
- **Use it for:** Jumping to other sections.

---

### Pages
- **URL:** `/admin/pages`
- **What it is:** Create and edit custom pages (title, slug, content, hero, meta).
- **Where it appears:** These are for custom or future pages; the main site menu (Home, Home Internet, Business Internet, Our Coverage, Contact) is fixed.
- **Actions:** List all → **Add page** → fill title, slug, content, optional hero image and meta → Save. Edit or delete from the table.

---

### Home Sections
- **URL:** `/admin/home-sections`
- **What it is:** Blocks of content used on the homepage. The one used by the site is the section whose **name** is **features**.
- **Where it appears:** The **“Internet Services for Home & Business”** block (title, subtitle, and the image beside the two cards “Home Internet” and “Business Internet”).
- **Actions:**
  1. Open **Home Sections** → click **Edit** on the row named **features** (create it if it doesn’t exist).
  2. Set **Title** (e.g. “Internet Services for Home & Business”), **Subtitle**, and upload an **Image**. Tick **Active**.
  3. Save. Changes show in that homepage block.

---

### Home Internet (plans)
- **URL:** `/admin/internet-plans?type=home`
- **What it is:** Home internet packages (name, price, speed, features, optional image, “highlighted” badge).
- **Where it appears:** Homepage “Internet Packages” → “Home Internet” row, and the **Home Internet** page (`/home-internet`).
- **Actions:** Open **Home Internet** in sidebar → **Add Home plan** → fill name, price, currency, speed, features (one per line), optional image and “Highlighted” → Save. Reorder with **Sort order**. Edit/Delete from the table.

---

### Business Internet (plans)
- **URL:** `/admin/internet-plans?type=business`
- **What it is:** Business internet packages (same fields as home plans).
- **Where it appears:** Homepage “Internet Packages” → “Business Internet” row, and the **Business Internet** page (`/business-internet`).
- **Actions:** Same as Home Internet; use the **Business Internet** tab and “Add Business plan”.

---

### Articles
- **URL:** `/admin/articles`
- **What it is:** Blog-style posts (title, category, content, featured image, published/draft).
- **Where it appears:** The **Articles** page (`/articles`). Visitors can filter by category and search.
- **Actions:** **Add article** → set title, category (e.g. home, business, tips), content (rich editor), optional featured image, status (Published/Draft) → Save. Edit or delete from the list. Use “Remove image” on edit to clear the featured image.

---

### Testimonials
- **URL:** `/admin/testimonials`
- **What it is:** Customer quotes (name, role, quote, optional photo).
- **Where it appears:** Not yet shown on the homepage (the current “What Our Customers Say” block is fixed text). Use this for future testimonial blocks or other pages.

---

### Media Manager
- **URL:** `/admin/media`
- **What it is:** Upload and delete image/files. Files are stored for use across the site.
- **Where it appears:** Uploaded files can be used when editing plans, articles, home sections, or settings wherever an image is requested. This is a central library, not a specific place on the homepage.

---

### Coverage
- **URL:** `/admin/coverage`
- **What it is:** List of coverage area names and map shapes (polygons) for the “Our Coverage” page.
- **Where it appears:** **Our Coverage** page (`/our-coverage`): the “Areas We Cover” list and the map.
- **Actions:** Add/edit areas (name + polygon). Use the map tool to draw or adjust polygons. Geocode if you need to resolve addresses. Save so the list and map update on the site.

---

### Application Requests
- **URL:** `/admin/application-requests`
- **What it is:** List of “Apply for Connection” form submissions (name, email, phone, service, message).
- **Where it appears:** Nowhere on the public site; this is for you to read and follow up. The email used for notifications is set in **Site Settings** → Contact email.

---

### Site Settings
- **URL:** `/admin/settings`
- **What it is:** One place for branding, homepage text/images, contact info, social links, SEO, and contact page map.
- **Where it appears:** See the **Homepage map** table above. Main groups:
  - **Branding:** Site name, logo, favicon (header/footer, browser tab).
  - **Homepage stats:** The three numbers under testimonials (e.g. 99.9%, 50K+, 24/7).
  - **Intro section:** “About Livenet Solutions” paragraph (below hero).
  - **Homepage images:** Internet Services section image, Decorative image 1 (intro), Decorative image 2 (Our Coverage spotlight).
  - **Contact:** Email (for forms and Apply submissions), phone, address (footer and schema).
  - **Social links:** Facebook, Twitter, LinkedIn URLs (for footer or sharing).
  - **SEO & link preview:** Default meta title/description and share image (homepage).
  - **Contact page map:** Google Maps embed URL for the Contact page.
- **Actions:** Edit any section → **Save settings**. For images, use “Remove” to clear, or upload a new file to replace.

---

## Quick checklist – “I want to change…”

| I want to… | Go to… |
|------------|--------|
| Change logo or site name | **Site Settings** → Branding |
| Change the intro “About” text | **Site Settings** → Intro section |
| Change the “Internet Services” title or image | **Home Sections** → Edit **features** |
| Add or edit a home plan | **Internet Plans** → Home Internet |
| Add or edit a business plan | **Internet Plans** → Business Internet |
| Change the three stats (99.9%, 50K+, etc.) | **Site Settings** → Homepage stats |
| Change phone/email/address in footer | **Site Settings** → Contact |
| Change coverage areas or map | **Coverage** |
| Add an article | **Articles** → Add article |
| See who applied for connection | **Application Requests** |
| Change contact form / Apply email | **Site Settings** → Contact → Contact email |

---

## Summary

- **Homepage content** comes from **Site Settings** (intro, stats, images, contact), **Home Sections** (features block), and **Internet Plans** (home and business packages).
- **Our Coverage** comes from **Coverage** and **Site Settings** (Decorative image 2).
- **Articles** and **Application Requests** are managed in their own admin sections; **Pages** and **Testimonials** are for custom/future use.
- Use the **Homepage map** table at the top to see exactly which admin area controls each part of the homepage and main site.
