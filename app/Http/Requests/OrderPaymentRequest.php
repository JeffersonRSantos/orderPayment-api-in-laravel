<?php 

namespace App\Http\Requests;

class OrderPaymentRequest
{
    private $name;
    private $invoice;
    private $cod_bank;
    private $number_account;
    private $number_agency;
    private $process_bank;

    public function setName($name){
        $this->name = $name;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setInvoice($invoice){
        $this->invoice = $invoice;
    }

    public function getInvoice()
    {
        return $this->invoice;
    }

    public function setCodBank($cod_bank){
        $this->cod_bank = $cod_bank;
    }

    public function getCodBank()
    {
        return $this->cod_bank;
    }

    public function setNumberAccount($number_account){
        $this->number_account = $number_account;
    }

    public function getNumberAccount()
    {
        return $this->number_account;
    }

    public function setNumberAgency($number_agency){
        $this->number_agency = $number_agency;
    }

    public function getNumberAgency()
    {
        return $this->number_agency;
    }
    
    public function setProcessBank($process_bank){
        $this->process_bank = $process_bank;
    }

    public function getProcessBank()
    {
        return $this->process_bank;
    }
}
