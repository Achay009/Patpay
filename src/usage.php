<?php

namespace Achay\Patpay;
use Achay\Patpay\Patpay;

// Instantiate PatPay class
$patPayPackage = new Patpay();

//Create Bank Account
$account = $patPayPackage->createAccount('24689', '0.00');


$account->toArray();
/* Output:
    [
        'accountNumber' => '24689',
        'currentBalance' => '0.00'
    ]
 */

//Credit Account
$creditAccount = $patPayPackage->credit($account->getAccountNumber(), '100.00');

// Debit Account
$debitAccunt = $patPayPackage->debit($account->getAccountNumber(), '50.00');

// Get Account Total Balance
$balance = $patPayPackage->getTotalBalance($account->getAccountNumber());

// Transfer From Account to another Account
$transferFromAccount = $patPayPackage->transfer(
    $account->getAccountNumber(),
    $patPayPackage->createAccount('34567', '300.0')->getAccountNumber(),
    '50.00'
);



