<?php

declare(strict_types=1);

/*
 * @author  POSTYOU Digital- & Filmagentur
 * @license MIT
 */

namespace Postyou\DealsAndProjectsBundle\Entities;

class Project extends AbstractEntity
{
    public ?int $parentProjectId;
    public ?string $number;
    public ?string $name;
    public ?string $longDescription;
    public ?string $category;
    public ?string $state;
    public ?string $customerName;
    public ?string $customerId;
    public ?string $users;
    public ?string $projectManagerName;
    public ?string $projectManagerId;
    public ?float $targetTime;
    public ?float $totalVolume;
    public ?string $clientName;
    public ?string $clientId;
    public ?array $participants;
    protected ?string $startDate;
    protected ?string $endDate;

    public function setStartDate(\DateTime $date): void
    {
        $this->startDate = $this->convertFromDateTime($date);
    }

    public function setEndDate(\DateTime $date): void
    {
        $this->endDate = $this->convertFromDateTime($date);
    }

    public function getStartDate(): \DateTime
    {
        return $this->convertToDateTime($this->startDate);
    }

    public function getEndDate(): \DateTime
    {
        return $this->convertToDateTime($this->endDate);
    }
}
