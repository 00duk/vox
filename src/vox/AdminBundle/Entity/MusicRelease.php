<?php

namespace vox\AdminBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * MusicReleaseEntity
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="vox\AdminBundle\Entity\MusicReleaseRepository")
 */
class MusicRelease
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
     * @ORM\ManyToOne(targetEntity="vox\AdminBundle\Entity\Artist")
     * @ORM\JoinColumn(nullable=true)
     */

    private $artist = null;




    /**
     * @var string
     *
     * @ORM\Column(name="artist_name", type="string", length=255)
     */

    private $artist_name;

    /**
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=255)
     */
    private $title;

    /**
     * @var string
     *
     * @ORM\Column(name="tracklist", type="text")
     */
    private $tracklist;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text")
     */
    private $description;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_added", type="datetime")
     */
    private $dateAdded;

    /**
     * @var boolean
     *
     * @ORM\Column(name="enabled", type="boolean")
     */
    private $enabled;

    /**
     * @ORM\OneToOne(targetEntity="vox\AdminBundle\Entity\Image", cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=true)
     */
    private $image = null;



    public function __construct() {
        $this->dateAdded = new \DateTime();
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
     * Set artist_name
     *
     * @param string $artist_name
     * @return ReleaseEntity
     */
    public function setArtistName($artist_name)
    {
        $this->artist_name = $artist_name;

        return $this;
    }

    /**
     * Get artist_name
     *
     * @return string
     */


    public function getArtistName()
    {
        return $this->artist_name;
    }


    public function setArtist(Artist $artist = null)
    {
        $this->artist = $artist;

        return $this;
    }


    public function getArtist()
    {
        return $this->artist;
    }

    /**
     * Set title
     *
     * @param string $title
     * @return ReleaseEntity
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string 
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set tracklist
     *
     * @param string $tracklist
     * @return ReleaseEntity
     */
    public function setTracklist($tracklist)
    {
        $this->tracklist = $tracklist;

        return $this;
    }

    /**
     * Get tracklist
     *
     * @return string 
     */
    public function getTracklist()
    {
        return $this->tracklist;
    }

    /**
     * Set description
     *
     * @param string $description
     * @return ReleaseEntity
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string 
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set dateAdded
     *
     * @param \DateTime $dateAdded
     * @return ReleaseEntity
     */
    public function setDateAdded($dateAdded)
    {
        $this->dateAdded = $dateAdded;

        return $this;
    }

    /**
     * Get dateAdded
     *
     * @return \DateTime 
     */
    public function getDateAdded()
    {
        return $this->dateAdded;
    }

    /**
     * Set enabled
     *
     * @param boolean $enabled
     * @return ReleaseEntity
     */
    public function setEnabled($enabled)
    {
        $this->enabled = $enabled;

        return $this;
    }

    /**
     * Get enabled
     *
     * @return boolean 
     */
    public function getEnabled()
    {
        return $this->enabled;
    }



    public function getImage()
    {
        return $this->image;
    }


    public function setImage(Image $image = null)
    {
        $this->image = $image;
    }



}
