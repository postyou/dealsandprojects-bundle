<?php

declare(strict_types=1);

/*
 * @author  POSTYOU Digital- & Filmagentur
 * @license MIT
 */

namespace Postyou\DealsAndProjectsBundle\Api;

class Task extends AbstractApi
{
    /**
     * @return object[]
     */
    public function listForProject(int $projectId): array
    {
        return $this->getAll($this->getEndpoint(), [
            'ProjectId' => $projectId,
        ]);
    }

    protected function getEndpoint(): string
    {
        return 'task';
    }
}
