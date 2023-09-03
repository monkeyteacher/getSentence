<?php

namespace Tests\Feature;

use App\Services\DailySentenceService;
use Illuminate\Support\Facades\Http;
use Tests\TestCase;

class DailySentenceTest extends TestCase
{
    /**
    * A basic feature test example.
    *
    * @return void
    */
    public function test_DailySentenceService_is_work()
    {
        Http::fake([
            'http://metaphorpsum.com/sentences/3' => Http::response('Hello metaphorpsum', 200),
        ]);
        $DailySentenceService = new DailySentenceService();
        $result = $DailySentenceService->getSentence();
        $this->assertIsArray($result);
        $expectedValues = [
            'status'=>'success',
            'data'=>'Hello metaphorpsum'
        ];
        $this->assertEquals($expectedValues, $result);
    }
}
