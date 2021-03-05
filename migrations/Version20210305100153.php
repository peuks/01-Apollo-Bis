<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210305100153 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE agrement (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE artisan (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) DEFAULT NULL, tel VARCHAR(255) DEFAULT NULL, adresse VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE bien (id INT AUTO_INCREMENT NOT NULL, type_id INT NOT NULL, user_id INT NOT NULL, superficie INT DEFAULT NULL, piece INT DEFAULT NULL, chambre INT DEFAULT NULL, etage INT DEFAULT NULL, loyer INT DEFAULT NULL, charge INT DEFAULT NULL, date_disponibilite DATE DEFAULT NULL, location_ligne TINYINT(1) DEFAULT NULL, caution INT DEFAULT NULL, monopropriete TINYINT(1) DEFAULT NULL, eau_indiv TINYINT(1) DEFAULT NULL, fibre TINYINT(1) DEFAULT NULL, tnt TINYINT(1) DEFAULT NULL, cable TINYINT(1) DEFAULT NULL, chauffage_ind TINYINT(1) DEFAULT NULL, numero_lot INT DEFAULT NULL, irl INT DEFAULT NULL, provision_charge INT DEFAULT NULL, adresse VARCHAR(255) DEFAULT NULL, code_postal VARCHAR(255) DEFAULT NULL, ville VARCHAR(255) DEFAULT NULL, description LONGTEXT DEFAULT NULL, afficher_telephone TINYINT(1) DEFAULT NULL, loyer_reference VARCHAR(100) NOT NULL, dpe VARCHAR(1) NOT NULL, gse VARCHAR(1) NOT NULL, loyer_precedent INT NOT NULL, INDEX IDX_45EDC386C54C8C93 (type_id), INDEX IDX_45EDC386A76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE dossier (id INT AUTO_INCREMENT NOT NULL, utilisateur_id INT NOT NULL, description LONGTEXT NOT NULL, prenom VARCHAR(100) NOT NULL, photo VARCHAR(255) NOT NULL, statut VARCHAR(100) NOT NULL, UNIQUE INDEX UNIQ_3D48E037FB88E14F (utilisateur_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE nature_location (id INT AUTO_INCREMENT NOT NULL, type VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE periode_construction (id INT AUTO_INCREMENT NOT NULL, periode VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE reset_password_request (id INT AUTO_INCREMENT NOT NULL, user_id INT NOT NULL, selector VARCHAR(20) NOT NULL, hashed_token VARCHAR(100) NOT NULL, requested_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', expires_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_7CE748AA76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE type_construction (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE type_statut (id INT AUTO_INCREMENT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE `user` (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles LONGTEXT NOT NULL COMMENT \'(DC2Type:json)\', password VARCHAR(255) NOT NULL, username VARCHAR(50) DEFAULT NULL, is_verified TINYINT(1) NOT NULL, first_name VARCHAR(255) NOT NULL, last_name VARCHAR(255) NOT NULL, locataire TINYINT(1) NOT NULL, proprietaire TINYINT(1) NOT NULL, UNIQUE INDEX UNIQ_8D93D649E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE bien ADD CONSTRAINT FK_45EDC386C54C8C93 FOREIGN KEY (type_id) REFERENCES type_construction (id)');
        $this->addSql('ALTER TABLE bien ADD CONSTRAINT FK_45EDC386A76ED395 FOREIGN KEY (user_id) REFERENCES `user` (id)');
        $this->addSql('ALTER TABLE dossier ADD CONSTRAINT FK_3D48E037FB88E14F FOREIGN KEY (utilisateur_id) REFERENCES `user` (id)');
        $this->addSql('ALTER TABLE reset_password_request ADD CONSTRAINT FK_7CE748AA76ED395 FOREIGN KEY (user_id) REFERENCES `user` (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE bien DROP FOREIGN KEY FK_45EDC386C54C8C93');
        $this->addSql('ALTER TABLE bien DROP FOREIGN KEY FK_45EDC386A76ED395');
        $this->addSql('ALTER TABLE dossier DROP FOREIGN KEY FK_3D48E037FB88E14F');
        $this->addSql('ALTER TABLE reset_password_request DROP FOREIGN KEY FK_7CE748AA76ED395');
        $this->addSql('DROP TABLE agrement');
        $this->addSql('DROP TABLE artisan');
        $this->addSql('DROP TABLE bien');
        $this->addSql('DROP TABLE dossier');
        $this->addSql('DROP TABLE nature_location');
        $this->addSql('DROP TABLE periode_construction');
        $this->addSql('DROP TABLE reset_password_request');
        $this->addSql('DROP TABLE type_construction');
        $this->addSql('DROP TABLE type_statut');
        $this->addSql('DROP TABLE `user`');
    }
}
