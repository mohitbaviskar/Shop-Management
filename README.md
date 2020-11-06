# Pizza Shop Management System
The traditional way of running a pizza place involves a lot of hassles like maintaining a handwritten ledger, managing multiple tasks at the same time manually which sometimes led to mismanagement. An emerging solution to this problem is to develop an automated and easy to use and maintain database management system for running the shop. This system is supposed to eliminate and in some cases reduce the hardships faced in the current system. The main objective of this system is to help maintain the staff data, menu of the shop, available ingredients, requirements for each dish, suppliers, customer data, orders, purchases and transactions.

Technology stack used:
Frontend : HTML, CSS, Bootstrap
Backend : PHP
Database : MySQL

The designed system performs the following tasks:

Owner privileges:
1) Allow the owner to keep track of all transactions.
2) Notify the owner when any ingredient is running low on supplies.
3) Allow the owner to keep track of all the employees and add new employees or edit their information.
4) Allow the owner to make changes in the menu.
5) Allow the owner to make entries of new purchases of ingredients and the quantity of the ingredients is automatically updated in the database.
6) The owner has the option to see the database of all his/her suppliers so as to contact them when any ingredient is running low.
7) Create a new user(owner or employee) who can login to this system and use it.

Employee privileges:
1) Allow employees to take new orders by entering just the customer phone number, dish name and quantity(the amount will be calculated automatically). 10% discount will be given to regular customers automatically. Simultaneously, customer database will also be updated.
2) Keep a record of the ingredients required for each dish on the menu and check if all the ingredients required for fulfilling a particular order are available in sufficient quantity at the time of taking order.

The ER diagram, relational schema, functional dependancies and normalisation process for this project can be checked in the FDs and Normalisation pdf file.
The frontend look of this project can be seen in the dbms_screenshots folder.
The database DDL and DML entries can be found in the shop.sql file.
A simple way to run this project is to save all the files and folders directly into the htdocs folder of XAMPP and open the files in localhost on any browser after running the apache and sql server on XAMPP.
