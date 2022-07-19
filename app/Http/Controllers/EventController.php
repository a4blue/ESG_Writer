<?php

namespace App\Http\Controllers;

use App\Actions\WebeeEventProcessor\WebeeEventProcessor;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class EventController extends Controller
{
    public function __construct(
        protected WebeeEventProcessor $webeeEventProcessor,
    )
    {
    }

    public function store(Request $request): Response
    {
        return $this->webeeEventProcessor->processStoreEventRequest($request);
    }
}
