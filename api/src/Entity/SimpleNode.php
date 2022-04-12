<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\SimpleNodeRepository;
use Doctrine\ORM\Mapping as ORM;
use Syndesi\Neo4jSyncBundle\Attribute as Neo4jSync;
use Syndesi\Neo4jSyncBundle\Contract\IndexType;
use Ramsey\Uuid\Doctrine\UuidGenerator;
use Ramsey\Uuid\UuidInterface;
use Symfony\Component\Serializer\Annotation\Groups;

#[Neo4jSync\Node(
    label: "SimpleNode",
    id: "id",
    serializationGroup: "neo4j",
    indices: [
        new Neo4jSync\Index('simple_node_id_index', IndexType::BTREE, ['id'])
    ]
)]
#[ORM\Entity(repositoryClass: SimpleNodeRepository::class)]
#[ApiResource]
class SimpleNode
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: "CUSTOM")]
    #[ORM\Column(type: 'uuid', unique: true)]
    #[ORM\CustomIdGenerator(class:UuidGenerator::class)]
    #[Groups('neo4j')]
    private ?UuidInterface $id;

    #[ORM\Column(type: 'string', length: 255)]
    #[Groups('neo4j')]
    private ?string $name;

    #[ORM\Column(type: 'string', length: 255)]
    #[Groups('neo4j')]
    private ?string $description;

    public function getId(): ?UuidInterface
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }
}
