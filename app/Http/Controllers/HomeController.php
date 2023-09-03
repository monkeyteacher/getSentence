<?php

namespace App\Http\Controllers;

use App\Services\DailySentenceService;

class HomeController extends Controller
{
    //
    public function __construct(
        private DailySentenceService $dailySentenceService
    ) {
    }

    public function index()
    {
        $res = $this->dailySentenceService->getSentence();
        if ($res['status'] == 'success') {
            return response()->json(
                [
                'status' => 'success',
                'message' => null,
                'data' => $res['data']
                ],
                200
            );
        } else {
            return response()->json(
                [
                'status' => 'error',
                'message' => $res['data'],
                'data' => null,
                ],
                500
            );
        }
    }
}
