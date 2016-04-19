# Event Ticket System

### Business case

1. Customer can view events.
2. Customer can view available tickets per event.
3. Customer should be able to order a ticket for an event.
4. System user should be able to import events for two kind of file formats.

### Installation

1. git clone https://github.com/pietereggink/event-ticket-system.git
2. run composer install
3. run doctrine migrations (php app/console doctrine:migrations:migrate)

### Event importer command (open/closed principle)

class: TicketBundle\Command\EventImporterCommand

php app/console event:importer

This command will import some events.

There are two kind of importers, CSV and XML.

### Custom validator

class: TicketBundle\Validator\EmailExistsValidator

There is a custom validator (used for the order form) that will check if an email address already exist in the database.

### Listener

class: TicketBundle\Listener\MaintenanceListener

With this listener you can add a maintenance screen for you customers on your production environment.

### Custom Exceptions

class: TicketBundle\Importer\Event\Exception\InvalidElementException 

Used for XML file import.

class: TicketBundle\Importer\Event\Exception\InvalidRowException

Used for CSV file import.

### Frontend

I have used Twitter bootstrap http://getbootstrap.com/2.3.2/ for html and css.

### Third party packages from (packagist.org)

For CSV import I have used "keboola/csv".
For XML import I have used "sabre/xml".

### Unit tests

php bin/phpunit -c app/phpunit.xml.dist

I have written unit tests for all services and feed importers.

### Data model

![alt text](https://github.com/pietereggink/event-ticket-system/blob/master/src/TicketBundle/Resources/datamodel/datamodel.png "Data model")
