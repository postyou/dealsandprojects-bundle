<?php

declare(strict_types=1);

/*
 * @author  POSTYOU Digital- & Filmagentur
 * @license MIT
 */

namespace Postyou\DealsAndProjectsBundle\Api;

/**
 * @extends AbstractApi<\Postyou\DealsAndProjectsBundle\Entities\Project>
 */
class Project extends AbstractApi {
    public function read(int $id, array $params = []): object {
        array_push($params, ['WithParticipants' => true]);
        return parent::read($id, $params);
    }

    public function list(array $params = []): array {
        array_push($params, ['WithParticipants' => true]);
        return parent::list($params);
    }

    public function listWithProjectState(string $state): array {
        return $this->list([
            'ProjectState' => $state,
        ]);
    }

    protected function getEndpoint(): string {
        return 'project';
    }
}
