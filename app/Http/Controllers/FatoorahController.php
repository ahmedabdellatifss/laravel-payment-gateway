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
            "CustomerName" => "Ahmed abdellatif",
            "NotificationOption" => "LNK",
            "InvoiceValue" => 100,
            "CustomerEmail" => 'ahmedmohmmed1992@gmail.com',
            "CallCackUrl" => 'https://google.com',
            "ErrorUrl" => 'https://youtube.com',
            "Language" => 'en',
            "DisplayCurrencyIso" => 'SAR',
        ];

        return $this->fatoorahservices->sendPayment($data);
    }


}
