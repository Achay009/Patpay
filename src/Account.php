<?php

namespace Achay\Patpay;
use Achay\Patpay\Achay;

/**
 * This class represents a bank account.
 *
 */
class Account extends Achay
{
    private int $_accountNumber;

    private float $_availableBalance;

    private float $_totalBalance;

    /**
     * This constructor for account class
     *
     * @param int $accountNumber
     * @param float $availableBalance
     * @param float $totalBalance
     */
    public function __construct(int $accountNumber, float $availableBalance, float $totalBalance)
    {
        $this->_accountNumber = $accountNumber;
        $this->_availableBalance = $availableBalance;
        $this->_totalBalance = $totalBalance;
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
     * This method for get available balance
     *
     * @return float
     */
    public function getAvailableBalance(): float
    {
        return $this->_availableBalance;
    }

    /**
     * This method for get total balance
     *
     * @return float
     */
    public function getTotalBalance(): float
    {
        return $this->_totalBalance;
    }

    /**
     * This method for debit available balance
     *
     * @param float $amount
     *
     * @return void
     */
    public function debit(float $amount): self
    {
        $this->_availableBalance -= $amount;
        $this->_totalBalance -= $amount;
        return $this;
    }

    /**
     * This method for credit available balance
     *
     * @param float $amount
     *
     * @return void
     */
    public function credit(float $amount): self
    {
        $this->_availableBalance += $amount;
        $this->_totalBalance += $amount;
        return $this;
    }
}