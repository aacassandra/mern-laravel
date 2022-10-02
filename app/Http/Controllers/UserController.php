<?php

namespace App\Http\Controllers;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $asd = User::all();
        $fix = [];

        foreach ($asd as $item) {
            if ($item->lastSignIn && $item->lastSignOut) {
                $fix[] = [
                    'name' => $item->name,
                    'login_duration' => Carbon::parse()->parse($item->lastSignIn->toDateTime())->diffInMinutes(Carbon::parse()->parse($item->lastSignOut->toDateTime()))
                ];
            }
        }

        return view('index', compact('fix'));
    }
}
