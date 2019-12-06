<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Validator;
use App\Services\Oauth\OAuthServiceInterface;


class AuthController extends Controller
{
    private $OAuthService;

    public function __construct(OAuthServiceInterface $OAuthService)
    {
        $this->OAuthService = $OAuthService;
    }

    public function register(Request $request) {
        $validator = Validator::make($request->all(),
            [
                'name' => 'required',
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                'password' => 'required',
                'c_password' => 'required|same:password',
            ]);
        if ($validator->fails()) {
            return response()->json(['error'=>$validator->errors()], 401);                        }
        $input = $request->all();
        $input['password'] = bcrypt($input['password']);
        $user = User::create($input);



        return $this->authenticate($request);
    }


    /**
     * @param Request $request
     * @return mixed
     */
    protected function authenticate(Request $request)
    {
        $credential = $this->OAuthService->getToken($request->username , $request->password);

        return $credential;
    }

    /**
     * @param Request $request
     * @return mixed
     */
    protected function refreshToken(Request $request)
    {
        $credential = $this->OAuthService->refreshToken($request->refresh_token);

        return $credential;


    }

}
