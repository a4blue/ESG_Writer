<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;

/*
|--------------------------------------------------------------------------
| Console Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of your Closure based console
| commands. Each Closure is bound to a command instance allowing a
| simple approach to interacting with each command's IO methods.
|
*/

Artisan::command('inspire', function (): void {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote');

Artisan::command('send:event-mail', function (): void {
    $webeeEvent = \App\Models\WebeeEvent::all();
    $webeeEvent = $webeeEvent->get(0);

    \Illuminate\Support\Facades\Mail::to('social_team@diva-e.com')->send(new \App\Mail\EventMail($webeeEvent));
});
