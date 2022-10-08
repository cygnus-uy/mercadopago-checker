<?php

use CygnusUy\MercadoPagoSDK\Api\MerchantOrderApi;
use CygnusUy\MercadoPagoSDK\Entity\MerchantOrder;
use PHPUnit\Framework\TestCase;
use Symfony\Component\Dotenv\Dotenv;

class MerchantOrderApiTest extends TestCase
{
	private string $MP_ACCESS_TOKEN;
	private string $MP_BASEURI;

	private function init()
	{
		$dotenv = new Dotenv();
		if (file_exists(__DIR__ . "/../../.env.local")) {

			$dotenv->loadEnv(__DIR__ . "/../../.env.local");
		} else if (file_exists(__DIR__ . "/../../.env")) {

			$dotenv->loadEnv(__DIR__ . "/../../.env");
		}

		$MP_ENV = getenv('MP_ENV') ? getenv('MP_ENV') : (isset($_ENV['MP_ENV']) ? $_ENV['MP_ENV'] : 'dev');

		$this->MP_ACCESS_TOKEN = getenv('MP_ACCESS_TOKEN') ? getenv('MP_ACCESS_TOKEN') : (isset($_ENV['MP_ACCESS_TOKEN']) ? $_ENV['MP_ACCESS_TOKEN'] : null);
		$MP_TEST_ACCESS_TOKEN = getenv('MP_TEST_ACCESS_TOKEN') ? getenv('MP_TEST_ACCESS_TOKEN') : (isset($_ENV['MP_TEST_ACCESS_TOKEN']) ? $_ENV['MP_TEST_ACCESS_TOKEN'] : null);

		$this->assertNotEmpty($this->MP_ACCESS_TOKEN);
		$this->assertNotEmpty($MP_TEST_ACCESS_TOKEN);

		$this->MP_ACCESS_TOKEN = $MP_ENV === 'prod' ? $this->MP_ACCESS_TOKEN : $MP_TEST_ACCESS_TOKEN;

		$this->MP_BASEURI = getenv('MP_BASEURI') ? getenv('MP_BASEURI') : (isset($_ENV['MP_BASEURI']) ? $_ENV['MP_BASEURI'] : null);

		$this->assertNotEmpty($this->MP_BASEURI);
	}

	public function testMerchantOrder()
	{

		$this->init();

		$merchantOrderApi = new MerchantOrderApi($this->MP_ACCESS_TOKEN, $this->MP_BASEURI);

		$this->assertNotEmpty($merchantOrderApi);

		$data = $merchantOrderApi->getMerchantOrderEntity(5968295944);

		$this->assertNotEmpty($data);
		$this->assertInstanceOf(MerchantOrder::class, $data);
	}
}
