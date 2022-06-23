<?php

declare(strict_types=1);

/*
 * @author  POSTYOU Digital- & Filmagentur
 * @license MIT
 */

namespace Postyou\DealsAndProjectsBundle\Api;

class Project extends AbstractApi
{
    public function list(bool $withParticipants = false): array
    {
        return $this->getAll($this->getEndpoint(), [
            'WithParticipants' => $withParticipants ? 'true' : 'false',
        ]);
    }

    /**
     * @return object[]
     */
    public function listOpenProjects(): array
    {
        return $this->getAll($this->getEndpoint(), [
            'ProjectState' => 'Offen'
        ]);
    }
    /**
     * @return object[]
     */
    public function listInProgressProjects(): array
    {
        return $this->getAll($this->getEndpoint(), [
            'ProjectState' => 'In Bearbeitung'
        ]);
    }

    protected function getEndpoint(): string
    {
        return 'project';
    }
}
