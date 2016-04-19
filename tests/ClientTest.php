<?php

namespace Tests;

use Benrowe\Sabnzbd\Client;

class ClientTest extends \PHPUnit_Framework_TestCase
{
    public function testIpValidation()
    {
        $this->setExpectedException(\InvalidArgumentException::class);

        // verify ip address
        $client = new \Benrowe\Sabnzbd\Client('dummy', '123123123');
    }

    public function testKeyValidation()
    {
        // verify key
        $this->setExpectedException(\InvalidArgumentException::class);
        $client = new \Benrowe\Sabnzbd\Client('127.0.0.1', '123123123');
    }

    /**
     * [testBasic description]
     */
    public function testBasic()
    {
        //$client = new \Benrowe\Sabnzbd\Client('192.168.10.200', '258b96ddc5c0b303b1ea7df474a1723d');
        // $this->assertSame('1.0.0', $client->version());
    }
}
