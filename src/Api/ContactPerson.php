<?php

declare(strict_types=1);

/*
 * @author  POSTYOU Digital- & Filmagentur
 * @license MIT
 */

namespace Postyou\DealsAndProjectsBundle\Api;

class ContactPerson extends AbstractApi
{
    /**
     * @return object|object[]
     */
    public function readForContact(int $contactId): object|array
    {
        return $this->get($this->getEndpoint(), [
            'ContactId' => $contactId,
        ]);
    }

    protected function getEndpoint(): string
    {
        return 'contactperson';
    }
}
