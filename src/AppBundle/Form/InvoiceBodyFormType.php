<?php

use AppBundle\Entity\InvoiceBody;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\OptionsResolver\OptionsResolver;

class InvoiceBodyFormType extends AbstractType {

    /**
     * @var array
     */
    private $options;

    public function __construct(array $options=[])
    {
        $resolver = new OptionsResolver();
        $this->configureOptions($resolver);

        $this->options = $resolver->resolve($options);
        
    }

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('description', TextareaType::class)
            ->add('quantity', IntegerType::class)
            ->add('amount', NumberType::class)
            ->add('VAT',NumberType::class,[
                'label' => 'VAT',
            ])
            ->add('totalWithVAT',NumberType::class,[
                'label' => 'Total with VAT',
            ])
            ->add('next', SubmitType::class)
            ->add('back',SubmitType::class,[
                'attr' => ['formnovalidate' => 'formnovalidate']
            ]);


    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => InvoiceBody::class,
        ]);
    }


}