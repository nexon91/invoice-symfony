<?php

use AppBundle\Entity\Invoice;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class InvoiceFormType extends AbstractType {

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
            ->add('invoiceDate', DateType::class,[
                'widget' => 'single_text',
            ])
            ->add('invoiceNumber', IntegerType::class)
            ->add('clientId', IntegerType::class)
            ->add('next', SubmitType::class);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Invoice::class,
        ]);
    }


}