<?php


use Doctrine\ORM\Mapping as ORM;

/**
 * Other
 *
 * @ORM\Table(name="other", indexes={@ORM\Index(name="fk_other_car1_idx", columns={"car_id"})})
 * @ORM\Entity
 */
class Other
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var \Car
     *
     * @ORM\ManyToOne(targetEntity="Car")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="car_id", referencedColumnName="id")
     * })
     */
    private $car;


    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Get car
     *
     * @return \Car
     */
    public function getCar()
    {
        return $this->car;
    }

    /**
     * Set car
     *
     * @param \Car $car
     * @return Other
     */
    public function setCar(\Car $car = null)
    {
        $this->car = $car;

        return $this;
    }
}
