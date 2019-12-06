<?php

namespace App\Repositories\Oauth;



interface OauthPasswordRepositoryInterface
{
    public function getToken($username , $password);

    public function refreshToken($token);
}
