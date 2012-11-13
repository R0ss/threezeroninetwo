Name: Ross Gatih
Student number: 997 923 118

Connect to the site using:
	http://localhost/airuoft/
	http://localhost/airuoft/index

-----------------------------------------------
        User's interface
-----------------------------------------------

http://localhost/airuoft/index
You can select one of two campuses using the drop-down
menu. Also, you can select a date, by clicking on the
"departure date" box, then choosing a date from the 
calender. Press "search available flights" to proceed.

http://localhost/airuoft/index/getDepartures.php Based
on your previous selection of campus and date, a list 
of available flights will be listed. You can select one 
of the flights by clicking on the link "Buy Now for $20!".
You can also go back by pressing the "back" in the top 
left portion of the table. If no flights are available, 
then a message will notify the user.

http://localhost/airuoft/index/selectFlight/
After the user selects a time to depart, an image will 
appear, and the user will be asked to select an available
seat by clicking on a white square. After making a 
selection, a link called "Select seat" will appear at 
the bottom of the image allowing the user to proceed.

http://localhost/airuoft/index/getCustomerInfo/
The user will enter all the information required. Including
their full name, and credit card information. Upon submission,
the info is verified, and errors in the form are presented 
to the user above the specific field.

http://localhost/airuoft/index/load_receipt
Upon successful validation, the user will be presented with 
a receipt. The user can go back to the beginning and make 
another purchase, and select the image at the bottom to make
a print out.

-----------------------------------------------
        Admin's interface
-----------------------------------------------

http://localhost/airuoft/admin
Here there is a list of available tools for an admin to use, including:
    -Main page: Redirects the admin to the user page.

    -Show flights: Returns flight table contents.

    -Show tickets: Returns ticket table contents with specific dates for each flight.

    -Populate Flight Table: Fills the flight table with records for the following 14 days.

    -Delete Flight & Ticket Data: Removes all flight and ticket data.
