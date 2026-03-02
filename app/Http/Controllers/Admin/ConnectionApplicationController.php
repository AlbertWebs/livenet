<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ConnectionApplication;

class ConnectionApplicationController extends Controller
{
    public function index()
    {
        $applications = ConnectionApplication::orderByDesc('created_at')->paginate(20);
        return view('admin.application-requests.index', compact('applications'));
    }
}
