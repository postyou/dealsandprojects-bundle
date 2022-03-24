<?php

declare(strict_types=1);

/*
 * @author  POSTYOU Digital- & Filmagentur
 * @license MIT
 */

namespace Postyou\DealsAndProjectsBundle\Api;

class CustomerAccess extends AbstractApi
{
    protected function getEndpoint(): string
    {
        return 'customeraccess';
    }
}
