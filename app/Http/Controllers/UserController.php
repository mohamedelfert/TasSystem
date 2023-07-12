<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\Facades\Image;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $users = User::where('role_name', '!=', 'super_admin')->where(function ($q) use ($request) {
            return $q->when($request->search, function ($query) use ($request) {
                return $query->where('first_name', 'LIKE', '%' . $request->search . '%')
                    ->orWhere('last_name', 'LIKE', '%' . $request->search . '%')
                    ->orWhere('status', 'LIKE', '%' . $request->search . '%')
                    ->orWhere('email', 'LIKE', '%' . $request->search . '%');
            });
        })->latest()->paginate(20);
        return view('dashboard.users.index', compact('users'));
    }

    public function create()
    {
        return view('dashboard.users.create');
    }

    public function store(UserRequest $request)
    {
        $data = $request->except(['password', 'password_confirmation']);
        $data['password'] = Hash::make($request->password);

        $user = User::create($data);
        $user->assignRole($request->input('role_name'));

        toast(__('Added successfully'), 'success');
        return redirect(route('admin.users.index'));
    }

    public function show(User $user)
    {
//        dd(['user_id'=>$user->id,'user_role'=>$user->role_name,'auth_user'=>auth()->user()->role_name,'auth_role'=>auth()->user()->id]);
        if ($user->id !== auth()->user()->id && auth()->user()->role_name != 'super_admin') {
            abort(403);
        }

        return view('dashboard.users.show', compact('user'));
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);

        if ($user->id !== auth()->user()->id && auth()->user()->role_name != 'super_admin') {
            abort(403);
        }

        return view('dashboard.users.edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        $rules = [
            'name' => 'required|unique:users,name,' . $user->id,
            'first_name' => 'required|unique:users,first_name,' . $user->id,
            'last_name' => 'required|unique:users,last_name,' . $user->id,
            'email' => 'required|email|unique:users,email,' . $user->id,
            'status' => 'required',
            'role_name' => 'required'
        ];

        $validation = $this->validate($request, $rules);

        $user->update($request->all());
        DB::table('model_has_roles')->where('model_id', $user->id)->delete();
        $user->assignRole($request->input('role_name'));

        toast(__('Edited successfully'), 'success');
        return redirect(route('admin.users.index'));
    }

    public function destroy(User $user)
    {
        if ($user->image != 'default.png') {
            Storage::disk('public_uploads')->delete('/users_images/' . $user->image);
        }
        $user->delete();
        toast(__('Deleted successfully'), 'success');
        return redirect(route('admin.users.index'));
    }

    public function showProfile($id)
    {
        $user = User::findOrFail($id);

        if ($user->id !== auth()->user()->id && auth()->user()->role_name != 'super_admin') {
            abort(403);
        }

        return view('dashboard.users.show_profile', compact('user'));
    }

    public function editProfile($id)
    {
        $user = User::findOrFail($id);

        if ($user->id !== auth()->user()->id && auth()->user()->role_name != 'super_admin') {
            abort(403);
        }

        return view('dashboard.users.edit_profile', compact('user'));
    }

    public function profile(Request $request, $id)
    {
        $validation = Validator::make($request->all(), [
            'name' => 'required',
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email|unique:users,email,' . $id,
//            'email' => ['required', Rule::unique('users')->ignore($id)],
            'password' => 'sometimes|nullable|confirmed',
            'image' => 'sometimes|nullable|image|mimes:png,jpg,jpeg,gif',
        ]);

        if ($validation->fails()) {
            return redirect()->back()->withErrors($validation)->withInput();
        }

        $data = $request->except(['password', 'password_confirmation', 'image']);

        if ($request->password != null) {
            $data['password'] = bcrypt($request->password);
        }

        $user = User::findOrFail($id);

        if ($request->image) {

            if ($user->image != 'default.png') {
                Storage::disk('public_uploads')->delete('/users_images/' . $user->image);
            }

            Image::make($request->image)->resize(300, null, function ($constraint) {
                $constraint->aspectRatio();
            })->save(public_path('/uploads/users_images/' . $request->image->hashName()));

            $data['image'] = $request->image->hashName();

        }

        $user->update($data);

        toast(__('Updated successfully'), 'success');
        return redirect(route('admin.users.index'));
    }
}
