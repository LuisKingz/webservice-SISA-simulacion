<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Inmueble
 *
 * @ORM\Table(name="Inmueble", indexes={@ORM\Index(name="responsableInmueble", columns={"responsableInmueble"}), @ORM\Index(name="suplenteInmueble", columns={"suplenteInmueble"})})
 * @ORM\Entity
 */
class Inmueble
{
    /**
     * @var integer
     *
     * @ORM\Column(name="idInmueble", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idinmueble;

    /**
     * @var string
     *
     * @ORM\Column(name="nombreInmueble", type="string", length=45, nullable=false)
     */
    private $nombreinmueble;

    /**
     * @var integer
     *
     * @ORM\Column(name="pisosInmueble", type="integer", nullable=true)
     */
    private $pisosinmueble = 'NULL';

    /**
     * @var string
     *
     * @ORM\Column(name="estadoInmueble", type="string", length=10, nullable=true)
     */
    private $estadoinmueble = '\'Activo\'';

    /**
     * @var \Usuario
     *
     * @ORM\ManyToOne(targetEntity="Usuario")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="responsableInmueble", referencedColumnName="idUsuario")
     * })
     */
    private $responsableinmueble;

    /**
     * @var \Usuario
     *
     * @ORM\ManyToOne(targetEntity="Usuario")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="suplenteInmueble", referencedColumnName="idUsuario")
     * })
     */
    private $suplenteinmueble;



    /**
     * Get idinmueble
     *
     * @return integer
     */
    public function getIdinmueble()
    {
        return $this->idinmueble;
    }

    /**
     * Set nombreinmueble
     *
     * @param string $nombreinmueble
     *
     * @return Inmueble
     */
    public function setNombreinmueble($nombreinmueble)
    {
        $this->nombreinmueble = $nombreinmueble;

        return $this;
    }

    /**
     * Get nombreinmueble
     *
     * @return string
     */
    public function getNombreinmueble()
    {
        return $this->nombreinmueble;
    }

    /**
     * Set pisosinmueble
     *
     * @param integer $pisosinmueble
     *
     * @return Inmueble
     */
    public function setPisosinmueble($pisosinmueble)
    {
        $this->pisosinmueble = $pisosinmueble;

        return $this;
    }

    /**
     * Get pisosinmueble
     *
     * @return integer
     */
    public function getPisosinmueble()
    {
        return $this->pisosinmueble;
    }

    /**
     * Set estadoinmueble
     *
     * @param string $estadoinmueble
     *
     * @return Inmueble
     */
    public function setEstadoinmueble($estadoinmueble)
    {
        $this->estadoinmueble = $estadoinmueble;

        return $this;
    }

    /**
     * Get estadoinmueble
     *
     * @return string
     */
    public function getEstadoinmueble()
    {
        return $this->estadoinmueble;
    }

    /**
     * Set responsableinmueble
     *
     * @param \AppBundle\Entity\Usuario $responsableinmueble
     *
     * @return Inmueble
     */
    public function setResponsableinmueble(\AppBundle\Entity\Usuario $responsableinmueble = null)
    {
        $this->responsableinmueble = $responsableinmueble;

        return $this;
    }

    /**
     * Get responsableinmueble
     *
     * @return \AppBundle\Entity\Usuario
     */
    public function getResponsableinmueble()
    {
        return $this->responsableinmueble;
    }

    /**
     * Set suplenteinmueble
     *
     * @param \AppBundle\Entity\Usuario $suplenteinmueble
     *
     * @return Inmueble
     */
    public function setSuplenteinmueble(\AppBundle\Entity\Usuario $suplenteinmueble = null)
    {
        $this->suplenteinmueble = $suplenteinmueble;

        return $this;
    }

    /**
     * Get suplenteinmueble
     *
     * @return \AppBundle\Entity\Usuario
     */
    public function getSuplenteinmueble()
    {
        return $this->suplenteinmueble;
    }
}
