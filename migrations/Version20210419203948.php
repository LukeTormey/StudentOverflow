<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210419203948 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE study_length DROP FOREIGN KEY FK_A128069AFCFA9DAE');
        $this->addSql('DROP INDEX IDX_A128069AFCFA9DAE ON study_length');
        $this->addSql('ALTER TABLE study_length ADD difficulty VARCHAR(255) NOT NULL, DROP difficulty_id, DROP length');
        $this->addSql('ALTER TABLE subject ADD difficulty_id INT DEFAULT NULL, DROP difficulty');
        $this->addSql('ALTER TABLE subject ADD CONSTRAINT FK_FBCE3E7AFCFA9DAE FOREIGN KEY (difficulty_id) REFERENCES study_length (id)');
        $this->addSql('CREATE INDEX IDX_FBCE3E7AFCFA9DAE ON subject (difficulty_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE study_length ADD difficulty_id INT DEFAULT NULL, ADD length INT NOT NULL, DROP difficulty');
        $this->addSql('ALTER TABLE study_length ADD CONSTRAINT FK_A128069AFCFA9DAE FOREIGN KEY (difficulty_id) REFERENCES subject (id)');
        $this->addSql('CREATE INDEX IDX_A128069AFCFA9DAE ON study_length (difficulty_id)');
        $this->addSql('ALTER TABLE subject DROP FOREIGN KEY FK_FBCE3E7AFCFA9DAE');
        $this->addSql('DROP INDEX IDX_FBCE3E7AFCFA9DAE ON subject');
        $this->addSql('ALTER TABLE subject ADD difficulty VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, DROP difficulty_id');
    }
}
