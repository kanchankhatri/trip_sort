[Sort Trip Based On Source and Destination]
==============================================
Description 
----------------------------------------------
Given: Tickets of various Transports with source, dest and additonal info.
A Complete Trip is to be returned by sorting the tickets in order of their source and dest.
### Dependencies
- PHP 5.6

### How to use
* example_api.php is example usage of the classes.
* It creats Ticket Objects and Pass these array of Objects to Trip sort function which will return the sorted array of Ticket Objects. 

Basic Design 
----------------------------------------------        
    Base
    ├── TicketFactory - will create Ticket Objects based on transport. By default, GenericTicket is the class for Ticket with no transport class.
    └── Ticket
        └── TrainTicket            
        └── FlightTicket            
        └── GenericTicket            
    └── Trip - Trip Planner

    Helper Functions and View files are used by classes to process and display the required info.

Extending 
----------------------------------------------        
    Tickets:
        when a ticket is created, based on its transport attribute its respective ticket class object is returned by TicketFactory.
        array('source'=>'A','destination'=>'B','transport'=>'train') will create TrainTicket object for this ticket.
        By default, GenericTicket object is created for ticket if transport is null or its respective transport class is not present.
        eg:  array('source'=>'A','destination'=>'B','transport'=>'bus') will create GenericTicket object for this ticket as BusTicket class is not added.
        To add another mode of transport like Bus, a class is to be added which will extend Ticket class as seen in TrainTicket.
    Modules Like: Display Html of any array of Ticket Object
        This can be done by simply adding function in Trip, function show_tickets that will call sort_tickets and display the results in view.    
        example modules can be seen in Trip class - like calculating trip cost etc.

To Add
----------------------------------------------
Test Cases are not yet added, This would take little time. Dependencies will be updated accordingly.

