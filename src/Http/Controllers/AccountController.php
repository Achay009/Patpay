<?php

namespace Achay\Patpay\Http\Controllers;

use Achay\Patpay\Patpay;

/**
 * This class represents a account controller.
 *
 */
class AccountController extends Controller
{
    /**
     * Creates account.
     *
     * @return \Illuminate\Http\Response
     */
    public function createAccount()
    {
        request()->validate(
            [
            'accountNumber' => 'required|integer',
            'currentBalance' => 'required|numeric',
            ]
        );
        $package = new Patpay();
        $account = $package->createAccount(request('accountNumber'), request('currentBalance'));
        return response()->json(
            [
            'message' => 'Account created successfully',
            'data' => $account->toArray(),
            ]
        );
    }

    /**
     * Credits account.
     *
     * @return \Illuminate\Http\Response
     */
    public function credit()
    {
        request()->validate(
            [
            'accountNumber' => 'required|integer',
            'amount' => 'required|numeric',
            ]
        );
        $package = new Patpay();
        $account = $package->credit(request('accountNumber'), request('amount'));
        return response()->json(
            [
            'message' => 'Account credited successfully',
            'data' => $account->toArray(),
            ]
        );
    }

    /**
     * Debits account.
     *
     * @return \Illuminate\Http\Response
     */
    public function debit()
    {
        request()->validate(
            [
            'accountNumber' => 'required|integer',
            'amount' => 'required|numeric',
            ]
        );
        $package = new Patpay();
        $account = $package->debit(request('accountNumber'), request('amount'));
        return response()->json(
            [
            'message' => 'Account debited successfully',
            'data' => $account->toArray(),
            ]
        );
    }

    /**
     * Transfers account.
     *
     * @return \Illuminate\Http\Response
     */
    public function transfer()
    {
        request()->validate(
            [
            'fromAccountNumber' => 'required|integer',
            'toAccountNumber' => 'required|integer',
            'amount' => 'required|numeric',
            ]
        );
        $package = new Patpay();
        $package->transfer(request('fromAccountNumber'), request('toAccountNumber'), request('amount'));
        return response()->json(
            [
            'message' => 'Account transferred successfully',
            ]
        );
    }

    /**
     * Gets account total balance.
     *
     * @return \Illuminate\Http\Response
     */
    public function getAccountTotalBalance()
    {
        request()->validate(
            [
            'accountNumber' => 'required|integer',
            ]
        );
        $package = new Patpay();
        $account = $package->getAccount(request('accountNumber'));
        return response()->json(
            [
            'message' => 'Account total balance retrieved successfully',
            'data' => $account->getTotalBalance(),
            ]
        );
    }
}