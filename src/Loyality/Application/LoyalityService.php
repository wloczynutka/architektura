<?php

namespace Loyality\Application;

use Loyality\Domain\Accounts;
use Loyality\Domain\CalcualtionFactory;
use Loyality\Domain\PointsCalculation\Linear;

class LoyalityService
{
    /**
     * @var Accounts
     */
    private $accounts;

    /**
     * @var CalcualtionFactory
     */
    private $calcualtionFactory;
    /**
     * LoyalityService constructor.
     * @param Accounts $account
     * @param CalcualtionFactory $calcualtionFactory
     */
    public function __construct(Accounts $account, CalcualtionFactory $calcualtionFactory)
    {
        $this->accounts = $account;
        $this->calcualtionFactory = $calcualtionFactory;
    }

    public function registerPurchase(string $accountId, int $price)
    {
        $account = $this->accounts->load($accountId);
        $calculation = $this->calcualtionFactory->create();
        $account->addPoints($calculation->calculate($price));
        $this->accounts->save($account);
    }
}
