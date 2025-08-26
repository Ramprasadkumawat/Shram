<?php

namespace App\Constants;

class AdminConstants
{
    // User related messages and types
    public const USER_UPDATED_SUCCESS = 'User updated successfully.';
    public const USER_NOT_FOUND = 'User not found.';
    public const USER_DELETED_SUCCESS = 'User deleted successfully.';
    public const USER_TYPE_ADMIN = 'admin';
    public const USER_TYPE_USER = 'user';
    public const USER_TYPE_STAFF = 'staff';
    public const USER_TYPE_OWNER = 'owner';

    // Dashboard Counts
    public const STAFF_COUNT_TITLE = 'Staff Count';
    public const OWNER_COUNT_TITLE = 'Owner Count';
    public const STAFF_TOTAL_TEXT = 'Total Staff';
    public const OWNER_TOTAL_TEXT = 'Total Owners';

    // Pagination styling
    public const PAGINATION_BTN_CLASSES = 'btn btn-outline-secondary';

    // Admin Validation messages
    public const USER_TYPE_REQUIRED = 'The user type field is required.';
    public const USER_TYPE_STRING = 'The user type must be a string.';
    public const USER_TYPE_INVALID = 'The selected type is invalid.';
    public const PASSWORD_MIN = 'The password must be at least 8 characters.';
    public const PASSWORD_CONFIRMED = 'The password confirmation does not match.';
    public const PASSWORD_REQUIRED = 'The password field is required.';
    public const PASSWORD_STRING = 'The password must be a string.';

    // Other admin-specific messages
    public const USER_CREATED_SUCCESS = 'User created successfully.';

    // User List Page
    public const USER_LIST_SEARCH_PLACEHOLDER = 'Search by name or email';
    public const USER_LIST_SORT_BY_FIRST_NAME = 'First Name';
    public const USER_LIST_SORT_BY_LAST_NAME = 'Last Name';
    public const USER_LIST_SORT_BY_EMAIL = 'Email';
    public const USER_LIST_SORT_BY_CREATED_AT = 'Created At';
    public const USER_LIST_SORT_ORDER_ASC = 'ASC';
    public const USER_LIST_SORT_ORDER_DESC = 'DESC';
    public const USER_LIST_SEARCH_SORT_BUTTON = 'Search & Sort';
    public const USER_LIST_CLEAR_BUTTON = 'Clear';
    public const USER_LIST_TABLE_HEADER_ID = 'ID';
    public const USER_LIST_TABLE_HEADER_NAME = 'Name';
    public const USER_LIST_TABLE_HEADER_EMAIL = 'Email';
    public const USER_LIST_TABLE_HEADER_TYPE = 'Type';
    public const USER_LIST_TABLE_HEADER_MOBILE = 'Mobile';
    public const USER_LIST_TABLE_HEADER_AADHAR = 'Aadhar';
    public const USER_LIST_TABLE_HEADER_AGE = 'Age';
    public const USER_LIST_TABLE_HEADER_ACTIONS = 'Actions';
    public const USER_LIST_ACTION_EDIT = 'Edit';
    public const USER_LIST_ACTION_DELETE = 'Delete';
    public const USER_LIST_NO_USERS_FOUND = 'No users found.';
    
    // Delete Confirmation Modal
    public const MODAL_CONFIRM_DELETION_TITLE = 'Confirm Deletion';
    public const MODAL_CONFIRM_DELETION_BODY = 'Are you sure you want to delete this user?';
    public const MODAL_CANCEL_BUTTON = 'Cancel';
    public const MODAL_DELETE_BUTTON = 'Delete';
}
