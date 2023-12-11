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
class Contact extends AbstractApi {

    /**
     * @return \Postyou\DealsAndProjectsBundle\Entities\Contact[]
     */
    public function listActiveClients(): array {
        return $this->list([
            'MainCategory' => 'Kunde',
            'IsActive' => 'true',
        ]);
    }

    protected function getEndpoint(): string {
        return 'contact';
    }
}
