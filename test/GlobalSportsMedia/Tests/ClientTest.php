<?php

namespace GlobalSportsMedia\Tests;

use GlobalSportsMedia\Client;
use GlobalSportsMedia\Exception\InvalidArgumentException;

class ClientTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @test
     */
    public function shouldPassUrlToContructor()
    {
        $client = new Client('http://test.local');

        $this->assertInstanceOf('GlobalSportsMedia\Client', $client);
    }

    /**
     * @test
     */
    public function shouldPassUsernameAndPasswordToContructor()
    {
        $client = new Client('http://test.local', 'username', 'pwd');

        $this->assertInstanceOf('GlobalSportsMedia\Client', $client);
    }

    /**
     * @test
     * @expectedException InvalidArgumentException
     */
    public function shouldNotGetApiInstance()
    {
        $client = new Client('http://test.local');
        $client->api('do_not_exist');
    }

    /**
     * @test
     * @dataProvider getApiClassesProvider
     */
    public function shouldGetApiInstance($apiName, $class)
    {
        $client = new Client('http://test.local');
        $this->assertInstanceOf($class, $client->api($apiName));
    }

    public function getApiClassesProvider()
    {
        return array(
            array('soccer', 'GlobalSportsMedia\Api\Soccer'),
            array('am_football', 'GlobalSportsMedia\Api\AmericanFootball'),
            array('aus_football', 'GlobalSportsMedia\Api\AustralianFootball'),
            array('baseball', 'GlobalSportsMedia\Api\Baseball'),
            array('basketball', 'GlobalSportsMedia\Api\Basketball'),
            array('cricket', 'GlobalSportsMedia\Api\Cricket'),
            array('golf', 'GlobalSportsMedia\Api\Golf'),
            array('handball', 'GlobalSportsMedia\Api\Handball'),
            array('hockey', 'GlobalSportsMedia\Api\Hockey'),
            array('motorsports', 'GlobalSportsMedia\Api\Motorsports'),
            array('rugby', 'GlobalSportsMedia\Api\Rugby'),
            array('tennis', 'GlobalSportsMedia\Api\Tennis'),
            array('volleyball', 'GlobalSportsMedia\Api\Volleyball'),
        );
    }
}
