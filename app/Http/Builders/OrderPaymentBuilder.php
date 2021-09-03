<?php 

namespace App\Http\Builders;

use App\Http\Requests\OrderPaymentRequest;
use Illuminate\Http\Request;
use App\Models\Users;

class OrderPaymentBuilder
{
    /**
     * @var Request
     */
    private $orderPayment;

    public function __construct($request)
    {
        $this->orderPayment = new OrderPaymentRequest;
        $this->orderPayment->setName($request['name']);
        $this->orderPayment->setInvoice($request['invoice']);
        $this->orderPayment->setCodBank($request['cod_bank']);
        $this->orderPayment->setNumberAccount($request['number_account']);
        $this->orderPayment->setNumberAgency($request['number_agency']);        
    }

    public function make()
    {
        return $this->orderPayment;
    }

    public function saveRepository()
    {
        $user = new Users;
        $user->name = $this->orderPayment->getName();
        $user->invoice = $this->orderPayment->getInvoice();
        $user->cod_bank = $this->orderPayment->getCodBank();
        $user->number_account = $this->orderPayment->getNumberAccount();
        $user->number_agency = $this->orderPayment->getNumberAgency();
        $user->save();

        return $user;
    }
}
