<?php

namespace App\Http\Controllers\API\User;

use App\Helpers\FileHelpers;
use App\Helpers\FindSuperior;
use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Http\Resources\User\UserDetailResource;
use App\Http\Resources\User\UserGroupResource;
use App\Http\Resources\User\UserResource;
use App\Models\User;
use App\Models\UserGroup;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AllUserController extends Controller
{
    public function disposition(Request $request)
    {
        $user = $request->user();
        $user_id = FindSuperior::superior($user);
        $user_group = UserGroup::userDetail()->where('parent_id', $user_id)->orderBy('order', 'asc')->get();

        return ResponseFormatter::success(UserGroupResource::collection($user_group), 'success get user disposition data');
    }

    public function show(User $user) {
        return ResponseFormatter::success(new UserDetailResource($user), 'success get user detail data');
    }

    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => ['required', 'string'],
            'email' => ['nullable', 'email'],
            'nip' => ['nullable', 'string'],
            'nik' => ['nullable', 'string'],
            'gender' => ['nullable', 'in:laki-laki,perempuan'],
            'phone_number' => ['nullable', 'numeric'],
            'position_name' => ['nullable', 'string'],
            'photo' => ['nullable', 'image'],
        ]);

        $input = $request->only([
            'name',
            'email',
            'nip',
            'nik',
            'gender',
            'phone_number',
            'position_name',
        ]);

        if($request->photo) {
            $input['photo'] = FileHelpers::upload_file('profile', $request->photo);
        }

        $user->update($input);

        return ResponseFormatter::success(new UserDetailResource($user), 'success update user data');
    }

    public function reset_password(Request $request)
    {
        $request->validate([
            'old_password' => ['required', 'string'],
            'password' => ['required', 'confirmed', 'min:8'],
            'password_confirmation' => ['required', 'min:8'],
        ]);

        $user = User::find($request->user()->id);
        if(!Hash::check($request->old_password, $user->password)){
            return ResponseFormatter::error([
                'message' => 'wrong old password'
            ], 'change password failed', 422);
        }
        $user->update([
            'password' => Hash::make($request->password)
        ]);

        return ResponseFormatter::success(new UserResource($user), 'success change password user');
    }
}
