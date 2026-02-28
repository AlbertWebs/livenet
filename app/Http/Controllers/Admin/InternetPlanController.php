<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\InternetPlan;
use Illuminate\Http\Request;

class InternetPlanController extends Controller
{
    public function index(Request $request)
    {
        $query = InternetPlan::query();
        if ($request->filled('type')) {
            $query->where('type', $request->type);
        }
        $plans = $query->orderBy('sort_order')->orderBy('price')->paginate(15);
        return view('admin.internet-plans.index', compact('plans'));
    }

    public function create(Request $request)
    {
        $type = $request->get('type', 'home');
        return view('admin.internet-plans.create', compact('type'));
    }

    public function store(Request $request)
    {
        $v = $request->validate([
            'type' => 'required|in:home,business',
            'name' => 'required|string|max:255',
            'speed' => 'nullable|string|max:100',
            'price' => 'required|numeric|min:0',
            'currency' => 'nullable|string|max:10',
            'features' => 'nullable|string',
            'is_highlighted' => 'boolean',
            'badge' => 'nullable|string|max:50',
            'sort_order' => 'integer',
        ]);
        $v['is_highlighted'] = $request->boolean('is_highlighted');
        $v['currency'] = $v['currency'] ?? 'KES';
        $v['sort_order'] = (int) ($v['sort_order'] ?? 0);
        $lines = $v['features'] ? array_filter(explode("\n", str_replace("\r", '', $v['features']))) : [];
        $v['features'] = json_encode(array_values($lines));
        InternetPlan::create($v);
        return redirect()->route('admin.internet-plans.index', ['type' => $v['type']])->with('success', 'Plan created.');
    }

    public function edit(InternetPlan $internetPlan)
    {
        return view('admin.internet-plans.edit', ['plan' => $internetPlan]);
    }

    public function update(Request $request, InternetPlan $internetPlan)
    {
        $v = $request->validate([
            'type' => 'required|in:home,business',
            'name' => 'required|string|max:255',
            'speed' => 'nullable|string|max:100',
            'price' => 'required|numeric|min:0',
            'currency' => 'nullable|string|max:10',
            'features' => 'nullable|string',
            'is_highlighted' => 'boolean',
            'badge' => 'nullable|string|max:50',
            'sort_order' => 'integer',
        ]);
        $v['is_highlighted'] = $request->boolean('is_highlighted');
        $lines = !empty($v['features']) ? array_filter(explode("\n", str_replace("\r", '', $v['features']))) : [];
        $v['features'] = json_encode(array_values($lines));
        $internetPlan->update($v);
        return redirect()->route('admin.internet-plans.index', ['type' => $v['type']])->with('success', 'Plan updated.');
    }

    public function destroy(InternetPlan $internetPlan)
    {
        $internetPlan->delete();
        return redirect()->back()->with('success', 'Plan deleted.');
    }
}
