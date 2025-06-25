<?php

use Illuminate\Support\Facades\Crypt;
use Illuminate\Contracts\Encryption\DecryptException;

if (!function_exists('decrypt_id')) {
    function decrypt_id($encryptedId)
    {
        try {
            return Crypt::decryptString($encryptedId);
        } catch (DecryptException $e) {
            abort(403, 'Invalid ID');
        }
    }
}

if (!function_exists('encrypt_id')) {
    function encrypt_id($plainId)
    {
        return Crypt::encryptString($plainId);
    }
}