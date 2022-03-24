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
            'WithParticipants' => 'true',
        ]);
    }

    protected function getEndpoint(): string
    {
        return 'project';
    }
}
