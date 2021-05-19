<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210519222957 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE bronze_trophy (id INT AUTO_INCREMENT NOT NULL, user_id INT DEFAULT NULL, award VARCHAR(255) NOT NULL, image VARCHAR(255) NOT NULL, INDEX IDX_2D5B4541A76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE gold_trophy (id INT AUTO_INCREMENT NOT NULL, user_id INT DEFAULT NULL, award VARCHAR(255) NOT NULL, image VARCHAR(255) NOT NULL, INDEX IDX_A907734FA76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE silver_trophy (id INT AUTO_INCREMENT NOT NULL, user_id INT DEFAULT NULL, award VARCHAR(255) NOT NULL, image VARCHAR(255) NOT NULL, INDEX IDX_91DC6163A76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE bronze_trophy ADD CONSTRAINT FK_2D5B4541A76ED395 FOREIGN KEY (user_id) REFERENCES `user` (id)');
        $this->addSql('ALTER TABLE gold_trophy ADD CONSTRAINT FK_A907734FA76ED395 FOREIGN KEY (user_id) REFERENCES `user` (id)');
        $this->addSql('ALTER TABLE silver_trophy ADD CONSTRAINT FK_91DC6163A76ED395 FOREIGN KEY (user_id) REFERENCES `user` (id)');
        $this->addSql('DROP TABLE trophy');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE trophy (id INT AUTO_INCREMENT NOT NULL, user_id INT DEFAULT NULL, award VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, image VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, INDEX IDX_112AFAE9A76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE trophy ADD CONSTRAINT FK_112AFAE9A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('DROP TABLE bronze_trophy');
        $this->addSql('DROP TABLE gold_trophy');
        $this->addSql('DROP TABLE silver_trophy');
    }
}
