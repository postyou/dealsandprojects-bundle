<?php

declare(strict_types=1);

/*
 * @author  POSTYOU Digital- & Filmagentur
 * @license MIT
 */

namespace Postyou\DealsAndProjectsBundle\Api;

/**
 * @extends AbstractApi<\Postyou\DealsAndProjectsBundle\Entities\Contact>
 */
class Contact extends AbstractApi
{
    /**
     * @return object[]
     */
    public function listActiveClients(): array
    {
        return parent::list([
            'MainCategory' => 'Kunde',
            'IsActive' => 'true',
        ]);
    }

    protected function getEndpoint(): string
    {
        return 'contact';
    }
}
