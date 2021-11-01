<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211030132805 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE message_model DROP INDEX IDX_28338D329395C3F3, ADD UNIQUE INDEX UNIQ_28338D329395C3F3 (customer_id)');
        $this->addSql('ALTER TABLE message_model CHANGE message message VARCHAR(255) NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE message_model DROP INDEX UNIQ_28338D329395C3F3, ADD INDEX IDX_28338D329395C3F3 (customer_id)');
        $this->addSql('ALTER TABLE message_model CHANGE message message VARCHAR(10000) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`');
    }
}
