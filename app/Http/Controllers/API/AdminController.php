<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('IsVerifyEmail');
    }

    public function index()
    {

           $users = Http::get('https://jsonplaceholder.typicode.com/users');
           return response()->json(json_decode($users));
    }
}
