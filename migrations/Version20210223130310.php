<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210223130310 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE agrement CHANGE nom name VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE norme_environnementale ADD note_id INT NOT NULL');
        $this->addSql('ALTER TABLE norme_environnementale ADD CONSTRAINT FK_AABC1F8226ED0855 FOREIGN KEY (note_id) REFERENCES note (id)');
        $this->addSql('CREATE INDEX IDX_AABC1F8226ED0855 ON norme_environnementale (note_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE agrement CHANGE name nom VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE norme_environnementale DROP FOREIGN KEY FK_AABC1F8226ED0855');
        $this->addSql('DROP INDEX IDX_AABC1F8226ED0855 ON norme_environnementale');
        $this->addSql('ALTER TABLE norme_environnementale DROP note_id');
    }
}
