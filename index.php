<?php

use Loyality\Domain\Account;
use Loyality\Infrastructure\InMemory;

require_once __DIR__ . '/vendor/autoload.php';


$accountId = 123;
$account = Account::create($accountId);
$accounts = new InMemory();

$accounts->save($account);

$calculationFactory = new \Loyality\Domain\CalcualtionFactory();
$loyalityService = new \Loyality\Application\LoyalityService($accounts, $calculationFactory);
$loyalityService->registerPurchase($accountId, 1000);


d($accounts);
exit;









$accounts = new InMemory();

$id = 1;

$acc = Account::create($id);

d($acc);

$acc->addPoints(5);

d($acc);

$acc->usePoints(5, 'kupno czegos');

d($acc);
