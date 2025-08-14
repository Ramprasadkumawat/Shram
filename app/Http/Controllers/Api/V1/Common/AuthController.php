<?php

namespace App\Http\Controllers\API\V1\Common;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use App\Models\User;
use App\Http\Resources\Api\V1\UserResource;
use App\Http\Requests\Api\V1\StoreUserRequest;
use App\Traits\MessageHelper;

class AuthController extends Controller
{
    use MessageHelper;

    /**
     * Register a new user.
     *
     * @param StoreUserRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function register(StoreUserRequest $request)
    {
        $user = User::create([
            'first_name'    => $request->first_name,
            'last_name'     => $request->last_name,
            'age'           => $request->age,
            'mobile_number' => $request->mobile_number,
            'aadhar_number' => $request->aadhar_number,
            'email'         => $request->email,
            'type'          => $request->type,
            'password'      => bcrypt($request->password),
        ]);

        $token = $user->createToken('mobile')->plainTextToken;
        $data = new UserResource($user);

        return response()->json([
            'status'  => $this->msg('success', 'STATUS'),
            'code'    => $this->msg('201', 'HTTP'),
            'message' => $this->msg('signup_success', 'USERS'),
            'token'   => $token,
            'user'    => $data,
        ]);
    }
    
    /**
     * Login user.
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(Request $request)
    {
        // Validate request
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        // Find user by email
        $user = User::where('email', $request->email)->first();

        // Check password
        if (! $user || ! Hash::check($request->password, $user->password)) {
            return response()->json([
                'status' => $this->msg('failure', 'STATUS'),
                'error' => $this->msg('Unauthorized', 'AUTH'),
                'message' => $this->msg('credentials_unauthorised', 'AUTH'),
            ], 401);
        }

        // Create token
        $token = $user->createToken('mobile')->plainTextToken;

        return response()->json([
            'status' => $this->msg('success', 'STATUS'),
            'message' => $this->msg('login_success', 'AUTH'),
            'token' => $token,
            'user' => $user
        ]);
    }

    /**
     * Logout from current device.
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();

        return response()->json(['message' => $this->msg('logout_success', 'AUTH'),]);
    }

    /**
     * Logout from all devices.
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function logoutAll(Request $request)
    {
        $request->user()->tokens()->delete();

        return response()->json(['message' => $this->msg('logout_all_success', 'AUTH')]);
    }

    /**
     * Get authenticated user profile.
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function me(Request $request)
    {
        return response()->json($request->user());
    }

}
