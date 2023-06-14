<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Log;

class UserController extends Controller
{
    public function task1(Request $request)
    {
        try {
            $users = User::task1();
            return $this->SendResponse($users);
        } catch (\Exception $e) {
            Log::info("There Is NO users available");
            return ExceptionResponse($e);
        }
    }

    
    public function task2(Request $request)
    {
        try {
            $users = User::task2();
            return $this->SendResponse($users);
        } catch (\Exception $e) {
            Log::info("There Is NO users available");
            return ExceptionResponse($e);
        }
    }


}