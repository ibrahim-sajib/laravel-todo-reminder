<?php

namespace App\Trait;

trait LoggerTrait
{
    public function logMessage($message)
    {
        \Log::info($message);
    }
}
