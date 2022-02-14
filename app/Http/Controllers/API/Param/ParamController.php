<?php

namespace App\Http\Controllers\API\Param;

use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Http\Resources\Param\ParamResource;
use App\Models\Param;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ParamController extends Controller
{
    public function get_mail_nature(Request $request)
    {
        return $this->param($request, 'mail_nature', 'success get mail nature data');
    }

    public function get_instruction(Request $request)
    {
        return $this->param($request, 'instruction', 'success get instruction data');
    }

    public function get_mail_security(Request $request)
    {
        return $this->param($request, 'mail_security', 'success get mail security data');
    }

    public function get_mail_type(Request $request)
    {
        return $this->param($request, 'mail_type', 'success get mail type data');
    }

    public function param ($request, $category, $message) {
        $request->validate([
            'id' => [
                'nullable',
                Rule::exists('params', 'id')->where(function($query) use ($category) {
                    return $query->where('category', $category);
                })
            ]
        ]);

        if($request->id){
            $param = Param::find($request->id);
            return ResponseFormatter::success(new ParamResource($param), $message);
        } else {
            $param = Param::where('category', $category)->get();
            return ResponseFormatter::success(ParamResource::collection($param), $message);
        }
    }
}
