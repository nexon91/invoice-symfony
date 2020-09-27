<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Invoice;
use AppBundle\Entity\InvoiceBody;
use AppBundle\Form\ConfirmFormType;
use Doctrine\ORM\EntityManagerInterface;
use InvoiceBodyFormType;
use InvoiceFormType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;



class InvoiceController extends Controller
{

    /**
     * @Route("/", name="invoice")
     * @param Request $request
     * @param EntityManagerInterface $em
     * @return Response|null
     */
    public function invoiceAction(Request $request,EntityManagerInterface $em)
    {

        $invoice = new Invoice();
        $invoiceHeaderForm = $this->createForm(InvoiceFormType::class,$invoice);
        $invoiceHeaderForm->handleRequest($request);
        //var_dump($invoiceHeaderForm);

        if ($invoiceHeaderForm->isSubmitted() && $invoiceHeaderForm->isValid()){

            $em->persist($invoice);
            $em->flush();

            // Send the data to the next page with session
            $this->get('session')->set('invoice',$invoice);

             return $this->redirectToRoute('invoice_body');
 
        }
        
        return $this->render('invoice/invoice.html.twig', [
            'invoiceHeaderForm' => $invoiceHeaderForm->createView(),
        ]);
    }

    /**
     * @Route ("/invoice-body", name="invoice_body")
     * @param Request $request
     * @param EntityManagerInterface $em
     * @return RedirectResponse|Response|null
     */
    public function invoiceBody(Request $request,EntityManagerInterface $em){
        /*
         * Because I need an invoice id generated with the header invoice
         * So I had to do it like this -> get created id and then retrieve it in the invoiceId variable
         */
        $invoiceBody = new InvoiceBody();
        $invoiceBodyForm = $this->createForm(InvoiceBodyFormType::class,$invoiceBody);
        $invoiceBodyForm->handleRequest($request);

        if($invoiceBodyForm->get('back')->isClicked()){

            $invoiceRepository = $em->getRepository(Invoice::class);

            $invoice = $invoiceRepository->findBy([],['id'=>'DESC'],1,0);
            //var_dump($invoice[0]);
            
            $em->remove($invoice[0]);
            $em->flush();
            return $this->redirectToRoute('invoice');
        }

        if($invoiceBodyForm->get('next')->isSubmitted() && $invoiceBodyForm->get('next')->isValid()){

            // get invoice data from the session
            $invoice = $this->get('session')->get('invoice');

            // Set the id from $invoice to the $invoiceBody->invoiceId
            $invoiceBody->setInvoiceId($invoice->getId());

            /*
             * Persist data to the database
             */
            $em->persist($invoiceBody);
            $em->flush();

            return $this->redirectToRoute('invoice_created',[
                'invoice' => $invoice,
                'invoiceBody' => $invoiceBody,
            ]);

        }

        return $this->render('invoice/invoice-body.html.twig', [
            'invoiceBodyForm' => $invoiceBodyForm->createView()
        ]);


    }



    /**
     * @Route("/invoice-created", name="invoice_created")
     * @param EntityManagerInterface $em
     * @return string
     */
    public function invoiceCreated(EntityManagerInterface $em){

        $invoiceRepository = $em->getRepository(Invoice::class);
        $invoiceRepositoryBody = $em->getRepository(InvoiceBody::class);
        $invoice = $invoiceRepository->findBy([],['id'=>'DESC'],1,0);
        $invoiceBody = $invoiceRepositoryBody->findBy([],['id'=>'DESC'],1,0);
        //var_dump($invoice);

        return $this->render('invoice/invoice-created.html.twig',[
            'invoices' => $invoice,
            'invoiceBodies' => $invoiceBody
        ]);
    }
}
