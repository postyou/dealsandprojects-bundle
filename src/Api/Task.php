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

    public function listForProject(int $projectId) {
        return parent::list([
            'ProjectId' => $projectId,
        ]);
    }

    protected function getEndpoint(): string {
        return 'task';
    }
}
