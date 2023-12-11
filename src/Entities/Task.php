<?php

declare(strict_types=1);

/*
 * @author  POSTYOU Digital- & Filmagentur
 * @license MIT
 */

namespace Postyou\DealsAndProjectsBundle\Entities;

class Task extends AbstractEntity {
    public ?string $subject;
    public ?string $description;
    public ?string $state;
    public ?string $user;
    public null|string|int $userId;
    public ?string $contact;
    public null|string|int $contactId;
    public ?string $project;
    public null|string|int $projectId;
    protected ?string $startDate;
    protected ?string $endDate;
    public ?string $deadline;
    public ?bool $isBillable;
    public null|string|int $activityId;
    public ?float $timeEstimateHours;

    public function getStartDate(): \DateTime {
        return $this->convertToDateTime($this->startDate);
    }

    public function setStartDate(\DateTime $date): void {
        $this->startDate = $this->convertFromDateTime($date);
    }

    public function getEndDate(): \DateTime {
        return $this->convertToDateTime($this->endDate);
    }

    public function setEndDate(\DateTime $date): void {
        $this->endDate = $this->convertFromDateTime($date);
    }
}
