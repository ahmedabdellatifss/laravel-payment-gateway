<?php

namespace App\Http\Controllers;
use App\Http\Services\FatoorahServices;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Request as FacadesRequest;

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
            "CallBackUrl"=> 'http://127.0.0.1:8000/api/call_back',
            "ErrorUrl" => 'https://youtube.com',
            "Language" => 'en',
            "DisplayCurrencyIso" => 'SAR',
        ];

        return $this->fatoorahservices->sendPayment($data);
    }



    public function paymentCallBack(Request $request)
    {
        $data= [];
        $data['key']=$request->paymentId;
        $data['keyType']='paymentId';

        return $this->fatoorahservices->getPaymentStatus($data);
    }


}
