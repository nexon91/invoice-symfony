<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Invoice
 *
 * @ORM\Table(name="invoice")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\InvoiceRepository")
 */
class Invoice
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     *
     * @ORM\OneToOne(targetEntity="AppBundle\Entity\InvoiceBody")
     */
    private $id;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="invoiceDate", type="date")
     */
    private $invoiceDate;

    /**
     * @var int
     *
     * @ORM\Column(name="invoiceNumber", type="integer")
     */
    private $invoiceNumber;

    /**
     * @var int
     *
     * @ORM\Column(name="clientId", type="integer")
     */
    private $clientId;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set invoiceDate
     *
     * @param \DateTime $invoiceDate
     *
     * @return Invoice
     */
    public function setInvoiceDate($invoiceDate)
    {
        $this->invoiceDate = $invoiceDate;

        return $this;
    }

    /**
     * Get invoiceDate
     *
     * @return \DateTime
     */
    public function getInvoiceDate()
    {
        return $this->invoiceDate;
    }

    /**
     * Set invoiceNumber
     *
     * @param integer $invoiceNumber
     *
     * @return Invoice
     */
    public function setInvoiceNumber($invoiceNumber)
    {
        $this->invoiceNumber = $invoiceNumber;

        return $this;
    }

    /**
     * Get invoiceNumber
     *
     * @return int
     */
    public function getInvoiceNumber()
    {
        return $this->invoiceNumber;
    }

    /**
     * Set clientId
     *
     * @param integer $clientId
     *
     * @return Invoice
     */
    public function setClientId($clientId)
    {
        $this->clientId = $clientId;

        return $this;
    }

    /**
     * Get clientId
     *
     * @return int
     */
    public function getClientId()
    {
        return $this->clientId;
    }

}
