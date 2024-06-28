<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function responseSuccess($data,$code)
    {
        return response()->json([
            "status"=>'success',
            "message"=>"عملیات با موفقیت انجام شد.",
            "data"=>$data
        ],$code);
    }
    public function responseError($code)
    {
        return response()->json([
            "status"=>'error',
            "message"=>"عملیات با مشکل مواجه شد."
        ],$code);
    }
}
