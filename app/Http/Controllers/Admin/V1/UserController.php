<?php

namespace App\Http\Controllers\Admin\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\Admin\V1\StoreUserRequest;
use App\Http\Requests\Admin\V1\UpdateUserRequest;

class UserController extends Controller
{
    public function index(Request $request)
    {
        // phpinfo();
        // ini_set('memory_limit', '512M');
        $query = User::query();
        if ($request->has('search')) {
            $search = $request->get('search');
            $query->where('first_name', 'like', "%{$search}%")
            ->orWhere('last_name', 'like', "%{$search}%")
            ->orWhere('email', 'like', "%{$search}%");
        }

        $sortBy = $request->get('sort_by');
        $sortOrder = $request->get('sort_order', 'desc');

        if (empty($sortBy)) {
            $sortBy = 'created_at'; // Set default if not provided or empty
        }

        if (!empty($sortBy)) {
            $query->orderBy($sortBy, $sortOrder);
        }
        
        $users = $query->paginate(10);
        // echo "<pre>";
        // print_r($users); exit;
        
        $pageConfigs = [
            'pageHeader' => false,
            'contentLayout' => 'content-left-sidebar',
            'pageClass' => 'users-page'
        ];

        return view('admin.users.list', compact('users', 'pageConfigs'));
    }

    public function create()
    {
        $pageConfigs = [
            'pageHeader' => false,
            'contentLayout' => 'content-left-sidebar',
            'pageClass' => 'users-page'
        ];
        return view('admin.users.create', compact('pageConfigs'));
    }

    public function store(StoreUserRequest $request)
    {
        $validated = $request->validated();
        $validated['password'] = Hash::make($validated['password']);
        User::create($validated);

        return redirect()->route('users.index')->with('success', 'User created successfully.');
    }

    public function edit(User $user)
    {
        $pageConfigs = [
            'pageHeader' => false,
            'contentLayout' => 'content-left-sidebar',
            'pageClass' => 'users-page'
        ];
        return view('admin.users.edit', compact('user', 'pageConfigs'));
    }

    public function update(UpdateUserRequest $request, User $user)
    {
        $validated = $request->validated();
        if (isset($validated['password']) && !is_null($validated['password'])) {
            $validated['password'] = Hash::make($validated['password']);
        } else {
            unset($validated['password']);
        }
        $user->update($validated);

        return redirect()->route('users.index')->with('success', 'User updated successfully.');
    }

    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('users.index')->with('success', 'User deleted successfully.');
    }
}
