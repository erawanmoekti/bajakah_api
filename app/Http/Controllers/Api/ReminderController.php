<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Reminder;
use Exception;
use Illuminate\Http\Request;
use Ramsey\Uuid\Uuid;

class ReminderController extends Controller
{
    public function get(Request $request)
    {
        $result = true;
        $message = '';
        $data = '';

        try {
            $user_id = $request->user_id;
            $data = Reminder::where('user_id', '=', $user_id)->get();
        } catch (Exception $e) {
            $result = false;
            $message = $e->getMessage();
        }

        return response()->json([
            'result' => $result,
            'message' => $message,
            'data' => $data
        ]);
    }

    public function create(Request $request)
    {
        $result = true;
        $message = '';
        $data = '';

        try {
            $data = $request->all();
            $data['id'] = Uuid::uuid4()->toString();

            Reminder::create($data);
        } catch (Exception $e) {
            $result = false;
            $message = $e->getMessage();
        }

        return response()->json([
            'result' => $result,
            'message' => $message,
            'data' => $data
        ]);
    }

    public function update(string $id, Request $request)
    {
        $result = true;
        $message = '';
        $data = '';

        try {
            $data = $request->all();
            Reminder::find($id)->update($data);
        } catch (Exception $e) {
            $result = false;
            $message = $e->getMessage();
        }

        return response()->json([
            'result' => $result,
            'message' => $message,
            'data' => $data
        ]);
    }

    public function destroy(string $id)
    {
        $result = true;
        $message = '';
        $data = '';

        try {
            Reminder::find($id)->delete();
        } catch (Exception $e) {
            $result = false;
            $message = $e->getMessage();
        }

        return response()->json([
            'result' => $result,
            'message' => $message,
            'data' => $data
        ]);
    }
}
