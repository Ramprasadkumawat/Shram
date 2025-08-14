<?php

namespace App\Swagger;

use OpenApi\Annotations as OA;

/**
 * @OA\Post(
 *     path="/login",
 *     summary="Login user",
 *     tags={"Authentication"},
 *     @OA\RequestBody(required=true, @OA\JsonContent(ref="#/components/schemas/LoginRequest")),
 *     @OA\Response(response=200, description="Login successful", @OA\JsonContent(ref="#/components/schemas/AuthSuccessResponse")),
 *     @OA\Response(response=401, description="Invalid credentials", @OA\JsonContent(ref="#/components/schemas/MessageResponse"))
 * )
 */

/**
 * @OA\Post(
 *     path="/register",
 *     summary="Register a new user",
 *     tags={"Authentication"},
 *     @OA\RequestBody(required=true, @OA\JsonContent(ref="#/components/schemas/RegisterRequest")),
 *     @OA\Response(response=201, description="User registered", @OA\JsonContent(ref="#/components/schemas/AuthSuccessResponse"))
 * )
 */

/**
 * @OA\Post(
 *     path="/logout",
 *     summary="Logout the current user",
 *     tags={"Authentication"},
 *     @OA\Response(response=200, description="Logged out successfully", @OA\JsonContent(ref="#/components/schemas/MessageResponse"))
 * )
 */

/**
 * @OA\Post(
 *     path="/logout-all",
 *     summary="Logout from all devices",
 *     tags={"Authentication"},
 *     @OA\Response(response=200, description="Logged out from all devices", @OA\JsonContent(ref="#/components/schemas/MessageResponse"))
 * )
 */

/**
 * @OA\Get(
 *     path="/me",
 *     summary="Get current user info",
 *     tags={"Authentication"},
 *     @OA\Response(response=200, description="User data", @OA\JsonContent(ref="#/components/schemas/AuthSuccessResponse"))
 * )
 */

/**
 * @OA\Get(
 *     path="/staff-list",
 *     summary="Get list of staff",
 *     tags={"Staff"},
 *     @OA\Response(response=200, description="Staff list", @OA\JsonContent(type="array", @OA\Items(type="object")))
 * )
 */
class AuthEndpoints
{
}
