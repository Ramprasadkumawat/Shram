<?php

namespace App\Http\Controllers\Admin\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class DashboardController extends Controller 
{
    public function index()
    {
        $user = Auth::guard('admin')->user();
        $pageConfigs = [
            'pageHeader' => false,
            'contentLayout' => 'content-left-sidebar', 
            'pageClass' => 'dashboard-analytics'
        ];

        return view('admin.dashboard', compact('pageConfigs', 'user'));
    }
}
