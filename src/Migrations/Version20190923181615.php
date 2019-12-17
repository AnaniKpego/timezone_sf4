<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190923181615 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'postgresql', 'Migration can only be executed safely on \'postgresql\'.');

        $this->addSql('DROP SEQUENCE timezones_id_seq CASCADE');
        $this->addSql('CREATE SEQUENCE fuseau_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE pays_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE ville_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE fuseau (id INT NOT NULL, nom_fuseau VARCHAR(255) NOT NULL, utc VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE pays (id INT NOT NULL, continents_id INT NOT NULL, nom_fr VARCHAR(255) NOT NULL, nom_en VARCHAR(255) NOT NULL, code INT NOT NULL, alpha_deux VARCHAR(255) NOT NULL, alpha_trois VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_349F3CAE298246F6 ON pays (continents_id)');
        $this->addSql('CREATE TABLE ville (id INT NOT NULL, pays_id INT NOT NULL, fuseau_id INT NOT NULL, nom_region VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_43C3D9C3A6E44244 ON ville (pays_id)');
        $this->addSql('CREATE INDEX IDX_43C3D9C3C9CA355A ON ville (fuseau_id)');
        $this->addSql('ALTER TABLE pays ADD CONSTRAINT FK_349F3CAE298246F6 FOREIGN KEY (continents_id) REFERENCES continent (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE ville ADD CONSTRAINT FK_43C3D9C3A6E44244 FOREIGN KEY (pays_id) REFERENCES pays (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE ville ADD CONSTRAINT FK_43C3D9C3C9CA355A FOREIGN KEY (fuseau_id) REFERENCES fuseau (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('DROP TABLE timezones');
        $this->addSql('ALTER TABLE continent ADD nom_en VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE continent RENAME COLUMN name TO nom_fr');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'postgresql', 'Migration can only be executed safely on \'postgresql\'.');

        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE ville DROP CONSTRAINT FK_43C3D9C3C9CA355A');
        $this->addSql('ALTER TABLE ville DROP CONSTRAINT FK_43C3D9C3A6E44244');
        $this->addSql('DROP SEQUENCE fuseau_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE pays_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE ville_id_seq CASCADE');
        $this->addSql('CREATE SEQUENCE timezones_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE timezones (id INT NOT NULL, timezone_groupe_fr VARCHAR(255) NOT NULL, timezone_groupe_en VARCHAR(255) NOT NULL, timezone_detail VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('DROP TABLE fuseau');
        $this->addSql('DROP TABLE pays');
        $this->addSql('DROP TABLE ville');
        $this->addSql('ALTER TABLE continent ADD name VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE continent DROP nom_fr');
        $this->addSql('ALTER TABLE continent DROP nom_en');
    }
}
