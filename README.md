# Rexx Booking System Challenge

This is a simple php program that has the following functionalities.

* Importing event bookings data of employees at rexx-sytems from an external event booking system into a local mysql database. The exported data is in JSON format
* Filtering imported data based on employee name,event name, event date.
* Adding a last row to show total event price of all filtered entries.
* Testing version number from employee booking record to determine timezone changes. The external event system changed the timezone of event dates.
  Prior to version 1.0.17+60 it was Europe/Berlin, afterwards it is UTC.

## Testing Rexx Booking System Features

### 1. Importing External System Data

Bookings from external system is in JSON format. To import this data into the application, following these steps:

* Click 'Import new bookings'
* Select your exported JSON file
* Click the 'Import' button to import

### 2. Filtering Imported Data

* Select your desired filtering option from the FilterBy section. You can filter by Employee name, Event name, Event date
* Enter your filter value
* Click submit and wait for your filtered results
