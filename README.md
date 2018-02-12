# Fraud-Response-System
This system connects a database to a series of webpages to streamline the process of contacting victims of fraud.

The database, designed with MySQL and PHP in mind, has 4 tables: Customers, Users, Comments, and Events.  
	-The User table will determine which User is active, as well as tracks what access they have to  modifications.
	-The Event table is a basic "container" table which keeps track of which 'Event' each Customer is affected by.
	-The Comment table tracks which User makes what comment on each Customer.  
	-The Customer table contains all relevant contact information supplied by the bank in the form of a CSV file, as well as notes
	 which event(s) they are associated with and all comments made concerning them.

~To be updated as the project progresses~
