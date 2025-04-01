<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\UserStoreRequest;
use App\Http\Requests\User\UserUpdateRequest;
use App\Models\Country;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $models   = User::orderByDesc('id')->paginate(10);
        $countrys = Country::all();
        return view('admin.users.index', data: ['models' => $models, 'countrys' => $countrys]);
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

        if ($request->filled('country_id') && $request->country_id !== '') {
            $query->where('country_id', $request->country_id);
        }

        if ($request->filled('status') && $request->status !== '') {
            $query->where('status', filter_var($request->status, FILTER_VALIDATE_BOOLEAN));
        }

        $models = $query->paginate(10);
        $models->appends($request->only(['name', 'role', 'email', 'country_id', 'status']));

        $countrys = Country::all();

        return view('admin.users.index', [
            'models'   => $models,
            'countrys' => $countrys,
        ]);
    }
    public function create()
    {
        $countrys = Country::all();
        return view('admin.users.create', ['countrys' => $countrys]);
    }
    public function store(UserStoreRequest $request)
    {
        User::create($request->all());
        return redirect()->route('users.index')->with('notification', getTranslation('notification'));
    }

    public function show(User $user)
    {
        return view('admin.users.show', ['model' => $user]);
    }
    public function edit(User $user)
    {
        $countrys = Country::all();
        return view('admin.users.edit', ['model' => $user, 'countrys' => $countrys]);
    }

    public function update(UserUpdateRequest $request, User $user)
    {
        $data = $request->only(['name', 'role', 'email', 'status']);

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
