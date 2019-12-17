<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20191127174630 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'postgresql', 'Migration can only be executed safely on \'postgresql\'.');

        $this->addSql('CREATE TABLE fuseauhoraire (id INT NOT NULL, pays_id INT NOT NULL, fuseau VARCHAR(255) NOT NULL, utc VARCHAR(255) NOT NULL, ville_en VARCHAR(255) DEFAULT NULL, ville_fr VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_C489A6F8A6E44244 ON fuseauhoraire (pays_id)');
        $this->addSql('CREATE TABLE ville (id INT NOT NULL, fuseaux_id INT NOT NULL, ville_fr VARCHAR(255) DEFAULT NULL, ville_en VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_43C3D9C3BB0748FB ON ville (fuseaux_id)');
        $this->addSql('ALTER TABLE fuseauhoraire ADD CONSTRAINT FK_C489A6F8A6E44244 FOREIGN KEY (pays_id) REFERENCES pays (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE ville ADD CONSTRAINT FK_43C3D9C3BB0748FB FOREIGN KEY (fuseaux_id) REFERENCES fuseauhoraire (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'postgresql', 'Migration can only be executed safely on \'postgresql\'.');

        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE ville DROP CONSTRAINT FK_43C3D9C3BB0748FB');
        $this->addSql('DROP TABLE fuseauhoraire');
        $this->addSql('DROP TABLE ville');
    }
}
