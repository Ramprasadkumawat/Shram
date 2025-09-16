<?php

namespace App\Http\Controllers\Api\V1\Owner;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Resources\Api\V1\UserResource;
use App\Http\Requests\Api\V1\StoreUserRequest;
use App\Traits\MessageHelper;

class UserController extends Controller
{
    use MessageHelper;

    /**
     * Get users by type.
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(Request $request)
    {
        ini_set('memory_limit', '512M');
        if (!empty($request->type)) {
            $staffUsers = User::where('type', $request->type)
                ->get();
            $data = UserResource::collection($staffUsers);
    
            return response()->json([
                'status' => $this->msg('SUCCESS', 'STATUS'),
                'code' => $this->msg('HTTP_200', 'HTTP'),
                'message' => $this->msg('STAFF_LIST_SUCCESS', 'USERS'), // You can define this in constants
                'data' => $data,
            ]);
        }else{
            return response()->json([
                'status' => $this->msg('FAILURE', 'STATUS'),
                'code' => $this->msg('HTTP_422', 'HTTP'),
                'message' => $this->msg('VALIDATION_ERRORS', 'USERS'),
                'errors' => [
                    'type' => [$this->msg('TYPE_IS_REQUIRED', 'USERS')],
                ],
            ], 422);
        }
    }
}