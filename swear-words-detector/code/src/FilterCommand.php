<?php

declare(strict_types=1);

namespace App;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;
use Throwable;

final class FilterCommand extends Command
{
    protected static $defaultName = 'app:swear-filter';

    private Processor $processor;

    public function __construct(Processor $processor)
    {
        parent::__construct();

        $this->processor = $processor;
    }

    protected function configure(): void
    {
        $this->addArgument('text', InputArgument::REQUIRED, 'Text');
        $this->setDescription('Text for analyze.');
        $this->setHelp('This command filter input text for a swear words.');
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $symfonyStyle = new SymfonyStyle($input, $output);
        try {
            $symfonyStyle->title($this->processor->filter($input->getArgument('text')));

            return Command::SUCCESS;
        } catch (Throwable $exception) {
            $symfonyStyle->error($exception->getMessage());

            return Command::FAILURE;
        }
    }
}
