<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220124101916 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE bibliotheque (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, localisation VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE livres (id INT AUTO_INCREMENT NOT NULL, idbibliothèque_id INT DEFAULT NULL, nom VARCHAR(255) NOT NULL, auteur VARCHAR(255) NOT NULL, categ VARCHAR(255) NOT NULL, date DATETIME NOT NULL, couverture VARCHAR(255) NOT NULL, INDEX IDX_927187A4817EF854 (idbibliothèque_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE livres ADD CONSTRAINT FK_927187A4817EF854 FOREIGN KEY (idbibliothèque_id) REFERENCES bibliotheque (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE livres DROP FOREIGN KEY FK_927187A4817EF854');
        $this->addSql('DROP TABLE bibliotheque');
        $this->addSql('DROP TABLE livres');
    }
}
