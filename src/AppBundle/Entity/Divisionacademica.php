<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Divisionacademica
 *
 * @ORM\Table(name="DivisionAcademica", indexes={@ORM\Index(name="id_inmueble", columns={"id_inmueble"})})
 * @ORM\Entity
 */
class Divisionacademica
{
    /**
     * @var integer
     *
     * @ORM\Column(name="idDivision", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $iddivision;

    /**
     * @var string
     *
     * @ORM\Column(name="nombreDivision", type="string", length=100, nullable=false)
     */
    private $nombredivision;

    /**
     * @var integer
     *
     * @ORM\Column(name="responsableDivision", type="integer", nullable=false)
     */
    private $responsabledivision;

    /**
     * @var string
     *
     * @ORM\Column(name="estadoDivision", type="string", length=10, nullable=true)
     */
    private $estadodivision = '\'Activo\'';

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
     * Get iddivision
     *
     * @return integer
     */
    public function getIddivision()
    {
        return $this->iddivision;
    }

    /**
     * Set nombredivision
     *
     * @param string $nombredivision
     *
     * @return Divisionacademica
     */
    public function setNombredivision($nombredivision)
    {
        $this->nombredivision = $nombredivision;

        return $this;
    }

    /**
     * Get nombredivision
     *
     * @return string
     */
    public function getNombredivision()
    {
        return $this->nombredivision;
    }

    /**
     * Set responsabledivision
     *
     * @param integer $responsabledivision
     *
     * @return Divisionacademica
     */
    public function setResponsabledivision($responsabledivision)
    {
        $this->responsabledivision = $responsabledivision;

        return $this;
    }

    /**
     * Get responsabledivision
     *
     * @return integer
     */
    public function getResponsabledivision()
    {
        return $this->responsabledivision;
    }

    /**
     * Set estadodivision
     *
     * @param string $estadodivision
     *
     * @return Divisionacademica
     */
    public function setEstadodivision($estadodivision)
    {
        $this->estadodivision = $estadodivision;

        return $this;
    }

    /**
     * Get estadodivision
     *
     * @return string
     */
    public function getEstadodivision()
    {
        return $this->estadodivision;
    }

    /**
     * Set idInmueble
     *
     * @param \AppBundle\Entity\Inmueble $idInmueble
     *
     * @return Divisionacademica
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
