<?php

namespace CygnusUy\MercadoPagoSDK\Api;

use CygnusUy\MercadoPagoSDK\Entity\MerchantOrder;
use GuzzleHttp\Client;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;

final class MerchantOrderApi
{

	private string $accessToken;
	private Client $client;
	private Serializer $serializer;

	/**
	 * @param string $accessToken
	 */
	public function __construct(string $accessToken, string $baseUri)
	{
		$this->accessToken = $accessToken;
		$this->client = new Client(['base_uri' => $baseUri]);
		$this->serializer = new Serializer([new ObjectNormalizer()], [new JsonEncoder()]);
	}

	public function getMerchantOrderEntity(int $id): ?MerchantOrder
	{
		$data = $this->getMerchantOrderData($id);

		return $this->serializer->deserialize($data, MerchantOrder::class, 'json');
	}

	public function getMerchantOrderData(int $id): string
	{
		$response = $this->client->request('GET', "/merchant_orders/{$id}", [
			'headers' => ['Authorization' => "Bearer {$this->accessToken}"]
		]);

		if (in_array($response->getStatusCode(), [400, 401])) {

			return null;
		}

		return $response->getBody()->getContents();
	}

	public function getMerchantOrderDataList(): string
	{
		$response = $this->client->request('GET', "/merchant_orders/search", [
			'headers' => ['Authorization' => "Bearer {$this->accessToken}"]
		]);

		if (in_array($response->getStatusCode(), [400, 401])) {

			return null;
		}

		return $response->getBody()->getContents();
	}
}
