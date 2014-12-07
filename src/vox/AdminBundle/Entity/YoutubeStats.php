<?php

namespace vox\AdminBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * YoutubeStats
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class YoutubeStats
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
     * @ORM\Column(name="subs", type="integer")
     */
    private $subs;

    /**
     * @var integer
     *
     * @ORM\Column(name="total_views", type="integer")
     */
    private $totalViews;

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
     * Set subs
     *
     * @param integer $subs
     * @return YoutubeStats
     */
    public function setSubs($subs)
    {
        $this->subs = $subs;

        return $this;
    }

    /**
     * Get subs
     *
     * @return integer 
     */
    public function getSubs()
    {
        return $this->subs;
    }

    /**
     * Set totalViews
     *
     * @param integer $totalViews
     * @return YoutubeStats
     */
    public function setTotalViews($totalViews)
    {
        $this->totalViews = $totalViews;

        return $this;
    }

    /**
     * Get totalViews
     *
     * @return integer 
     */
    public function getTotalViews()
    {
        return $this->totalViews;
    }

    /**
     * Set date
     *
     * @param \DateTime $date
     * @return YoutubeStats
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
