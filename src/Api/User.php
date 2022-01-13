<?php

declare(strict_types=1);

/*
 * @author  POSTYOU Digital- & Filmagentur
 * @license MIT
 */

namespace Postyou\DealsAndProjectsBundle\Api;

class User extends AbstractApi
{
    protected function getEndpoint(): string
    {
        return 'user';
    }
}
