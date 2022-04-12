<?php
namespace App\Command;

use App\Entity\Book;
use App\Entity\ChildNode;
use App\Entity\Demo;
use App\Entity\DemoChild;
use App\Entity\ParentNode;
use App\Entity\SimpleNode;
use DateTime;
use Doctrine\ORM\EntityManagerInterface;
use Faker\Factory;
use Laudis\Neo4j\Contracts\ClientInterface;
use Laudis\Neo4j\Databags\Statement;
use Psr\Log\LoggerInterface;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Syndesi\Neo4jSyncBundle\Service\Neo4jClient;

class PopulateCommand extends Command
{
    protected static $defaultName = 'app:populate';

    private EntityManagerInterface $em;

    public function __construct(
        EntityManagerInterface $em
    )
    {
        $this->em = $em;
        parent::__construct();
    }

    protected function configure(): void
    {
        $this
            ->setHelp('Populate data')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $faker = Factory::create();

        for ($i = 0; $i < 10; $i++) {
            $simpleNode = (new SimpleNode())
                ->setName($faker->colorName())
                ->setDescription($faker->text())
            ;
            $this->em->persist($simpleNode);
        }
        $this->em->flush();

        for ($i = 0; $i < 10; $i++) {
            $parentNode = (new ParentNode())
                ->setName($faker->name())
                ->setDescription($faker->text())
            ;
            $this->em->persist($parentNode);
            $this->em->flush();

            for ($j = 0; $j < random_int(2, 7); $j++) {
                $childNode = (new ChildNode())
                    ->setName($faker->name())
                    ->setDescription($faker->text())
                    ->setParentNode($parentNode)
                ;
                $this->em->persist($childNode);
            }
        }

        $this->em->flush();

        return Command::SUCCESS;
    }
}
