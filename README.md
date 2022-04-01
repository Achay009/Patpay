## PATRICIA BANK PACKAGE

<p>&nbsp;</p>

### To install
`composer require achay/patpay`

<p>&nbsp;</p>

### Usages
As Routes that load endpoints to your project..\
`POST  /patpay/create-account`\
`POST  /patpay/debit`\
`POST  /patpay/credit`\
`POST  /patpay/transfer`\
`POST  /patpay/check-balance`

<p>&nbsp;</p>

As a package you can use it in your project..
```php
use Achay\Patpay\Patpay;

// Instantiate PatPay class
$patPayPackage = new Patpay();


//Create Bank Account
$account = $patPayPackage->createAccount('24689', '0.00');


// Get Account in Array object
$account->toArray();
/* Output:
    [
        'accountNumber' => '24689',
        'availableBalance' => '0.00',
        'totalBalance' => '0.00',
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
