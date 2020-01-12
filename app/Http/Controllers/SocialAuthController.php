<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Socialite, Auth, Redirect, Session, URL;
use App\User;


class SocialAuthController extends Controller
{
    public function redirectToProvider($provider)
    {
        if(!Session::has('pre_url')){
            Session::put('pre_url', URL::previous());
        }else{
            if(URL::previous() != URL::to('login')) Session::put('pre_url', URL::previous());
        }
        return Socialite::driver($provider)->redirect();
    }  

    /**
     * Lấy thông tin từ Provider, kiểm tra nếu người dùng đã tồn tại trong CSDL
     * thì đăng nhập, ngược lại nếu chưa thì tạo người dùng mới trong SCDL.
     *
     * @return Response
     */
    public function handleProviderCallback(Request $request, $provider)
    {
    	switch ($provider) {
		case 'google':
				 try {
			        $user = Socialite::driver('google')->user();
			    } catch (\Exception $e) {
			        return redirect('/login');
			    }

      // check if they're an existing user
		    $existingUser = User::where('email', $user->email)->first();

		    if($existingUser){

		    	$request->session()->put('user_id', $existingUser->id);
		        $request->session()->put('fullname', $existingUser->HoTen);
		        $request->session()->put('login_api', 1);
		        $request->session()->put('member', 'logined');

		   		return Redirect::to(Session::get('pre_url'));

		    } else {
		        // create a new user
		        $newUser                  = new User;
		        $newUser->email           = $user->email;
		        $newUser->password 		  = '';
		        $newUser->HoTen           = $user->name;
		        $newUser->provider        = $provider;
		        $newUser->provider_id     = $user->id;

		        $newUser->save();

		        $request->session()->put('user_id', $newUser->id);
		        $request->session()->put('fullname', $user->name);
		        $request->session()->put('login_api', 1);
		        $request->session()->put('member', 'logined');


		   		 return Redirect::to(Session::get('pre_url'));
		    }
    			break;
    		case 'facebook':
    			 try {
			            $user = Socialite::driver('facebook')->user();
			        } catch (\Exception $e) {
			            return redirect('/login');
			        }

			        // check if they're an existing user
			        $existingUser = User::where('email', $user->email)->first();

			        if($existingUser){

			        	$request->session()->put('user_id', $existingUser->id);
			            $request->session()->put('fullname', $existingUser->HoTen);
			            $request->session()->put('login_api', 1);
			            $request->session()->put('member', 'logined');

			       		return Redirect::to(Session::get('pre_url'));

			        } else {
			            // create a new user
			            $newUser                  = new User;
			            $newUser->email           = $user->email;
			            $newUser->password 		  = '';
			            $newUser->HoTen           = $user->name;
			            $newUser->provider        = $provider;
			            $newUser->provider_id     = $user->id;

			            $newUser->save();

			            $request->session()->put('fullname', $user->name);
			            $request->session()->put('login_api', 1);
			            $request->session()->put('member', 'logined');


			       		 return Redirect::to(Session::get('pre_url'));
			        }
			    break;
    	}

    }
 
}
