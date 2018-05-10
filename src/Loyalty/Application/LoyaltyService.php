<?php

namespace Loyalty\Application;

use Loyalty\Domain\Accounts;
use Loyalty\Domain\CalculationFactory;
use Loyalty\Domain\PointsCalculation\Linear;

class LoyaltyService
{
    /**
     * @var Accounts
     */
    private $accounts;

    /**
     * @var CalculationFactory
     */
    private $calculationFactory;

    /**
     * LoyaltyService constructor.
     * @param Accounts $accounts
     * @param CalculationFactory $calculationFactory
     */
    public function __construct(Accounts $accounts, CalculationFactory $calculationFactory)
    {
        $this->accounts = $accounts;
        $this->calculationFactory = $calculationFactory;
    }

    public function registerPurchase(string $accountId, int $price)
    {
        $account = $this->accounts->load($accountId);

        $account->addPoints(
            $this->calculationFactory->create()->calculate($price)
        );

        $this->accounts->save($account);
    }
}