<?php

namespace Loyality\Domain;

use Loyality\Domain\Event\AccountBlocked;
use Loyality\Domain\Event\AccountCreated;
use Loyality\Domain\Event\AccountUnblocked;
use Loyality\Domain\Event\Event;
use Loyality\Domain\Event\PointsAdded;
use Loyality\Domain\Event\PointsUsed;

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

    private $adds;
    private $uses;

    /**
     * @var Event[]
     */
    private $events;

    private function __construct()
    {
    }

    public static function create($id)
    {
        $account = new self();
        $account->apply(
            new AccountCreated($id)
        );
        return $account;
    }

    public function addPoints(int $points): void
    {
        $this->apply(
            new PointsAdded($this->id, $points)
        );
    }

    public function usePoints(int $points, string $reason = null): void
    {
        $this->apply(
            new PointsUsed($this->id, $points, $reason)
        );
    }

    public function block(string $reason): void
    {
        $this->apply(
            new AccountBlocked($this->id, $reason)
        );
    }

    public function unblock(string $reason): void
    {
        $this->apply(
            new AccountUnblocked($this->id, $reason)
        );
    }

    public function getBalance(): int
    {

    }

    public function transferPoints(int $points)
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

    protected function apply($event)
    {
        switch (get_class($event)) {
            case AccountCreated::class:
                $this->id = $event->getAccountId();
                $this->status = Status::ACTIVE;
                $this->balance = 0;
                $this->adds = 0;
                $this->uses = 0;
                break;
            case PointsAdded::class:
                $this->balance += $event->getPoints();
                $this->adds++;
                break;
            case PointsUsed::class:
                $this->balance -= $event->getPoints();
                $this->uses++;
                break;
        }
        $this->events[] = $event;
    }
}
