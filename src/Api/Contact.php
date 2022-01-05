<?php

declare(strict_types=1);

/*
 * @author  POSTYOU Digital- & Filmagentur
 * @license MIT
 */

namespace Postyou\DealsAndProjectsBundle\Api;

class Contact extends AbstractApi
{
    public function listActiveClients(): array
    {
        return $this->getAll($this->getEndpoint(), [
            'MainCategory' => 'Kunde',
            'IsActive' => 'true',
        ]);
    }

    protected function getEndpoint(): string
    {
        return 'contact';
    }
}
