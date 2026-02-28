<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\InternetPlan;
use App\Models\Page;
use App\Models\Testimonial;

class DashboardController extends Controller
{
    public function index()
    {
        $pagesCount = Page::count();
        $plansCount = InternetPlan::count();
        $articlesCount = Article::count();
        $testimonialsCount = Testimonial::count();
        return view('admin.dashboard', compact('pagesCount', 'plansCount', 'articlesCount', 'testimonialsCount'));
    }
}
