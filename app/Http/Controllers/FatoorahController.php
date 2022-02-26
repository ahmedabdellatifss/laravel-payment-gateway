<?php

namespace App\Http\Controllers;
use App\Http\Services\FatoorahServices;
use Illuminate\Http\Request;

class FatoorahController extends Controller
{

    private $fatoorahservices;
    public function __construct(FatoorahServices $fatoorahservices)
    {
        $this-> fatoorahservices = $fatoorahservices;
    }


    public function payOrder()
    {

        $data = [
            "CustomerName" => '',
            "NotificationOption" => "LNK",
            "InvoiceValue" => 100,
            "CustomerEmail" => 'ahmedmohmmed1992@gmail.com',
            "CallCackUrl" => env('success_url'),
            "ErrorUrl" => env('error_url'),
            "Language" => 'en',
            "DisplayCurrencyIso" => 'SA',
        ];

        $this->fatoorahservices->sendPayment($data);
    }


}
