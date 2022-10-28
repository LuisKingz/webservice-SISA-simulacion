<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Brigada
 *
 * @ORM\Table(name="Brigada", indexes={@ORM\Index(name="id_inmueble", columns={"id_inmueble"})})
 * @ORM\Entity
 */
class Brigada
{
    /**
     * @var integer
     *
     * @ORM\Column(name="idBrigada", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idbrigada;

    /**
     * @var string
     *
     * @ORM\Column(name="tipoBrigada", type="string", length=40, nullable=false)
     */
    private $tipobrigada;

    /**
     * @var string
     *
     * @ORM\Column(name="estadoBrigada", type="string", length=10, nullable=true)
     */
    private $estadobrigada = '\'Activo\'';

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
     * Get idbrigada
     *
     * @return integer
     */
    public function getIdbrigada()
    {
        return $this->idbrigada;
    }

    /**
     * Set tipobrigada
     *
     * @param string $tipobrigada
     *
     * @return Brigada
     */
    public function setTipobrigada($tipobrigada)
    {
        $this->tipobrigada = $tipobrigada;

        return $this;
    }

    /**
     * Get tipobrigada
     *
     * @return string
     */
    public function getTipobrigada()
    {
        return $this->tipobrigada;
    }

    /**
     * Set estadobrigada
     *
     * @param string $estadobrigada
     *
     * @return Brigada
     */
    public function setEstadobrigada($estadobrigada)
    {
        $this->estadobrigada = $estadobrigada;

        return $this;
    }

    /**
     * Get estadobrigada
     *
     * @return string
     */
    public function getEstadobrigada()
    {
        return $this->estadobrigada;
    }

    /**
     * Set idInmueble
     *
     * @param \AppBundle\Entity\Inmueble $idInmueble
     *
     * @return Brigada
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
