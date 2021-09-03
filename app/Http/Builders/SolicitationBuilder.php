<?php 

namespace App\Http\Builders;

use App\Http\Requests\SolicitationRequest;
use App\Models\Solicitation;
use App\Http\Builders\OrderPaymentBuilder;
use App\Models\Users;
use App\Helpers\Tools;

class SolicitationBuilder
{
    /**
     * @var Request
     */
    private $solicitation;

    public function __construct(Users $user, $request)
    {
        $this->solicitation = new SolicitationRequest;
        $this->solicitation->setIdWepayout(Tools::generateIdWepayout());
        $this->solicitation->setUserId($user->id);
        $this->solicitation->setPaymentValue($request['payment_value']);
        $this->solicitation->setStatus("processando");
        $this->solicitation->setInvoice($user->invoice);
    }

    public function make()
    {
        return $this->solicitation;
    }

    public function saveRepository()
    {
        $solicitation = new Solicitation;
        $solicitation->id_wepayout = $this->solicitation->getIdWepayout();
        $solicitation->user_id = $this->solicitation->getUserId();
        $solicitation->status = $this->solicitation->getStatus();
        $solicitation->payment_value = $this->solicitation->getPaymentValue();
        $solicitation->save();

        return $solicitation;
    }

}