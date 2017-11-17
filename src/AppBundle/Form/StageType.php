<?php

namespace AppBundle\Form;

use AppBundle\Entity\Company;
use AppBundle\Entity\Stage;
use AppBundle\Repository\CompanyRepository;
use Doctrine\ORM\EntityRepository;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class StageType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {

        $builder->add('company', EntityType::class, [
            'class' => 'AppBundle:Company',
            'query_builder' => function (EntityRepository $er) {
                return $er->createQueryBuilder('c')
                    ->orderBy('c.name', 'ASC');
            },
            'choice_label' => 'name',
            'label' => 'Entreprise',
            'required' => true,
        ]);

        $builder->add('pedagogicalReferent', EntityType::class, [
            'class' => 'AppBundle:PedagogicalReferent',
            'query_builder' => function (EntityRepository $er) {
                return $er->createQueryBuilder('pr')
                    ->orderBy('pr.firstName', 'ASC');
            },
            'choice_label' => 'name',
            'label' => 'Réferent pédagogique',
            'required' => true,
        ]);

        $builder->add('professionalReferent', EntityType::class, [
            'class' => 'AppBundle:ProfessionalReferent',
            'query_builder' => function (EntityRepository $er) {
                return $er->createQueryBuilder('pr')
                    ->orderBy('pr.firstName', 'ASC');
            },
            'choice_label' => 'name',
            'label' => 'Réferent technique',
            'required' => true,
        ]);

        $builder->add('visite', EntityType::class, [
            'class' => 'AppBundle:Visite',
            'query_builder' => function (EntityRepository $er) {
                return $er->createQueryBuilder('pr')
                    ->orderBy('pr.visiteDate', 'ASC');
            },
            'choice_label' => 'visiteDate',
            'label' => 'Visite',
            'required' => true,
        ]);

        $builder->add('technologies', EntityType::class, [
            'class' => 'AppBundle:Technologie',
            'query_builder' => function (EntityRepository $er) {
                return $er->createQueryBuilder('t')
                    ->orderBy('t.technologieLabel', 'ASC');
            },
            'choice_label' => 'technologieLabel',
            'label' => 'Technologies',
            'required' => true,
        ]);

        $builder->add('promo', EntityType::class, [
            'class' => 'AppBundle:Promo',
            'query_builder' => function (EntityRepository $er) {
                return $er->createQueryBuilder('p')
                    ->orderBy('p.promoLabel', 'ASC');
            },
            'choice_label' => 'promoLabel',
            'label' => 'Promo',
            'required' => true,
        ]);

        $builder->add('startDate', DateType::class, [
            'required' => true,
            'label' =>  'Date début',
        ]);

        $builder->add('endDate', DateType::class, [
            'required' => true,
            'label' => 'Date fin',
        ]);

        $builder->add('Valider', SubmitType::class);
    }

    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Stage'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_stage';
    }


}
