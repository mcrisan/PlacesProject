<?php

namespace Bundle\ProjectBundle\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;

class InsertCommand extends ContainerAwareCommand
{
    protected function configure()
    {
        $this
            ->setName('insert:ip')
            ->setDescription('Insert ip')
            ->addArgument(
                'ip',
                InputArgument::OPTIONAL,
                'Who do you want to greet?'
            )
            ->addOption(
               'yell',
               null,
               InputOption::VALUE_NONE,
               'If set, the task will yell in uppercase letters'
            )
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $ip = $input->getArgument('ip');
        mysql_connect("localhost","root","root");
        mysql_select_db("myproject");
        $run = mysql_query("INSERT INTO users_ip VALUES('".$ip."')");
        if ($run) {
            $text = 'Ip '.$ip .' inserted in db!';
        } else {
            $text = 'Error: '.  mysql_errno();
        }

        if ($input->getOption('yell')) {
            $text = strtoupper($text);
        }

        $output->writeln($text);
    }
}