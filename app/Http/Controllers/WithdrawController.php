<?php

namespace App\Http\Controllers;

use App\Models\Banknet;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class WithdrawController extends Controller
{

    public function store(Request $request)
    {
        return $this->showreceipt(
            // $request->input('originaccount'),
            $request->input('amount'),
            $request->input('name'),
        );

    }

    private function showreceipt($amount, $name)
    {
        if($amount > 500)
        {
            throw ValidationException::withMessages([
                 'Withdrawal Amount Can not Exceed 500'
            ]);
        }else{
            $account=Banknet::firstWhere('name', $name);
            $account->balance -=$amount;
            $account->save(); //update
            return response()->json([
                'account' => [
                    'id' => $account->id,
                    'balance' => $account->balance
                ]
                ], 201);

        }
    }
}
