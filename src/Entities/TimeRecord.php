<?php

declare(strict_types=1);

/*
 * @author  POSTYOU Digital- & Filmagentur
 * @license MIT
 */

namespace Postyou\DealsAndProjectsBundle\Entities;

class TimeRecord extends AbstractEntity {
    public ?string $activity;
    public ?string $activityId;
    public ?string $contact;
    public ?string $contactId;
    private ?string $dateTime;
    public ?string $description;
    public ?float $duration;
    public ?float $hourlyRate;
    public ?float $hourlyRateInternal;
    public ?float $hourlyRateInternalUser;
    public ?bool $isBillable;
    public ?string $orderItemId;
    public ?string $project;
    public ?string $projectId;
    public ?string $settledOn;
    public ?string $taskId;
    public ?float $totalAmount;
    public ?string $user;
    public ?string $userId;
}
