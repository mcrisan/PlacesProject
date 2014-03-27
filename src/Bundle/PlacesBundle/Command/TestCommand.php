<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
namespace Bundle\PlacesBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
 
class TestCommand extends ContainerAwareCommand
{
    protected function configure()
    {
 
        $this
            ->setName('littleweb:newsletter')
            ->setDescription('Sends our daily newsletter to our registered users')
            ;
    }
 
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $output->writeln('Starting Newsletter process');
    }
}
