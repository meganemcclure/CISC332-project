# CISC332-project

CISC 332 Databases
Megan McClure - Final Project

## Assignment Instruction

You will write a fully functioning web-based interface for an airline system based on the airline database that we have been working on in class thus far.

Your application should implement the following functionality.

1. Show all the flights (flight code and arrival time) with scheduled arrival times the same as the actual arrival times.

2. Allow the user to enter an airline code  and a day and display all the flights associated with the given airline that offer flights on the specified day.  Include the flight code, departing airport location (city) and the arriving airport location (city) for these flights.

3. Allow a user to add a new flight by displaying the airlines that are in your database and allowing them to choose an airline, displaying the airports in your database and allowing them to choose both the departure and the arrival airport for this flight.  Have them enter any other relevant information such as the flight number and the days of the week on which the flight is offered.

4. Allow the user to update the actual departure time of a flight.  The user should choose from a list of flight codes, enter a new time and the information in the table should be updated.

5. Allow the user to select a day of the week and calculate and display the average number of seats available on all flights on that day.  For instance, if there are 3 flights on a Wednesday and flight 1 has 200 seats, flight 2 has 300 seats and flight 3 has 400 seats, the average number of seats would be 300 seats.

How you organize your application is up to you, but your application must use at least 3 web pages (more if you wish).  Your home page should be called airline.  This can be an html or a php page).   To use your application, we should NOT have to directly access any other URL.  

Information that would be well suited to a tabular display must be displayed as a table.  Proper html tags must be used for headings, paragraphs, lists etc.    Your application doesn't need to be flashy, but it needs to be visually appealing with at least one or two images.  Make it look as professional as you can.  I'm not asking for an expert web application, I'm just looking for some reasonable effort.

Your application must use PHP to generate the dynamic content (ie. accessing the back end database and displaying the results) and must be able to work with (almost) any DBMS (therefore you must be using PDOs, not the mysqli api).

These requirements are a minimum, you may add additional functionality.  You may find that you need to add additional data and or functionality to make your application realistic, or to demonstrate that it works.  You may assume that user input is correct so input syntax checking can be minimal.  You should gracefully handle the case(s) where your query does not return any results.

### Deliverables
1. zip all your code files and submit to ONQ.  Remember, your home page should be called "airline" (the extension will be html or php).   Include any images that you have used for your application.  We will unpack your code and run it on our own web servers.  Image references should use a path relative to the home page.   Your application should work "out of the box" without any modifications.

2. hand in the script that you use for creating your database and loading the data.  You may make changes to the table creations etc script from the last assignment if you wish.  However, your script should drop the airlinedb database and create it as the first two lines of your script.  Your script should be in plain text so that we can easily import the script and build you database before running your application.  Failure to hand in your script will result in significantly reduced marks.

3. 5% of your mark will be based on a video demo of your project.  In a 5 minute video, show all the functionality that you were required to implement.  Your video should walk through the functionality and demonstrate that your program works.  Be sure to show us that if you add something to the database, it really has been added!    Method of video submission TBD.

### Marking
The project will be marked using the attached rubric. 

### Extensions
A 24 hour extension will be given to everyone, no need to ask.  However, after the 24 hour grace period, no submissions will be accepted and you will receive 0 on the assignment.