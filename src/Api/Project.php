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
    /**
     * @return \Postyou\DealsAndProjectsBundle\Entities\Project
     */
    public function read(int $id, array $params = []): object {
        array_merge($params, ['WithParticipants' => true]);
        return parent::read($id, $params);
    }

    /**
     * @return \Postyou\DealsAndProjectsBundle\Entities\Project[]
     */
    public function list(array $params = []): array {
        array_merge($params, ['WithParticipants' => true]);
        return parent::list($params);
    }

    /**
     * @return \Postyou\DealsAndProjectsBundle\Entities\Project[]
     */
    public function listWithProjectState(string $state): array {
        return $this->list([
            'ProjectState' => $state,
        ]);
    }

    protected function getEndpoint(): string {
        return 'project';
    }
}
