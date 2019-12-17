<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20191125155720 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'postgresql', 'Migration can only be executed safely on \'postgresql\'.');

        $this->addSql('ALTER TABLE pays DROP code');
        $this->addSql('ALTER TABLE pays DROP alpha_deux');
        $this->addSql('ALTER TABLE pays DROP alpha_trois');
        $this->addSql('ALTER TABLE ville DROP CONSTRAINT fk_43c3d9c3c9ca355a');
        $this->addSql('DROP INDEX idx_43c3d9c3c9ca355a');
        $this->addSql('ALTER TABLE ville DROP fuseau_id');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'postgresql', 'Migration can only be executed safely on \'postgresql\'.');

        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE pays ADD code INT NOT NULL');
        $this->addSql('ALTER TABLE pays ADD alpha_deux VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE pays ADD alpha_trois VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE ville ADD fuseau_id INT NOT NULL');
        $this->addSql('ALTER TABLE ville ADD CONSTRAINT fk_43c3d9c3c9ca355a FOREIGN KEY (fuseau_id) REFERENCES fuseau (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE INDEX idx_43c3d9c3c9ca355a ON ville (fuseau_id)');
    }
}
