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

    /**
     * @param array<string,mixed> $params
     *
     * @return object[]
     */
    public function list(array $params = []): array
    {
        return $this->getAll($this->getEndpoint(), $params);
    }

    public function create(object $requestData): void
    {
        $this->post($this->getEndpoint(), $requestData);
    }

    /**
     * @param array<string,mixed> $params
     */
    public function read(int $id, array $params = []): object
    {
        $data = $this->get("{$this->getEndpoint()}/{$id}", $params);

        if (!\is_object($data)) {
            throw new \Exception('Response content is different than expected.');
        }

        return $data;
    }

    public function update(int $id, object $requestData): void
    {
        $this->put("{$this->getEndpoint()}/{$id}", $requestData);
    }

    /**
     * @param array<string,mixed> $params
     *
     * @return object|object[]
     */
    public function get(string $url, array $params = []): object|array
    {
        $response = $this->dealsandprojectsApi->request('GET', $url, empty($params) ? [] : [
            'query' => $params,
        ]);

        return self::getContent($response);
    }

    /**
     * @param array<string,mixed> $params
     *
     * @return object[]
     */
    public function getAll(string $url, array $params = []): array
    {
        $responseData = [];

        $i = 0;

        // D&P Api has a limit of 100 entries per request
        $params['Take'] = 100;

        while (1) {
            $params['Skip'] = $i;
            $chunk = $this->get($url, $params);

            if (empty($chunk)) {
                break;
            }

            if (\is_object($chunk)) {
                $chunk = [$chunk];
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

    /**
     * @return object|object[]
     */
    private static function getContent(ResponseInterface $response): object|array
    {
        if (200 !== $response->getStatusCode()) {
            throw new \Exception('Response status code is different than expected.');
        }

        $responseJson = $response->getContent();

        $content = json_decode($responseJson, false, 512, JSON_THROW_ON_ERROR);

        // ensure type object|array
        if (!\is_array($content) && !\is_object($content)) {
            throw new \Exception('Response content is different than expected.');
        }

        // ensure type object[]
        if (\is_array($content)) {
            return array_filter($content, fn ($item) => \is_object($item));
        }

        return $content;
    }
}
