<?php

namespace App\Traits;

use App\Constants\ApiConstants; // Import ApiConstants

trait MessageHelper
{
    public function msg(string $constantName): string
    {
        if (defined("\\App\\Constants\\ApiConstants::{$constantName}")) {
            return constant("\\App\\Constants\\ApiConstants::{$constantName}");
        }

        // Fallback or error message if constant not found
        return "Constant '{$constantName}' not found in ApiConstants.";
    }
}
