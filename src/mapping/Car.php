<?php


use Doctrine\ORM\Mapping as ORM;

/**
 * Car
 *
 * @ORM\Table(name="car", uniqueConstraints={@ORM\UniqueConstraint(name="color_UNIQUE", columns={"color"}),
 * @ORM\UniqueConstraint(name="total_UNIQUE", columns={"total"})}, indexes={@ORM\Index(name="fk_car_data1_idx",
 *  columns={"color"}), @ORM\Index(name="fk_car_data2_idx", columns={"total"}), @ORM\Index(name="fk_car_data3_idx",
 *  columns={"data_id"})}
 * )
 * @ORM\Entity
 */
class Car
{
    /**
     * @var string
     *
     * @ORM\Column(name="make", type="string", length=45, nullable=false)
     */
    private $make;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $id;

    /**
     * @var \Data
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="Data")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="data_id", referencedColumnName="id")
     * })
     */
    private $data;

    /**
     * @var \Data
     *
     * @ORM\ManyToOne(targetEntity="Data")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="total", referencedColumnName="id")
     * })
     */
    private $total;

    /**
     * @var \Data
     *
     * @ORM\ManyToOne(targetEntity="Data")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="color", referencedColumnName="id")
     * })
     */
    private $color;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Person", mappedBy="car")
     */
    private $person;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->person = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Get make
     *
     * @return string
     */
    public function getMake()
    {
        return $this->make;
    }

    /**
     * Set make
     *
     * @param string $make
     * @return Car
     */
    public function setMake($make)
    {
        $this->make = $make;

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
     * Set id
     *
     * @param integer $id
     * @return Car
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get data
     *
     * @return \Data
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * Set data
     *
     * @param \Data $data
     * @return Car
     */
    public function setData(\Data $data)
    {
        $this->data = $data;

        return $this;
    }

    /**
     * Get total
     *
     * @return \Data
     */
    public function getTotal()
    {
        return $this->total;
    }

    /**
     * Set total
     *
     * @param \Data $total
     * @return Car
     */
    public function setTotal(\Data $total = null)
    {
        $this->total = $total;

        return $this;
    }

    /**
     * Get color
     *
     * @return \Data
     */
    public function getColor()
    {
        return $this->color;
    }

    /**
     * Set color
     *
     * @param \Data $color
     * @return Car
     */
    public function setColor(\Data $color = null)
    {
        $this->color = $color;

        return $this;
    }

    /**
     * Add person
     *
     * @param \Person $person
     * @return Car
     */
    public function addPerson(\Person $person)
    {
        $this->person[] = $person;

        return $this;
    }

    /**
     * Remove person
     *
     * @param \Person $person
     */
    public function removePerson(\Person $person)
    {
        $this->person->removeElement($person);
    }

    /**
     * Get person
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getPerson()
    {
        return $this->person;
    }
}
