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
    public function getByProjectId(int|string $projectId): array|object {
        return parent::list([
            'ProjectId' => $projectId,
        ]);
    }

    protected function getEndpoint(): string {
        return 'order';
    }
}
