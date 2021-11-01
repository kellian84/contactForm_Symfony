<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211030135920 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE message_model_customer_model (message_model_id INT NOT NULL, customer_model_id INT NOT NULL, INDEX IDX_31FFF973705373F6 (message_model_id), INDEX IDX_31FFF97355B0F4C8 (customer_model_id), PRIMARY KEY(message_model_id, customer_model_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE message_model_customer_model ADD CONSTRAINT FK_31FFF973705373F6 FOREIGN KEY (message_model_id) REFERENCES message_model (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE message_model_customer_model ADD CONSTRAINT FK_31FFF97355B0F4C8 FOREIGN KEY (customer_model_id) REFERENCES customer_model (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE message_model_customer_model');
    }
}
