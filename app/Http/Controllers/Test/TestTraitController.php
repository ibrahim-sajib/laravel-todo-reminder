<?php

namespace App\Http\Controllers\Test;

use App\Http\Controllers\Controller;
use App\Services\LoggerService;
use App\Trait\LoggerTrait;
use Illuminate\Http\Request;

class TestTraitController extends Controller
{
    use LoggerTrait;
    public function __invoke(Request $request, LoggerService $logger)
    {
        $this->logMessage('This is a log message from the trait.');
        $logger->logMessage('Logging via LoggerService using trait');
        return 'Logged successfully!';
    }
}
