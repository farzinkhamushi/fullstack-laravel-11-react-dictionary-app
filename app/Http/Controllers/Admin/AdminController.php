<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Definition;
use App\Models\Word;
use App\Models\Synonym;
use App\Models\Plan;
use App\Models\Subscription;
use App\Http\Requests\AuthAdminRequest;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;

class AdminController extends Controller
{
    public function index()
    {
        $definitions = Definition::all();
        $words = Word::all();
        $synonyms = Synonym::all();
        $plans = Plan::all();
        $subscriptions = Subscription::all();

        return view('admin.dashboard')->with([
            'definitions' => $definitions,
            'words' => $words,
            'synonyms' => $synonyms,
            'plans' => $plans,
            'subscriptions' => $subscriptions,
        ]);
    }

    public function login(){
        if(auth()->guard('admin')->check()){
            return redirect()->route('admin.index');
        }
        return view('admin.login');
    }
    
    public function auth(AuthAdminRequest $request){
        if($request->validated()){
            if(auth()->guard('admin')->attempt([
                'email' => $request->email,
                'password' => $request->password,
            ])){
                $request->session()->regenerate();
                return redirect()->route('admin.index');
            }else{
                throw ValidationException::withMessages([
                    'email' => 'These credentials do not match our records.',
                    //'email' => trans('auth.failed'),
                ]);
            }
        }
    }

    public function logout(){
        auth()->guard('admin')->logout();
        return redirect()->route('admin.login');
    }

}
