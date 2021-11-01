<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211030150546 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE customer_model ADD mail_id INT NOT NULL');
        $this->addSql('ALTER TABLE customer_model ADD CONSTRAINT FK_19A007E2C8776F01 FOREIGN KEY (mail_id) REFERENCES mail_model (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_19A007E2C8776F01 ON customer_model (mail_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE customer_model DROP FOREIGN KEY FK_19A007E2C8776F01');
        $this->addSql('DROP INDEX UNIQ_19A007E2C8776F01 ON customer_model');
        $this->addSql('ALTER TABLE customer_model DROP mail_id');
    }
}
