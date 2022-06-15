<?php

namespace App\Http\Controllers;

use auth;
use App\Models\User;
use App\Models\Banknet;
use Illuminate\Http\Request;
use Illuminate\Auth\Access\Response;
use Illuminate\Validation\ValidationException;

class GetBalanceController extends Controller
{
    public function index()
    {   // get the logged-in user's info and assign it to his
        // bank account info
        $user=auth()->user();
        // $user = User::find($userId);
        $account=Banknet::create([
            "id"=> $user->id+10,
            "name"=> $user->name,
            "balance" => 0
        ]);

        $response = [
            'account' => $account,
        ];
        return response($response, 201);

    }
    public function checkBalance(Request $request)
    {
        $account=Banknet::where('name', $request->name)->first();
        return [
           "balance" => $account->balance
        ];

        // return $user->id === $account->id
        // ? Response::allow($account->balance)
        // : Response::deny('You do not own this post.');
    }

    // only if (token && UserId === BankNetId) can he see his balance
    // public function show(User $user)
    // {


    //     $account=Banknet::create([
    //         "id"=> $user->id,
    //         "name"=> $user->name,
    //         "email"=> $user->email,
    //         "balance" => 0
    //     ]);

    //     $response = [
    //         'account' => $account,
    //     ];

    //     return response($response, 201);

        // $account = Banknet::findOrFail($id);
        // if($account->id = $id)
        // {
        //     return $account->balance;
        // }
        // else{
        //     throw ValidationException::withMessages([
        //         'id' => ['Your User id does not match'],

        //      ])->redirectTo('/account');
        // }
    // }
        // $request.validate([
            // 'id' => 'required'
        // ]);


        // }else {
        // return response("Error with cre", 404);
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


