<?php

namespace App\Actions\WebeeEventProcessor;

use App\Models\WebeeEvent;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class WebeeEventProcessor
{
    /**
     * @throws \Safe\Exceptions\JsonException
     */
    public function processStoreEventRequest(Request $request): Response
    {
        $response = new Response();
        $requestContent = $request->getContent();

        if(!is_string($requestContent)){
            return $response->setStatusCode(500);
        }

        $jsonContent = \Safe\json_decode($requestContent,true);
        $jsonContent['error_info'] = \Safe\json_encode($jsonContent['error_info']);

        $webeeEventRequest = (new WebeeEvent)->fill($jsonContent);

        $webeeEventsByEventUrl = WebeeEvent::where('event_url',$webeeEventRequest->event_url)->get();

        if($webeeEventsByEventUrl->count() > 0){
            $webeeEvent = $webeeEventsByEventUrl->get(0);
            $webeeEvent->fill($jsonContent);
            $webeeEvent->save();

            $response->setContent('URL');

            return $response;
        }

        $webeeEventsByEventTitle = WebeeEvent::where('title',$webeeEventRequest->title)->get();

        if($webeeEventsByEventTitle->count() > 0){
            $webeeEvent = $webeeEventsByEventTitle->get(0);
            $webeeEvent->fill($jsonContent);
            $webeeEvent->save();

            $response->setContent('Title');

            return $response;
        }

        $webeeEventRequest->save();

        $response->setContent('New');

        return $response;
    }
}
