<?php

namespace App\Exceptions;

use Exception;

class NotFoundException extends Exception
{
    protected $message = 'Resource Not Found';

    public function render()
    {
        return response()->json([
            'message' => $this->message,
        ], 404);
    }
}
