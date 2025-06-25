<?php

declare(strict_types=1);

namespace Palina\App\Domain\Entity;

class User
{
    public function __construct(
        private ?int $id = null,
        private ?string $country = null,
        private ?string $city = null,
        private bool $isActive = false,
        private ?string $gender = null,
        private ?\DateTimeImmutable $birthDate = null,
        private ?float $salary = null,
        private bool $hasChildren = false,
        private ?string $familyStatus = null,
        private ?\DateTimeImmutable $registrationDate = null,
    ) {
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCountry(): ?string
    {
        return $this->country;
    }

    public function getCity(): ?string
    {
        return $this->city;
    }

    public function isActive(): ?bool
    {
        return $this->isActive;
    }

    public function getGender(): ?string
    {
        return $this->gender;
    }

    public function getBirthDate(): ?\DateTimeImmutable
    {
        return $this->birthDate;
    }

    public function getSalary(): ?float
    {
        return $this->salary;
    }

    public function hasChildren(): ?bool
    {
        return $this->hasChildren;
    }

    public function getFamilyStatus(): ?string
    {
        return $this->familyStatus;
    }

    public function getRegistrationDate(): ?\DateTimeImmutable
    {
        return $this->registrationDate;
    }
}
