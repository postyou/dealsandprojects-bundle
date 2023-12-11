<?php

declare(strict_types=1);

/*
 * @author  POSTYOU Digital- & Filmagentur
 * @license MIT
 */

namespace Postyou\DealsAndProjectsBundle\Api;

use Symfony\Contracts\HttpClient\ResponseInterface;
use Symfony\Contracts\HttpClient\HttpClientInterface;
use Postyou\DealsAndProjectsBundle\Entities\AbstractEntity;

/**
 * Abstract Api class
 *
 * @template T
 */
abstract class AbstractApi {
    private HttpClientInterface $dealsandprojectsApi;
    private int $itemsLimit;

    /**
     * @var string $className
     */
    private string $className;

    public function __construct(HttpClientInterface $dealsandprojectsApi) {
        $this->dealsandprojectsApi = $dealsandprojectsApi;
        $this->itemsLimit = 500;
        $this->className = "\\" . str_replace('\\Api\\', '\\Entities\\', static::class);
    }

    public function setItemsLimit(int $limit) {
        $this->itemsLimit = $limit;
    }

    /**
     * @param array<string,mixed> $params
     *
     * @return (T is undefined ? object[] : T[])
     */
    public function list(array $params = []): array {
        return $this->getAll($this->getEndpoint(), $params);
    }

    /**
     * @param T|object $requestData
     *
     * @return void
     */
    public function create(object $requestData): void {
        if ($requestData instanceof AbstractEntity) {
            $requestData = $requestData->toObject();
        }

        $this->post($this->getEndpoint(), $requestData);
    }

    /**
     * @param array<string,mixed> $params
     *
     * @return (T is undefined ? object : T)
     */
    public function read(int $id, array $params = []): object {
        $data = $this->get("{$this->getEndpoint()}/{$id}", $params);

        if (!\is_object($data)) {
            throw new \Exception('Response content is different than expected.');
        }

        return $this->mapToClass($data);
    }

    /**
     * @param int $id
     * @param T|object $requestData
     *
     * @return void
     */
    public function update(int $id, object $requestData): void {
        if ($requestData instanceof AbstractEntity) {
            $requestData = $requestData->toObject();
        }

        $this->put("{$this->getEndpoint()}/{$id}", $requestData);
    }

    /**
     * @param array<string,mixed> $params
     *
     * @return object|object[]|T|T[]
     */
    private function get(string $url, array $params = []): object | array {
        $response = $this->dealsandprojectsApi->request('GET', $url, empty($params) ? [] : [
            'query' => $params,
        ]);

        $content = self::getContent($response);

        return $content;
    }

    /**
     * @param array<string,mixed> $params
     *
     * @return T[] | object[]
     */
    private function getAll(string $url, array $params = []): array {
        $responseData = [];

        $i = 0;

        // D&P Api has a limit of 100 entries per request
        $params['Take'] = 100;

        while ($i < $this->itemsLimit) {
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

        return $this->mapToClass($responseData);
    }

    private function post(string $url, object $requestData): void {
        $requestJson = json_encode($requestData, JSON_THROW_ON_ERROR);

        $response = $this->dealsandprojectsApi->request('POST', $url, [
            'body' => $requestJson,
        ]);

        if (200 !== $response->getStatusCode()) {
            throw new \Exception('Response status code is different than expected.');
        }
    }

    private function put(string $url, object $requestData): void {
        $requestJson = json_encode($requestData, JSON_THROW_ON_ERROR);

        $response = $this->dealsandprojectsApi->request('PUT', $url, [
            'body' => $requestJson,
        ]);

        if ($response->getStatusCode() >= 200 && $response->getStatusCode() < 300) {
            return;
        }

        throw new \Exception('Response status code is different than expected.');
    }

    abstract protected function getEndpoint(): string;

    /**
     * @return object|object[]
     */
    private static function getContent(ResponseInterface $response): object|array {
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

    /**
     * @return T|T[]|object[]|object
     */
    private function mapToClass(object | array $object): object | array {
        if (class_exists($this->className)) {
            if (gettype($object) == "object") {
                return new $this->className($object);
            } else if (is_array($object)) {
                return array_map(fn ($obj) => new $this->className($obj), $object);
            }
        } else {
            return $object;
        }
    }
}
