<?php

declare(strict_types=1);

/*
 * @author  POSTYOU Digital- & Filmagentur
 * @license MIT
 */

namespace Postyou\DealsAndProjectsBundle\Api;

use Symfony\Contracts\HttpClient\HttpClientInterface;
use Symfony\Contracts\HttpClient\ResponseInterface;

abstract class AbstractApi
{
    private HttpClientInterface $dealsandprojectsApi;

    public function __construct(HttpClientInterface $dealsandprojectsApi)
    {
        $this->dealsandprojectsApi = $dealsandprojectsApi;
    }

    public function list(): array
    {
        return $this->getAll($this->getEndpoint());
    }

    public function create(object $requestData): void
    {
        $this->post($this->getEndpoint(), $requestData);
    }

    public function read(int $id): array|object
    {
        return $this->get("{$this->getEndpoint()}/{$id}");
    }

    public function update(int $id, object $requestData): void
    {
        $this->put("{$this->getEndpoint()}/{$id}", $requestData);
    }

    public function get(string $url, array $params = []): array|object
    {
        $response = $this->dealsandprojectsApi->request('GET', $url, empty($params) ? [] : [
            'query' => $params,
        ]);

        return self::getContent($response);
    }

    public function getAll(string $url, array $params = []): array
    {
        $responseData = [];

        $i = 0;

        // D&P Api has a limit of 100 entries per request
        $params['Take'] = 100;

        while (1) {
            $params['Skip'] = $i;
            $chunk = (array) $this->get($url, $params);

            if (empty($chunk)) {
                break;
            }

            $responseData = array_merge($responseData, $chunk);

            $i += 100;
        }

        return $responseData;
    }

    public function post(string $url, object $requestData): void
    {
        $requestJson = json_encode($requestData, JSON_THROW_ON_ERROR);

        $response = $this->dealsandprojectsApi->request('POST', $url, [
            'body' => $requestJson,
        ]);

        if (200 !== $response->getStatusCode()) {
            throw new \Exception('Response status code is different than expected.');
        }
    }

    public function put(string $url, object $requestData): void
    {
        $requestJson = json_encode($requestData, JSON_THROW_ON_ERROR);

        $response = $this->dealsandprojectsApi->request('PUT', $url, [
            'body' => $requestJson,
        ]);

        if (204 !== $response->getStatusCode()) {
            throw new \Exception('Response status code is different than expected.');
        }
    }

    abstract protected function getEndpoint(): string;

    private static function getContent(ResponseInterface $response): array|object
    {
        if (200 !== $response->getStatusCode()) {
            throw new \Exception('Response status code is different than expected.');
        }

        $responseJson = $response->getContent();

        return json_decode($responseJson, false, 512, JSON_THROW_ON_ERROR);
    }
}
