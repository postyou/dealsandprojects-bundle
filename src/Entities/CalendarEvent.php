<?php

declare(strict_types=1);

/*
 * @author  POSTYOU Digital- & Filmagentur
 * @license MIT
 */

namespace Postyou\DealsAndProjectsBundle\Entities;

use DateTime;

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

    public function getStartDate(): string {
        return $this->startDateTime;
    }

    public function getEndDate(): string {
        return $this->endDateTime;
    }

    public function getStartDateTime(): DateTime {
        return new DateTime($this->startDateTime);
    }

    public function getEndDateTime(): DateTime {
        return new DateTime($this->endDateTime);
    }

    public function setStartDateTime(DateTime $date) {
        $this->startDateTime = self::createStartDate($date);
    }

    public function setEndDateTime(DateTime $date) {
        $this->endDateTime = self::createEndDate($date);
    }

    public static function createStartDate(DateTime $date): string {
        $dateStr = $date->format(DATE_W3C);
        return substr($dateStr, 0, -6) . "Z";
    }

    public static function createEndDate(DateTime $date): string {
        $dateStr = $date->modify("+1 day")->modify("-1 minute")->format(DATE_W3C);
        return substr($dateStr, 0, -6) . "Z";
    }
}
