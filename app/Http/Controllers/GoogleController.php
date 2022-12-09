<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserAccount;
use Exception;
use Faker\Provider\UserAgent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;

class GoogleController extends Controller
{

    // public function redirectToGoogle()
    // {
    //     return Socialite::driver('google')->redirect();
    // }
    // public function handleGoogleCallBack()
    // {
    //     try {
    //         $user = Socialite::driver('google')->user();
    //         $finduser = UserAccount::where('google_id', $user->id)->first();

    //         if($finduser) {
    //             Auth::login($finduser);
    //             return redirect()->intended('dashboard');
    //         }else{
    //             $newUser = UserAccount::updateOrCreate(['email' => $user->email],[
    //                 'name' => $user->name,
    //                 'google_id' => $user->id,
    //                 'password' => Hash::make('password')
    //             ]);

    //             Auth::login($newUser);
    //             return redirect()->intended('dashboard');
    //         }
    //     }catch (Exception $e){
    //         dd('catch ke salah');
    //     }
    // }

    public function loginWithGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    protected $redirectTo = '/dashboard';
    public function callBackFromGoogle()
    {
        try {
            // dd(UserAccount::all());
            /** Cek users email apa sudah terdaftar */
            $user = Socialite::driver('google')->stateless()->user();
            $is_user = UserAccount::where('email', $user->getEmail())->first();
            if (!$is_user) {
                /** - kondisi false belum ada di db, otomatis create */
                $saveUser = UserAccount::updateOrCreate([
                    'google_id' => $user->getId(),
                ], [
                    'name' => $user->getName(),
                    'email' => $user->getEmail(),
                    'password' => Hash::make($user->getName() . '@' . $user->getId())
                ]);
            } else {
                /** - kondisi true */
                $saveUser = UserAccount::where('email', $user->getEmail())->update([
                    'google_id' => $user->getId(),
                ]);
                $saveUser = UserAccount::where('email', $user->getEmail())->first();

                /** kondisi multilevel - role */
                if ($saveUser->role == 1) {
                    dd($saveUser->role == 1 ? "admin role 1" : "user role 2");
                    return redirect()->intended(route('dashboard'));
                } else {
                    dd($saveUser->role == 1 ? "admin role 1" : "user role 2");
                    return redirect()->intended(route('indexuser'));
                }
            }
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
