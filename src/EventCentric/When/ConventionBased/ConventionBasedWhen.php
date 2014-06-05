<?php

namespace EventCentric\When\ConventionBased;

use EventCentric\DomainEvents\DomainEvent;
use EventCentric\DomainEvents\DomainEvents;
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
     * @param DomainEvents $events
     * @return void
     */
    protected function whenAll(DomainEvents $events)
    {
        array_map([$this, 'when'], $events);
    }

}