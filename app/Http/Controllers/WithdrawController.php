<?php

namespace App\Http\Controllers;

use App\Models\BankAccount;
use Illuminate\Http\Request;

class WithdrawController extends Controller
{
    //
    public function store(Request $request)
    {
        return $this->showreceipt(
            $request->input('originaccount'),
            $request->input('amount'),
        );

    }

    private function showreceipt($originaccount,$amount)
    {
        $account = BankAccount::findOrFail($originaccount);
        $account->balance -=$amount;
        $account->save();
        return response()->json([
            'originaccount' => [
                'id' => $account->id,
                'balance' => $account->balance
            ]
            ], 201);
    }
}
