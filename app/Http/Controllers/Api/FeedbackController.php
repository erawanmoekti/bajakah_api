<?php

namespace App\Http\Controllers\Api;

use App\Feedback;
use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Http\Request;
use Ramsey\Uuid\Uuid;

class FeedbackController extends Controller
{
    public function create(Request $request)
    {
        $result = true;
        $message = '';

        try {
            $data = $request->all();
            $data['id'] = Uuid::uuid4()->toString();

            Feedback::create($data);
        } catch (Exception $e) {
            $result = false;
            $message = $e->getMessage();
        }

        return response()->json([
            'result' => $result,
            'message' => $message
        ]);
    }
}
