<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210218105938 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE bien (id INT AUTO_INCREMENT NOT NULL, superficie INT DEFAULT NULL, piece INT DEFAULT NULL, chambre INT DEFAULT NULL, etage INT DEFAULT NULL, loyer INT DEFAULT NULL, charge INT DEFAULT NULL, date_disponibilite DATE DEFAULT NULL, location_ligne TINYINT(1) DEFAULT NULL, caution INT DEFAULT NULL, monopropriete TINYINT(1) DEFAULT NULL, eau_indiv TINYINT(1) DEFAULT NULL, fibre TINYINT(1) DEFAULT NULL, tnt TINYINT(1) DEFAULT NULL, cable TINYINT(1) DEFAULT NULL, chauffage_ind TINYINT(1) DEFAULT NULL, numero_lot INT DEFAULT NULL, irl INT DEFAULT NULL, provision_charge INT DEFAULT NULL, address VARCHAR(255) DEFAULT NULL, code_postal VARCHAR(255) DEFAULT NULL, ville VARCHAR(255) DEFAULT NULL, description LONGTEXT DEFAULT NULL, afficher_telephone TINYINT(1) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE bien');
    }
}
