<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\UserStoreRequest;
use App\Http\Requests\User\UserUpdateRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $models = User::orderByDesc('id')->paginate(10);
        return view('admin.users.index', data: ['models' => $models]);
    }
    public function create()
    {
        return view('admin.users.create');
    }
    public function store(UserStoreRequest $request)
    {
        User::create($request->all());
        return redirect()->route('users.index');
    }

    public function edit(User $user)
    {
        return view('admin.users.edit', ['model' => $user]);
    }

    public function update(UserUpdateRequest $request, User $user)
    {
        $data = $request->only(['name', 'role', 'email']);

        if ($request->filled('password')) {
            $data['password'] = Hash::make($request->password);
        }
        $user->update($data);
        return redirect()->route('users.index');
    }

    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('users.index');
    }
    public function status(User $user)
    {
        $user->update(['status' => ! $user->status]);
        return back();
    }
}
