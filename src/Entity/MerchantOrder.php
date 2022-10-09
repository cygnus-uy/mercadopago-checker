<?php

namespace CygnusUy\MercadoPagoSDK\Entity;

class MerchantOrder
{
	private int $id;

	private ?string $status;

	private ?string $externalReference;

	private ?string $preferenceId;

	private ?array $payments;

	private ?string $marketplace;

	private ?string $dateCreated;

	private ?string $lastUpdated;

	private ?float $shippingCost;

	private ?float $totalAmount;

	private ?string $siteId;

	private ?float $paidAmount;

	private ?float $refundedAmount;

	private ?array $payer;

	private ?array $items;

	private bool $cancelled;

	private ?string $additionalInfo;

	private ?int $applicationId;

	private ?string $orderStatus;

	public function getId(): int
	{
		return $this->id;
	}

	public function setId(int $id): self
	{
		$this->id = $id;
		return $this;
	}

	public function getStatus(): ?string
	{
		return $this->status;
	}

	public function setStatus(?string $status): self
	{
		$this->status = $status;
		return $this;
	}

	public function getExternalReference(): ?string
	{
		return $this->externalReference;
	}

	public function setExternalReference(?string $externalReference): self
	{
		$this->externalReference = $externalReference;
		return $this;
	}

	public function getPreferenceId(): ?string
	{
		return $this->preferenceId;
	}

	public function setPreferenceId(?string $preferenceId): self
	{
		$this->preferenceId = $preferenceId;
		return $this;
	}

	public function getPayments(): ?array
	{
		return $this->payments;
	}

	public function setPayments(?array $payments): self
	{
		$this->payments = $payments;
		return $this;
	}

	public function getMarketplace(): ?string
	{
		return $this->marketplace;
	}

	public function setMarketplace(?string $marketplace): self
	{
		$this->marketplace = $marketplace;
		return $this;
	}

	public function getDateCreated(): ?string
	{
		return $this->dateCreated;
	}

	public function setDateCreated(?string $dateCreated): self
	{
		$this->dateCreated = $dateCreated;
		return $this;
	}

	public function getLastUpdated(): ?string
	{
		return $this->lastUpdated;
	}

	public function setLastUpdated(?string $lastUpdated): self
	{
		$this->lastUpdated = $lastUpdated;
		return $this;
	}

	public function getShippingCost(): ?float
	{
		return $this->shippingCost;
	}

	public function setShippingCost(?float $shippingCost): self
	{
		$this->shippingCost = $shippingCost;
		return $this;
	}

	public function getTotalAmount(): ?float
	{
		return $this->totalAmount;
	}

	public function setTotalAmount(?float $totalAmount): self
	{
		$this->totalAmount = $totalAmount;
		return $this;
	}

	public function getSiteIds(): ?string
	{
		return $this->siteId;
	}

	public function setSiteId(?string $siteId): self
	{
		$this->siteId = $siteId;
		return $this;
	}

	public function getPaidAmount(): ?float
	{
		return $this->paidAmount;
	}

	public function setPaidAmount(?float $paidAmount): self
	{
		$this->paidAmount = $paidAmount;
		return $this;
	}

	public function getRefundedAmount(): ?float
	{
		return $this->refundedAmount;
	}

	public function setRefundedAmount(?float $refundedAmount): self
	{
		$this->refundedAmount = $refundedAmount;
		return $this;
	}

	public function getPayer(): ?array
	{
		return $this->payer;
	}

	public function setPayer(?array $payer): self
	{
		$this->payer = $payer;
		return $this;
	}

	public function getItems(): ?array
	{
		return $this->items;
	}

	public function setItems(?array $items): self
	{
		$this->items = $items;
		return $this;
	}

	public function isCancelled(): bool
	{
		return $this->cancelled;
	}

	public function setCancelled(bool $cancelled): self
	{
		$this->cancelled = $cancelled;
		return $this;
	}

	public function getAdditionalInfo(): ?string
	{
		return $this->additionalInfo;
	}

	public function setAdditionalInfo(?string $additionalInfo): self
	{
		$this->additionalInfo = $additionalInfo;
		return $this;
	}

	public function getApplicationId(): ?int
	{
		return $this->applicationId;
	}

	public function setApplicationId(?int $applicationId): self
	{
		$this->applicationId = $applicationId;
		return $this;
	}

	public function getOrderStatus(): ?string
	{
		return $this->orderStatus;
	}

	public function setOrderStatus(?string $orderStatus): self
	{
		$this->orderStatus = $orderStatus;
		return $this;
	}
}
