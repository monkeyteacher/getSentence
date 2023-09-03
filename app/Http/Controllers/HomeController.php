<?php

namespace App\Http\Controllers;

use App\Services\DailySentenceInterface;

class HomeController extends Controller
{
    //
    public function __construct(
        private DailySentenceInterface $dailySentenceInterface
    ) {
    }

    public function index()
    {
        $res = $this->dailySentenceInterface->getSentence();
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
