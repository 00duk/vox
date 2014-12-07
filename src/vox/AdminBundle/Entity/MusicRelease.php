<?php

namespace vox\AdminBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ReleaseEntity
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
     * @var string
     *
     * @ORM\Column(name="artist", type="string", length=255)
     */
    private $artist;

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
     * @ORM\JoinColumn(nullable=false)
     */
    private $image;

    /**
     * @var string
     *
     * @ORM\Column(name="image_1", type="string", length=255)
     */
    private $image1 = "";

    /**
     * @var string
     *
     * @ORM\Column(name="image_2", type="string", length=255)
     */
    private $image2 = "";

    /**
     * @var string
     *
     * @ORM\Column(name="image_3", type="string", length=255)
     */
    private $image3 = "";


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
     * Set artist
     *
     * @param string $artist
     * @return ReleaseEntity
     */
    public function setArtist($artist)
    {
        $this->artist = $artist;

        return $this;
    }

    /**
     * Get artist
     *
     * @return string 
     */
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

    /**
     * Set image1
     *
     * @param string $image1
     * @return ReleaseEntity
     */
    public function setImage1($image1)
    {
        $this->image1 = $image1;

        return $this;
    }

    /**
     * Get image1
     *
     * @return string
     */
    public function getImage1()
    {
        return $this->image1;
    }


    public function getImage()
    {
        return $this->image;
    }


    public function setImage(Image $image = null)
    {
        $this->image = $image;
    }



    /**
     * Set image2
     *
     * @param string $image2
     * @return ReleaseEntity
     */
    public function setImage2($image2)
    {
        $this->image2 = $image2;

        return $this;
    }

    /**
     * Get image2
     *
     * @return string 
     */
    public function getImage2()
    {
        return $this->image2;
    }

    /**
     * Set image3
     *
     * @param string $image3
     * @return ReleaseEntity
     */
    public function setImage3($image3)
    {
        $this->image3 = $image3;

        return $this;
    }

    /**
     * Get image3
     *
     * @return string 
     */
    public function getImage3()
    {
        return $this->image3;
    }


}
