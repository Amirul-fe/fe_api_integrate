<?php

namespace App\Traits;

trait FlightApiTrait
{
    public function apiRequest($endpoint, $type, $request)
    {
        $headers = [
            'Content-Type: application/json',
            'Accept: application/json',
            'token: '.request()->header('token'),
        ];

        $postData = $request->json()->all();

        $data = json_encode($postData);

        $ch = curl_init();

        curl_setopt_array($ch, [
            CURLOPT_URL => $endpoint,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => $type,
            CURLOPT_POSTFIELDS => $data,
            CURLOPT_HTTPHEADER => $headers,
        ]);

        $response = curl_exec($ch);

        if (curl_errno($ch)) {

            return response()->json([
                'status' => 'failed to connect',
                'message' => curl_error($ch),
            ]);
        }
        curl_close($ch);

        $data = json_decode($response, true);

        return response()->json($data);
    }
}
