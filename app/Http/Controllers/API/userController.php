<?php

namespace App\Http\Controllers\API;

use App\Models\user;
use App\Http\Resources\PostResource;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

class userController extends Controller
{
    public function index(){
        $users = User::latest()->simplePaginate(10);
        foreach($users as $user){
            $user->password=base64_decode($user->password);
        }
        return view('pages.pengguna', compact('users'));
    }
    public function store(Request $request)
    {
        
    }
}
