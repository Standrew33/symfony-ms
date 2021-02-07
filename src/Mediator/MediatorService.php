<?php
/**
 * Created by PhpStorm.
 * User: Andrei
 * Date: 07.02.2021
 * Time: 19:41
 */

namespace App\Mediator;


class MediatorService
{
    protected $mediator;

    public function __construct(MediatorConnectionInterface $mediator = null)
    {
        $this->mediator = $mediator;
    }

    public function setMediator(MediatorConnectionInterface $mediator): void
    {
        $this->mediator = $mediator;
    }
}