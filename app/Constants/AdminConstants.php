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
    public const POST_CREATED_SUCCESS = 'Post created successfully.';
    public const POST_UPDATED_SUCCESS = 'Post updated successfully.';
    public const POST_DELETED_SUCCESS = 'Post deleted successfully.';

    // Post Validation Messages
    public const OWNER_ID_REQUIRED = 'The owner ID field is required.';
    public const OWNER_ID_EXISTS = 'The selected owner ID is invalid.';
    public const POST_TITLE_REQUIRED = 'The post title field is required.';
    public const POST_TITLE_STRING = 'The post title must be a string.';
    public const POST_TITLE_MAX = 'The post title may not be greater than 150 characters.';
    public const POST_REQUIRED_LABOURS_REQUIRED = 'The required labours field is required.';
    public const POST_REQUIRED_LABOURS_INTEGER = 'The required labours must be an integer.';
    public const POST_REQUIRED_LABOURS_MIN = 'The required labours must be at least 1.';
    public const POST_LOCATION_REQUIRED = 'The location field is required.';
    public const POST_LOCATION_STRING = 'The location must be a string.';
    public const POST_LOCATION_MAX = 'The location may not be greater than 255 characters.';
    public const POST_START_DATE_DATE = 'The start date is not a valid date.';
    public const POST_END_DATE_DATE = 'The end date is not a valid date.';
    public const POST_END_DATE_AFTER_OR_EQUAL = 'The end date must be a date after or equal to start date.';
    public const POST_WORK_TYPE_REQUIRED = 'The work type field is required.';
    public const POST_WORK_TYPE_IN = 'The selected work type is invalid.';
    public const POST_WAGE_PER_DAY_REQUIRED_IF = 'The wage per day field is required when work type is daily.';
    public const POST_WAGE_PER_DAY_NUMERIC = 'The wage per day must be a number.';
    public const POST_WAGE_PER_DAY_MIN = 'The wage per day must be at least 0.';
    public const POST_WAGE_PER_HOUR_REQUIRED_IF = 'The wage per hour field is required when work type is hourly.';
    public const POST_WAGE_PER_HOUR_NUMERIC = 'The wage per hour must be a number.';
    public const POST_WAGE_PER_HOUR_MIN = 'The wage per hour must be at least 0.';
    public const POST_STATUS_IN = 'The selected status is invalid.';

    // Post Statuses
    public const POST_STATUS_OPEN = 'open';
    public const POST_STATUS_CLOSED = 'closed';
    public const POST_STATUS_IN_PROGRESS = 'in_progress';

    // Post List Page
    public const POST_LIST_SEARCH_PLACEHOLDER = 'Search by title or description';
    public const POST_LIST_SORT_BY_TITLE = 'Title';
    public const POST_LIST_SORT_BY_CREATED_AT = 'Created At';
    public const POST_LIST_SORT_BY_OWNER_NAME = 'Owner Name';
    public const POST_LIST_SORT_ORDER_ASC = 'ASC';
    public const POST_LIST_SORT_ORDER_DESC = 'DESC';
    public const POST_LIST_SEARCH_SORT_BUTTON = 'Search & Sort';
    public const POST_LIST_CLEAR_BUTTON = 'Clear';
    public const POST_LIST_TABLE_HEADER_ID = 'ID';
    public const POST_LIST_TABLE_HEADER_OWNER = 'Owner';
    public const POST_LIST_TABLE_HEADER_TITLE = 'Title';
    public const POST_LIST_TABLE_HEADER_LOCATION = 'Location';
    public const POST_LIST_TABLE_HEADER_STATUS = 'Status';
    public const POST_LIST_TABLE_HEADER_ACTIONS = 'Actions';
    public const POST_LIST_ACTION_EDIT = 'Edit';
    public const POST_LIST_ACTION_DELETE = 'Delete';
    public const POST_LIST_NO_POSTS_FOUND = 'No posts found.';

    // Delete Confirmation Modal (Post specific)
    public const MODAL_POST_CONFIRM_DELETION_BODY = 'Are you sure you want to delete this post?';

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
