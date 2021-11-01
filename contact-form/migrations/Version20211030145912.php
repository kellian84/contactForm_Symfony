<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211030145912 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE mail_model (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('DROP TABLE email_model');
        $this->addSql('ALTER TABLE customer_model ADD email_id INT NOT NULL, DROP email');
        $this->addSql('ALTER TABLE customer_model ADD CONSTRAINT FK_19A007E2A832C1C9 FOREIGN KEY (email_id) REFERENCES mail_model (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_19A007E2A832C1C9 ON customer_model (email_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE customer_model DROP FOREIGN KEY FK_19A007E2A832C1C9');
        $this->addSql('CREATE TABLE email_model (id INT AUTO_INCREMENT NOT NULL, customer_id INT NOT NULL, UNIQUE INDEX UNIQ_4AD833569395C3F3 (customer_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE email_model ADD CONSTRAINT FK_4AD833569395C3F3 FOREIGN KEY (customer_id) REFERENCES customer_model (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('DROP TABLE mail_model');
        $this->addSql('DROP INDEX UNIQ_19A007E2A832C1C9 ON customer_model');
        $this->addSql('ALTER TABLE customer_model ADD email VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, DROP email_id');
    }
}
