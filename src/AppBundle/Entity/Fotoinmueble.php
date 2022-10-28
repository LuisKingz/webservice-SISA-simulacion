<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Fotoinmueble
 *
 * @ORM\Table(name="FotoInmueble", indexes={@ORM\Index(name="id_inmueble", columns={"id_inmueble"})})
 * @ORM\Entity
 */
class Fotoinmueble
{
    /**
     * @var integer
     *
     * @ORM\Column(name="idFotoInmueble", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idfotoinmueble;

    /**
     * @var string
     *
     * @ORM\Column(name="nombreFotoInmueble", type="string", length=500, nullable=true)
     */
    private $nombrefotoinmueble = 'NULL';

    /**
     * @var string
     *
     * @ORM\Column(name="fotoInmueble", type="blob", nullable=false)
     */
    private $fotoinmueble;

    /**
     * @var \Inmueble
     *
     * @ORM\ManyToOne(targetEntity="Inmueble")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_inmueble", referencedColumnName="idInmueble")
     * })
     */
    private $idInmueble;



    /**
     * Get idfotoinmueble
     *
     * @return integer
     */
    public function getIdfotoinmueble()
    {
        return $this->idfotoinmueble;
    }

    /**
     * Set nombrefotoinmueble
     *
     * @param string $nombrefotoinmueble
     *
     * @return Fotoinmueble
     */
    public function setNombrefotoinmueble($nombrefotoinmueble)
    {
        $this->nombrefotoinmueble = $nombrefotoinmueble;

        return $this;
    }

    /**
     * Get nombrefotoinmueble
     *
     * @return string
     */
    public function getNombrefotoinmueble()
    {
        return $this->nombrefotoinmueble;
    }

    /**
     * Set fotoinmueble
     *
     * @param string $fotoinmueble
     *
     * @return Fotoinmueble
     */
    public function setFotoinmueble($fotoinmueble)
    {
        $this->fotoinmueble = $fotoinmueble;

        return $this;
    }

    /**
     * Get fotoinmueble
     *
     * @return string
     */
    public function getFotoinmueble()
    {
        return $this->fotoinmueble;
    }

    /**
     * Set idInmueble
     *
     * @param \AppBundle\Entity\Inmueble $idInmueble
     *
     * @return Fotoinmueble
     */
    public function setIdInmueble(\AppBundle\Entity\Inmueble $idInmueble = null)
    {
        $this->idInmueble = $idInmueble;

        return $this;
    }

    /**
     * Get idInmueble
     *
     * @return \AppBundle\Entity\Inmueble
     */
    public function getIdInmueble()
    {
        return $this->idInmueble;
    }
}
