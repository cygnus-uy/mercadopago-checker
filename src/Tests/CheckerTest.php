<?php

use CygnusUy\MercadopagoChecker\Api\Checker;
use CygnusUy\MercadopagoChecker\Entity\MerchantOrder;
use PHPUnit\Framework\TestCase;
use Symfony\Component\Dotenv\Dotenv;

class CheckerTest extends TestCase
{
	public function testMerchantOrder()
	{

		$dotenv = new Dotenv();
		if (file_exists(__DIR__ . "/../../.env.local")) {

			$dotenv->loadEnv(__DIR__ . "/../../.env.local");
		} else if (file_exists(__DIR__ . "/../../.env")) {

			$dotenv->loadEnv(__DIR__ . "/../../.env");
		}

		$MP_ACCESS_TOKEN = getenv('MP_ACCESS_TOKEN') ? getenv('MP_ACCESS_TOKEN') : (isset($_ENV['MP_ACCESS_TOKEN']) ? $_ENV['MP_ACCESS_TOKEN'] : null);
		$MP_BASEURI = getenv('MP_BASEURI') ? getenv('MP_BASEURI') : (isset($_ENV['MP_BASEURI']) ? $_ENV['MP_BASEURI'] : null);

		$this->assertNotEmpty($MP_ACCESS_TOKEN);
		$this->assertNotEmpty($MP_BASEURI);

		$MPChecker = new Checker($MP_ACCESS_TOKEN, $MP_BASEURI);

		$this->assertNotEmpty($MPChecker);

		$data = $MPChecker->getMerchantOrder(5968295944);

		$this->assertNotEmpty($data);
		$this->assertInstanceOf(MerchantOrder::class, $data);
	}
}
