<?php

namespace Thinkbig\Bundle\HivataliKapu\HivataliKapuBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class DefaultControllerTest extends WebTestCase
{
    public function testIndex()
    {

    	$this->markTestIncomplete(
          	'This test has not been implemented yet.'
        );

        $client = static::createClient();

        $crawler = $client->request('GET', '/hello/Fabien');

        $this->assertTrue($crawler->filter('html:contains("Hello Fabien")')->count() > 0);
    }
}
