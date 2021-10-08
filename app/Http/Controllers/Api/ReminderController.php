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
            $data = Reminder::where('user_id', '=', $user_id)->orderBy('jam')->get();
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

        try {
            $data = $request->all();
            $data['id'] = Uuid::uuid4()->toString();
            $data["sunday"] = $data["sunday"] === 'true' ? true : false;
            $data["monday"] = $data["monday"] === 'true' ? true : false;
            $data["tuesday"] = $data["tuesday"] === 'true' ? true : false;
            $data["wednesday"] = $data["wednesday"] === 'true' ? true : false;
            $data["thursday"] = $data["thursday"] === 'true' ? true : false;
            $data["friday"] = $data["friday"] === 'true' ? true : false;
            $data["saturday"] = $data["saturday"] === 'true' ? true : false;

            Reminder::create($data);
        } catch (Exception $e) {
            $result = false;
            $message = $e->getMessage();
        }

        return response()->json([
            'result' => $result,
            'message' => $message
        ]);
    }

    public function update(string $id, Request $request)
    {
        $result = true;
        $message = '';

        try {
            $data = $request->all();
            $data["sunday"] = $data["sunday"] === 'true' ? true : false;
            $data["monday"] = $data["monday"] === 'true' ? true : false;
            $data["tuesday"] = $data["tuesday"] === 'true' ? true : false;
            $data["wednesday"] = $data["wednesday"] === 'true' ? true : false;
            $data["thursday"] = $data["thursday"] === 'true' ? true : false;
            $data["friday"] = $data["friday"] === 'true' ? true : false;
            $data["saturday"] = $data["saturday"] === 'true' ? true : false;
            Reminder::find($id)->update($data);
        } catch (Exception $e) {
            $result = false;
            $message = $e->getMessage();
        }

        return response()->json([
            'result' => $result,
            'message' => $message
        ]);
    }

    public function destroy(string $id)
    {
        $result = true;
        $message = '';

        try {
            Reminder::find($id)->delete();
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
