<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210305103422 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE dossier DROP FOREIGN KEY FK_3D48E037FB88E14F');
        $this->addSql('DROP INDEX UNIQ_3D48E037FB88E14F ON dossier');
        $this->addSql('ALTER TABLE dossier DROP utilisateur_id');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE dossier ADD utilisateur_id INT NOT NULL');
        $this->addSql('ALTER TABLE dossier ADD CONSTRAINT FK_3D48E037FB88E14F FOREIGN KEY (utilisateur_id) REFERENCES user (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_3D48E037FB88E14F ON dossier (utilisateur_id)');
    }
}
