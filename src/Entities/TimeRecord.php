<?php

declare(strict_types=1);

/*
 * @author  POSTYOU Digital- & Filmagentur
 * @license MIT
 */

namespace Postyou\DealsAndProjectsBundle\Entities;

class TimeRecord extends AbstractEntity {
    public ?string $activity;
    public null|string|int $activityId;
    public ?string $contact;
    public null|string|int $contactId;
    protected ?string $dateTime;
    public ?string $description;
    public ?float $duration;
    public ?float $hourlyRate;
    public ?float $hourlyRateInternal;
    public ?float $hourlyRateInternalUser;
    public ?bool $isBillable;
    public null|string|int $orderItemId;
    public ?string $project;
    public null|string|int $projectId;
    public ?string $settledOn;
    public null|string|int $taskId;
    public ?float $totalAmount;
    public ?string $user;
    public null|string|int $userId;
}
