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
                    'id'=>'required',
                    'amount'=>'required'
                    // 'balance'=>'required',
                ]);
        return $this->depositreceipt(
            // find a way to check balance first
            $request->input('destination'),
            $request->input('amount')
        );

    }
    private function depositreceipt($destination,$amount)
    {
        // find a way to check balance first

        $account = Banknet::firstOrCreate([
            'id' => $destination,
            'amount'=>$amount
        ]);
        if($account->wasRecentlyCreated)
        {
            // since its a new account so balance => 0 which means no charge
            $charge = 1;
            $account->balance += $amount * $charge;
            $account->save();

        } else{
            $charge = 1;
            $account->balance += $amount * $charge;
            $account->save();
        }
        return response()->json([
            'destination' => [
                'id' => $account->id,
                'balance' => $account->balance
            ]
            ], 201);
    }

}
