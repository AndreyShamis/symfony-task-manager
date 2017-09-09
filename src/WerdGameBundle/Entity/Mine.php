<?php

namespace WerdGameBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Mine
 *
 * @ORM\Table(name="mine")
 * @ORM\Entity(repositoryClass="WerdGameBundle\Repository\MineRepository")
 */
class Mine extends MineBase
{


    /**
     * Get type
     *
     * @return integer
     */
    public function getType()
    {
        return $this->type;
    }
}
