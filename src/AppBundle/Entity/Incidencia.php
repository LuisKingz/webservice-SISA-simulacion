<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Incidencia
 *
 * @ORM\Table(name="Incidencia", indexes={@ORM\Index(name="id_siniestro", columns={"id_siniestro"}), @ORM\Index(name="id_espacioFisico", columns={"id_espacioFisico"})})
 * @ORM\Entity
 */
class Incidencia
{
    /**
     * @var integer
     *
     * @ORM\Column(name="idIncidencia", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idincidencia;

    /**
     * @var string
     *
     * @ORM\Column(name="descripcionIncidencia", type="string", length=200, nullable=false)
     */
    private $descripcionincidencia;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fechaIncidencia", type="datetime", nullable=true)
     */
    private $fechaincidencia = 'current_timestamp()';

    /**
     * @var string
     *
     * @ORM\Column(name="estadoIncidencia", type="string", length=20, nullable=true)
     */
    private $estadoincidencia = '\'Pendiente\'';

    /**
     * @var \Siniestro
     *
     * @ORM\ManyToOne(targetEntity="Siniestro")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_siniestro", referencedColumnName="idSiniestro")
     * })
     */
    private $idSiniestro;

    /**
     * @var \Espaciofisico
     *
     * @ORM\ManyToOne(targetEntity="Espaciofisico")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_espacioFisico", referencedColumnName="idEspacioFisico")
     * })
     */
    private $idEspaciofisico;



    /**
     * Get idincidencia
     *
     * @return integer
     */
    public function getIdincidencia()
    {
        return $this->idincidencia;
    }

    /**
     * Set descripcionincidencia
     *
     * @param string $descripcionincidencia
     *
     * @return Incidencia
     */
    public function setDescripcionincidencia($descripcionincidencia)
    {
        $this->descripcionincidencia = $descripcionincidencia;

        return $this;
    }

    /**
     * Get descripcionincidencia
     *
     * @return string
     */
    public function getDescripcionincidencia()
    {
        return $this->descripcionincidencia;
    }

    /**
     * Set fechaincidencia
     *
     * @param \DateTime $fechaincidencia
     *
     * @return Incidencia
     */
    public function setFechaincidencia($fechaincidencia)
    {
        $this->fechaincidencia = $fechaincidencia;

        return $this;
    }

    /**
     * Get fechaincidencia
     *
     * @return \DateTime
     */
    public function getFechaincidencia()
    {
        return $this->fechaincidencia;
    }

    /**
     * Set estadoincidencia
     *
     * @param string $estadoincidencia
     *
     * @return Incidencia
     */
    public function setEstadoincidencia($estadoincidencia)
    {
        $this->estadoincidencia = $estadoincidencia;

        return $this;
    }

    /**
     * Get estadoincidencia
     *
     * @return string
     */
    public function getEstadoincidencia()
    {
        return $this->estadoincidencia;
    }

    /**
     * Set idSiniestro
     *
     * @param \AppBundle\Entity\Siniestro $idSiniestro
     *
     * @return Incidencia
     */
    public function setIdSiniestro(\AppBundle\Entity\Siniestro $idSiniestro = null)
    {
        $this->idSiniestro = $idSiniestro;

        return $this;
    }

    /**
     * Get idSiniestro
     *
     * @return \AppBundle\Entity\Siniestro
     */
    public function getIdSiniestro()
    {
        return $this->idSiniestro;
    }

    /**
     * Set idEspaciofisico
     *
     * @param \AppBundle\Entity\Espaciofisico $idEspaciofisico
     *
     * @return Incidencia
     */
    public function setIdEspaciofisico(\AppBundle\Entity\Espaciofisico $idEspaciofisico = null)
    {
        $this->idEspaciofisico = $idEspaciofisico;

        return $this;
    }

    /**
     * Get idEspaciofisico
     *
     * @return \AppBundle\Entity\Espaciofisico
     */
    public function getIdEspaciofisico()
    {
        return $this->idEspaciofisico;
    }
}
