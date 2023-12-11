<?php

declare(strict_types=1);

/*
 * @author  POSTYOU Digital- & Filmagentur
 * @license MIT
 */

namespace Postyou\DealsAndProjectsBundle\Entities;

class CalendarEvent extends AbstractEntity {
    public ?string $summary;
    public ?string $description;
    public ?string $eventType;
    public ?string $user;
    public null|string|int $userId;
    public ?string $project;
    public null|string|int $projectId;
    // TODO make dates saving easier
    protected ?string $startDateTime;
    // TODO make dates saving easier
    protected ?string $endDateTime;
    public ?bool $isAllDay;
    public ?bool $isPrivate;
    public ?string $location;
}
