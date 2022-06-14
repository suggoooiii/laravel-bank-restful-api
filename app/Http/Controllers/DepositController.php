<?php

namespace App\Http\Controllers;

use App\Models\BankAccount;
use Illuminate\Http\Request;

class DepositController extends Controller
{
    //
    public function store(Request $request)
    {
        return $this->depositreceipt(
            $request->input('destination'),
            $request->input('amount'),
        );

    }
    private function depositreceipt($destination,$amount)
    {
        $account = BankAccount::firstOrCreate([
            'id' => $destination
        ]);
        $account->balance += $amount;
        $account->save();
        return response()->json([
            'destination' => [
                'id' => $account->id,
                'balance' => $account->balance
            ]
            ], 201);
    }

}
