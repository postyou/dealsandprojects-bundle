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
    public function getByProjectId(int $projectId): object|array
    {
        return $this->get($this->getEndpoint(), [
            'ProjectId' => $projectId,
        ]);
    }

    protected function getEndpoint(): string
    {
        return 'order';
    }
}
