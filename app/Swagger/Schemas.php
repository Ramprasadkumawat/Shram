<?php

namespace App\Swagger;

use OpenApi\Annotations as OA;

/**
 * @OA\Info(
 *     title="Shram API",
 *     version="1.0.0",
 *     description="API documentation for the Shram project"
 * )
 * @OA\Server(
 *     url="http://127.0.0.1:8000/api/v1",
 *     description="Local API Server"
 * )
 * @OA\SecurityScheme(
 *     securityScheme="sanctum",
 *     type="http",
 *     scheme="bearer",
 *     bearerFormat="JWT"
 * )
 */
class Schemas
{
    /**
     * Register endpoint
     * @OA\Post(
     *     path="/register",
     *     summary="Register a new user",
     *     tags={"Authentication"},
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(ref="#/components/schemas/RegisterRequest")
     *     ),
     *     @OA\Response(
     *         response=201,
     *         description="User registered successfully",
     *         @OA\JsonContent(ref="#/components/schemas/AuthSuccessResponse")
     *     ),
     *     @OA\Response(
     *         response=422,
     *         description="Validation Error",
     *         @OA\JsonContent(ref="#/components/schemas/ErrorResponse")
     *     )
     * )
     */
    public function registerEndpoint() {}

    /**
     * Login endpoint
     * @OA\Post(
     *     path="/login",
     *     summary="Login user",
     *     tags={"Authentication"},
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(ref="#/components/schemas/LoginRequest")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Login successful",
     *         @OA\JsonContent(ref="#/components/schemas/LoginSuccessResponse")
     *     ),
     *     @OA\Response(
     *         response=401,
     *         description="Invalid credentials",
     *         @OA\JsonContent(ref="#/components/schemas/UnauthorizedResponse")
     *     )
     * )
     */
    public function loginEndpoint() {}

    /**
     * Logout endpoint
     * @OA\Post(
     *     path="/logout",
     *     summary="Logout from current device",
     *     tags={"Authentication"},
     *     security={{"sanctum":{}}},
     *     @OA\Response(
     *         response=200,
     *         description="Successfully logged out",
     *         @OA\JsonContent(ref="#/components/schemas/MessageResponse")
     *     ),
     *     @OA\Response(
     *         response=401,
     *         description="Unauthorized",
     *         @OA\JsonContent(ref="#/components/schemas/UnauthorizedResponse")
     *     )
     * )
     */
    public function logoutEndpoint() {}

    /**
     * Logout all endpoint
     * @OA\Post(
     *     path="/logout-all",
     *     summary="Logout from all devices",
     *     tags={"Authentication"},
     *     security={{"sanctum":{}}},
     *     @OA\Response(
     *         response=200,
     *         description="Successfully logged out from all devices",
     *         @OA\JsonContent(ref="#/components/schemas/MessageResponse")
     *     ),
     *     @OA\Response(
     *         response=401,
     *         description="Unauthorized",
     *         @OA\JsonContent(ref="#/components/schemas/UnauthorizedResponse")
     *     )
     * )
     */
    public function logoutAllEndpoint() {}

    /**
     * Get user profile endpoint
     * @OA\Get(
     *     path="/me",
     *     summary="Get authenticated user profile",
     *     tags={"Authentication"},
     *     security={{"sanctum":{}}},
     *     @OA\Response(
     *         response=200,
     *         description="Authenticated user data",
     *         @OA\JsonContent(ref="#/components/schemas/User")
     *     ),
     *     @OA\Response(
     *         response=401,
     *         description="Unauthorized",
     *         @OA\JsonContent(ref="#/components/schemas/UnauthorizedResponse")
     *     )
     * )
     */
    public function meEndpoint() {}

    /**
     * Create post endpoint
     * @OA\Post(
     *     path="/owner/posts",
     *     summary="Create a new owner post",
     *     tags={"Owner Posts"},
     *     security={{"sanctum":{}}},
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(ref="#/components/schemas/CreatePostRequest")
     *     ),
     *     @OA\Response(
     *         response=201,
     *         description="Owner post created successfully",
     *         @OA\JsonContent(ref="#/components/schemas/PostCreationResponse")
     *     ),
     *     @OA\Response(
     *         response=401,
     *         description="Unauthorized",
     *         @OA\JsonContent(ref="#/components/schemas/UnauthorizedResponse")
     *     ),
     *     @OA\Response(
     *         response=422,
     *         description="Validation Error",
     *         @OA\JsonContent(ref="#/components/schemas/ErrorResponse")
     *     )
     * )
     */
    public function createPostEndpoint() {}

    /**
     * Get users endpoint
     * @OA\Get(
     *     path="/owner/users",
     *     summary="Get users by type",
     *     tags={"Owner Users"},
     *     security={{"sanctum":{}}},
     *     @OA\Parameter(
     *         name="type",
     *         in="query",
     *         description="User type filter",
     *         required=true,
     *         @OA\Schema(type="string", example="staff")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Users retrieved successfully",
     *         @OA\JsonContent(ref="#/components/schemas/UserListResponse")
     *     ),
     *     @OA\Response(
     *         response=401,
     *         description="Unauthorized",
     *         @OA\JsonContent(ref="#/components/schemas/UnauthorizedResponse")
     *     ),
     *     @OA\Response(
     *         response=422,
     *         description="Validation Error",
     *         @OA\JsonContent(ref="#/components/schemas/ErrorResponse")
     *     )
     * )
     */
    public function getUsersEndpoint() {}

    /**
     * List posts endpoint
     * @OA\Get(
     *     path="/owner/posts",
     *     summary="List all posts for the authenticated owner",
     *     tags={"Owner Posts"},
     *     security={{"sanctum":{}}},
     *     @OA\Response(
     *         response=200,
     *         description="Posts retrieved successfully",
     *         @OA\JsonContent(ref="#/components/schemas/PostListResponse")
     *     ),
     *     @OA\Response(
     *         response=401,
     *         description="Unauthorized",
     *         @OA\JsonContent(ref="#/components/schemas/UnauthorizedResponse")
     *     )
     * )
     */
    public function listPostsEndpoint() {}

    /**
     * Show post endpoint
     * @OA\Get(
     *     path="/owner/posts/{id}",
     *     summary="Show a specific post",
     *     tags={"Owner Posts"},
     *     security={{"sanctum":{}}},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         description="Post ID",
     *         required=true,
     *         @OA\Schema(type="integer", example=1)
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Post retrieved successfully",
     *         @OA\JsonContent(ref="#/components/schemas/PostShowResponse")
     *     ),
     *     @OA\Response(
     *         response=401,
     *         description="Unauthorized",
     *         @OA\JsonContent(ref="#/components/schemas/UnauthorizedResponse")
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Post not found",
     *         @OA\JsonContent(ref="#/components/schemas/NotFoundResponse")
     *     )
     * )
     */
    public function showPostEndpoint() {}

    /**
     * Update post endpoint
     * @OA\Put(
     *     path="/owner/posts/{id}",
     *     summary="Update a specific post",
     *     tags={"Owner Posts"},
     *     security={{"sanctum":{}}},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         description="Post ID",
     *         required=true,
     *         @OA\Schema(type="integer", example=1)
     *     ),
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(ref="#/components/schemas/UpdatePostRequest")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Post updated successfully",
     *         @OA\JsonContent(ref="#/components/schemas/PostUpdateResponse")
     *     ),
     *     @OA\Response(
     *         response=401,
     *         description="Unauthorized",
     *         @OA\JsonContent(ref="#/components/schemas/UnauthorizedResponse")
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Post not found",
     *         @OA\JsonContent(ref="#/components/schemas/NotFoundResponse")
     *     ),
     *     @OA\Response(
     *         response=422,
     *         description="Validation Error",
     *         @OA\JsonContent(ref="#/components/schemas/ErrorResponse")
     *     )
     * )
     */
    public function updatePostEndpoint() {}

    /**
     * Delete post endpoint
     * @OA\Delete(
     *     path="/owner/posts/{id}",
     *     summary="Delete a specific post",
     *     tags={"Owner Posts"},
     *     security={{"sanctum":{}}},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         description="Post ID",
     *         required=true,
     *         @OA\Schema(type="integer", example=1)
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Post deleted successfully",
     *         @OA\JsonContent(ref="#/components/schemas/PostDeleteResponse")
     *     ),
     *     @OA\Response(
     *         response=401,
     *         description="Unauthorized",
     *         @OA\JsonContent(ref="#/components/schemas/UnauthorizedResponse")
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Post not found",
     *         @OA\JsonContent(ref="#/components/schemas/NotFoundResponse")
     *     )
     * )
     */
    public function deletePostEndpoint() {}

/**
 * Login request schema
 * @OA\Schema(
 *     schema="LoginRequest",
 *     type="object",
 *     required={"email","password"},
     *     @OA\Property(property="email", type="string", format="email", example="user@example.com"),
     *     @OA\Property(property="password", type="string", format="password", example="123456")
     * )
     */
    public function loginRequest() {}

    /**
     * Register request schema
     * @OA\Schema(
     *     schema="RegisterRequest",
     *     type="object",
     *     required={"first_name","mobile_number","aadhar_number","type","email","password","password_confirmation"},
     *     @OA\Property(property="first_name", type="string", example="John"),
     *     @OA\Property(property="last_name", type="string", example="Doe"),
     *     @OA\Property(property="age", type="integer", example=30),
     *     @OA\Property(property="mobile_number", type="string", example="8989557618"),
     *     @OA\Property(property="aadhar_number", type="string", example="422557865558"),
     *     @OA\Property(property="email", type="string", format="email", example="john@example.com"),
     *     @OA\Property(property="type", type="string", example="owner"),
     *     @OA\Property(property="password", type="string", format="password", example="123456"),
     *     @OA\Property(property="password_confirmation", type="string", format="password", example="123456")
     * )
     */
    public function registerRequest() {}

    /**
     * User schema
     * @OA\Schema(
     *     schema="User",
     *     type="object",
     *     @OA\Property(property="id", type="integer", example=1),
     *     @OA\Property(property="first_name", type="string", example="John"),
     *     @OA\Property(property="last_name", type="string", example="Doe"),
     *     @OA\Property(property="age", type="integer", example=30),
     *     @OA\Property(property="mobile_number", type="string", example="8989557618"),
     *     @OA\Property(property="aadhar_number", type="string", example="422557865558"),
     *     @OA\Property(property="email", type="string", format="email", example="john@example.com"),
     *     @OA\Property(property="type", type="string", example="owner"),
     *     @OA\Property(property="created_at", type="string", format="date-time", example="2025-08-13T08:00:00Z"),
     *     @OA\Property(property="updated_at", type="string", format="date-time", example="2025-08-13T08:00:00Z")
     * )
     */
    public function user() {}

    /**
     * Owner Post schema
     * @OA\Schema(
     *     schema="OwnerPost",
     *     type="object",
     *     @OA\Property(property="id", type="integer", example=1),
     *     @OA\Property(property="owner_id", type="integer", example=1),
     *     @OA\Property(property="title", type="string", example="Need 5 Labourers for Construction"),
     *     @OA\Property(property="description", type="string", example="Detailed job description here"),
     *     @OA\Property(property="required_labours", type="integer", example=5),
     *     @OA\Property(property="location", type="string", example="Mumbai"),
     *     @OA\Property(property="start_date", type="string", format="date", example="2025-08-20"),
     *     @OA\Property(property="end_date", type="string", format="date", example="2025-08-25"),
     *     @OA\Property(property="work_type", type="string", enum={"daily","hourly"}, example="daily"),
     *     @OA\Property(property="wage_per_day", type="number", format="float", example=500.00),
     *     @OA\Property(property="wage_per_hour", type="number", format="float", example=70.00),
     *     @OA\Property(property="status", type="string", enum={"open","closed","in_progress"}, example="open"),
     *     @OA\Property(property="created_at", type="string", format="date-time", example="2025-08-13T08:00:00Z"),
     *     @OA\Property(property="updated_at", type="string", format="date-time", example="2025-08-13T08:00:00Z")
     * )
     */
    public function ownerPost() {}

    /**
     * Create Post Request schema
     * @OA\Schema(
     *     schema="CreatePostRequest",
     *     type="object",
     *     required={"title","required_labours","location","work_type"},
     *     @OA\Property(property="title", type="string", maxLength=150, example="Need 5 Labourers for Construction"),
     *     @OA\Property(property="description", type="string", nullable=true, example="Detailed job description here"),
     *     @OA\Property(property="required_labours", type="integer", minimum=1, example=5),
     *     @OA\Property(property="location", type="string", maxLength=255, example="Mumbai"),
     *     @OA\Property(property="start_date", type="string", format="date", nullable=true, example="2025-08-20"),
     *     @OA\Property(property="end_date", type="string", format="date", nullable=true, example="2025-08-25"),
     *     @OA\Property(property="work_type", type="string", enum={"daily","hourly"}, example="daily"),
     *     @OA\Property(property="wage_per_day", type="number", format="float", nullable=true, example=500.00),
     *     @OA\Property(property="wage_per_hour", type="number", format="float", nullable=true, example=70.00),
     *     @OA\Property(property="status", type="string", enum={"open","closed","in_progress"}, nullable=true, example="open")
     * )
     */
    public function createPostRequest() {}

    /**
     * Update Post Request schema
     * @OA\Schema(
     *     schema="UpdatePostRequest",
     *     type="object",
     *     @OA\Property(property="title", type="string", maxLength=150, example="Updated Job Title"),
     *     @OA\Property(property="description", type="string", nullable=true, example="Updated job description"),
     *     @OA\Property(property="required_labours", type="integer", minimum=1, example=10),
     *     @OA\Property(property="location", type="string", maxLength=255, example="Delhi"),
     *     @OA\Property(property="start_date", type="string", format="date", nullable=true, example="2025-09-01"),
     *     @OA\Property(property="end_date", type="string", format="date", nullable=true, example="2025-09-10"),
     *     @OA\Property(property="work_type", type="string", enum={"daily","hourly"}, example="hourly"),
     *     @OA\Property(property="wage_per_day", type="number", format="float", nullable=true, example=600.00),
     *     @OA\Property(property="wage_per_hour", type="number", format="float", nullable=true, example=80.00),
     *     @OA\Property(property="status", type="string", enum={"open","closed","in_progress"}, nullable=true, example="in_progress")
     * )
     */
    public function updatePostRequest() {}

/**
 * Generic auth success response
 * @OA\Schema(
 *     schema="AuthSuccessResponse",
 *     type="object",
     *     @OA\Property(property="status", type="boolean", example=true),
     *     @OA\Property(property="code", type="string", example="201"),
     *     @OA\Property(property="message", type="string", example="Registration successful"),
 *     @OA\Property(property="token", type="string", example="1|abcdef123456"),
     *     @OA\Property(property="user", ref="#/components/schemas/User")
     * )
     */
    public function authSuccessResponse() {}

    /**
     * Login success response
     * @OA\Schema(
     *     schema="LoginSuccessResponse",
     *     type="object",
     *     @OA\Property(property="status", type="boolean", example=true),
     *     @OA\Property(property="message", type="string", example="Login successful"),
     *     @OA\Property(property="token", type="string", example="1|vJ....tokenexample"),
     *     @OA\Property(property="user", ref="#/components/schemas/User")
     * )
     */
    public function loginSuccessResponse() {}

    /**
     * Error response schema
     * @OA\Schema(
     *     schema="ErrorResponse",
     *     type="object",
     *     @OA\Property(property="status", type="boolean", example=false),
     *     @OA\Property(property="code", type="string", example="422"),
     *     @OA\Property(property="message", type="string", example="Validation failed"),
     *     @OA\Property(property="errors", type="object")
     * )
     */
    public function errorResponse() {}

    /**
     * Unauthorized response schema
     * @OA\Schema(
     *     schema="UnauthorizedResponse",
     *     type="object",
     *     @OA\Property(property="status", type="boolean", example=false),
     *     @OA\Property(property="error", type="string", example="Unauthorized"),
     *     @OA\Property(property="message", type="string", example="The provided credentials are incorrect")
     * )
     */
    public function unauthorizedResponse() {}

    /**
     * Not found response schema
     * @OA\Schema(
     *     schema="NotFoundResponse",
     *     type="object",
     *     @OA\Property(property="status", type="boolean", example=false),
     *     @OA\Property(property="message", type="string", example="Post not found")
     * )
     */
    public function notFoundResponse() {}

/**
 * Generic message response
 * @OA\Schema(
 *     schema="MessageResponse",
 *     type="object",
 *     @OA\Property(property="message", type="string", example="Operation successful")
 * )
 */
    public function messageResponse() {}

    /**
     * Post creation success response
     * @OA\Schema(
     *     schema="PostCreationResponse",
     *     type="object",
     *     @OA\Property(property="status", type="boolean", example=true),
     *     @OA\Property(property="message", type="string", example="Post created successfully"),
     *     @OA\Property(property="data", ref="#/components/schemas/OwnerPost")
     * )
     */
    public function postCreationResponse() {}

    /**
     * Post list response
     * @OA\Schema(
     *     schema="PostListResponse",
     *     type="object",
     *     @OA\Property(property="status", type="boolean", example=true),
     *     @OA\Property(property="message", type="string", example="Posts retrieved successfully"),
     *     @OA\Property(property="data", type="object",
     *         @OA\Property(property="current_page", type="integer", example=1),
     *         @OA\Property(property="data", type="array", @OA\Items(ref="#/components/schemas/OwnerPost")),
     *         @OA\Property(property="per_page", type="integer", example=10),
     *         @OA\Property(property="total", type="integer", example=25)
     *     )
     * )
     */
    public function postListResponse() {}

    /**
     * Post show response
     * @OA\Schema(
     *     schema="PostShowResponse",
     *     type="object",
     *     @OA\Property(property="status", type="boolean", example=true),
     *     @OA\Property(property="message", type="string", example="Post retrieved successfully"),
     *     @OA\Property(property="data", ref="#/components/schemas/OwnerPost")
     * )
     */
    public function postShowResponse() {}

    /**
     * Post update response
     * @OA\Schema(
     *     schema="PostUpdateResponse",
     *     type="object",
     *     @OA\Property(property="status", type="boolean", example=true),
     *     @OA\Property(property="message", type="string", example="Post updated successfully"),
     *     @OA\Property(property="data", ref="#/components/schemas/OwnerPost")
     * )
     */
    public function postUpdateResponse() {}

    /**
     * Post delete response
     * @OA\Schema(
     *     schema="PostDeleteResponse",
     *     type="object",
     *     @OA\Property(property="status", type="boolean", example=true),
     *     @OA\Property(property="message", type="string", example="Post deleted successfully")
     * )
     */
    public function postDeleteResponse() {}

    /**
     * User list response
     * @OA\Schema(
     *     schema="UserListResponse",
     *     type="object",
     *     @OA\Property(property="status", type="boolean", example=true),
     *     @OA\Property(property="code", type="string", example="200"),
     *     @OA\Property(property="message", type="string", example="Users retrieved successfully"),
     *     @OA\Property(property="data", type="array", @OA\Items(ref="#/components/schemas/User"))
     * )
     */
    public function userListResponse() {}
}
