<?php

namespace Achay\Patpay;
use Achay\Patpay\Account;

/**
 * Class Transaction
 */
class BankDatabase
{
    private $_accounts;

    /**
     * This constructor for BankDatabase class
     *
     * @param Account $accounts
     */
    public function __construct()
    {
        $this->_accounts = [];
        $this->_accounts[0] = new Account(12345, 1000.0, 1000.0);
        $this->_accounts[1] = new Account(67890, 20000.0, 20000.0);
    }

    /**
     * This method for get account number
     *
     * @param int $accountNumber
     *
     * @return Account
     */
    public function getAccount(int $accountNumber): Account
    {
        foreach ($this->_accounts as $account) {
            if ($accountNumber == $account->getAccountNumber()) {
                return $account;
            }
        }
        return null;
    }

    /**
     * This method for create account 
     *
     * @param int $accountNumber
     *
     * @return Account
     */
    public function createAccount(int $accountNumber, float $currentBalance): array
    {
        $newAccount = new Account($accountNumber, $currentBalance, $currentBalance);
        array_push($this->_accounts, [$newAccount]);
        return $newAccount->toArray();
    }

    /**
     * This method for get account number
     *
     * @param int $accountNumber
     *
     * @return Account
     */
    public function getTotalBalance(int $accountNumber): float
    {
        return $this->getAccount($accountNumber)->getTotalBalance();
    }

    /**
     * This method for credit account
     *
     * @param int $accountNumber
     *
     * @return void
     */
    public function credit(int $accountNumber, float $amount): void
    {
        $this->getAccount($accountNumber)->credit($amount);
    }


    /**
     * This method for debit account
     *
     * @param int $accountNumber
     *
     * @return void
     */
    public function debit(int $accountNumber, float $amount): void
    {
        $this->getAccount($accountNumber)->debit($amount);
    }
}