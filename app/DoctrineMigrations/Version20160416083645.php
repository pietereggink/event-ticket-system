<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20160416083645 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE event (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, description TEXT NOT NULL, location VARCHAR(255) NOT NULL, start_date DATETIME NOT NULL, end_date DATETIME NOT NULL, website VARCHAR(255) DEFAULT NULL, created_on DATETIME NOT NULL, updated_on DATETIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE event_ticket (id INT AUTO_INCREMENT NOT NULL, event_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, description TEXT NOT NULL, price NUMERIC(8, 2) NOT NULL, available_tickets INT NOT NULL, created_on DATETIME NOT NULL, updated_on DATETIME NOT NULL, INDEX fk_event_ticket_1_idx (event_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE customer_ticket (id INT AUTO_INCREMENT NOT NULL, customer_id INT DEFAULT NULL, event_ticket_id INT DEFAULT NULL, price NUMERIC(8, 2) NOT NULL, number_of_tickets INT NOT NULL, created_on DATETIME NOT NULL, updated_on DATETIME NOT NULL, INDEX fk_customer_ticket_1_idx (event_ticket_id), INDEX fk_customer_ticket_2_idx (customer_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE customer (id INT AUTO_INCREMENT NOT NULL, first_name VARCHAR(255) NOT NULL, last_name VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, created_on DATETIME NOT NULL, updated_on DATETIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE event_ticket ADD CONSTRAINT FK_A539DAF171F7E88B FOREIGN KEY (event_id) REFERENCES event (id)');
        $this->addSql('ALTER TABLE customer_ticket ADD CONSTRAINT FK_266571F29395C3F3 FOREIGN KEY (customer_id) REFERENCES customer (id)');
        $this->addSql('ALTER TABLE customer_ticket ADD CONSTRAINT FK_266571F2F69579EF FOREIGN KEY (event_ticket_id) REFERENCES event_ticket (id)');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE event_ticket DROP FOREIGN KEY FK_A539DAF171F7E88B');
        $this->addSql('ALTER TABLE customer_ticket DROP FOREIGN KEY FK_266571F2F69579EF');
        $this->addSql('ALTER TABLE customer_ticket DROP FOREIGN KEY FK_266571F29395C3F3');
        $this->addSql('DROP TABLE event');
        $this->addSql('DROP TABLE event_ticket');
        $this->addSql('DROP TABLE customer_ticket');
        $this->addSql('DROP TABLE customer');
    }
}
