<?php

namespace App\Http\Controllers\flight\v1;

use App\Http\Controllers\Controller;
use App\Traits\FlightApiTrait;
use Illuminate\Http\Request;

class FlightController extends Controller
{
    use FlightApiTrait;

    public function createToken(Request $request)
    {

        $apiUrl = config('app.FE_API_ENDPOINT').'/apiout/'.'v1/'.'create-token';

        $postData = $request->json()->all();

        $data = json_encode($postData);

        $headers = [
            'Content-Type: application/json',
            'Accept: application/json',
        ];

        $ch = curl_init($apiUrl);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

        $response = curl_exec($ch);

        curl_close($ch);

        $data = json_decode($response, true);

        return response()->json($data);
    }

    public function flightSearch(Request $request)
    {
        $apiUrl = config('app.FE_API_ENDPOINT').'/apiout/'.'flight/'.'v1/'.'search';

        return $this->apiRequest($apiUrl, $requestType = 'GET', $request);
    }

    public function price(Request $request)
    {

        $apiUrl = config('app.FE_API_ENDPOINT').'/apiout/'.'flight/'.'v1/'.'price';

        return $this->apiRequest($apiUrl, $requestType = 'GET', $request);
    }

    public function fareRules(Request $request)
    {
        $apiUrl = config('app.FE_API_ENDPOINT').'/apiout/'.'flight/'.'v1/'.'fare-rules';

        return $this->apiRequest($apiUrl, $requestType = 'GET', $request);
    }

    public function saveTraveller(Request $request)
    {
        $apiUrl = config('app.FE_API_ENDPOINT').'/apiout/'.'flight/'.'v1/'.'save-travelers';

        return $this->apiRequest($apiUrl, $requestType = 'PUT', $request);
    }

    public function bookTicket(Request $request)
    {
        $apiUrl = config('app.FE_API_ENDPOINT').'/apiout/'.'flight/'.'v1/'.'book';

        return $this->apiRequest($apiUrl, $requestType = 'POST', $request);
    }

    public function storeTicket(Request $request)
    {
        $apiUrl = config('app.FE_API_ENDPOINT').'/apiout/'.'flight/'.'v1/'.'ticket';

        return $this->apiRequest($apiUrl, $requestType = 'POST', $request);
    }

    public function pnrImport(Request $request)
    {
        $apiUrl = config('app.FE_API_ENDPOINT').'/apiout/'.'flight/'.'v1/'.'import-pnr';

        return $this->apiRequest($apiUrl, $requestType = 'POST', $request);
    }
}
