<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Encargadopc
 *
 * @ORM\Table(name="EncargadoPC")
 * @ORM\Entity
 */
class Encargadopc
{
    /**
     * @var integer
     *
     * @ORM\Column(name="idEncargadoPC", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idencargadopc;



    /**
     * Get idencargadopc
     *
     * @return integer
     */
    public function getIdencargadopc()
    {
        return $this->idencargadopc;
    }
}
