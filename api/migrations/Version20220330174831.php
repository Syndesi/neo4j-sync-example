<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220330174831 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE demo_child (id UUID NOT NULL, parent_id UUID DEFAULT NULL, title VARCHAR(255) NOT NULL, description VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_22B98E7727ACA70 ON demo_child (parent_id)');
        $this->addSql('COMMENT ON COLUMN demo_child.id IS \'(DC2Type:uuid)\'');
        $this->addSql('COMMENT ON COLUMN demo_child.parent_id IS \'(DC2Type:uuid)\'');
        $this->addSql('ALTER TABLE demo_child ADD CONSTRAINT FK_22B98E7727ACA70 FOREIGN KEY (parent_id) REFERENCES demo (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('DROP TABLE demo_child');
    }
}
