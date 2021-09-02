<?php

namespace App\Http\Controllers;

interface BankStrategyInterface
{
    public function registerPayment();
    public function paymentQuery($params);
}