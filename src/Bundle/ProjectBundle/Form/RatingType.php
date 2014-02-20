<?php

namespace Bundle\ProjectBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class RatingType extends AbstractType {

    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder->add('rating');
        $builder->add('type');
    }

    public function getName() {
        return 'sidebar';
    }

}
