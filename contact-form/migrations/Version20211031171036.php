<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211031171036 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE is_read (id INT AUTO_INCREMENT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE customer_model ADD is_read INT NOT NULL, DROP read_message');
        $this->addSql('INSERT INTO user (email, roles, password) VALUES ("demo@demo.com", "[]", "$2y$13$Jd2LAfX5l05yBxUjxjBvjuMcJLn2z6YCrrBdf2sV3rZJpR.BJgvk2")');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE is_read');
        $this->addSql('ALTER TABLE customer_model ADD read_message INT DEFAULT 0 NOT NULL, DROP is_read');
    }
}
