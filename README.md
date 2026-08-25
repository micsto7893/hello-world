## Man Cave Supply

Man Cave Supply is a PHP and MySQL web application developed for the SDC310L course project. The application is an easy online store that allows folks to browse products and manage items in a shopping cart.

## Features

* Displays products stored in a MySQL database
* Adds products to a shopping cart
* Tracks cart contents using PHP sessions
* Increases and decreases product quantities
* Removes products from the shopping cart
* Calculates individual product totals
* Calculates the total number of items ordered
* Calculates 5% sales tax
* Calculates shipping and handling at 10% of the pre-tax total
* Calculates the final order total
* Provides checkout functionality that clears the cart
* Uses Model-View-Controller (MVC) architecture

## Technologies Used

* PHP
* MySQL
* HTML
* CSS
* XAMPP
* phpMyAdmin
* GitHub

## Application Structure

The final application uses the Model-View-Controller architecture.

* Models: handle product and database-related processing.
* Views: display the product catalog and shopping cart.
* Controllers: process catalog and shopping cart actions.
* MySQL: stores product information.
* PHP Sessions: maintain shopping cart contents between pages.

## Project Summary

This project involved developing an easy online store from the initial database and application framework through a completed MVC-based PHP application. Development was completed in phases, beginning with the MySQL product database and basic PHP page structure. This then led into database support so products could be retrieved dynamically, ending with shopping cart functionality that allowed users to add, remove, and adjust product quantities.

I later reorganized using the MVC architecture to separate data processing, application logic, and presentation. Lastly I included a product totals, a 5% tax calculation, shipping and handling calculated at 10% of the pre-tax subtotal, the final order total, and checkout functionality.

Testing and troubleshooting helped resolve issues involving database configuration, file paths, navigation, and the transition to MVC. 
