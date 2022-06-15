<?php

namespace App\Http\Controllers;

use App\Models\Banknet;
use Illuminate\Http\Request;

class GetBalanceController extends Controller
{

    // only if he's logged-in can he see his balance
    public function show(Request $request)
    {
        $id = $request->input('id');
        $account = Banknet::findOrFail($id);
        return $account->balance;
    }

    // public function store(Request $request)
    // {
    //     $request->validate([
    //         'id'=>'required',
    //         'name'=>'required',
    //         'balance'=>'required'
    //     ]);

    //     return Banknet::create($request->all());
    // }


}
