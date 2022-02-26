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

        // we need to save invoiceId that retrun from previos step to DB
        // and need to userId who get it from middlware that we put it to api Route
        // after payment complete and return to callback url will get invoiceId we can search in table to know who is the owner of the payment
    }



    public function paymentCallBack(Request $request)
    {
        $data= [];
        $data['key']=$request->paymentId;
        $data['keyType']='paymentId';

        $paymentData = $this->fatoorahservices->getPaymentStatus($data);
        return $paymentData['Data']['InvoiceId'];

        //search where invoice id = $paymentData['Data']['InvoiceId'];

    }


}
