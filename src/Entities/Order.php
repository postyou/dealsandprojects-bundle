<?php

declare(strict_types=1);

/*
 * @author  POSTYOU Digital- & Filmagentur
 * @license MIT
 */

namespace Postyou\DealsAndProjectsBundle\Entities;

class Order extends AbstractEntity {
    public ?string $downloadUrl;
    public ?float $totalGrossSum;
    public ?float $totalNetSum;
    public ?string $subject;
    public ?string $introductoryText;
    public ?string $conclusionText;
    public ?string $number;
    public ?string $date;
    public ?string $orderType;
    public ?string $orderState;
    public ?string $timeOfSupply;
    public ?string $timeOfSupplyEnd;
    public ?string $referenceNumber;
    public ?string $contact;
    public ?string $contactId;
    public ?string $project;
    public ?string $projectId;
    public ?string $person;
    public ?string $personId;
    public ?string $deliveryTerms;
    public ?string $deliveryDate;
    public ?string $paymentTerms;
    public ?int $paymentTarget;
    public ?string $paymentDueOn;
    public ?string $bindingPeriod;
    public ?string $agent;
    public ?string $agentId;
    public ?string $clientName;
    public ?string $clientId;
    public ?array $items;
    public ?string $differingAddress;
    public ?string $templateId;
    public ?string $templateName;
}
