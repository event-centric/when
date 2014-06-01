<?php

namespace EventCentric\When;

use EventCentric\DomainEvent\DomainEvent;

/**
 * Unfortunately we don't have method overloading in PHP. By implementing the `When` trait, you can simulate that by
 * delegating `when($myEvent)` to `whenMyEvent($myEvent)`. This prevents us from having to use conditionals to determine
 * how to react to an event.
 */
trait When 
{
    /**
     * @param DomainEvent $event
     * @return void
     */
    abstract protected function when(DomainEvent $event);

    /**
     * @param DomainEvent[] $events
     * @return void
     */
    abstract protected function whenAll($events);
}
