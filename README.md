# Online Art Gallery Project

## Description
This project is a comprehensive web-based art gallery platform where different types of users (admin, artist, customer, and supplier) can log in and perform various actions. The project is built using HTML, PHP, CSS, and JavaScript.

## Features

### Common Features
 - **Home, Gallery, Contact, About Pages**: Accessible by all users.
 - **User Authentication**: Login functionality for admin, artist, customer, and supplier.

 ### Customer & Supplier 
- **View Gallery**: Browse artworks.
 - **Add to Cart**: Add artworks to the cart from the gallery page.
 - **Cart Management**: Add or remove artworks from the cart. 
- **Checkout**: Proceed to purchase artworks. 

### Admin - **Admin Panel**: Access to manage the platform.
 - **Art Info**:  Update, or delete artworks. 
- **User Info**: Update, or delete users. 

### Artist - **Artist Profile**: Manage personal profile. 
- **Add Artwork**: Upload new artworks to the gallery.

## Requirements

- A web server with PHP support (e.g., Apache, XAMPP)
- A modern web browser

## Installation

1. **Clone the repository:**

   ```bash
   git clone https://github.com/muallamubeen/OnlineArtGallery.git
   
2. **Navigate to the project directory:**

   ```bash
   cd OnlineArtGallery
   
3. **Set up the database:**

      Create a new database and import the provided SQL script (database/art_gallery.sql) to set up the necessary tables.

4. **Configure database connection:**

      Update the database configuration in the PHP files as necessary to match your database setup.
   
5. **Deploy the project on your web server:**

   If you're using XAMPP, move the project directory to the ‘htdocs’ folder inside your XAMPP installation directory.
   
6. **Start your web serve:**

   Ensure your web server (e.g., Apache) and MySQL server are running.
   
9. **Access the application:**

   Open your web browser and go to http://localhost/OnlineArtGallery (or the appropriate URL based on your server setup).

##  Project Structure

   ```bash
  OnlineArtGallery/
  ├── css/
  │   └── style.css                     # CSS file for styling the pages
  │   └── style_home.css                # CSS file for styling the home and gallery pages
  │   └── style_about.css               # CSS file for styling the about page
  ├── js/
  │   └── script.js                     # JavaScript file for interactive elements
  ├── Admin/
  │   ├── art_info.html                 # Admin page to manage artworks
  │   ├── user_info.html                # Admin page to manage users
  │   ├── delete_artwork.php            # Admin page to delete artworks
  │   ├── delete_user.php               # Admin page to delete users
  │   ├── load_artwork.php              # Admin page to load artworks
  │   ├── load_user.php                 # Admin page to load users
  │   ├── update_artwork.php            # Admin page to update artworks
  │   ├── update_user.php               # Admin page to update users
  ├── database/
  │   ├── art_gallery.sql               # Art Gallery Database
  ├── img/
  │   ├── 
  ├── artist_pro.html                   # Artist profile page
  ├── profile-info.php 
  ├── add_artwork.html                  # Page for artists to add new artworks
  ├── cart.html                         # Customer cart page
  ├── checkout.php                      # Customer checkout page
  ├── db.php                            # Database connection file
  ├── insert_artwork.php                # Add artwork to database
  ├── load_cart.html        
  ├── load_cart.php                     # Load cart from database 
  ├── add_to_cart.php                   # Script to add items to the cart
  ├── remove_to_cart.php                # Script to remove items to the cart
  ├── home.html                         # Home page
  ├── gallery.php                       # Gallery page
  ├── contact.html                      # Contact page
  ├── about.html                        # About page
  ├── login.html                        # Login page
  ├── login.php                         # Login page
  ├── logout.php                        # Login page
  ├── signup.html                       # Registration page
  ├── signup.php                        # Registration page
  ├── style_login.css                   # CSS file for styling the login page
  └── README.md                         # This README file
```

## File Details

-	**home.php, gallery.php, contact.php, about.php**
  
      These files contain the HTML code for the main pages accessible by all users.

-	**css/style.css, css/style_home.css, css/style_about.css, style_login.css**
  
      This file contains the CSS rules to style the web pages.

-	**includes/login.php, includes/signup.php**
  
      These files handle the login and registration processes.

-	**includes/add_to_cart.php, includes/update_cart.php, includes/checkout.php**
  
      These files handle the cart and checkout functionalities for customers.

-	**includes/add_artworkphp**
  
      This file allows artists to upload new artworks.

-	**Admin/update_artwork.inc.php, Admin/delete_artwork.inc.php**
  
      These files allow the admin to update and delete artworks.

-	**Admin/update_user.inc.php, Admin/ delete_user.inc.php**
  
      These files allow the admin to update and delete users.

-	**profile-info, add_artwork.php**
  
      These files allow artists to manage their profiles and add new artworks.

-	**customer/load_cart.php, customer/checkout.php**
  
      These files manage the cart and checkout processes for customers.

## Contributing

  Contributions are welcome! If you find any issues or have suggestions for improvements, please create a pull request or open an issue in the repository.

