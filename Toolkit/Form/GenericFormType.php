<?php

namespace Symfonian\Indonesia\CoreBundle\Toolkit\Form;

/*
 * Author: Muhammad Surya Ihsanuddin<surya.kejawen@gmail.com>
 * Url: https://github.com/ihsanudin
 */

use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class GenericFormType extends AbstractType
{
    /**
     * @var ContainerInterface
     */
    protected $container;

    protected $entity;

    protected $translationDomain;

    public function __construct(ContainerInterface $container, $translationDomain = null)
    {
        $this->container = $container;
        $this->translationDomain = $translationDomain;
    }

    public function setEntity($entity)
    {
        if (is_object($entity)) {
            $entity = get_class($entity);
        }

        $this->entity = $entity;
    }

    public function setTranslationDomain($translationDomain)
    {
        $this->translationDomain = $translationDomain;
    }

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $cssStyle = isset($options['attr']['style'])? $options['attr']['style']: 'form-control';
        $options['attr']['class'] = $cssStyle;
        $fields = $options['fields'];

        unset($options['fields']);
        unset($options['attr']['style']);

        foreach ($fields as $key => $value) {
            if ('id' === $value) {
                continue;
            }

            $builder->add($value, null, $options);
        }

        $builder->add('save', SubmitType::class, array(
            'label' => 'action.submit',
            'attr' => array(
                'class' => 'btn btn-primary',
            ),
        ));
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => $this->entity,
            'translation_domain' => $this->translationDomain,
        ));

        $resolver->setRequired(array('fields'));
    }
}
