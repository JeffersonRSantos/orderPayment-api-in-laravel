<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Http\Request;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Http\Builders\OrderPaymentBuilder;
use App\Http\Builders\SolicitationBuilder;
use App\Models\Users;
use App\Http\Controllers\Santander;
use App\Http\Controllers\Itau;
use App\Jobs\ProcessPaymentJob;
use App\Helpers\Tools;

class OrderPaymentJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private $request;

    private $solicitationRepository;

    private $solicitationbuilder;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(Request $request)
    {
        $this->request = $request->all();
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $user = Users::where('invoice', '=', $this->request['invoice'])->first();
        $orderPaymentBuilder = new OrderPaymentBuilder($this->request);

        if(!$user){
            $user = $orderPaymentBuilder->saveRepository();
        }

        $solicitation = (new SolicitationBuilder($user, $this->request));
        $this->solicitationBuilder = $solicitation->make();
        $this->solicitationRepository = $solicitation->saveRepository();

        ProcessPaymentJob::dispatch($this->solicitationRepository, $this->solicitationBuilder); //->delay(now()->addMinutes(2));
    }
}
