<?php
namespace vox\AdminBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

class MediaUpdateCommand extends ContainerAwareCommand
{
    protected function configure()
    {
        $this
            ->setName('media:update')
            ->setDescription('Update satats for social media')
            ->addArgument('media', InputArgument::OPTIONAL, 'which media to update?')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $media_update = $this->getContainer()->get('media_update');

        $media = $input->getArgument('media');
        if ($media == 'facebook') {
            $text = $media_update->facebook();
        }
        elseif ($media == 'youtube') {
            $text = $media_update->youtube();
        }
        elseif ($media == 'soundcloud') {
            $text = $media_update->soundcloud();
        }
        elseif ($media == 'all') {
            $text = $media_update->updateAll();
        }

        $output->writeln($text);
    }
}