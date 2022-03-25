<?php

namespace Achay\Patpay;
use Achay\Patpay\Account;
use Achay\Patpay\BankDatabase;

/**
 * This class represents a transaction.
 *
 */
class Patpay
{
    private BankDatabase $_bankDatabase;

    /**
     * This constructor for Patpay class
     *
     * @param BankDatabase $bankDatabase
     */
    public function __construct()
    {
        $this->_bankDatabase = new BankDatabase();
    }

    /**
     * This method for create bank database
     *
     * @return BankDatabase
     */
    public function createAccount(int $accountNumber, int $currentBalance)
    {
        return $this->_bankDatabase->createAccount($accountNumber, $currentBalance);
    }

    /**
     * This method for credit account
     *
     * @param int $accountNumber
     * @param float $amount
     *
     * @return void
     */
    public function credit(int $accountNumber, float $amount): void
    {
        $this->bankDatabase->getAccount($accountNumber)->credit($amount);
    }

    /**
     * This method for debit account
     *
     * @param int $accountNumber
     * @param float $amount
     *
     * @return void
     */
    public function debit(int $accountNumber, float $amount): void
    {
        $this->bankDatabase->getAccount($accountNumber)->debit($amount);
    }

    /**
     * This method for transfer account
     *
     * @param int $fromAccountNumber
     * @param int $toAccountNumber
     * @param float $amount
     *
     * @return void
     */
    public function transfer(int $fromAccountNumber, int $toAccountNumber, float $amount): void
    {
        $this->bankDatabase->getAccount($fromAccountNumber)->debit($amount);
        $this->bankDatabase->getAccount($toAccountNumber)->credit($amount);
    }

    /**
     * This method for get account 
     *
     * @param int $accountNumber
     *
     * @return Account
     */
    public function getAccount(int $accountNumber): Account
    {
        return $this->bankDatabase->getAccount($accountNumber);
    }
}