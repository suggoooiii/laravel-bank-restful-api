<?php

namespace App\Http\Controllers;

use App\Models\BankAccount;
use Illuminate\Http\Request;

class TransferController extends Controller
{
    public function store(Request $request)
    {
        return $this->showreceipt(
            $request->input('originaccount'),
            $request->input('amount'),
            $request->input('destination'),
        );
    }
    private function showreceipt($originaccount,$amount, $destination)
    {
        $account = BankAccount::findOrFail($originaccount);
        $accDestination = BankAccount::firstOrCreate([
            'id' => $destination
        ]);
        $account->balance -=$amount;
        $account->save();
        return response()->json([
            'originaccount' => [

                'id' => $account->id,
                'balance' => $account->balance
            ],
            'destination'=>[
                'id'=>$accDestination->id,
                'balance'=>$accDestination->balance
            ],


        ], 201);
    }

}
