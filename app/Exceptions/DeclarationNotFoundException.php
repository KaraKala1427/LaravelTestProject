<?php

namespace App\Exceptions;

use Exception;

class DeclarationNotFoundException extends Exception
{
    public function report()
    {
        \Log::debug('Declaration not found');
    }
}
