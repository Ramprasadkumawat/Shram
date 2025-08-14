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
                'status' => $this->msg('success', 'STATUS'),
                'code' => $this->msg('200', 'HTTP'),
                'message' => $this->msg('staff_list_success', 'USERS'), // You can define this in constants
                'data' => $data,
            ]);
        }else{
            return response()->json([
                'status' => $this->msg('failure', 'STATUS'),
                'code' => $this->msg('422', 'HTTP'),
                'message' => $this->msg('validation_errors', 'USERS'),
                'errors' => [
                    'type' => [$this->msg('type_is_required', 'USERS')],
                ],
            ], 422);
        }
    }
}