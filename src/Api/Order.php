<?php

declare(strict_types=1);

/*
 * @author  POSTYOU Digital- & Filmagentur
 * @license MIT
 */

namespace Postyou\DealsAndProjectsBundle\Api;

/**
 * @extends AbstractApi<\Postyou\DealsAndProjectsBundle\Entities\Order>
 */
class Order extends AbstractApi {
    /**
     * @return \Postyou\DealsAndProjectsBundle\Entities\Order[]
     */
    public function getByProjectId(int|string $projectId): array {
        return parent::list([
            'ProjectId' => $projectId,
        ]);
    }

    protected function getEndpoint(): string {
        return 'order';
    }
}
