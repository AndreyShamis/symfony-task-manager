<?php

namespace Werd\IotBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * BoilerViewOnly
 *
 * @ORM\Table(name="boiler_view_only")
 * @ORM\Entity(repositoryClass="Werd\IotBundle\Repository\BoilerViewOnlyRepository")
 */
class BoilerViewOnly
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }
}
