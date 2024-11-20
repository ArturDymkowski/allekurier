<?php

namespace App\Core\Invoice\UserInterface\Cli;

use App\Core\User\Domain\Repository\UserRepositoryInterface;
use App\Core\User\Domain\User;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

#[AsCommand(
    name: 'app:user:get-emails-inactive-users',
    description: 'Pobieranie emaili nieaktywnych użytkowników'
)]
class GetEmailsInactiveUsers extends Command
{
    public function __construct(private readonly UserRepositoryInterface $userRepository)
    {
        parent::__construct();
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $users = $this->userRepository->getInactiveUsers();

        /** @var User $user */
        foreach ($users as $user) {
            $output->writeln($user->getEmail());
        }

        return Command::SUCCESS;
    }
}
