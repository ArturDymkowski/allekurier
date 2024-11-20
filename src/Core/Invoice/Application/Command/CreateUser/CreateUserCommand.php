<?php

namespace App\Core\Invoice\Application\Command\CreateUser;

class CreateUserCommand
{
    public function __construct(
        public readonly string $email,
    ) {}
}
