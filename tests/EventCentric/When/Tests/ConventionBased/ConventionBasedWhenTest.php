<?php

namespace EventCentric\When\Tests\ConventionBased;

use EventCentric\DomainEvent\DomainEvent;
use EventCentric\When\ConventionBased\ConventionBasedWhen;

final class MyReactor
{
    use ConventionBasedWhen;

    private $reacted = false;

    protected function whenSomethingHasHappened(SomethingHasHappened $event)
    {
        $this->reacted = true;
    }

    public function test()
    {
        $this->whenAll([new SomethingHasHappened()]);
        if(!$this->reacted) {
            throw new \Exception("The method 'whenSomethingHasHappened' was not called");
        }
    }
}

final class SomethingHasHappened implements DomainEvent
{}

$reactor = new MyReactor();
$reactor->test();