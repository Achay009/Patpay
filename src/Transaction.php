<?php

namespace Achay\Patpay;
use Achay\Patpay\BankDatabase;

/**
 * This class represents a transaction.
 *
 */
abstract class Transaction
{
    private int $_accountNumber;
    private BankDatabase $_bankDatabase;

    /**
     * This constructor for transactiopn class
     *
     * @param int $accountNumber
     *
     * @param BankDatabase $bankDatabase
     */
    public function __construct(int $accountNumber, BankDatabase $bankDatabase)
    {
        $this->_accountNumber = $accountNumber;
        $this->_bankDatabase = $bankDatabase;
    }

    /**
     * This method for get account number
     *
     * @return int
     */
    public function getAccountNumber(): int
    {
        return $this->_accountNumber;
    }

    /**
     * This returns BankDatabase
     *
     * @return BankDatabase
     */
    public function getBankDatabase(): BankDatabase
    {
        return $this->_bankDatabase;
    }

    /**
     * This method is abstract
     *
     * @return mixed
     */
    abstract public function execute(): void;

}