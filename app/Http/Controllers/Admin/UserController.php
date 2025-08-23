<?php

namespace App\Http\Controllers\Admin;

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
        $query = User::query();

        if ($request->has('search')) {
            $search = $request->get('search');
            $query->where('first_name', 'like', "%{$search}%")
                  ->orWhere('last_name', 'like', "%{$search}%")
                  ->orWhere('email', 'like', "%{$search}%");
        }

        if ($request->has('sort_by') && $request->has('sort_order')) {
            $sortBy = $request->get('sort_by');
            $sortOrder = $request->get('sort_order');
            $query->orderBy($sortBy, $sortOrder);
        }

        $users = $query->paginate(10);
        
        $pageConfigs = [
            'pageHeader' => false,
            'contentLayout' => 'content-left-sidebar',
            'pageClass' => 'users-page'
        ];

        return view('admin.users.index', compact('users', 'pageConfigs'));
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
        if (isset($validated['password'])) {
            $validated['password'] = Hash::make($validated['password']);
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
