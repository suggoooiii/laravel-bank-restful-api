<?php

namespace App\Http\Controllers;

use App\Models\BankAccount;
use Illuminate\Http\Request;

class GetBalance extends Controller
{
    //
    public function show(Request $request)
    {
        $accountId = $request->input('id');
        $account = BankAccount::findOrFail($accountId);
        return $account->balance;
    }
}
