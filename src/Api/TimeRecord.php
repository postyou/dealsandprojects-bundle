<?php

declare(strict_types=1);

/*
 * @author  POSTYOU Digital- & Filmagentur
 * @license MIT
 */

namespace Postyou\DealsAndProjectsBundle\Api;

class TimeRecord extends AbstractApi
{
    public function listForProject(int $id): array
    {
        return $this->getAll($this->getEndpoint(), [
            'ProjectId' => $id,
        ]);
    }

    protected function getEndpoint(): string
    {
        return 'timerecord';
    }
}
