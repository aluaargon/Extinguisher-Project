<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220128093347 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE priority (id INT AUTO_INCREMENT NOT NULL, level INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE bug ADD priority_id INT NOT NULL');
        $this->addSql('ALTER TABLE bug ADD CONSTRAINT FK_358CBF14497B19F9 FOREIGN KEY (priority_id) REFERENCES priority (id)');
        $this->addSql('CREATE INDEX IDX_358CBF14497B19F9 ON bug (priority_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE bug DROP FOREIGN KEY FK_358CBF14497B19F9');
        $this->addSql('DROP TABLE priority');
        $this->addSql('DROP INDEX IDX_358CBF14497B19F9 ON bug');
        $this->addSql('ALTER TABLE bug DROP priority_id');
    }
}
