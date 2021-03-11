<?php

namespace App\Form;

use App\Entity\ReferencedLink;
use App\Entity\Video;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ReferencedLinkType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('url', Type\TextType::class)
            ->add('title', Type\TextType::class)
            ->add('author', Type\TextType::class)
            ->add('author', Type\TextType::class)
            ->add('createdAt', Type\TextType::class)
            ->add('width', Type\TextType::class)
            ->add('height', Type\TextType::class)
        ;

        if ($options['data_class'] == Video::class ){
            $builder
                ->add('duration', Type\TextType::class);
        }
    }

    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'allow_extra_fields' => true,
            'error_bubbling' => false,
            'csrf_protection' => false,
            'type' => null
        ));
    }
}
