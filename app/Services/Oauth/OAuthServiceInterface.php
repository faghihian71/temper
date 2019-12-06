<?php
/**
 * Created by PhpStorm.
 * User: babakfaghihian
 * Date: 11/23/2019 AD
 * Time: 00:53
 */
namespace App\Services\Oauth;

interface OAuthServiceInterface {

        public function getToken($username , $password);
        public function refreshToken($token);
}
