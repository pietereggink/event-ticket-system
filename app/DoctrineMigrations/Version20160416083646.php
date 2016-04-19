<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20160416083646 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql("
          INSERT INTO `ticket_machine`.`event` (`id`, `name`, `description`, `location`, `start_date`, `end_date`, `website`, `created_on`, `updated_on`) VALUES ('1', 'Dutch PHP Conference 2016', 'Ibuildings is proud to organize the tenth Dutch PHP Conference on June 24 and 25, plus a pre-conference tutorial day on June 23. Both programs will be completely in English so the only Dutch thing about it is the location. Keywords for these days: Know-how, Technology, Best Practices, Networking, Tips & Tricks.', 'RAI - Amsterdam', '2016-06-23 08:30:00', '2016-06-25 18:00:00', 'http://www.phpconference.nl/', '2016-04-12 21:00:00', '2016-04-12 21:00:00');
          INSERT INTO `ticket_machine`.`event_ticket` (`id`, `event_id`, `name`, `description`, `price`, `available_tickets`, `created_on`, `updated_on`) VALUES ('1', '1', 'Conference and tutorial', 'Full DPC16 ticket (June 23-25)\nAll access to tutorials, sessions and socials for 3 days, with Early Bird Discount. Regular price: € 700. Pre-register for a specific tutorial. Price excluding VAT.', '595.00', '250', '2016-06-01 23:00:00', '2016-06-01 23:00:00');
          INSERT INTO `ticket_machine`.`event_ticket` (`id`, `event_id`, `name`, `description`, `price`, `available_tickets`, `created_on`, `updated_on`) VALUES ('2', '1', 'Conference Only', '2-day Conference Only ticket (June 24-25)\nFull access to all sessions on June 24 and 25, with Early Bird Discount. Regular price: € 400. Price excluding VAT.', '340.00', '250', '2016-06-01 23:00:00', '2016-06-01 23:00:00');
          INSERT INTO `ticket_machine`.`event_ticket` (`id`, `event_id`, `name`, `description`, `price`, `available_tickets`, `created_on`, `updated_on`) VALUES ('3', '1', 'Tutorial Day Only', 'Tutorial Day Only ticket (June 23)\nAccess to the tutorials on June 23, with Early Bird Discount. Regular price: € 350. Pre-register for a specific tutorial. Price excluding VAT.', '295.00', '250', '2016-06-01 23:00:00', '2016-06-01 23:00:00');
        ");
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');
    }
}
