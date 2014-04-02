<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
namespace Bundle\PlacesBundle\Command;

use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;

/**
 * Description of InsertCategories
 *
 * @author mcrisan
 */
class InsertCategoriesCommand extends ContainerAwareCommand{
    
    
    protected function configure()
    {
 
        $this
            ->setName('places:cat')
            ->setDescription('Sends our daily newsletter to our registered users')
            ;
    }
    
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $placeop = $this->getContainer()->get('placeOperation');
        $output->writeln($placeop->insertCategories());
    }
}
