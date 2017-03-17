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

Testing
----------------------------------------------
Test Cases are not yet added, This would take little time. Dependencies will be updated accordingly.

