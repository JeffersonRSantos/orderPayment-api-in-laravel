<?php

namespace App\Http\Controllers;

use App\Http\Controllers\BankStrategyInterface;
use App\Http\Requests\OrderPaymentRequest;
use App\Models\Users;
use App\Models\Solicitation;
use App\Http\Requests\SolicitationRequest;

class Itau implements BankStrategyInterface
{
    /**
     * @var request
     */
    private $solicitationRequest;

    const NAME_BANK = "itau";

    public function __construct(SolicitationRequest $solicitationRequest)
    {
        $this->solicitationRequest = $solicitationRequest;
    }
    
    public function registerPayment()
    {
        $solicitation = Solicitation::where('id_wepayout', '=', $this->solicitationRequest->getIdWepayout())->first();
        $solicitation->status = "processado";
        $solicitation->status_payment = "pago";
        $solicitation->process_bank = self::NAME_BANK;
        $solicitation->update();

        return $solicitation;
    }

    public function paymentSearch($id_wepayout)
    {
        $data = Solicitation::with('user')->where('id_wepayout', '=', $id_wepayout)->first();
        return $data;
    }    
}