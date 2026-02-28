# Livenet CMS Admin Panel

## Setup

1. **Run migrations**
   ```bash
   php artisan migrate
   ```

2. **Seed the database (admin user + CMS content)**
   ```bash
   php artisan db:seed
   ```
   - Admin login: **admin@livenetsolutions.com** / **password**

3. **Create storage link (for uploads)**
   ```bash
   php artisan storage:link
   ```

4. **Log in to the admin panel**
   - URL: **http://localhost:8000/admin**
   - If not logged in, you will be redirected to **http://localhost:8000/login**

## Admin Routes (all under `/admin`, auth required)

| Path | Description |
|------|-------------|
| `/admin` | Dashboard |
| `/admin/settings` | Site settings (name, logo, contact, SEO, social, map) |
| `/admin/pages` | CRUD for pages (title, slug, hero, content, meta) |
| `/admin/home-sections` | Hero, features, testimonials, CTA section content |
| `/admin/internet-plans?type=home` | Home internet plans |
| `/admin/internet-plans?type=business` | Business internet plans |
| `/admin/articles` | Blog articles (with soft deletes) |
| `/admin/testimonials` | Testimonials |
| `/admin/media` | Upload and delete media files |

## Frontend integration

- **Site settings** are shared in all views as `$siteSettings` (array keyed by setting key). The top-bar and footer already use `$siteSettings['phone']`, `$siteSettings['contact_email']`, `$siteSettings['address']`, `$siteSettings['site_name']`.
- To drive the **home page** from the CMS, use:
  - `App\Models\HomeSection::getByName('hero')`, `getByName('features')`, etc.
  - `App\Models\InternetPlan::where('type', 'home')->orderBy('sort_order')->get()` and same for `type = 'business'`.
  - `App\Models\Testimonial::orderBy('sort_order')->get()`.
- To drive **articles** and **pages**, replace the current `Route::view(...)` with controllers that load `Article::where('status', 'published')` or `Page::where('slug', $slug)->first()` and pass data to Blade.

## Files added

- **Migrations:** `database/migrations/2025_02_27_100001_create_site_settings_table.php` through `100007_create_media_table.php`
- **Models:** `SiteSetting`, `Page`, `HomeSection`, `InternetPlan`, `Article`, `Testimonial`, `Media`
- **Controllers:** `Auth\LoginController`, `Admin\DashboardController`, `Admin\SiteSettingController`, `Admin\PageController`, `Admin\HomeSectionController`, `Admin\InternetPlanController`, `Admin\ArticleController`, `Admin\TestimonialController`, `Admin\MediaController`
- **Views:** `auth/login.blade.php`, `admin/layouts/app.blade.php`, `admin/dashboard.blade.php`, `admin/settings/index.blade.php`, and CRUD views under `admin/pages`, `admin/home-sections`, `admin/internet-plans`, `admin/articles`, `admin/testimonials`, `admin/media`
- **Seeder:** `database/seeders/CmsSeeder.php` (Livenet default content)
- **Routes:** Login, logout, and `admin.*` group in `routes/web.php`
- **AppServiceProvider:** Shares `$siteSettings` with all views

## Notes

- Admin UI uses Tailwind via CDN in the layout.
- Images are stored in `storage/app/public` (logo, favicon, pages, articles, testimonials, media). Run `php artisan storage:link` so `asset('storage/...')` works.
- Site settings are cached for 1 hour; change is reflected after cache expiry or when you update settings again (cache is cleared on update).
- Articles use soft deletes. Internet plans features are stored as JSON (one feature per line in the form).
