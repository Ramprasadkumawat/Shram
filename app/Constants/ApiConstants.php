<?php

namespace App\Constants;

class ApiConstants
{
    // Geocoding Service
    public const NOMINATIM_BASE_URL = "https://nominatim.openstreetmap.org/reverse?format=json&zoom=18&addressdetails=1";
    public const GEOCoding_USER_AGENT = 'Shram/1.0 (ranprasadkumawat05005@gmail.com)';
    public const GEOCoding_ERROR_CONNECT = 'Failed to connect to geocoding service using cURL';
    public const GEOCoding_ERROR_NO_LOCATION = 'No location found for the given coordinates or Nominatim API error.';
    public const GEOCoding_ERROR_EXCEPTION = 'Failed to connect to geocoding service (exception caught)';
    public const GEOCoding_SUCCESS_MESSAGE = 'Location details retrieved successfully';
    public const GEOCoding_ERROR_RETRIEVE_LOCATION = 'Could not retrieve location details.';

    // Post related messages
    public const POST_CREATED_SUCCESS = 'Post created successfully';
    public const POST_NOT_FOUND = 'Post not found';
    public const POST_UPDATED_SUCCESS = 'Post updated successfully';
    public const POST_DELETED_SUCCESS = 'Post deleted successfully';
    public const POSTS_RETRIEVED_SUCCESS = 'Posts retrieved successfully';
    public const POST_RETRIEVED_SUCCESS = 'Post retrieved successfully';
    public const POST_STATUS_OPEN = 'open';
    public const POST_STATUS_CLOSED = 'closed';
    public const POST_STATUS_IN_PROGRESS = 'in_progress';

    // Auth related messages
    public const SUCCESS = 'success';
    public const STATUS = 'status';
    public const FAILURE = 'failure';
    public const LOGIN_SUCCESS = 'You have successfully logged in';
    public const SIGNUP_SUCCESS = 'signup_success';
    public const LOGOUT_SUCCESS = 'logout_success';
    public const LOGOUT_ALL_SUCCESS = 'logout_all_success';
    public const UNAUTHORIZED_ERROR = 'Unauthorized';
    public const CREDENTIALS_UNAUTHORIZED = 'credentials_unauthorised';

    // Validation messages for API requests
    public const LATITUDE_REQUIRED = 'The latitude field is required.';
    public const LATITUDE_NUMERIC = 'The latitude must be a number.';
    public const LATITUDE_BETWEEN = 'The latitude must be between -90 and 90.';
    public const LONGITUDE_REQUIRED = 'The longitude field is required.';
    public const LONGITUDE_NUMERIC = 'The longitude must be a number.';
    public const LONGITUDE_BETWEEN = 'The longitude must be between -180 and 180.';
    public const EMAIL_REQUIRED = 'The email field is required.';
    public const EMAIL_INVALID = 'The email must be a valid email address.';
    public const PASSWORD_REQUIRED = 'The password field is required.';
    public const PASSWORD_STRING = 'The password must be a string.';
    public const PASSWORD_MIN = 'The password must be at least 6 characters.'; // Adjusted to match StoreUserRequest
    public const PASSWORD_CONFIRMED = 'The password confirmation does not match.';
    public const FIRST_NAME_REQUIRED = 'The first name field is required.';
    public const LAST_NAME_REQUIRED = 'The last name field is required.';
    public const AGE_REQUIRED = 'The age field is required.';
    public const AGE_INTEGER = 'The age must be an integer.';
    public const MOBILE_NUMBER_REQUIRED = 'The mobile number field is required.';
    public const AADHAR_NUMBER_REQUIRED = 'The Aadhar number field is required.';
    public const AADHAR_NUMBER_UNIQUE = 'The Aadhar number has already been taken.';
    public const EMAIL_UNIQUE = 'The email has already been taken.';
    public const TYPE_REQUIRED = 'The type field is required.';
    public const TYPE_IS_REQUIRED = 'Type is required!';
    public const TYPE_STRING = 'The type must be a string.';
    public const TYPE_MAX = 'The type may not be greater than 50 characters.';
    public const TYPE_IN = 'The selected type is invalid.';
    public const VALIDATION_ERRORS = 'Validation errors';

    // User Types (could be moved to AdminConstants if only used in admin, but keeping here for API registration/update)
    public const USER_TYPE_ADMIN = 'admin';
    public const USER_TYPE_USER = 'user';
    public const USER_TYPE_STAFF = 'staff';
    public const USER_TYPE_OWNER = 'owner';

    // HTTP Status Codes (These might be better in a general CommonConstants if such a file exists/is desired)
    public const HTTP_422 = 422;
    public const HTTP_201 = 201;
    public const HTTP_200 = 200;
    public const HTTP = 'HTTP';

    // staff_messages
    public const STAFF_LIST_SUCCESS = 'Staff list fetched successfully!';
    public const STAFF_LIST_NOT_FOUND = 'Staff list not found!';
    public const STAFF_LIST_EMPTY = 'Staff list is empty!';

    // user_messages
    public const USERS = 'Users';
    public const USER_LIST_SUCCESS = 'User list fetched successfully!';
    public const USER_LIST_NOT_FOUND = 'User list not found!';
    public const USER_LIST_EMPTY = 'User list is empty!';
}
