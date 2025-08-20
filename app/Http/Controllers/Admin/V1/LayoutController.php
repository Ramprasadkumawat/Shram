<?php

namespace App\Http\Controllers\Admin\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LayoutController extends Controller
{
    public function withoutMenu()
    {
        $pageConfigs = [
            'pageHeader' => false,
            'contentLayout' => 'content-left-sidebar',
            'pageClass' => 'layout-without-menu'
        ];

        return view('content.layouts-example.layouts-without-menu', compact('pageConfigs'));
    }

    public function withoutNavbar()
    {
        $pageConfigs = [
            'pageHeader' => false,
            'contentLayout' => 'content-left-sidebar',
            'pageClass' => 'layout-without-navbar'
        ];

        return view('content.layouts-example.layouts-without-navbar', compact('pageConfigs'));
    }

    public function container()
    {
        $pageConfigs = [
            'pageHeader' => false,
            'contentLayout' => 'content-left-sidebar',
            'pageClass' => 'layout-container'
        ];

        return view('content.layouts-example.layouts-container', compact('pageConfigs'));
    }

    public function fluid()
    {
        $pageConfigs = [
            'pageHeader' => false,
            'contentLayout' => 'content-left-sidebar',
            'pageClass' => 'layout-fluid'
        ];

        return view('content.layouts-example.layouts-fluid', compact('pageConfigs'));
    }

    public function blank()
    {
        return view('content.layouts-example.layouts-blank');
    }
}
