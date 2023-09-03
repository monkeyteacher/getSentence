<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class GetDataFromItsthisforthat implements DailySentenceInterface
{
    public function getSentence()
    {
        $res = null;
        $response = Http::get('https://itsthisforthat.com/api.php?text');
        $body = $response->body();
        $res['data'] = $body;
        if ($response->successful()) {
            $res['status'] = 'success';
        } else {
            $res['status'] = 'error';
            Log::info('itsthisforthat not found');
            Log::info($body);
        }
        return $res;
    }
}
