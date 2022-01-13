<?php

declare(strict_types=1);

/*
 * @author  POSTYOU Digital- & Filmagentur
 * @license MIT
 */

namespace Postyou\DealsAndProjectsBundle\Api;

class Task extends AbstractApi
{
    protected function getEndpoint(): string
    {
        return 'task';
    }
}
