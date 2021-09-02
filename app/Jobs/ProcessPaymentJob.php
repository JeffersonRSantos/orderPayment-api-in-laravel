<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Http\Requests\SolicitationRequest;
use App\Models\Solicitation;
use App\Helpers\Tools;
use App\Http\Controllers\Itau;
use App\Http\Controllers\Santander;

class ProcessPaymentJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     *
     * @var Request
     */
    private $solicitationRequest;

    /**
     *
     * @return Solicitation
     */
    private $solicitation;

    /**
     *
     * @return void
     */
    public function __construct(Solicitation $solicitation, SolicitationRequest $solicitationRequest)
    {
        $this->solicitation = $solicitation;  
        $this->solicitationRequest = $solicitationRequest;
    }

    /**
     *
     * @return void
     */
    public function handle()
    {
        //update status
        Tools::updateStatus($this->solicitation->id_wepayout, "processando");

        if($this->solicitationRequest->getInvoice() % 2){
            (new Santander($this->solicitationRequest))->registerPayment();
        }else{
            (new Itau($this->solicitationRequest))->registerPayment();
        }
    }
}
