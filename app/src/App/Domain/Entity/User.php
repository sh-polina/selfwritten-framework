<?php

namespace Palina\App\Domain\Entity;

class User
{
    public function __construct(
        private ?string $country,
        private ?string $city,
        private ?bool $isActive,
        private ?string $gender,
        private ?string $birthDate,
        private ?float $salary,
        private ?bool $hasChildren,
        private ?string $familyStatus,
        private ?string $registrationDate
    ) {
    }

    public function getCountry(): string
    {
        return $this->country;
    }

    public function getCity(): string
    {
        return $this->city;
    }

    public function isActive(): bool
    {
        return $this->isActive;
    }

    public function getGender(): string
    {
        return $this->gender;
    }

    public function getBirthDate(): string
    {
        return $this->birthDate;
    }

    public function getSalary(): float
    {
        return $this->salary;
    }

    public function hasChildren(): bool
    {
        return $this->hasChildren;
    }

    public function getFamilyStatus(): string
    {
        return $this->familyStatus;
    }

    public function getRegistrationDate(): string
    {
        return $this->registrationDate;
    }
}
