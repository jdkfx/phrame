<?php /** @noinspection PhpInconsistentReturnPointsInspection */

namespace App\Middlewares;

use Exception;

class CsrfToken
{
    public function token() : string
    {
        try {
            if (session_status()) {
                return hash("sha256", session_id());
            }
        } catch (Exception $e) {
            error_log($e->getFile() . $e->getLine() . $e->getMessage());
        }
    }

    public function validate($token) : bool
    {
        $validateToken = self::token() === $token;
        try {
            if (!$validateToken) {
                return false;
            } else {
                return true;
            }
        } catch (Exception $e) {
            error_log($e->getFile() . $e->getLine() . $e->getMessage());
        }
    }
}