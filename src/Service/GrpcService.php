<?php
/**
 * Created by PhpStorm.
 * User: Andrei
 * Date: 06.02.2021
 * Time: 1:03
 */

namespace App\Service;


class GrpcService implements InterfaceService
{
    private string $fieldOne;

    private bool $fieldTwo;

    private int $fieldThree;

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

    public function getFieldThree(): int
    {
        return $this->fieldThree;
    }

    public function setFieldThree(int $fieldThree)
    {
        $this->fieldThree = $fieldThree;
    }
}