<?php

use CygnusUy\MercadopagoChecker\Api\Checker;
use PHPUnit\Framework\TestCase;

class CheckerTest extends TestCase
{
	public function merchantOrderTest(){

		$MPChecker = new Checker("");

		$MPChecker->getMerchantOrder(0);
	}
}
