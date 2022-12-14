<?php

declare(strict_types=1);

/*
 * @author  POSTYOU Digital- & Filmagentur
 * @license MIT
 */

namespace Postyou\DealsAndProjectsBundle\Api;

class Project extends AbstractApi
{
    /**
     * @param array<string,mixed> $params
     *
     * @return object[]
     */
    public function list(array $params = [], bool $withParticipants = false): array
    {
        $params['WithParticipants'] = $withParticipants ? 'true' : 'false';

        return $this->getAll($this->getEndpoint(), $params);
    }

    /**
     * @return object[]
     */
    public function listWithProjectState(string $state): array
    {
        return $this->getAll($this->getEndpoint(), [
            'ProjectState' => $state,
        ]);
    }

    protected function getEndpoint(): string
    {
        return 'project';
    }
}
