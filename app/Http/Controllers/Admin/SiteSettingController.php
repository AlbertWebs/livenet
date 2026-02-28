<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SiteSetting;
use Illuminate\Http\Request;

class SiteSettingController extends Controller
{
    public function index()
    {
        $keys = ['site_name', 'logo', 'favicon', 'contact_email', 'phone', 'address', 'facebook_url', 'twitter_url', 'linkedin_url', 'seo_meta_title', 'seo_meta_description', 'map_embed_url'];
        $settings = [];
        foreach ($keys as $key) {
            $settings[$key] = SiteSetting::get($key);
        }
        return view('admin.settings.index', compact('settings'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'site_name' => 'nullable|string|max:255',
            'contact_email' => 'nullable|email',
            'phone' => 'nullable|string|max:100',
            'address' => 'nullable|string',
            'facebook_url' => 'nullable|url',
            'twitter_url' => 'nullable|url',
            'linkedin_url' => 'nullable|url',
            'seo_meta_title' => 'nullable|string|max:255',
            'seo_meta_description' => 'nullable|string|max:500',
            'map_embed_url' => 'nullable|string',
            'logo' => 'nullable|image|max:2048',
            'favicon' => 'nullable|image|max:512',
        ]);
        $data = $request->only(['site_name', 'contact_email', 'phone', 'address', 'facebook_url', 'twitter_url', 'linkedin_url', 'seo_meta_title', 'seo_meta_description', 'map_embed_url']);
        foreach ($data as $key => $value) {
            SiteSetting::set($key, $value ?? '');
        }
        if ($request->hasFile('logo')) {
            SiteSetting::set('logo', $request->file('logo')->store('settings', 'public'));
        }
        if ($request->hasFile('favicon')) {
            SiteSetting::set('favicon', $request->file('favicon')->store('settings', 'public'));
        }
        return redirect()->route('admin.settings.index')->with('success', 'Settings updated.');
    }
}
