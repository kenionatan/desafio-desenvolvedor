<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use App\Models\Exchange;

class ExchangeController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        //
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return ['success' => 'Currency conversion API'];
    }


    /**
     * Convert currency
     *
     * @param string $destinationCurrency  Destination currency, other than BRL, such as USD
     * @param string $value                Value for conversion
     * @param string $paymentMethod        Fees applied to purchase price: bank_slip or credit_card
     *
     * @return array|string                Conversion result or error message
     */
    public function convertCurrency($destinationCurrency, $value, $paymentMethod)
    {
        $sourceCurrency = Exchange::SOURCE_CURRENCY;
        $client = new Client([
            'base_uri' => 'https://economia.awesomeapi.com.br/json/',
        ]);
        $response = $client->request('GET', 'last/' . $destinationCurrency . '-' . $sourceCurrency);

        if($response->getStatusCode() == 200) {
            $body = $response->getBody();
            $jsonBody = json_decode($body);
            
            $askRate = '';
            $initialConversionResult = 0;

            foreach($jsonBody as $item) {
                $askRate = $item->ask;
            }

            $initialConversionResult = $askRate * $value;
            $exchangeFee = 0;

            switch ($paymentMethod) {
                case "bank_slip":
                    $exchangeFee = 1.45;
                    break;
                case "credit_card":
                    $exchangeFee = 7.63;
                    break;
            }

            $conversionResult = $initialConversionResult + ($initialConversionResult * ($exchangeFee / 100));
        }

        return $conversionResult;
    }



}
