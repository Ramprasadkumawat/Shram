<?php

namespace App\Http\ViewComposers;

use Illuminate\View\View;
use App\Models\User;
use App\Constants\AdminConstants;

class UserCountComposer
{
    public function compose(View $view)
    {
        $staffCount = User::where('type', AdminConstants::USER_TYPE_STAFF)->count();
        $ownerCount = User::where('type', AdminConstants::USER_TYPE_OWNER)->count();

        $view->with('staffCount', $staffCount);
        $view->with('ownerCount', $ownerCount);
    }
}
