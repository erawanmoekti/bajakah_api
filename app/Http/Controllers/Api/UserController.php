<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Reminder;
use App\User;
use Exception;
use Illuminate\Http\Request;
use Ramsey\Uuid\Uuid;

class UserController extends Controller
{
    public function register(Request $request)
    {
        $result = true;
        $message = '';
        $data = '';

        try {
            $id = $request->id;

            User::create([
                'id' => $id,
                'name' => 'tamu',
                'email' => str_replace('-', '', Uuid::fromString($id)->toString()) . '@email.com',
                'password' => bcrypt($id)
            ]);

            $reminder = [];
            $_reminder = [
                'id' => Uuid::uuid4()->toString(),
                'user_id' => $id,
                'keterangan_id' => 'Selamat pagi dan selamat beraktivitas. Jangan lupa mandi, ya!',
                'keterangan_en' => "Good morning and have a good start to the day. Don't forget to take a shower!",
                'jam' => '06:00:00',
                'sunday' => true,
                'monday' => true,
                'tuesday' => true,
                'wednesday' => true,
                'thursday' => true,
                'friday' => true,
                'saturday' => true
            ];
            Reminder::create($_reminder);
            $reminder[] = $_reminder;

            $_reminder = [
                'id' => Uuid::uuid4()->toString(),
                'user_id' => $id,
                'keterangan_id' => 'Halo, selamat siang. Jangan lupa makan siang,ya!',
                'keterangan_en' => "Hallo, good afternoon. Don't forget to have lunch!",
                'jam' => '12:00:00',
                'sunday' => true,
                'monday' => true,
                'tuesday' => true,
                'wednesday' => true,
                'thursday' => true,
                'friday' => true,
                'saturday' => true
            ];
            Reminder::create($_reminder);
            $reminder[] = $_reminder;

            $_reminder = [
                'id' => Uuid::uuid4()->toString(),
                'user_id' => $id,
                'keterangan_id' => 'Jangan lupa patuhi protokol kesehatan : memakai masker, menjaga jarak, dan menjauhi kerumunan!',
                'keterangan_en' => "Don't forget to obey the health protocols: wear masks, keep your distance, and stay away from crowds!",
                'jam' => '15:00:00',
                'sunday' => true,
                'monday' => true,
                'tuesday' => true,
                'wednesday' => true,
                'thursday' => true,
                'friday' => true,
                'saturday' => true
            ];
            Reminder::create($_reminder);
            $reminder[] = $_reminder;

            $_reminder = [
                'id' => Uuid::uuid4()->toString(),
                'user_id' => $id,
                'keterangan_id' => 'Selamat malam! Bagaiamana hari mu? Apakah luar biasa?',
                'keterangan_en' => "Good evening! How was your day? Is it amazing?",
                'jam' => '18:00:00',
                'sunday' => true,
                'monday' => true,
                'tuesday' => true,
                'wednesday' => true,
                'thursday' => true,
                'friday' => true,
                'saturday' => true
            ];
            Reminder::create($_reminder);
            $reminder[] = $_reminder;

            $_reminder = [
                'id' => Uuid::uuid4()->toString(),
                'user_id' => $id,
                'keterangan_id' => 'Waktunya tidur! Selamat tidur dan semoga mimpi indah. Sampai jumpa di esok hari!',
                'keterangan_en' => "It's time to sleep! Good night and have a sweet dream. See you tomorrow!",
                'jam' => '20:00:00',
                'sunday' => true,
                'monday' => true,
                'tuesday' => true,
                'wednesday' => true,
                'thursday' => true,
                'friday' => true,
                'saturday' => true
            ];
            Reminder::create($_reminder);
            $reminder[] = $_reminder;

            $data = $reminder;
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
