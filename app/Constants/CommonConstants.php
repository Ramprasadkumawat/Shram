<?php

namespace App\Constants;

class CommonConstants
{
    public const USERS = [
        'signup_success' => 'You have signed up successfully!',
        'staff_list_success' => 'Staf list fetched successfully!',
        'email_taken' => 'This email is already taken.',
        'aadhar_exists' => 'Aadhar number already exists.',
        'validation_errors' => 'Validation errors',
        'first_name_is_required' => 'First name is required.',
        'type_is_required' => 'type is required.',
    ];
    
    public const AUTH = [
        'logout_success' => 'You have logged out successfully!',
        'logout_all_success' => 'Logged out from all devices!',
        'login_success' => 'You have logged in successfully!',
        'credentials_unauthorised' => 'The provided credentials are incorrect.',
        'Unauthorized' => 'Unauthorized.',
    ];

    public const DRIVERS = [
        'hello_message' => 'Hello, drivers! Welcome to the Driver Module.',
        'license_missing' => 'License number is required.',
        'driver_created' => 'Driver has been added successfully.',
    ];

    public const HTTP = [
        '200' => 200, // success
        '201' => 201, // created
        '422' => 422, // Validation error
        '401' => 401, // Unauthorized
        '403' => 403, // Forbidden
        '500' => 500, // Internal Server Error
    ];

    public const STATUS = [
        'success' => true,
        'failure' => "false",
    ];
}
