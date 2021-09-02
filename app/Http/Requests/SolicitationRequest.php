<?php 

namespace App\Http\Requests;

class SolicitationRequest
{
    private $id_wepayout;
    private $user_id;
    private $status;
    private $payment_value;
    private $process_bank;
    private $invoice;

    public function setIdWepayout($id_wepayout){
        return $this->id_wepayout = $id_wepayout;
    }

    public function getIdWepayout()
    {
        return $this->id_wepayout;
    }

    public function setUserId($user_id){
        return $this->user_id = $user_id;
    }

    public function getUserId()
    {
        return $this->user_id;
    }

    public function setStatus($status){
        return $this->status = $status;
    }

    public function getStatus()
    {
        return $this->status;
    }

    public function setPaymentValue($payment_value){
        return $this->payment_value = $payment_value;
    }

    public function getPaymentValue()
    {
        return $this->payment_value;
    }


    public function setProcessBank($process_bank){
        return $this->process_bank = $process_bank;
    }

    public function getProcessBank()
    {
        return $this->process_bank;
    }

    public function setInvoice($invoice){
        return $this->invoice = $invoice;
    }

    public function getInvoice()
    {
        return $this->invoice;
    }
}
