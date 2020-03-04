<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200304202348 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE users_project');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE users_project (users_id INT NOT NULL, project_id INT NOT NULL, INDEX IDX_DFB3A424166D1F9C (project_id), INDEX IDX_DFB3A42467B3B43D (users_id), PRIMARY KEY(users_id, project_id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE users_project ADD CONSTRAINT FK_DFB3A424166D1F9C FOREIGN KEY (project_id) REFERENCES project (id) ON UPDATE NO ACTION ON DELETE CASCADE');
        $this->addSql('ALTER TABLE users_project ADD CONSTRAINT FK_DFB3A42467B3B43D FOREIGN KEY (users_id) REFERENCES users (id) ON UPDATE NO ACTION ON DELETE CASCADE');
    }
}
