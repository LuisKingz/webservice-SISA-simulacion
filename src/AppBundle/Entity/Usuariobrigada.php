<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Usuariobrigada
 *
 * @ORM\Table(name="UsuarioBrigada", indexes={@ORM\Index(name="id_brigada", columns={"id_brigada"}), @ORM\Index(name="id_usuario", columns={"id_usuario"})})
 * @ORM\Entity
 */
class Usuariobrigada
{
    /**
     * @var integer
     *
     * @ORM\Column(name="idUsuarioBrigada", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idusuariobrigada;

    /**
     * @var \Brigada
     *
     * @ORM\ManyToOne(targetEntity="Brigada")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_brigada", referencedColumnName="idBrigada")
     * })
     */
    private $idBrigada;

    /**
     * @var \Usuario
     *
     * @ORM\ManyToOne(targetEntity="Usuario")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_usuario", referencedColumnName="idUsuario")
     * })
     */
    private $idUsuario;



    /**
     * Get idusuariobrigada
     *
     * @return integer
     */
    public function getIdusuariobrigada()
    {
        return $this->idusuariobrigada;
    }

    /**
     * Set idBrigada
     *
     * @param \AppBundle\Entity\Brigada $idBrigada
     *
     * @return Usuariobrigada
     */
    public function setIdBrigada(\AppBundle\Entity\Brigada $idBrigada = null)
    {
        $this->idBrigada = $idBrigada;

        return $this;
    }

    /**
     * Get idBrigada
     *
     * @return \AppBundle\Entity\Brigada
     */
    public function getIdBrigada()
    {
        return $this->idBrigada;
    }

    /**
     * Set idUsuario
     *
     * @param \AppBundle\Entity\Usuario $idUsuario
     *
     * @return Usuariobrigada
     */
    public function setIdUsuario(\AppBundle\Entity\Usuario $idUsuario = null)
    {
        $this->idUsuario = $idUsuario;

        return $this;
    }

    /**
     * Get idUsuario
     *
     * @return \AppBundle\Entity\Usuario
     */
    public function getIdUsuario()
    {
        return $this->idUsuario;
    }
}
