<?php

namespace App\Tests\Behat\Contexts\WakeOnLan;

use Behat\Behat\Context\Context;
use Behat\Hook\BeforeScenario;
use Behat\Step\Then;
use Behat\Step\When;
use Symfony\Bundle\FrameworkBundle\KernelBrowser;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class WakeOnLanControllerContext extends WebTestCase implements Context
{
    private KernelBrowser $client;
    private int $httpCode;

    #[BeforeScenario]
    public function setUp(): void
    {
        $this->client = static::createClient();

        parent::setUp();
    }

    #[When('I run the command with mac address :mac and broadcast address :broadcastAddress')]
    public function iRunTheCommandWithMacAddressAndBroadcastAddress(string $mac, string $broadcastAddress): void
    {
        $this->client->request(
            'POST',
            '/network/lan/wake',
            array(),
            array(),
            array('CONTENT_TYPE' => 'application/json'),
            '{"mac":"' . $mac . '","broadcast":"' . $broadcastAddress . '"}'
        );

        $this->httpCode = $this->client->getResponse()->getStatusCode();
    }

    #[Then('I will get a http :httpCode back')]
    public function iWillGetHttpBack(int $httpCode): void
    {
        self::assertEquals($httpCode, $this->httpCode);
    }
}