<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;

use App\Http\Controllers\API\BaseController as BaseController;

use Illuminate\Support\Facades\Auth;

use App\User;

use App\Merchant;

use Validator;

class LoginController extends BaseController
{

    /**
     * Login api
     *
     * @return \Illuminate\Http\Response
     */
    public function login(Request $request)
    {
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {

            $user = Auth::user();
            $success = $user;
            $success['token'] = $user->createToken('MyApp')->accessToken;
            if($user->role == 1){
                $merchant = Merchant::where('user_id',$user->id)->first();
                $success['merchant_id'] = $merchant->id;
            }
            return $this->sendResponse($success, 'Login successfully.');

        } else {

            return $this->sendError('Unauthorised','',401);  

        }
    }
}