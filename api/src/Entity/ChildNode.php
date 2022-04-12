<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\ChildNodeRepository;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\PersistentCollection;
use Syndesi\Neo4jSyncBundle\Attribute as Neo4jSync;
use Syndesi\Neo4jSyncBundle\Contract\IndexType;
use Ramsey\Uuid\Doctrine\UuidGenerator;
use Ramsey\Uuid\UuidInterface;
use Symfony\Component\Serializer\Annotation\Groups;

#[Neo4jSync\Node(
    label: "ChildNode",
    id: "id",
    serializationGroup: "neo4j",
    relations: [
        new Neo4jSync\Relation('CHILD_NODE_PARENT_NODE', 'ParentNode', 'id', 'parentId')
    ],
    indices: [
        new Neo4jSync\Index('child_node_id_index', IndexType::BTREE, ['id'])
    ]
)]
#[ORM\Entity(repositoryClass: ChildNodeRepository::class)]
#[ApiResource]
class ChildNode
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

    #[ORM\ManyToOne(targetEntity: ParentNode::class, inversedBy: 'childNodes')]
    #[ORM\JoinColumn(nullable: false)]
    private $parentNode;

    public function getId(): ?UuidInterface
    {
        return $this->id;
    }

    #[Groups('neo4j')]
    public function getParentId(): UuidInterface
    {
        return $this->parentNode->getId();
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

    public function getParentNode(): ?ParentNode
    {
        return $this->parentNode;
    }

    public function setParentNode(?ParentNode $parentNode): self
    {
        $this->parentNode = $parentNode;

        return $this;
    }
}
