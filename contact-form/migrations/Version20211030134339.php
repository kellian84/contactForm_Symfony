<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211030134339 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE customer_model ADD message_models_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE customer_model ADD CONSTRAINT FK_19A007E2B3DFB97F FOREIGN KEY (message_models_id) REFERENCES message_model (id)');
        $this->addSql('CREATE INDEX IDX_19A007E2B3DFB97F ON customer_model (message_models_id)');
        $this->addSql('ALTER TABLE message_model DROP INDEX UNIQ_28338D329395C3F3, ADD INDEX IDX_28338D329395C3F3 (customer_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE customer_model DROP FOREIGN KEY FK_19A007E2B3DFB97F');
        $this->addSql('DROP INDEX IDX_19A007E2B3DFB97F ON customer_model');
        $this->addSql('ALTER TABLE customer_model DROP message_models_id');
        $this->addSql('ALTER TABLE message_model DROP INDEX IDX_28338D329395C3F3, ADD UNIQUE INDEX UNIQ_28338D329395C3F3 (customer_id)');
    }
}
