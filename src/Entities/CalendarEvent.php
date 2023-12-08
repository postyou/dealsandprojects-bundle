<?php

declare(strict_types=1);

/*
 * @author  POSTYOU Digital- & Filmagentur
 * @license MIT
 */

namespace Postyou\DealsAndProjectsBundle\Entities;

class CalendarEvent extends AbstractEntity
{
    public ?string $summary;
    public ?string $description;
    public ?string $eventType;
    public ?string $user;
    public ?string $userId;
    public ?string $project;
    public ?string $projectId;
    public ?string $startDateTime;
    public ?string $endDateTime;
    public ?bool $isAllDay;
    public ?bool $isPrivate;
    public ?string $location;
}
