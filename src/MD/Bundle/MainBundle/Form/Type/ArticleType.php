<?php

namespace MD\Bundle\MainBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

/**
 * ArticleType
 */
class ArticleType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add(
                'title',
                'text',
                [
                    'label' => 'article.label.title'
                ]
            )
            ->add(
                'content',
                'textarea',
                [
                    'label' => 'article.label.content'
                ]
            )
            ->add(
                'submit',
                'submit',
                [
                    'label' => 'article.label.submit'
                ]
            );
    }

    /**
     * {@inheritdoc}
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults([
            'data_class'         => 'MD\Entity\Article',
            'translation_domain' => 'forms'
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function getName()
    {
        return 'article';
    }
}
