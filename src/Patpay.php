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
     * @return Account
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
     * @return Account
     */
    public function credit(int $accountNumber, float $amount): Account
    {
        return $this->_bankDatabase->getAccount($accountNumber)->credit($amount);
    }

    /**
     * This method for debit account
     *
     * @param int $accountNumber
     * @param float $amount
     *
     * @return void
     */
    public function debit(int $accountNumber, float $amount): Account
    {
        return $this->_bankDatabase->getAccount($accountNumber)->debit($amount);
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
        $this->_bankDatabase->getAccount($fromAccountNumber)->debit($amount);
        $this->_bankDatabase->getAccount($toAccountNumber)->credit($amount);
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
        return $this->_bankDatabase->getAccount($accountNumber);
    }

    /**
     * This method for get total balance
     *
     * @param int $accountNumber
     *
     * @return float
     */
    public function getTotalBalance(int $accountNumber): float
    {
        return $this->_bankDatabase->getAccount($accountNumber)
            ->getTotalBalance();
    }
}