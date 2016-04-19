<?php

namespace Benrowe\Sabnzbd;

use GuzzleHttp\Client as HttpClient;

/**
 *
 */
class Client
{
    const METHOD = 'GET';

    private $ip;
    private $port = 8080;
    private $apiKey;
    private $debugInfo;
    private $rawResponse;
    private $httpClient;
    private $outputType = 'json';

    public function __construct($ip, $apiKey, $port = null)
    {
        $this->setIp($ip);
        $this->setApiKey($apiKey);
        if (is_int($port)) {
            $this->setPort($port);
        }
    }

    public function setApiKey($apiKey)
    {
        if (empty($apiKey) || strlen($apiKey) != 32) {
            throw new \InvalidArgumentException('Invalid API key');
        }
        $this->apiKey = $apiKey;
    }

    public function getApiKey()
    {
        return $this->apiKey;
    }

    public function setPort($port)
    {
        if (!is_int($port)) {
            throw new \InvalidArgumentException('Invalid Port number');
        }
    }

    public function getPort()
    {
        return $this->port;
    }

    public function setIp($ip)
    {
        if (!filter_var($ip, FILTER_VALIDATE_IP)) {
            throw new \InvalidArgumentException('Invalid IP Address');
        }
        $this->ip = $ip;
    }

    public function getIp()
    {
        return $this->ip;
    }

    /**
     * [version description]
     * @return [type] [description]
     */
    public function version()
    {
        return $this->makeRequest('version');
    }

    /**
     * Make a request to the api
     *
     * @param  string $mode  the type of request
     * @param  array $payload the additional payload data
     * @return Response
     */
    private function makeRequest($mode, array $payload = [])
    {
        $url = $this->buildUri($mode, $payload);
        $client = $this->getHttpClient();
        $response = $client->request(self::METHOD, $url);

        return new Response($response, $mode, $payload);

    }

    /**
     * Build a complete uri to the requested endpoint
     *
     * @param  string $mode the type of request
     * @param  array $payload the additional data based on the supplied mode
     * @return string
     */
    private function buildUri($mode, array $payload = [])
    {
        $defaults = [
            'mode' => $mode,
            'apikey' => $this->apiKey,
            'output' => $this->outputType
        ];
        $urlParams = array_merge($defaults, $payload);
        $urlParams = http_build_query($urlParams);
        
        return 'http://' . $this->ip . ':' . $this->port . "/api?" . $urlParams;
    }

    /**
     * Get an instance of the http client
     *
     * @return HttpClient
     */
    private function getHttpClient()
    {
        if (!$this->httpClient) {
            $this->httpClient = new HttpClient();
        }
        return $this->httpClient;
    }
}
