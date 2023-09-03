<?php

namespace Tests\Feature;

use App\Services\GetDataFromMetaphorpsum;
use Illuminate\Support\Facades\Http;
use Tests\TestCase;

class DailySentenceTest extends TestCase
{
    /**
    * A basic feature test example.
    *
    * @return void
    */
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
}
