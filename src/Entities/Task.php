<?php

declare(strict_types=1);

/*
 * @author  POSTYOU Digital- & Filmagentur
 * @license MIT
 */

namespace Postyou\DealsAndProjectsBundle\Entities;

class Task extends AbstractEntity {
    public string $subject;
    public string $description;
    public string $state;
    public string $user;
    public string $userId;
    public string $contact;
    public string $contactId;
    public string $project;
    public string $projectId;
    public ?string $startDate;
    public ?string $endDate;
    public ?string $deadline;
    public bool $isBillable;
    public int $activityId;
    public int $timeEstimateHours;
    public object $customField;

    public function setStartDate(\DateTime $date): void {
        $this->startDate = $this->convertFromDateTime($date);
    }

    public function setEndDate(\DateTime $date): void {
        $this->endDate = $this->convertFromDateTime($date);
    }

    public function getStartDate(): \DateTime {
        return $this->convertToDateTime($this->startDate);
    }

    public function getEndDate(): \DateTime {
        return $this->convertToDateTime($this->endDate);
    }
}
