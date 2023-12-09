<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231209120454 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE experience ADD user_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE experience ADD CONSTRAINT FK_590C103A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_590C103A76ED395 ON experience (user_id)');
        $this->addSql('ALTER TABLE review ADD user_from_id INT NOT NULL, ADD user_to_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE review ADD CONSTRAINT FK_794381C620C3C701 FOREIGN KEY (user_from_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE review ADD CONSTRAINT FK_794381C6D2F7B13D FOREIGN KEY (user_to_id) REFERENCES user (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_794381C620C3C701 ON review (user_from_id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_794381C6D2F7B13D ON review (user_to_id)');
        $this->addSql('ALTER TABLE skill ADD user_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE skill ADD CONSTRAINT FK_5E3DE477A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_5E3DE477A76ED395 ON skill (user_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE skill DROP FOREIGN KEY FK_5E3DE477A76ED395');
        $this->addSql('DROP INDEX IDX_5E3DE477A76ED395 ON skill');
        $this->addSql('ALTER TABLE skill DROP user_id');
        $this->addSql('ALTER TABLE review DROP FOREIGN KEY FK_794381C620C3C701');
        $this->addSql('ALTER TABLE review DROP FOREIGN KEY FK_794381C6D2F7B13D');
        $this->addSql('DROP INDEX UNIQ_794381C620C3C701 ON review');
        $this->addSql('DROP INDEX UNIQ_794381C6D2F7B13D ON review');
        $this->addSql('ALTER TABLE review DROP user_from_id, DROP user_to_id');
        $this->addSql('ALTER TABLE experience DROP FOREIGN KEY FK_590C103A76ED395');
        $this->addSql('DROP INDEX UNIQ_590C103A76ED395 ON experience');
        $this->addSql('ALTER TABLE experience DROP user_id');
    }
}
