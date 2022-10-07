<?php

namespace CygnusUy\MercadopagoChecker\Api;

use CygnusUy\MercadopagoChecker\Entity\MerchantOrder;
use GuzzleHttp\Client;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;

final class Checker
{

	private string $accessToken;
	private Client $client;
	private Serializer $serializer;

	/**
	 * @param string $accessToken
	 */
	public function __construct(string $accessToken, string $baseUri = 'https://api.mercadopago.com')
	{
		$this->accessToken = $accessToken;
		$this->client = new Client(['base_uri' => $baseUri]);
		$this->serializer = new Serializer([new ObjectNormalizer()], [new JsonEncoder()]);
	}

	public function getMerchantOrder(int $id): ?MerchantOrder
	{
		$response = $this->client->request('GET', "/merchant_orders/{$id}", [
			'headers' => ['Authorization' => "Bearer {$this->accessToken}"]
		]);

		if (in_array($response->getStatusCode(), [400, 401])) {

			return null;
		}

		return $this->serializer->deserialize($response->getBody(), MerchantOrder::class, 'json');
	}
}
