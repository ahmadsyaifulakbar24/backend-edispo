<?php

namespace App\Http\Controllers\API\User;

use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Http\Resources\User\UserGroupResource;
use App\Models\User;
use App\Models\UserGroup;
use Illuminate\Http\Request;

class AllUserController extends Controller
{
    public function disposition(Request $request)
    {
        $user = User::find($request->user()->id);
        $user_group = UserGroup::userDetail()->where('parent_id', $user->id)->orderBy('order', 'asc')->get();

        return ResponseFormatter::success(UserGroupResource::collection($user_group), 'success get user disposition data');
    }
}
