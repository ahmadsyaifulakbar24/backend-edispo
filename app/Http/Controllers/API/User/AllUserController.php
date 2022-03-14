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
        $user = $request->user();
        $user_id = ($user->role == 'assistant') ? $user->user_group()->first()->parent_id : $user->id;
        $user_group = UserGroup::userDetail()->where('parent_id', $user_id)->orderBy('order', 'asc')->get();

        return ResponseFormatter::success(UserGroupResource::collection($user_group), 'success get user disposition data');
    }
}
