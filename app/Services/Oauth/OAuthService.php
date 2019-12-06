<?php
/**
 * Created by PhpStorm.
 * User: babakfaghihian
 * Date: 11/23/2019 AD
 * Time: 00:54
 */

namespace App\Services\Oauth;

use App\Repositories\Oauth\OauthPasswordRepositoryInterface;

class OAuthService implements OAuthServiceInterface {

    private  $oAuthPasswordRepository = null;

    public function __construct(OauthPasswordRepositoryInterface $repostirory)
    {
        $this->oAuthPasswordRepository = $repostirory;
    }


    public function getToken($username , $password)
    {

        $http= new \GuzzleHttp\Client();
        try {
            $response = $http->request('POST', 'http://127.0.0.1:8000/oauth/token', [
                'headers' => [
                    'cache-control' => 'no-cache',
                    'Content-Type' => 'application/x-www-form-urlencoded'
                ],
                'form_params' => [
                    'username' => $username,
                    'password' => $password,
                    'grant_type' => 'password',
                    'client_id' => env('PASSWORD_GRANT_CLIENT_ID'),
                    'client_secret' => env('PASSWORD_GRANT_CLIENT_SECRET'),
                    'scope' => ''
                ],
            ]);

            return json_decode((string) $response->getBody()->getContents(), true);

        } catch (\GuzzleHttp\Exception\GuzzleException $e) {

            var_dump($e->getMessage());
        }

    }

    /**
     * @param Request $request
     * @return mixed
     */
    public function refreshToken($token)
    {
        $http = new \GuzzleHttp\Client();
        try {
            $response = $http->request('POST', 'http://127.0.0.1:8000/oauth/token', [
                'headers' => [
                    'cache-control' => 'no-cache',
                    'Content-Type' => 'application/x-www-form-urlencoded'
                ],
                'form_params' => [
                    'grant_type' => 'refresh_token',
                    'refresh_token' => $token,
                    'client_id' => env('PASSWORD_GRANT_CLIENT_ID'),
                    'client_secret' => env('PASSWORD_GRANT_CLIENT_SECRET'),
                ],
            ]);

            return json_decode((string) $response->getBody()->getContents(), true);

        } catch (\GuzzleHttp\Exception\GuzzleException $e) {

            var_dump($e->getMessage());

        }

    }
}
