<?php

declare(strict_types=1);

/*
 * @author  POSTYOU Digital- & Filmagentur
 * @license MIT
 */

namespace Postyou\DealsAndProjectsBundle\Api;

class ContactPerson extends AbstractApi
{
    public function readForContact(int $id): object
    {
        return $this->get($this->getEndpoint(), [
            'ContactId' => $id,
        ]);
    }

    protected function getEndpoint(): string
    {
        return 'contactperson';
    }
}
