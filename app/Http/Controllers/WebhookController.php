<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WebhookController extends Controller
{
    public function handleWebhook(Request $request)
    {
        // handle the webhook request
        dd($request);
        return ("webhook berhasil");
    }
}
