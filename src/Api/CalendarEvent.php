<?php

declare(strict_types=1);

/*
 * @author  POSTYOU Digital- & Filmagentur
 * @license MIT
 */

namespace Postyou\DealsAndProjectsBundle\Api;

/**
 * @extends AbstractApi<\Postyou\DealsAndProjectsBundle\Entities\CalendarEvent>
 */
class CalendarEvent extends AbstractApi
{
    protected function getEndpoint(): string
    {
        return 'calendarevent';
    }
}
