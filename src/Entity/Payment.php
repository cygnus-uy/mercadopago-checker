<?php

namespace CygnusUy\MercadoPagoSDK\Entity;

class Payment
{
	private int $id;

	private ?string $dateCreated;

	private ?string $dateApproved;

	private ?string $dateLastUpdated;

	private ?string $moneyReleaseDate;

	private ?string $paymentMethodId;

	private ?string $paymentTypeId;

	private ?string $status;

	private ?string $statusDetail;

	private ?string $currencyId;

	private ?string $description;

	private ?int $collectorId;

	private ?int $transactionAmount;

	private ?int $transactionAmountRefunded;

	private ?int $couponAmount;

	private ?int $installments;

	public function getId(): int
	{
		return $this->id;
	}

	public function setId(int $id): self
	{
		$this->id = $id;
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

	public function getDateApproved(): ?string
	{
		return $this->dateApproved;
	}

	public function setDateApproved(?string $dateApproved): self
	{
		$this->dateApproved = $dateApproved;
		return $this;
	}

	public function getDateLastUpdated(): ?string
	{
		return $this->dateLastUpdated;
	}

	public function setDateLastUpdated(?string $dateLastUpdated): self
	{
		$this->dateLastUpdated = $dateLastUpdated;
		return $this;
	}

	public function getMoneyReleaseDate(): ?string
	{
		return $this->moneyReleaseDate;
	}

	public function setMoneyReleaseDate(?string $moneyReleaseDate): self
	{
		$this->moneyReleaseDate = $moneyReleaseDate;
		return $this;
	}

	public function getPaymentMethodId(): ?string
	{
		return $this->paymentMethodId;
	}

	public function setPaymentMethodId(?string $paymentMethodId): self
	{
		$this->paymentMethodId = $paymentMethodId;
		return $this;
	}

	public function getPaymentTypeId(): ?string
	{
		return $this->paymentTypeId;
	}

	public function setPaymentTypeId(?string $paymentTypeId): self
	{
		$this->paymentTypeId = $paymentTypeId;
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

	public function getStatusDetail(): ?string
	{
		return $this->statusDetail;
	}

	public function setStatusDetail(?string $statusDetail): self
	{
		$this->statusDetail = $statusDetail;
		return $this;
	}

	public function getCurrencyId(): ?string
	{
		return $this->currencyId;
	}

	public function setCurrencyId(?string $currencyId): self
	{
		$this->currencyId = $currencyId;
		return $this;
	}

	public function getDescription(): ?string
	{
		return $this->description;
	}

	public function setDescription(?string $description): self
	{
		$this->description = $description;
		return $this;
	}

	public function getCollectorId(): ?int
	{
		return $this->collectorId;
	}

	public function setCollectorId(?int $collectorId): self
	{
		$this->collectorId = $collectorId;
		return $this;
	}

	public function getTransactionAmount(): ?int
	{
		return $this->transactionAmount;
	}

	public function setTransactionAmount(?int $transactionAmount): self
	{
		$this->transactionAmount = $transactionAmount;
		return $this;
	}

	public function getTransactionAmountRefunded(): ?int
	{
		return $this->transactionAmountRefunded;
	}

	public function setTransactionAmountRefunded(int $transactionAmountRefunded): self
	{
		$this->transactionAmountRefunded = $transactionAmountRefunded;
		return $this;
	}

	public function getCouponAmount(): ?int
	{
		return $this->couponAmount;
	}

	public function setCouponAmount(?int $couponAmount): self
	{
		$this->couponAmount = $couponAmount;
		return $this;
	}

	public function getInstallments(): ?int
	{
		return $this->installments;
	}

	public function setInstallments(?int $installments): self
	{
		$this->installments = $installments;
		return $this;
	}
}
