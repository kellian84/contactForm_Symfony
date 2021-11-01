<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211030150418 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE customer_model DROP FOREIGN KEY FK_19A007E2A832C1C9');
        $this->addSql('DROP INDEX UNIQ_19A007E2A832C1C9 ON customer_model');
        $this->addSql('ALTER TABLE customer_model DROP email_id, DROP message');
        $this->addSql('ALTER TABLE message_model DROP id_customer');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE customer_model ADD email_id INT NOT NULL, ADD message VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE customer_model ADD CONSTRAINT FK_19A007E2A832C1C9 FOREIGN KEY (email_id) REFERENCES mail_model (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_19A007E2A832C1C9 ON customer_model (email_id)');
        $this->addSql('ALTER TABLE message_model ADD id_customer INT NOT NULL');
    }
}
