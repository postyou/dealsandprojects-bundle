<?php

declare(strict_types=1);

/*
 * @author  POSTYOU Digital- & Filmagentur
 * @license MIT
 */

namespace Postyou\DealsAndProjectsBundle\Entities;

abstract class AbstractEntity {
    protected string|int $id;
    protected ?int $createdBy;
    protected ?string $createdOn;
    protected ?int $lastModifiedBy;
    protected ?string $lastModifiedOn;
    public ?object $customField;

    protected static string $dateFormat = "Y-m-d\TH:i:s";

    public function __construct(object $data) {
        foreach ($data as $key => $value) {
            $this->{lcfirst($key)} = $value;
        }
    }

    public function getId(): int {
        return $this->id;
    }

    public function getCreatedBy(): int {
        return $this->createdBy;
    }

    public function getCreatedOn(): string {
        return $this->createdOn;
    }

    public function getLastModifiedBy(): int {
        return $this->lastModifiedBy;
    }

    public function getLastModifiedOn(): string {
        return $this->lastModifiedOn;
    }

    public function toObject(): \stdClass {
        $object = new \stdClass();
        foreach ($this as $key => $value) {
            $object->{ucfirst($key)} = $value;
        }

        return $object;
    }

    protected function convertToDateTime(string $date) {
        return \DateTime::createFromFormat(self::$dateFormat, $date);
    }

    protected function convertFromDateTime(\DateTime $dateTime) {
        return $dateTime->setTime(0, 0, 0)->format(self::$dateFormat);
    }
}
