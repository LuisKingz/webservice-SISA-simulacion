<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Usuario
 *
 * @ORM\Table(name="Usuario")
 * @ORM\Entity
 */
class Usuario
{
    /**
     * @var integer
     *
     * @ORM\Column(name="idUsuario", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idusuario;

    /**
     * @var string
     *
     * @ORM\Column(name="nombreUsuario", type="string", length=100, nullable=true)
     */
    private $nombreusuario = 'NULL';

    /**
     * @var string
     *
     * @ORM\Column(name="correoUsuario", type="string", length=30, nullable=true)
     */
    private $correousuario = 'NULL';

    /**
     * @var string
     *
     * @ORM\Column(name="telefonoUsuario", type="string", length=10, nullable=true)
     */
    private $telefonousuario = 'NULL';



    /**
     * Get idusuario
     *
     * @return integer
     */
    public function getIdusuario()
    {
        return $this->idusuario;
    }

    /**
     * Set nombreusuario
     *
     * @param string $nombreusuario
     *
     * @return Usuario
     */
    public function setNombreusuario($nombreusuario)
    {
        $this->nombreusuario = $nombreusuario;

        return $this;
    }

    /**
     * Get nombreusuario
     *
     * @return string
     */
    public function getNombreusuario()
    {
        return $this->nombreusuario;
    }

    /**
     * Set correousuario
     *
     * @param string $correousuario
     *
     * @return Usuario
     */
    public function setCorreousuario($correousuario)
    {
        $this->correousuario = $correousuario;

        return $this;
    }

    /**
     * Get correousuario
     *
     * @return string
     */
    public function getCorreousuario()
    {
        return $this->correousuario;
    }

    /**
     * Set telefonousuario
     *
     * @param string $telefonousuario
     *
     * @return Usuario
     */
    public function setTelefonousuario($telefonousuario)
    {
        $this->telefonousuario = $telefonousuario;

        return $this;
    }

    /**
     * Get telefonousuario
     *
     * @return string
     */
    public function getTelefonousuario()
    {
        return $this->telefonousuario;
    }
}
