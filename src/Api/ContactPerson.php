<?php

declare(strict_types=1);

/*
 * @author  POSTYOU Digital- & Filmagentur
 * @license MIT
 */

namespace Postyou\DealsAndProjectsBundle\Api;

/**
 * @extends AbstractApi<\Postyou\DealsAndProjectsBundle\Entities\ContactPerson>
 */
class ContactPerson extends AbstractApi {

    public function readForContact(int $contactId) {
        return $this->list([
            'ContactId' => $contactId,
        ]);
    }

    protected function getEndpoint(): string {
        return 'contactperson';
    }
}
