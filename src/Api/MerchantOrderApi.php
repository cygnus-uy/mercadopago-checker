<?php

namespace CygnusUy\MercadoPagoSDK\Api;

use CygnusUy\MercadoPagoSDK\Entity\MerchantOrder;
use CygnusUy\MercadoPagoSDK\Entity\Payment;
use GuzzleHttp\Client;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;

final class MerchantOrderApi
{

	private string $accessToken;
	private Client $client;
	private Serializer $serializer;

	public function __construct(string $accessToken, string $baseUri)
	{
		$this->accessToken = $accessToken;
		$this->client = new Client(['base_uri' => $baseUri]);
		$this->serializer = new Serializer([new ObjectNormalizer()], [new JsonEncoder()]);
	}

	public function getMerchantOrderEntity(int $id): ?MerchantOrder
	{
		$data = $this->getMerchantOrderData($id);

		/**
		 * @var MerchantOrder $merchantOrder
		 */
		$merchantOrder = $this->serializer->deserialize($data, MerchantOrder::class, 'json');

		$merchantOrder->setPayments(
			$merchantOrder->getPayments() ?
				$this->deserializeToPaymentEntityList($merchantOrder->getPayments()) :
				[]
		);

		return $merchantOrder;
	}

	/**
	 * @return array|MerchantOrder[]
	 */
	public function getMerchantOrderEntityList(): array
	{
		$result = [];
		$data = $this->getMerchantOrderDataList();
		$data = json_decode($data, true);

		if ($data) {
			$elements = $data['elements'];
			$total = $data['total'];

			if ($total) {
				foreach ($elements as $key => $_mo_item) {

					$_mo_item = json_encode($_mo_item);

					if ($_mo_item) {
						/**
						 * @var MerchantOrder $merchantOrder
						 */
						$merchantOrder = $this->serializer->deserialize($_mo_item, MerchantOrder::class, 'json');

						$merchantOrder->setPayments(
							$merchantOrder->getPayments() ?
								$this->deserializeToPaymentEntityList($merchantOrder->getPayments()) :
								[]
						);

						array_push($result, $merchantOrder);
					}
				}
			}
		}

		return $result;
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

	private function deserializeToPaymentEntity(array $payment): ?Payment
	{
		$payment = json_encode($payment);

		return $payment ? $this->serializer->deserialize($payment, Payment::class, 'json') : null;
	}

	/**
	 * @return array|Payment[]
	 */
	private function deserializeToPaymentEntityList(array $payments): array
	{
		$result = [];
		foreach ($payments as $_i_p => $_payment) {

			$payment = $this->deserializeToPaymentEntity($_payment);

			if ($payment) {
				array_push($result, $payment);
			}
		}

		return $result;
	}
}
