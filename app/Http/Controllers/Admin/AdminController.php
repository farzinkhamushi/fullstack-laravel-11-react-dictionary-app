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
use Illuminate\Support\Facades\Log;

class AdminController extends Controller
{
    public function index()
    {
        Log::info('index function triggered');
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
        Log::info('login function triggered');
        if(auth()->guard('admin')->check()){
            Log::info('login function triggered admin guard checked true');
            return redirect()->route('admin.index');
            Log::info('login function triggeredadmin guard checked true and redirected to admin.index');
        }
        Log::info('before view admin.login triggered');
        return view('admin.login');
        Log::info('after view admin.login triggered');
    }
    public function auth1(AuthAdminRequest $request){
        Log::info('auth1 function triggered');
        if($request->validated()){
            Log::info('auth1 function triggered validated');
            if(auth()->guard('admin')->attempt([
                'email' => $request->email,
                'password' => $request->password,
            ])){
                Log::info('auth1 function triggered attempt true');
                $request->session()->regenerate();
                return redirect()->route('admin.index');
            }else{
                Log::info('auth1 function triggered attempt false');
                throw ValidationException::withMessages([
                    'email' => 'These credentials do not match our records.',
                    //'email' => trans('auth.failed'),
                ]);
            }
        }
        return redirect()->back();
    }
    public function logout(){
        auth()->guard('admin')->logout();
        return redirect()->route('admin.login');
    }
}
