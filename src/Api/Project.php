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
class Project extends AbstractApi
{
    public function list(array $params = [], bool $withParticipants = false): array
    {
        $params['WithParticipants'] = $withParticipants ? 'true' : 'false';

        return $this->list($params);
    }

    public function listWithProjectState(string $state): array
    {
        return $this->list([
            'ProjectState' => $state,
        ]);
    }

    protected function getEndpoint(): string
    {
        return 'project';
    }
}
