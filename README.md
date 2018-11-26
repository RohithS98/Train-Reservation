# Train-Reservation

We are using PHP7, CSS, Bootstrap3, and Bootstrap4 for making the whole front end of the website.
Apache server is used to implement the back end for the website.
MySQL server is being used to store the various tables in the database.

Four different tables have been created:
  1. userdetails for details relating to the user like usernaem, password, aadhar number, account number, and account balance.
  2. history for details about the bookings made by different users.
  3. trains for details about the different trains.
  4. admindetails for storing details about the admin accounts.
  
index.php is the main page that starts when the website is loaded into the apache server.
Login takes you to the userMian.php which provides further options of either booking a new ticket or viewing the previous bookings made by that user.
Register allows the user to create a user login for the website to book tickets and view their previous transactions.
Admin login can be used by admins to change the details associated with the trains like, train number, station list, days, and train status.
It also lets the admin add new trains to thr train table.

Entering the start and end stations will check the trains table to return the available trains for the route provided by the user.
Booking the ticket further will ask the user details about the passengers and will calculate the price they need to pay.
Finally the user can book the ticket and it gets added into the history table.

Viewing the previous bookings returns a table of all the bookings done by that particular user with their status from the history database.
It can also be used to cancel any booking. Also, doing so refunds the amount spend while booking the ticket back to the users bank account.

Once an admin cancels a train, the money is refunded to all the users who had booked for that train and had not cancelled their tickets.

CSS and bootstrap is used to make the user interface look more appealing and make it more user friendly.

Also the whole project is made using LAMP (Linux, Apache, MySQL, PHP).
