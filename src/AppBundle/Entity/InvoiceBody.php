<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\JoinColumn;

/**
 * InvoiceBody
 *
 * @ORM\Table(name="invoice_rows")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\InvoiceBodyRepository")
 */
class InvoiceBody
{

    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var int
     *
     * @ORM\Column(name="InvoiceId", type="integer", unique=true, nullable=true)
     * @ORM\OneToOne(targetEntity="AppBundle\Entity\Invoice", inversedBy="id")
     * @JoinColumn(name="InvoiceId", referencedColumnName="id")
     */
    private $invoiceId;

    /**
     * @var string
     *
     * @ORM\Column(name="Description", type="text")
     */
    private $description;

    /**
     * @var int
     *
     * @ORM\Column(name="Quantity", type="integer")
     */
    private $quantity;

    /**
     * @var string
     *
     * @ORM\Column(name="Amount", type="decimal", precision=12, scale=2)
     */
    private $amount;

    /**
     * @var string
     *
     * @ORM\Column(name="VAT", type="decimal", precision=12, scale=2)
     */
    private $VAT;

    /**
     * @var string
     *
     * @ORM\Column(name="TotalWithVAT", type="decimal", precision=12, scale=2)
     */
    private $totalWithVAT;


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
     * Set invoiceId
     *
     * @param integer $invoiceId
     *
     * @return InvoiceBody
     */
    public function setInvoiceId($invoiceId)
    {
        $this->invoiceId = $invoiceId;

        return $this;
    }

    /**
     * Get invoiceId
     *
     * @return int
     */
    public function getInvoiceId()
    {
        return $this->invoiceId;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return InvoiceBody
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set quantity
     *
     * @param integer $quantity
     *
     * @return InvoiceBody
     */
    public function setQuantity($quantity)
    {
        $this->quantity = $quantity;

        return $this;
    }

    /**
     * Get quantity
     *
     * @return int
     */
    public function getQuantity()
    {
        return $this->quantity;
    }

    /**
     * Set amount
     *
     * @param string $amount
     *
     * @return InvoiceBody
     */
    public function setAmount($amount)
    {
        $this->amount = $amount;

        return $this;
    }

    /**
     * Get amount
     *
     * @return string
     */
    public function getAmount()
    {
        return $this->amount;
    }

    /**
     * Set vAT
     *
     * @param string $VAT
     *
     * @return InvoiceBody
     */
    public function setVAT($VAT)
    {
        $this->VAT = $VAT;

        return $this;
    }

    /**
     * Get vAT
     *
     * @return string
     */
    public function getVAT()
    {
        return $this->VAT;
    }

    /**
     * Set totalWithVAT
     *
     * @param string $totalWithVAT
     *
     * @return InvoiceBody
     */
    public function setTotalWithVAT($totalWithVAT)
    {
        $this->totalWithVAT = $totalWithVAT;

        return $this;
    }

    /**
     * Get totalWithVAT
     *
     * @return string
     */
    public function getTotalWithVAT()
    {
        return $this->totalWithVAT;
    }
}
