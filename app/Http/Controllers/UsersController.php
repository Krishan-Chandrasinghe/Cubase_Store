<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class UsersController extends Controller
{
    public function users_index()
    {
        $users = User::get()->all();
        return view('users.users_index', compact('users'));
    }
    public function user_add()
    {
        $reference_names = User::distinct()->get('name');
        return view('users.add_user', compact('reference_names'));
    }
    public function user_store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'gender' => 'required|string|max:255',
            'email' => 'required|email:rfc,dns',
            'city' => 'required|string|max:255',
            'birthday' => 'required|date',
            'reference_name' => 'required|string|max:255',
            'profile_img' => 'nullable|image|mimes:jpg,png,jpeg,webp',
        ]);

        $path = '';
        $file_name = '';

        if ($request->has('profile_img')) {
            $file = $request->file('profile_img');
            $extension = $file->getClientOriginalExtension();
            $file_name = time() . '.' . $extension;

            $path = 'uploads/users/profile_images/';
            $file->move($path, $file_name);
        }

        User::create([
            'name' => $request->name,
            'gender' => $request->gender,
            'email' => $request->email,
            'city' => $request->city,
            'birthday' => $request->birthday,
            'reference_name' => $request->reference_name,
            'profile_img' => $path . $file_name,
        ]);

        return redirect('add_user')->with('status', 'User created successfully!');
    }

    public function user_edit(int $id)
    {
        $user = User::findOrFail($id);
        $reference_names = User::distinct()->get('name');
        return view('users.edit_user', compact('user', 'reference_names'));
    }
    public function user_update(Request $request, int $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'gender' => 'required|string|max:255',
            'email' => 'required|email:rfc,dns',
            'city' => 'required|string|max:255',
            'birthday' => 'required|date',
            'reference_name' => 'nullable|string|max:255',
            'profile_img' => 'nullable|image|mimes:jpg,png,jpeg,webp',
        ]);

        $old_file = User::findOrFail($id);
        $path = '';
        $file_name = $old_file->profile_img;

        if ($request->has('profile_img')) {
            $file = $request->file('profile_img');
            $extension = $file->getClientOriginalExtension();
            $file_name = time() . '.' . $extension;

            $path = 'uploads/users/profile_images/';
            $file->move($path, $file_name);

            if (File::exists($old_file->profile_img)) {
                File::delete($old_file->profile_img);
            }
        }

        $old_file->update([
            'name' => $request->name,
            'gender' => $request->gender,
            'email' => $request->email,
            'city' => $request->city,
            'birthday' => $request->birthday,
            'reference_name' => $request->reference_name,
            'profile_img' => $path . $file_name,
        ]);

        return redirect('users/' . $id . '/edit')->with('status', 'User updated successfully!');
    }
    public function user_delete(int $id){
        $record = User::findOrFail($id);

        if(File::exists($record->profile_img)){
            File::delete($record->profile_img);
        }

        $record->delete();

        return redirect()->back()->with('status', 'User deleted successfully!');
    }

    public function user_profile(int $id){
        $profile = User::findOrFail($id);
        return view('users.profile',compact('profile'));
    }
    // public function user_profile(){
    //     return view('users.profile');
    // }
}
