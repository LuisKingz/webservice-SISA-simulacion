<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Siniestro
 *
 * @ORM\Table(name="Siniestro")
 * @ORM\Entity
 */
class Siniestro
{
    /**
     * @var integer
     *
     * @ORM\Column(name="idSiniestro", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idsiniestro;

    /**
     * @var string
     *
     * @ORM\Column(name="tipoSiniestro", type="string", length=45, nullable=false)
     */
    private $tiposiniestro;

    /**
     * @var string
     *
     * @ORM\Column(name="descripcionSiniestro", type="string", length=150, nullable=false)
     */
    private $descripcionsiniestro;

    /**
     * @var string
     *
     * @ORM\Column(name="estadoSiniestro", type="string", length=10, nullable=true)
     */
    private $estadosiniestro = '\'Activo\'';

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fechaSiniestro", type="datetime", nullable=true)
     */
    private $fechasiniestro = 'current_timestamp()';



    /**
     * Get idsiniestro
     *
     * @return integer
     */
    public function getIdsiniestro()
    {
        return $this->idsiniestro;
    }

    /**
     * Set tiposiniestro
     *
     * @param string $tiposiniestro
     *
     * @return Siniestro
     */
    public function setTiposiniestro($tiposiniestro)
    {
        $this->tiposiniestro = $tiposiniestro;

        return $this;
    }

    /**
     * Get tiposiniestro
     *
     * @return string
     */
    public function getTiposiniestro()
    {
        return $this->tiposiniestro;
    }

    /**
     * Set descripcionsiniestro
     *
     * @param string $descripcionsiniestro
     *
     * @return Siniestro
     */
    public function setDescripcionsiniestro($descripcionsiniestro)
    {
        $this->descripcionsiniestro = $descripcionsiniestro;

        return $this;
    }

    /**
     * Get descripcionsiniestro
     *
     * @return string
     */
    public function getDescripcionsiniestro()
    {
        return $this->descripcionsiniestro;
    }

    /**
     * Set estadosiniestro
     *
     * @param string $estadosiniestro
     *
     * @return Siniestro
     */
    public function setEstadosiniestro($estadosiniestro)
    {
        $this->estadosiniestro = $estadosiniestro;

        return $this;
    }

    /**
     * Get estadosiniestro
     *
     * @return string
     */
    public function getEstadosiniestro()
    {
        return $this->estadosiniestro;
    }

    /**
     * Set fechasiniestro
     *
     * @param \DateTime $fechasiniestro
     *
     * @return Siniestro
     */
    public function setFechasiniestro($fechasiniestro)
    {
        $this->fechasiniestro = $fechasiniestro;

        return $this;
    }

    /**
     * Get fechasiniestro
     *
     * @return \DateTime
     */
    public function getFechasiniestro()
    {
        return $this->fechasiniestro;
    }
}
