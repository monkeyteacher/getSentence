<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class DailySentenceService
{
    public function getSentence()
    {
        $res = null;
        $response = Http::get('http://metaphorpsum.com/sentences/3');
        $body = $response->body();
        $res['data'] = $body;
        if ($response->successful()) {
            $res['status'] = 'success';
        } else {
            $res['status'] = 'error';
            Log::info('metaphorpsum not found');
            Log::info($body);
        }
        return $res;
    }
}
