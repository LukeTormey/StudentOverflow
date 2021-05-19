<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210519180524 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE trophy ADD user_id INT DEFAULT NULL, ADD image VARCHAR(255) NOT NULL, DROP points, CHANGE color award VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE trophy ADD CONSTRAINT FK_112AFAE9A76ED395 FOREIGN KEY (user_id) REFERENCES `user` (id)');
        $this->addSql('CREATE INDEX IDX_112AFAE9A76ED395 ON trophy (user_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE trophy DROP FOREIGN KEY FK_112AFAE9A76ED395');
        $this->addSql('DROP INDEX IDX_112AFAE9A76ED395 ON trophy');
        $this->addSql('ALTER TABLE trophy ADD color VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, ADD points INT NOT NULL, DROP user_id, DROP award, DROP image');
    }
}
