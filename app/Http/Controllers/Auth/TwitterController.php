<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Socialite;
use App\User;
use Auth;
use DB;

class TwitterController extends Controller
{

    public function redirectToProvider(){
        // <develop>
        if (app('env') != 'production' && app('env') != 'test') {
            $user = User::first();
            if ($user) {
                Auth::login($user, true);
                return redirect()->route('plan.index');
            }
            return redirect()->route('plan.index');
        }
        // </develop>
        if (Auth::user()) {
            return redirect()->route('plan.index');
        } else {
            if (DB::table('users')->count() > 100) {
                return '登録ユーザー数制限をかけております<br>希望される方は、大変恐れ入りますが<br><a href="https://twitter.com/hal822tw">https://twitter.com/hal822tw</a>へご連絡をいただけると幸いです。';
            }
        }
        return Socialite::driver('twitter')->redirect();
    }

    public function handleProviderCallback(){
        try {
            $user = Socialite::driver('twitter')->user();
        } catch (Exception $e) {
            return redirect('auth/twitter');
        }
        $authUser = $this->findOrCreateUser($user);
        Auth::login($authUser, true);
        return redirect()->route('plan.index');
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('plan.index');
    }

    private function findOrCreateUser($twitterUser) {
        $authUser = User::where('twitter_id', $twitterUser->id)->first();
        if ($authUser) {
            return $authUser;
        }

        return User::create([
            'name' => $twitterUser->name,
            'nickname' => $twitterUser->nickname,
            'twitter_id' => $twitterUser->id,
            'avatar' => $twitterUser->avatar_original,
        ]);
    }
}
