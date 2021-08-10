<?php

namespace App\Middlewares;

class CsrfToken
{
    public function token() : string
    {
        try {
            if (session_status() == true) {
                return hash("sha256", session_id());
            }
        } catch (\Exception $e) {
            error_log($e->getFile() . $e->getLine() . $e->getMessage());
        }
    }

    // todo: BlogControllerでvalidateできるようにする
    public function validate($token) : string
    {
        $validateToken = self::token() === $token;
        try {
            if ($validateToken) {
                return $validateToken;
            }
        } catch (\Exception $e) {
            error_log($e->getFile() . $e->getLine() . $e->getMessage());
        }
    }
}