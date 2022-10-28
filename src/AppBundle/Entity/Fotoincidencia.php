<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Fotoincidencia
 *
 * @ORM\Table(name="FotoIncidencia", indexes={@ORM\Index(name="id_incidencia", columns={"id_incidencia"})})
 * @ORM\Entity
 */
class Fotoincidencia
{
    /**
     * @var integer
     *
     * @ORM\Column(name="idFotoIncidencia", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idfotoincidencia;

    /**
     * @var string
     *
     * @ORM\Column(name="nombreFotoIncidencia", type="text", length=16777215, nullable=true)
     */
    private $nombrefotoincidencia = 'NULL';

    /**
     * @var string
     *
     * @ORM\Column(name="fotoIncidencia", type="blob", nullable=false)
     */
    private $fotoincidencia;

    /**
     * @var \Incidencia
     *
     * @ORM\ManyToOne(targetEntity="Incidencia")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_incidencia", referencedColumnName="idIncidencia")
     * })
     */
    private $idIncidencia;



    /**
     * Get idfotoincidencia
     *
     * @return integer
     */
    public function getIdfotoincidencia()
    {
        return $this->idfotoincidencia;
    }

    /**
     * Set nombrefotoincidencia
     *
     * @param string $nombrefotoincidencia
     *
     * @return Fotoincidencia
     */
    public function setNombrefotoincidencia($nombrefotoincidencia)
    {
        $this->nombrefotoincidencia = $nombrefotoincidencia;

        return $this;
    }

    /**
     * Get nombrefotoincidencia
     *
     * @return string
     */
    public function getNombrefotoincidencia()
    {
        return $this->nombrefotoincidencia;
    }

    /**
     * Set fotoincidencia
     *
     * @param string $fotoincidencia
     *
     * @return Fotoincidencia
     */
    public function setFotoincidencia($fotoincidencia)
    {
        $this->fotoincidencia = $fotoincidencia;

        return $this;
    }

    /**
     * Get fotoincidencia
     *
     * @return string
     */
    public function getFotoincidencia()
    {
        return $this->fotoincidencia;
    }

    /**
     * Set idIncidencia
     *
     * @param \AppBundle\Entity\Incidencia $idIncidencia
     *
     * @return Fotoincidencia
     */
    public function setIdIncidencia(\AppBundle\Entity\Incidencia $idIncidencia = null)
    {
        $this->idIncidencia = $idIncidencia;

        return $this;
    }

    /**
     * Get idIncidencia
     *
     * @return \AppBundle\Entity\Incidencia
     */
    public function getIdIncidencia()
    {
        return $this->idIncidencia;
    }
}
