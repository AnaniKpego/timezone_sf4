<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20191125175725 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'postgresql', 'Migration can only be executed safely on \'postgresql\'.');

        $this->addSql('ALTER TABLE ville ADD fuseauxhoraires_id INT NOT NULL');
        $this->addSql('ALTER TABLE ville ADD ville_en VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE ville RENAME COLUMN nom_region TO ville_fr');
        $this->addSql('ALTER TABLE ville ADD CONSTRAINT FK_43C3D9C3EC9D1E41 FOREIGN KEY (fuseauxhoraires_id) REFERENCES fuseauhoraire (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE INDEX IDX_43C3D9C3EC9D1E41 ON ville (fuseauxhoraires_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'postgresql', 'Migration can only be executed safely on \'postgresql\'.');

        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE ville DROP CONSTRAINT FK_43C3D9C3EC9D1E41');
        $this->addSql('DROP INDEX IDX_43C3D9C3EC9D1E41');
        $this->addSql('ALTER TABLE ville DROP fuseauxhoraires_id');
        $this->addSql('ALTER TABLE ville DROP ville_en');
        $this->addSql('ALTER TABLE ville RENAME COLUMN ville_fr TO nom_region');
    }
}
