<?php

namespace App\Http\Controllers\Admin\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AccountController extends Controller
{
    public function account()
    {
        $pageConfigs = [
            'pageHeader' => false,
            'contentLayout' => 'content-left-sidebar',
            'pageClass' => 'page-account-settings'
        ];

        return view('content.pages.pages-account-settings-account', compact('pageConfigs'));
    }

    public function notifications()
    {
        $pageConfigs = [
            'pageHeader' => false,
            'contentLayout' => 'content-left-sidebar',
            'pageClass' => 'page-account-settings'
        ];

        return view('content.pages.pages-account-settings-notifications', compact('pageConfigs'));
    }

    public function connections()
    {
        $pageConfigs = [
            'pageHeader' => false,
            'contentLayout' => 'content-left-sidebar',
            'pageClass' => 'page-account-settings'
        ];

        return view('content.pages.pages-account-settings-connections', compact('pageConfigs'));
    }

    public function billing()
    {
        $pageConfigs = [
            'pageHeader' => false,
            'contentLayout' => 'content-left-sidebar',
            'pageClass' => 'page-account-settings'
        ];

        return view('content.pages.pages-account-settings-billing', compact('pageConfigs'));
    }

    public function security()
    {
        $pageConfigs = [
            'pageHeader' => false,
            'contentLayout' => 'content-left-sidebar',
            'pageClass' => 'page-account-settings'
        ];

        return view('content.pages.pages-account-settings-security', compact('pageConfigs'));
    }
}
