# Rexx Booking System Challenge

This is a simple php program that has the following functionalities.

* Importing event bookings data of employees at rexx-sytems from an external event booking system into a local mysql database. The exported data is in JSON format
* Filtering imported data based on employee name,event name, event date.
* Adding a last row to show total event price of all filtered entries.
* Testing version number from employee booking record to determine timezone changes. The external event system changed the timezone of event dates.
  Prior to version 1.0.17+60 it was Europe/Berlin, afterwards it is UTC.
