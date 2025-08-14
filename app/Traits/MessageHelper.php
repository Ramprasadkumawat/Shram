<?php

namespace App\Traits;

use App\Constants\CommonConstants;
use ReflectionClass;

trait MessageHelper
{
    public function msg(string $key, string $module = 'USERS'): string
    {
        $constants = (new ReflectionClass(CommonConstants::class))->getConstants();

        if (!array_key_exists($module, $constants)) {
            return "Module '{$module}' not found in CommonConstants.";
        }

        $moduleMessages = $constants[$module];

        return $moduleMessages[$key] ?? "Message key '{$key}' not found in module '{$module}'.";
    }
}
