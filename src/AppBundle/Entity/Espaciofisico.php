<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Espaciofisico
 *
 * @ORM\Table(name="EspacioFisico", indexes={@ORM\Index(name="id_inmueble", columns={"id_inmueble"})})
 * @ORM\Entity
 */
class Espaciofisico
{
    /**
     * @var integer
     *
     * @ORM\Column(name="idEspacioFisico", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idespaciofisico;

    /**
     * @var string
     *
     * @ORM\Column(name="nombreEspacioFisico", type="string", length=60, nullable=false)
     */
    private $nombreespaciofisico;

    /**
     * @var string
     *
     * @ORM\Column(name="estadoEspacioFisico", type="string", length=10, nullable=true)
     */
    private $estadoespaciofisico = '\'Activo\'';

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
     * Get idespaciofisico
     *
     * @return integer
     */
    public function getIdespaciofisico()
    {
        return $this->idespaciofisico;
    }

    /**
     * Set nombreespaciofisico
     *
     * @param string $nombreespaciofisico
     *
     * @return Espaciofisico
     */
    public function setNombreespaciofisico($nombreespaciofisico)
    {
        $this->nombreespaciofisico = $nombreespaciofisico;

        return $this;
    }

    /**
     * Get nombreespaciofisico
     *
     * @return string
     */
    public function getNombreespaciofisico()
    {
        return $this->nombreespaciofisico;
    }

    /**
     * Set estadoespaciofisico
     *
     * @param string $estadoespaciofisico
     *
     * @return Espaciofisico
     */
    public function setEstadoespaciofisico($estadoespaciofisico)
    {
        $this->estadoespaciofisico = $estadoespaciofisico;

        return $this;
    }

    /**
     * Get estadoespaciofisico
     *
     * @return string
     */
    public function getEstadoespaciofisico()
    {
        return $this->estadoespaciofisico;
    }

    /**
     * Set idInmueble
     *
     * @param \AppBundle\Entity\Inmueble $idInmueble
     *
     * @return Espaciofisico
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
