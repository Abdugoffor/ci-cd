<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\UserStoreRequest;
use App\Http\Requests\User\UserUpdateRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $models = User::orderByDesc('id')->paginate(10);
        return view('admin.users.index', data: ['models' => $models]);
    }
    public function search(Request $request)
    {
        $query = User::query();

        if ($request->filled('name')) {
            $query->where('name', 'LIKE', "%{$request->name}%");
        }

        if ($request->filled('role')) {
            $query->where('role', 'LIKE', "%{$request->role}%");
        }

        if ($request->filled('email')) {
            $query->where('email', 'LIKE', "%{$request->email}%");
        }

        if ($request->filled('status')) {
            $query->where('status', filter_var($request->status, FILTER_VALIDATE_BOOLEAN));
        }

        $models = $query->paginate(10);
        $models->appends($request->only(['name', 'role', 'email', 'is_active']));

        return view('admin.users.index', ['models' => $models]);
    }
    public function create()
    {
        return view('admin.users.create');
    }
    public function store(UserStoreRequest $request)
    {
        User::create($request->all());
        return redirect()->route('users.index')->with('notification', getTranslation('notification'));
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
        return redirect()->route('users.index')->with('notification', getTranslation('notification'));
    }

    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('users.index')->with('notification', getTranslation('notification'));
    }
    public function status(User $user)
    {
        $user->update(['status' => ! $user->status]);
        return back()->with('notification', getTranslation('notification'));
    }
}
