<?php

declare(strict_types=1);

/*
 * @author  POSTYOU Digital- & Filmagentur
 * @license MIT
 */

namespace Postyou\DealsAndProjectsBundle\Api;

/**
 * @extends AbstractApi<\Postyou\DealsAndProjectsBundle\Entities\Task>
 */
class Task extends AbstractApi {

    /**
     * @return \Postyou\DealsAndProjectsBundle\Entities\Task[]
     */
    public function listForProject(int $projectId): array {
        return $this->list([
            'ProjectId' => $projectId,
        ]);
    }

    protected function getEndpoint(): string {
        return 'task';
    }
}
