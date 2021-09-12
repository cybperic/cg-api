<?php
namespace Cg\Http\Middlewares;


class Authorization
{

    public static function isApiCallAuthorized()
    {
        $requestToken = self::getBearerToken();
        //print_r($requestToken);
        if (in_array($requestToken, self::getAllowedTokens()))
        {
            return true;
        }
        return false;
    }

    protected function getAllowedTokens()
    {
        return array('12345678901234567890');
    }

    protected static function getAuthorizationHeader()
    {
        $headers = null;
        if (function_exists('apache_request_headers'))
        {
            $requestHeaders = apache_request_headers();
            //print_r($requestHeaders);
            if (isset($requestHeaders['Authorization']))
            {
                $headers = trim($requestHeaders['Authorization']);
            }
        }
        elseif (isset($_SERVER['HTTP_AUTHORIZATION']))
        {
            $headers = trim($_SERVER["HTTP_AUTHORIZATION"]);
        }

        return $headers;
    }

    protected static function getBearerToken()
    {
        $headers = self::getAuthorizationHeader();
        if (!empty($headers))
        {
            if (preg_match('/Bearer\s(\S+)/', $headers, $matches))
            {
                return $matches[1];
            }
        }
        return null;
    }



}