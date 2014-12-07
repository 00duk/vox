<?php

namespace vox\AdminBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * SoundCloudStats
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class SoundCloudStats
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var integer
     *
     * @ORM\Column(name="followers", type="integer")
     */
    private $followers;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="datetime")
     */
    private $date;


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
     * Set followers
     *
     * @param integer $followers
     * @return SoundCloudStats
     */
    public function setFollowers($followers)
    {
        $this->followers = $followers;

        return $this;
    }

    /**
     * Get followers
     *
     * @return integer 
     */
    public function getFollowers()
    {
        return $this->followers;
    }

    /**
     * Set date
     *
     * @param \DateTime $date
     * @return SoundCloudStats
     */
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Get date
     *
     * @return \DateTime 
     */
    public function getDate()
    {
        return $this->date;
    }
}
