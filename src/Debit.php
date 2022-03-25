<?php

namespace Achay\Patpay;
use Achay\Patpay\Account;
use Achay\Patpay\BankDatabase;

/**
 * This class represents a withdrawal transaction.
 *
 */
class Debit extends Transaction
{
    private float $_amount;

    /**
     * This constructor for Withdrawal class
     *
     * @param int $accountNumber
     * @param float $amount
     * @param BankDatabase $bankDatabase
     */
    public function __construct(int $accountNumber, float $amount, BankDatabase $bankDatabase)
    {
        parent::__construct($accountNumber, $bankDatabase);
        $this->_amount = $amount;
    }

    /**
     * This method for execute transaction
     *
     * @return void
     */
    public function execute(): void
    {
        $this->_bankDatabase->getAccount($this->_accountNumber)
            ->debit($this->_amount);
    }
}