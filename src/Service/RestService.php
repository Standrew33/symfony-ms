<?php
/**
 * Created by PhpStorm.
 * User: Andrei
 * Date: 06.02.2021
 * Time: 1:02
 */

namespace App\Service;

class RestService implements InterfaceService
{
    private string $fieldOne;

    private bool $fieldTwo;

    private array $fieldThree;

    public function getFieldOne(): string
    {
        return $this->fieldOne;
    }

    public function setFieldOne(string $fieldOne)
    {
        $this->fieldOne = $fieldOne;
    }

    public function getFieldTwo(): bool
    {
        return $this->fieldTwo;
    }

    public function setFieldTwo(bool $fieldTwo)
    {
        $this->fieldOne = $fieldTwo;
    }

    public function getFieldThree(): array
    {
        return $this->fieldThree;
    }

    public function setFieldThree(array $fieldThree)
    {
        $this->fieldThree = $fieldThree;
    }
}