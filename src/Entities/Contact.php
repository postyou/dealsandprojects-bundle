<?php

declare(strict_types=1);

/*
 * @author  POSTYOU Digital- & Filmagentur
 * @license MIT
 */

namespace Postyou\DealsAndProjectsBundle\Entities;

class Contact extends AbstractEntity {
    public ?string $accountManager;
    public null|string|int $accountManagerId;
    public ?object $address;
    public ?string $addressType;
    public ?string $city;
    public ?string $country;
    public ?string $mailBox;
    public ?string $mailBoxZipCode;
    public ?string $state;
    public ?string $street;
    public ?string $zipCode;
    public ?string $birthday;
    public ?bool $blockedForMailingList;
    public ?object $communication;
    public ?string $customerNo;
    public ?string $discountGroup;
    public ?string $firstName;
    public ?string $gender;
    public ?bool $isActive;
    public ?string $mainCategory;
    public ?string $name;
    public ?string $name2;
    public ?string $name3;
    public ?string $notes;
    public ?int $personCount;
    public ?string $primarySearchTerm;
    public ?string $salutation;
    public ?array $tags;
    public ?string $textSalutation;
    public ?string $title;
    public ?string $vATIDNumber;
}
