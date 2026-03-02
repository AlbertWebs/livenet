<?php

namespace Database\Seeders;

use App\Models\SiteSetting;
use App\Models\HomeSection;
use App\Models\InternetPlan;
use App\Models\Article;
use App\Models\Testimonial;
use Illuminate\Database\Seeder;

class CmsSeeder extends Seeder
{
    public function run(): void
    {
        $settings = [
            'site_name' => 'Livenet Solutions',
            'contact_email' => 'info@livenetsolutions.com',
            'phone' => '0712 104104',
            'address' => 'Nairobi, Kenya',
            'facebook_url' => 'https://www.facebook.com/',
            'twitter_url' => 'https://twitter.com/',
            'linkedin_url' => 'https://www.linkedin.com/',
            'seo_meta_title' => 'Livenet Solutions | Fast, Reliable Home & Business Internet',
            'seo_meta_description' => 'Fast, reliable internet for home and business. High-speed fiber, 24/7 support, no data caps.',
        ];
        foreach ($settings as $key => $value) {
            SiteSetting::set($key, $value);
        }

        HomeSection::updateOrCreate(['name' => 'hero'], ['title' => 'Fast, Reliable Internet Built for You', 'subtitle' => 'Livenet Solutions delivers high-speed home and business internet with 24/7 support.', 'is_active' => true, 'sort_order' => 0]);
        HomeSection::updateOrCreate(['name' => 'features'], ['title' => 'Internet Services for Home & Business', 'subtitle' => 'Whether you need seamless streaming at home or enterprise-grade connectivity.', 'is_active' => true, 'sort_order' => 1]);
        HomeSection::updateOrCreate(['name' => 'testimonials'], ['title' => 'What Our Customers Say', 'subtitle' => 'Thousands of homes and businesses trust Livenet Solutions.', 'is_active' => true, 'sort_order' => 2]);
        HomeSection::updateOrCreate(['name' => 'cta'], ['title' => 'Ready to Get Connected?', 'subtitle' => 'Apply for connection today and enjoy fast, reliable internet.', 'is_active' => true, 'sort_order' => 3]);

        InternetPlan::where('type', 'home')->delete();

        $homePlans = [
            ['name' => 'Rabbit Plan', 'speed' => '7 Mbps', 'price' => 1500, 'features' => json_encode([
                'For Fast web browsing',
                'For SD Movie & music streaming',
                'For Internet surfing, social media & email',
            ]), 'sort_order' => 0],
            ['name' => 'Rhino Plan', 'speed' => '13 Mbps', 'price' => 2000, 'is_highlighted' => true, 'badge' => 'Popular', 'features' => json_encode([
                'For Fast web browsing & Video calls',
                'For HD TV shows and movies',
                'For Internet surfing, social media & email',
                'For Moderate streaming at 1080p',
                'Superfast video downloads',
                'CCTV devices Capability',
                'For lite files transfer',
            ]), 'sort_order' => 1],
            ['name' => 'Leopard Plan', 'speed' => '18 Mbps', 'price' => 2500, 'features' => json_encode([
                'For Superfast web browsing',
                'For 4K Movies & TV Shows',
                'For online gaming and downloading',
                'Music and football streaming @1080p',
                'For superfast video downloads',
                'CCTV devices Capability',
                'For heavy files transfer',
            ]), 'sort_order' => 2],
            ['name' => 'Lion Plan', 'speed' => '23 Mbps', 'price' => 3000, 'features' => json_encode([
                'For Superfast web browsing',
                'For 4K Movie & TV Shows',
                'For Heavy online gaming and downloading',
                'For multiple device streaming',
                'Superfast video, sports & music streaming at 4K',
                'CCTV devices Capability',
            ]), 'sort_order' => 3],
            ['name' => 'Elephant Plan', 'speed' => '30 Mbps', 'price' => 3500, 'features' => json_encode([
                'High-definition Movie and TV shows streaming 4K/8K',
                'Heavy online gaming and downloading',
                'Home Automation',
                'Multiple device live sports streaming',
                'Superfast video downloads & music streaming',
            ]), 'sort_order' => 4],
        ];
        foreach ($homePlans as $p) {
            InternetPlan::updateOrCreate(['type' => 'home', 'name' => $p['name']], array_merge($p, ['type' => 'home', 'currency' => 'KES']));
        }

        $businessPlans = [
            ['name' => 'Business Starter', 'speed' => '100 Mbps dedicated', 'price' => 12999, 'features' => json_encode(['100 Mbps dedicated', '99.9% uptime SLA', 'Dedicated support']), 'sort_order' => 0],
            ['name' => 'Business Plus', 'speed' => '500 Mbps dedicated', 'price' => 29999, 'features' => json_encode(['500 Mbps dedicated', '99.9% uptime SLA', 'Priority support']), 'sort_order' => 1],
            ['name' => 'Business Pro', 'speed' => '1 Gbps dedicated', 'price' => 49999, 'features' => json_encode(['1 Gbps dedicated', '99.9% uptime SLA', 'Proactive monitoring']), 'sort_order' => 2],
        ];
        foreach ($businessPlans as $p) {
            InternetPlan::updateOrCreate(['type' => 'business', 'name' => $p['name']], array_merge($p, ['type' => 'business', 'currency' => 'KES']));
        }

        Article::updateOrCreate(['slug' => 'getting-started-with-home-wifi'], ['title' => 'Getting Started with Home WiFi', 'excerpt' => 'Tips for setting up your home internet.', 'content' => 'Content here.', 'status' => 'published', 'published_at' => now()]);
        Article::updateOrCreate(['slug' => 'business-connectivity-matters'], ['title' => 'Why Business Connectivity Matters', 'excerpt' => 'Reliable internet for your business.', 'content' => 'Content here.', 'status' => 'published', 'published_at' => now()]);
        Article::updateOrCreate(['slug' => 'understanding-internet-speed'], ['title' => 'Understanding Internet Speed', 'excerpt' => 'What Mbps means for you.', 'content' => 'Content here.', 'status' => 'published', 'published_at' => now()]);

        Testimonial::updateOrCreate(['name' => 'Sarah M.'], ['company' => null, 'role' => 'Home customer, Nairobi', 'testimonial' => 'Switched to Livenet six months ago. Zero outages, and the speed is exactly what they promised.', 'rating' => 5, 'sort_order' => 0]);
        Testimonial::updateOrCreate(['name' => 'James K.'], ['company' => 'TechFlow Inc.', 'role' => 'IT Director', 'testimonial' => 'Our business runs on the internet. Livenet\'s SLA and dedicated support give us peace of mind.', 'rating' => 5, 'sort_order' => 1]);
        Testimonial::updateOrCreate(['name' => 'Maria L.'], ['company' => null, 'role' => 'Small business owner', 'testimonial' => 'Fast installation, clear pricing, no hidden fees. Support actually answers the phone.', 'rating' => 5, 'sort_order' => 2]);
    }
}
