<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211030135823 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE message_model DROP FOREIGN KEY FK_28338D329395C3F3');
        $this->addSql('DROP INDEX IDX_28338D329395C3F3 ON message_model');
        $this->addSql('ALTER TABLE message_model DROP customer_id');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE message_model ADD customer_id INT NOT NULL');
        $this->addSql('ALTER TABLE message_model ADD CONSTRAINT FK_28338D329395C3F3 FOREIGN KEY (customer_id) REFERENCES customer_model (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE INDEX IDX_28338D329395C3F3 ON message_model (customer_id)');
    }
}
