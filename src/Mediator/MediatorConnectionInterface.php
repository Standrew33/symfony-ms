<?php
/**
 * Created by PhpStorm.
 * User: Andrei
 * Date: 07.02.2021
 * Time: 19:32
 */

namespace App\Mediator;


interface MediatorConnectionInterface
{
    public function connectionService(int $type);
}