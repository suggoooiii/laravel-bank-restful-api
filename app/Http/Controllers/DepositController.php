<?php

namespace App\Http\Controllers;

use App\Models\Banknet;
use Illuminate\Http\Request;

class DepositController extends Controller
{
    //
    public function store(Request $request)
    {
        // OR USE ==> php artisan make:request StorePostRequest
        $request->validate([
                    'amount'=>'required',
                    'name'=>'required'
                    // 'balance'=>'required',
                ]);
        return $this->depositreceipt(
            // find a way to check balance first
            $request->input('amount'),
            $request->input('name')
        );

    }
    private function depositreceipt($amount,$name)
    {
        // $account = Banknet::firstOrCreate([
            //     'id' => $destination,
            //     'amount'=>$amount
            // ]);

        // find a way to check balance first
        $account=Banknet::firstWhere('name', $name);
        if($account->wasRecentlyCreated)
        {
            // since its a new account so balance => 0 which means no charge
            $charge = 1;
            $account->balance += $amount * $charge;
            $account->save();

        } else{
            $charge = $account->balance < 0 ? 20/100 : 1;
            $depositedAmount =$account->balance + $amount;
           $account->balance -= $total =  $depositedAmount * $charge;
            $account->save();
        }
        return response()->json([
            'account' => [
                'id' => $account->id,
                'balance' => $$account->balance
            ]
            ], 201);
    }

}
