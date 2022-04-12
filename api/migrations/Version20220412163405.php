<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220412163405 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE demo_child DROP CONSTRAINT fk_22b98e7727aca70');
        $this->addSql('DROP SEQUENCE greeting_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE book_id_seq CASCADE');
        $this->addSql('CREATE TABLE child_node (id UUID NOT NULL, parent_node_id UUID NOT NULL, name VARCHAR(255) NOT NULL, description VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_304E4BB73445EB91 ON child_node (parent_node_id)');
        $this->addSql('COMMENT ON COLUMN child_node.id IS \'(DC2Type:uuid)\'');
        $this->addSql('COMMENT ON COLUMN child_node.parent_node_id IS \'(DC2Type:uuid)\'');
        $this->addSql('CREATE TABLE parent_node (id UUID NOT NULL, name VARCHAR(255) NOT NULL, description VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('COMMENT ON COLUMN parent_node.id IS \'(DC2Type:uuid)\'');
        $this->addSql('CREATE TABLE simple_node (id UUID NOT NULL, name VARCHAR(255) NOT NULL, description VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('COMMENT ON COLUMN simple_node.id IS \'(DC2Type:uuid)\'');
        $this->addSql('ALTER TABLE child_node ADD CONSTRAINT FK_304E4BB73445EB91 FOREIGN KEY (parent_node_id) REFERENCES parent_node (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('DROP TABLE greeting');
        $this->addSql('DROP TABLE book');
        $this->addSql('DROP TABLE demo');
        $this->addSql('DROP TABLE demo_child');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE child_node DROP CONSTRAINT FK_304E4BB73445EB91');
        $this->addSql('CREATE SEQUENCE greeting_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE book_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE greeting (id INT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE book (id INT NOT NULL, title VARCHAR(255) NOT NULL, year INT NOT NULL, isbn VARCHAR(255) NOT NULL, description TEXT NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE demo (id UUID NOT NULL, "int" INT NOT NULL, "float" DOUBLE PRECISION NOT NULL, bool BOOLEAN NOT NULL, text VARCHAR(255) NOT NULL, datetime TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, PRIMARY KEY(id))');
        $this->addSql('COMMENT ON COLUMN demo.id IS \'(DC2Type:uuid)\'');
        $this->addSql('CREATE TABLE demo_child (id UUID NOT NULL, parent_id UUID DEFAULT NULL, title VARCHAR(255) NOT NULL, description VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX idx_22b98e7727aca70 ON demo_child (parent_id)');
        $this->addSql('COMMENT ON COLUMN demo_child.id IS \'(DC2Type:uuid)\'');
        $this->addSql('COMMENT ON COLUMN demo_child.parent_id IS \'(DC2Type:uuid)\'');
        $this->addSql('ALTER TABLE demo_child ADD CONSTRAINT fk_22b98e7727aca70 FOREIGN KEY (parent_id) REFERENCES demo (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('DROP TABLE child_node');
        $this->addSql('DROP TABLE parent_node');
        $this->addSql('DROP TABLE simple_node');
    }
}
