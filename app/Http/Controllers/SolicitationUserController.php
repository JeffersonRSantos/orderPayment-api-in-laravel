<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Builders\OrderPaymentBuilder;
use Illuminate\Support\Facades\Validator;
use App\Jobs\OrderPaymentJob;
use App\Models\Solicitation;

use App\Http\Requests\SolicitationRequest;

class SolicitationUserController extends Controller
{
    public function index(Request $request)
    {
        try {
            $this->validatorRequest($request);
            OrderPaymentJob::dispatch($request);
        } catch (\Exception $e) {
            return json_encode(["Error", "order payment fail - ".$e], 404);
        }
    }

    public function listPayments()
    {
        try {
            $data = Solicitation::with('user')->get();
            return json_encode($data ?: "Nenhum registro.", 200);
        } catch (\Exception $e) {
            return json_encode(["Error:", "search all failed - ".$e] ,404);
        }
    }

    public function search(Request $request)
    {
        try {
            $data = Solicitation::with('user')->where('id_wepayout', '=', $request->get('id_wepayout'))->first();
            return json_encode($data ?: "Nenhum registro encontrado.", 200);
        } catch (\Exception $e) {
            return json_encode(["Error:", "search fail - ".$e],404);
        }
    }

    private function validatorRequest(Request $request)
    {
        $validator = Validator::make($request->all(), [
            "invoice" => "required",
            "name" => "required|string",
            "cod_bank" => "required|max:3",
            "number_account" => "required|max:15",
            "number_agency" => "required|max:4",
            "payment_value" => "required|min:1|max:9",
        ],[
            "invoice.required" => "Invoice is Required",
            "name.required" => "Name is Required",
            "cod_bank.required" => "Cod Bank is Required",
            "cod_bank.max" => "Cod Bank max 3 numbers",
            "number_agency.max" => "Cod Bank max 4 numbers",
            "number_agency.required" => "Number Agency is Required",
            "number_account.required" => "Number Account is Required",
            "number_account.max" => "Number Account max 15 numbers",
            "payment_value.required" => "Payment Value is Required",
            "payment_value.min" => "Payment Value min 0.01",
        ]);

        if($validator->fails()){
            throw (new \Exception($validator->errors()));
        }

        return true;
    }

}
