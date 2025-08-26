<?php

namespace App\Http\Controllers\Admin\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;


class DashboardController extends Controller 
{
    public function index()
    {
        $user = Auth::guard('admin')->user();

        $staffCount = User::where('type', 'staff')->count();
        $ownerCount = User::where('type', 'owner')->count();

        $pageConfigs = [
            'pageHeader' => false,
            'contentLayout' => 'content-left-sidebar', 
            'pageClass' => 'dashboard-analytics'
        ];

        return view('admin.dashboard', compact('pageConfigs', 'user', 'staffCount', 'ownerCount'));
    }
}
