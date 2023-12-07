<?php

declare(strict_types=1);

/*
 * @author  POSTYOU Digital- & Filmagentur
 * @license MIT
 */

namespace Postyou\DealsAndProjectsBundle\Api;

class Order extends AbstractApi
{
    /**
     * @return object|object[]
     */
    public function getByProjectId(int $projectId): array|object
    {
        return $this->read([
            'ProjectId' => $projectId,
        ]);
    }

    protected function getEndpoint(): string
    {
        return 'order';
    }
}
