<?php
/**
 * Created by PhpStorm.
 * User: Andrei
 * Date: 06.02.2021
 * Time: 1:03
 */

namespace App\Service;


class HttpService implements InterfaceService
{
    private bool $fieldOne;

    private int $fieldTwo;

    private array $fieldThree;

    public function getFieldOne(): bool
    {
        return $this->fieldOne;
    }

    public function setFieldOne(bool $fieldOne)
    {
        $this->fieldOne = $fieldOne;
    }

    public function getFieldTwo(): int
    {
        return $this->fieldTwo;
    }

    public function setFieldTwo(int $fieldTwo)
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