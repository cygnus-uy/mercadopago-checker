<?php

namespace CygnusUy\MercadoPagoSDK\Api;

use CygnusUy\MercadoPagoSDK\Entity\Payment;
use GuzzleHttp\Client;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;

final class PaymentApi
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

	public function getPaymentEntity(int $id): ?Payment
	{
		$data = $this->getPaymentData($id);

		/**
		 * @var Payment $payment
		 */
		$payment = $this->serializer->deserialize($data, Payment::class, 'json');

		return $payment;
	}

	/**
	 * getPaymentEntityList function
	 *
	 * @param array $queryVars = [
	 * 'sort' => 'date_created',
	 * 'criteria' => 'desc',
	 * 'external_reference' => 'ID_REF',
	 * ]
	 * @return array|Payment[]
	 */
	public function getPaymentEntityList(array $queryVars = []): array
	{
		$payments = [];
		$data = $this->getPaymentDataList($queryVars);
		$data = json_decode($data, true);

		if ($data) {
			$results = $data['results'];
			$paging = $data['paging'];
			$total = $paging['total'];

			if ($total) {
				foreach ($results as $key => $_payment_item) {

					$_payment_item = json_encode($_payment_item);

					if ($_payment_item) {
						/**
						 * @var Payment $payment
						 */
						$payment = $this->serializer->deserialize($_payment_item, Payment::class, 'json');

						array_push($payments, $payment);
					}
				}
			}
		}

		return $payments;
	}

	public function getPaymentData(int $id): string
	{
		$response = $this->client->request('GET', "/v1/payments/{$id}", [
			'headers' => ['Authorization' => "Bearer {$this->accessToken}"]
		]);

		if (in_array($response->getStatusCode(), [400, 401])) {

			return null;
		}

		return $response->getBody()->getContents();
	}

	/**
	 * getPaymentDataList function
	 *
	 * @param array $queryVars = [
	 * 'sort' => 'date_created',
	 * 'criteria' => 'desc',
	 * 'external_reference' => 'ID_REF',
	 * ]
	 * @return string
	 */
	public function getPaymentDataList(array $queryVars = []): string
	{

		
		$queryVarsStr = http_build_query($queryVars);

		$response = $this->client->request('GET', "/v1/payments/search?$queryVarsStr", [
			'headers' => ['Authorization' => "Bearer {$this->accessToken}"]
		]);

		if (in_array($response->getStatusCode(), [400, 401])) {

			return null;
		}

		return $response->getBody()->getContents();
	}
}
