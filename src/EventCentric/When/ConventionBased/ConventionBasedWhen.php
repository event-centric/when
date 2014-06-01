<?php

namespace EventCentric\When\ConventionBased;

use EventCentric\DomainEvent\DomainEvent;
use EventCentric\When\When;
use Verraes\ClassFunctions\ClassFunctions;

trait ConventionBasedWhen
{
    use When;


    /**
     * @param DomainEvent $event
     * @return void
     */
    protected function when(DomainEvent $event)
    {
        $this->{'when' . ClassFunctions::short($event)}($event);
    }

    /**
     * @param DomainEvent[] $events
     * @return void
     */
    protected function whenAll($events)
    {
        array_map([$this, 'when'], $events);
    }

}