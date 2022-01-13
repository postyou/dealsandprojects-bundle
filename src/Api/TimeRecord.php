<?php

declare(strict_types=1);

/*
 * @author  POSTYOU Digital- & Filmagentur
 * @license MIT
 */

namespace Postyou\DealsAndProjectsBundle\Api;

class TimeRecord extends AbstractApi
{
    public function listForProject(int $projectId): array
    {
        return $this->getAll($this->getEndpoint(), [
            'ProjectId' => $projectId,
        ]);
    }

    protected function getEndpoint(): string
    {
        return 'timerecord';
    }
}
