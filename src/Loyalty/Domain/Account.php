<?php

namespace Loyalty\Domain;

use Loyalty\Domain\Event\AccountCreated;
use Loyalty\Domain\Event\Event;
use Loyalty\Domain\Event\PointsAdded;
use Loyalty\Domain\Event\PointsUsed;

class Account
{
    /**
     * @var string
     */
    private $id;

    /**
     * @var int
     */
    private $balance;

    /**
     * @var Status
     */
    private $status;

    /**
     * @var int
     */
    private $adds;

    /**
     * @var int
     */
    private $uses;

    /**
     * @var Event[]
     */
    private $events = [];

    private function __construct()
    {
    }

    public static function reconstituteFromHistory(array $events)
    {
        $account = new self();

        foreach ($events as $event) {
            $account->apply($event);
        }

        return $account;
    }

    public static function create(string $id)
    {
        $account = new self();

        $account->apply(
            new AccountCreated($id)
        );

        return $account;
    }

    public function addPoints(int $points): void
    {
        // if!

        $this->apply(
            new PointsAdded($this->id, $points)
        );
    }

    /**
     * @param int $points
     * @param string $reason
     */
    public function usePoints(int $points, string $reason = ''): void
    {
        if (!$this->canUsePoints($points)) {
            throw new \LogicException('...');
        }

        $this->apply(
            new PointsUsed($this->id, $points, $reason)
        );
    }

    public function block(string $reason): void
    {

    }

    public function unblock(string $reason): void
    {

    }

    public function getBalance(): int
    {

    }

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * @return Status
     */
    public function getStatus(): Status
    {
        return $this->status;
    }

    // TBI...
    public function transferPoints(int $points /* ... */)
    {

    }

    protected function whenAccountCreated(AccountCreated $event)
    {
        // ...
    }

    protected function apply(Event $event)
    {
        switch (get_class($event)) {
            case AccountCreated::class:
                $this->id = $event->getAccountId();
                $this->status = Status::ACTIVE();
                $this->balance = 0;
                $this->adds = 0;
                $this->uses = 0;
                $this->freqs = [];
                break;
            case PointsAdded::class:
                $this->balance += $event->getPoints();
                $this->adds++;
                //$this->freqs[$event->getPoints()]++;
                break;
            case PointsUsed::class:
                $this->balance -= $event->getPoints();
                $this->uses++;
                break;
        }

        $this->events[] = $event;
    }

    private function canUsePoints(int $points): bool
    {
        return $points > $this->balance || $this->status == Status::INACTIVE();
    }
}