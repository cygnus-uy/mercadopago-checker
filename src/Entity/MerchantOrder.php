<?php

namespace CygnusUy\MercadopagoChecker\Entity;

class MerchantOrder
{
	private int $id;
	private string $status;
	private string $externalReference;
	private string $preferenceId;
	private string $marketplace;
	private string $dateCreated;
	private string $lastUpdated;
	private int $shippingCost;
	private int $totalAmount;
	private string $siteId;
	private int $paidAmount;
	private int $refundedAmount;
	private bool $cancelled;
	private string $additionalInfo;
	private int $applicationId;
	private string $orderStatus;

	public function getId(): int
	{
		return $this->id;
	}

	public function setId(int $id): self
	{
		$this->id = $id;
		return $this;
	}

	public function getStatus(): string
	{
		return $this->status;
	}

	public function setStatus(string $status): self
	{
		$this->status = $status;
		return $this;
	}
}
