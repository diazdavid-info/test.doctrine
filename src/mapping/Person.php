<?php


use Doctrine\ORM\Mapping as ORM;

/**
 * Person
 *
 * @ORM\Table(name="person")
 * @ORM\Entity
 */
class Person
{
    /**
     * @var integer
     *
     * @ORM\Column(name="car-a", type="integer", nullable=true)
     */
    private $carA;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Car", inversedBy="person")
     * @ORM\JoinTable(name="person_has_car",
     *   joinColumns={
     *     @ORM\JoinColumn(name="person_id", referencedColumnName="id")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="car_id", referencedColumnName="id")
     *   }
     * )
     */
    private $car;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->car = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Get carA
     *
     * @return integer
     */
    public function getCarA()
    {
        return $this->carA;
    }

    /**
     * Set carA
     *
     * @param integer $carA
     * @return Person
     */
    public function setCarA($carA)
    {
        $this->carA = $carA;

        return $this;
    }

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
     * Add car
     *
     * @param \Car $car
     * @return Person
     */
    public function addCar(\Car $car)
    {
        $this->car[] = $car;

        return $this;
    }

    /**
     * Remove car
     *
     * @param \Car $car
     */
    public function removeCar(\Car $car)
    {
        $this->car->removeElement($car);
    }

    /**
     * Get car
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getCar()
    {
        return $this->car;
    }
}
