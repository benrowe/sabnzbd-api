<?php

namespace Benrowe\Sabnzbd;

class Response
{
    private $response;
    private $mode;
    private $payload;

    public function __construct($response, $mode, $payload)
    {
        $this->setResponse($response);
        $this->setMode($mode);
        $this->setPayload($payload);
    }

    protected function setResponse($response)
    {
        $this->response = $response;
    }

    public function getData()
    {
        return json_decode($this->response->getBody(), true);
    }

    public function getResponse()
    {

    }

    public function setMode($mode)
    {
        $this->mode = $mode;
    }

    public function getMode()
    {

    }

    public function setPayload(array $payload)
    {
        $this->payload = $payload;
    }

    public function getPayload()
    {

    }

    public function __toString()
    {
        $data = $this->getData();
        return $data[$this->mode];
    }
}
