<?php


namespace vox\AdminBundle\Service;


use Doctrine\ORM\EntityManager;
use Symfony\Component\Validator\Constraints\DateTime;
use vox\AdminBundle\Entity\FacebookStats;
use vox\AdminBundle\Entity\SoundCloudStats;
use vox\AdminBundle\Entity\YoutubeStats;
use SimpleXMLElement;


class MediaUpdate {

    protected $em;

    public function __construct(EntityManager $em) {

        $this->em = $em;
    }

    public function updateAll() {
        $this->facebook();
        $this->youtube();
        $this->soundcloud();

        return "everything updated";
    }

    public function facebook() {

        $fp = fopen('https://graph.facebook.com/voxpopulirecords?fields=likes', 'r');
        $str = stream_get_contents($fp);
        $likes = json_decode($str)->likes;
        fclose($fp);

        $facebookStats = new FacebookStats();
        $facebookStats->setLikes($likes);
        $facebookStats->setDate(new \DateTime());

        $this->em->persist($facebookStats);
        $this->em->flush();


        return 'facebook stats updated';
    }

    public function youtube() {

        $data = file_get_contents("http://gdata.youtube.com/feeds/api/users/v0xpopulirecords");

        $xml = new SimpleXMLElement($data);
        $stats_data = (array)$xml->children('yt', true)->statistics->attributes();
        $stats_data = $stats_data['@attributes'];

        $youtubeStats = new YoutubeStats();
        $youtubeStats->setSubs($stats_data['subscriberCount']);
        $youtubeStats->setTotalViews($stats_data['totalUploadViews']);
        $youtubeStats->setDate(new \DateTime());

        $this->em->persist($youtubeStats);
        $this->em->flush();


        return "youtube updated";
    }


    public function soundcloud () {

        $sc_content = file_get_contents("http://api.soundcloud.com/users/voxpopuli-records?consumer_key=726de19451503113d25d881bec2d2d67");
        $sc_xml = simplexml_load_string($sc_content);

        $soundcloudStats = new SoundCloudStats();
        $soundcloudStats->setFollowers($sc_xml -> {'followers-count'});
        $soundcloudStats->setDate(new \DateTime());

        $this->em->persist($soundcloudStats);
        $this->em->flush();

        return "soundcloud updated";
    }

}