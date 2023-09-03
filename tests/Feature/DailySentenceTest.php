<?php

namespace Tests\Feature;

use App\Services\GetDataFromMetaphorpsum;
use App\Services\GetDataFromItsthisforthat;
use Illuminate\Support\Facades\Http;
use Tests\TestCase;

class DailySentenceTest extends TestCase
{
    public function test_GetDataFromMetaphorpsum_is_work()
    {
        Http::fake([
            'http://metaphorpsum.com/sentences/3' => Http::response('Hello metaphorpsum', 200),
        ]);
        $getDataFromMetaphorpsum = new GetDataFromMetaphorpsum();
        $result = $getDataFromMetaphorpsum->getSentence();
        $this->assertIsArray($result);
        $expectedValues = [
            'status'=>'success',
            'data'=>'Hello metaphorpsum'
        ];
        $this->assertEquals($expectedValues, $result);
    }

    public function test_GetDataFromItsthisforthat_is_work()
    {
        Http::fake([
            'https://itsthisforthat.com/api.php?text' => Http::response('Hello itsthisforthat', 200),
        ]);
        $getDataFromItsthisforthat = new GetDataFromItsthisforthat();
        $result = $getDataFromItsthisforthat->getSentence();
        $this->assertIsArray($result);
        $expectedValues = [
            'status'=>'success',
            'data'=>'Hello itsthisforthat',
        ];
        $this->assertEquals($expectedValues, $result);
    }
}
