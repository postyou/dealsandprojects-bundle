<?php

declare(strict_types=1);

/*
 * @author  POSTYOU Digital- & Filmagentur
 * @license MIT
 */

namespace Postyou\DealsAndProjectsBundle\Entities;

class ContactPerson extends AbstractEntity {
    public ?string $contactName;
    public ?string $contactId;
    public ?string $gender;
    public ?string $firstName;
    public ?string $lastName;
    public ?string $title;
    public ?string $birthday;
    public ?string $salutation;
    public ?string $textSalutation;
    public ?string $department;
    public ?string $position;
    public bool $blockedForMailingList;
    public array $tags = [];
    public object $communication;
    public ?string $notes;
}
