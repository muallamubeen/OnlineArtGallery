<?php 
    $host_name = "localhost";
    $db_name = "art_gallery";
    $username = "root";
    $password = "";
    $conn = new mysqli($host_name, $username, $password, $db_name);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    session_start();
    
    $user_id = json_encode(['user_id' => $_SESSION['user_id']]);
    
    
    $sql = "SELECT artwork_ID, name, price, description, image_url, category FROM artwork";
    $result = $conn->query($sql);

echo <<<_END
    <!DOCTYPE html>
    <html>
        <head>
            <meta charset="utf-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <title>D&B | Gallery</title>
            <meta name="descripton" content="">
            <meta name="Viewport" content="width=device-width, initial-scale=1">
            <link href="https://fonts.googleapis.com/css2?family=Barlow+Semi+Condensed:wght@500;600&family=Karla&family=Nosifer&family=Orbitron:wght@400;800&family=Playfair+Display:ital@0;1&display=swap" rel="stylesheet">
            <link rel="stylesheet" href="css/style.css">
            <link rel="stylesheet" href="css/style_home.css">
        </head>
    <body>
        <h1 class="main-heading">DREAMS AND BRUSHSTROKES</h1>
        <header>
            <img class="logo" src="img/logo-1.jpg" alt="logo">
            <nav>
                <ul class="nav_links">
                    <li><a href="login.html">Login</a></li>
                    <li><a href="home.html">Home</a></li>
                    <li><a href="about.html">About</a></li>
                    <li><a href="contact.html">Contact</a></li>
                </ul>
            </nav>
            <a class="cta" href="logout.php"><button>Logout</button></a>
            <a href="load_cart.html">Cart</a>
        </header>

        <div id="art" class="nav-menu-inner">	
            <hr>
            <nav class="main-navigation" aria-label="Primary navigation">
                <ul id="menu-categories" class="primary-navigation">
                    <li class="menu_children"><a href="">Artworks</a>
                        <ul class="sub-menu">
                            <li class="sub-menu-item"><a href="#abstract">ABSTRACT</a></li>
                            <li class="sub-menu-item"><a href="#calligraphy">Calligraphy</a></li>
                            <li class="sub-menu-item"><a href="#landscape">LANDSCAPE</a></li>
                            <li class="sub-menu-item"><a href="#drawing">Drawings</a></li>
                            <li class="sub-menu-item"><a href="#photography">Photography</a></li>
                            <li class="sub-menu-item"><a href="#ceramic">Ceramic Paintings</a></li>
                            <li class="sub-menu-item"><a href="#still">Still Life</a></li>
                        </ul>
                    </li>
                    <li class="menu_children"><a href="">Home Decor</a>
                        <ul class="sub-menu">
                            <li class="sub-menu-item"><a href="">Tableware</a></li>
                            <li class="sub-menu-item"><a href="#ceramic">Pots and Vases</a></li>
                            <li class="sub-menu-item"><a href="">Ornaments</a></li>
                        </ul>
                    </li>
                    <li class="menu_children"><a href="">Special Occasions</a>
                        <ul class="sub-menu">
                            <li class="sub-menu-item"><a href="">Card and Envelopes</a></li>
                            <li class="sub-menu-item"><a href="">Gift Wraps and Boxes</a></li>
                            <li class="sub-menu-item"><a href="">Wedding Essentials</a></li>
                        </ul>
                    </li>
                    <li class="menu_children"><a href="">Accessories</a>
                        <ul class="sub-menu">
                            <li class="sub-menu-item"><a href="">Fashion</a></li>
                            <li class="sub-menu-item"><a href="">Keychains</a></li>
                            <li class="sub-menu-item"><a href="">Notebooks</a></li>
                            <li class="sub-menu-item""><a href="">Misc</a></li>
                        </ul>
                    </li>
                </ul>				
            </nav>
            <hr> 
		</div>
        <div class="container" style="background-image:url('img/image_1.jpg')">
            <h1>ART GALLERY</h1><br>
        </div>
        <div class="">
            <h1 id="abstract" class="sub-head">ABSTRACT</h1>
            <div id="feature" class="act" style="height: auto;"> 
_END;    
            if ($result->num_rows > 0) {
                    // output data of each row
                while($row = $result->fetch_assoc()) {
                    if ($row['category'] == 'ABSTRACT') {
                        $artwork_id = $row['artwork_ID'];
                        echo "<div>";
                        echo "<img class='gImg' src='" . $row["image_url"] . "' alt='" . $row["name"] . "'>";
                        echo "<h3 class='name'>" . $row["name"] . "</h2>";
                        echo "<p class='description'>" . $row["description"] . "</p>";
                        echo "<p class='price-tag'>PKR " . $row["price"] . "</p>";
                        echo '<input type="hidden" id="quantity" value="1" min="1" placeholder="">';
                        echo '<button class="add-to-cart-btn" data-user-id="'.$user_id.'" data-artwork-id="'.$artwork_id.'" data-quantity="1">Add to Cart</button>';                        
                        echo "</div>";
                    }
                }
            }
            echo <<<_END
            </div>
        </div>
        <div class="">
            <h1 id="landscape" class="sub-head">LANDSCAPE</h1>
            <div id="feature" class="act" style="height: auto;">
        _END;  
        $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                    // output data of each row
                while($row = $result->fetch_assoc()) {
                    if ($row['category'] == 'LANDSCAPE') {
                        $artwork_id = $row['artwork_ID'];
                        echo "<div class=''>";
                        echo "<img class='gImg' src='" . $row["image_url"] . "' alt='" . $row["name"] . "'>";
                        echo "<h3 class='name'>" . $row["name"] . "</h2>";
                        echo "<p class='description'>" . $row["description"] . "</p>";
                        echo "<p class='price-tag'>PKR " . $row["price"] . "</p>";
                        echo '<input type="hidden" id="quantity" value="1" min="1" placeholder="">';
                        echo '<button class="add-to-cart-btn" data-user-id="'.$user_id.'" data-artwork-id="'.$artwork_id.'" data-quantity="1">Add to Cart</button>';                 
                        echo "</div>";
                    }
                }
            }
            echo <<<_END
            </div>
        </div>
        <div class="">
            <h1 id="calligraphy" class="sub-head">Calligraphy</h1>
            <div id="feature" class="act" style="height: auto;">
        _END;  
        $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                // output data of each row
                while($row = $result->fetch_assoc()) {
                    if ($row['category'] == 'Calligraphy') {
                        $artwork_id = $row['artwork_ID'];
                        echo "<div class=''>";
                        echo "<img class='gImg' src='" . $row["image_url"] . "' alt='" . $row["name"] . "'>";
                        echo "<h3 class='name'>" . $row["name"] . "</h2>";
                        echo "<p class='description'>" . $row["description"] . "</p>";
                        echo "<p class='price-tag'>PKR " . $row["price"] . "</p>";
                        echo '<input type="hidden" id="quantity" value="1" min="1" placeholder="">';
                        echo '<button class="add-to-cart-btn" data-user-id="'.$user_id.'" data-artwork-id="'.$artwork_id.'" data-quantity="1">Add to Cart</button>';                        
                        echo "</div>";
                    }
                }
            }
            echo <<<_END
            </div>
        </div>
        <div class="">
            <h1 id="drawing" class="sub-head">Drawing</h1>
            <div id="feature" class="act" style="height: auto;">
        _END;  
        $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                // output data of each row
                while($row = $result->fetch_assoc()) {  
                    if ($row['category'] == 'Drawing') {
                        $artwork_id = $row['artwork_ID'];
                        echo "<div class=''>";
                        echo "<img class='gImg' src='" . $row["image_url"] . "' alt='" . $row["name"] . "'>";
                        echo "<h3 class='name'>" . $row["name"] . "</h2>";
                        echo "<p class='description'>" . $row["description"] . "</p>";
                        echo "<p class='price-tag'>PKR " . $row["price"] . "</p>";
                        echo '<input type="hidden" id="quantity" value="1" min="1" placeholder="">';
                        echo '<button class="add-to-cart-btn" data-user-id="'.$user_id.'" data-artwork-id="'.$artwork_id.'" data-quantity="1">Add to Cart</button>';                        
                        echo "</div>";
                    }
                }
            }
            echo <<<_END
            </div>
        </div>
        <div class="">
            <h1 id="photography" class="sub-head">Nature Photography</h1>
            <div id="feature" class="act" style="height: auto;">
        _END;    
        $result = $conn->query($sql);
            if ($result->num_rows > 0) {
            // output data of each row
                while($row = $result->fetch_assoc()) {
                    if ($row['category'] == 'Nature Photography') {
                        $artwork_id = $row['artwork_ID'];
                        echo "<div class=''>";
                        echo "<img class='gImg' src='" . $row["image_url"] . "' alt='" . $row["name"] . "'>";
                        echo "<h3 class='name'>" . $row["name"] . "</h2>";
                        echo "<p class='description'>" . $row["description"] . "</p>";
                        echo "<p class='price-tag'>PKR " . $row["price"] . "</p>";
                        echo '<input type="hidden" id="quantity" value="1" min="1" placeholder="">';
                        echo '<button class="add-to-cart-btn" data-user-id="'.$user_id.'" data-artwork-id="'.$artwork_id.'" data-quantity="1">Add to Cart</button>';                        
                        echo "</div>";
                    }
                }
            }
            echo <<<_END
            </div>
        </div>
        <div class="">
            <h1 id="ceramic" class="sub-head">CERAMIC</h1>
            <div id="feature" class="act">
        _END;   
        $result = $conn->query($sql);
            if ($result->num_rows > 0) {
            // output data of each row
                while($row = $result->fetch_assoc()) {
                    if ($row['category'] == 'CERAMIC') {
                        $artwork_id = $row['artwork_ID'];
                        echo "<div class=''>";
                        echo "<img class='gImg' src='" . $row["image_url"] . "' alt='" . $row["name"] . "'>";
                        echo "<h3 class='name'>" . $row["name"] . "</h2>";
                        echo "<p class='description'>" . $row["description"] . "</p>";
                        echo "<p class='price-tag'>PKR " . $row["price"] . "</p>";
                        echo '<input type="hidden" id="quantity" value="1" min="1" placeholder="">';
                        echo '<button class="add-to-cart-btn" data-user-id="'.$user_id.'" data-artwork-id="'.$artwork_id.'" data-quantity="1">Add to Cart</button>';                        
                        echo "</div>";
                    }
                }
            }
            echo <<<_END
            </div>
        </div>
        <div class="">
            <h1 id="still" class="sub-head">Still Life</h1>
            <div id="feature" class="act" style="height: auto;">
        _END;   
        $result = $conn->query($sql);
            if ($result->num_rows > 0) {
            // output data of each row
                while($row = $result->fetch_assoc()) {
                    if ($row['category'] == 'Still Life') {
                        $artwork_id = $row['artwork_ID'];
                        echo "<div class=''>";
                        echo "<img class='gImg' src='" . $row["image_url"] . "' alt='" . $row["name"] . "'>";
                        echo "<h3 class='name'>" . $row["name"] . "</h2>";
                        echo "<p class='description'>" . $row["description"] . "</p>";
                        echo "<p class='price-tag'>PKR " . $row["price"] . "</p>";
                        echo '<input type="hidden" id="quantity" value="1" min="1" placeholder="">';
                        echo '<button class="add-to-cart-btn" data-user-id="'.$user_id.'" data-artwork-id="'.$artwork_id.'" data-quantity="1">Add to Cart</button>';                        
                        echo "</div>";
                    }
                }
            }
            else {
                echo "0 results";
            }
echo <<<_END
            </div>
        </div>
        </form>
        <div id="art-advisor" class="act" style="height:500px">
            <div>
                <img src="img/exhi.jpg"  class="sub-art-advisor" style="width: 700px; height: 500px;">
            </div>
            <div>
                <h3 class="sub-art-advisor">UPCOMING ART EXHIBITION</h3>
                <p  class="sub-art-advisor">“Art exhibitions are vital tools for artists at any level. They allow you to get 
                    your work out of your studio and in front of an audience who can see and appreciate it.
                     Exhibitions are often an excellent opportunity to connect with an audience and sell pieces of artwork.”</p>
                <p>Mon - Sat 11:30am - 8:30pm</p>
                <p class="description">(31st DEC, 2023), F-44/1 Block 4, Izmir(E-street),
                    Lahore, Pakistan.</p>
            </div>
        </div>

        <footer class="act">
            <div>
                <img src="img/logo-1.jpg" class="logo">
                <h1 class="main-heading">ART GALLERY</h1>
                <h4 class="description">Skills find their canvases and paints to grow.</h4>
            </div>
            <div id="info-footer">
                <h2>Contact</h2>
                <ul style="list-style: none;">
                    <li><a href="login.html">d&b_art@gamil.com</a></li>
                    <li>+923253698331</li>
                    <li>+923253698331</li>
                    <li><a href="contact.html">contact@d&b_art.com</a></li>
                </ul>
                <h2>Our Address</h2>
                <p>F-44/1 Block 4, Izmir(E-street),
                    lahore, Pakistan.</p>
                <h2>Our Location</h2>
                <p>Mon - Sat 11:30am - 8:30pm</p>
            </div>
            <div class="nav-menu-account-action">
                <fieldset>
                    <legend>Contact details</details></legend>
                    <legend>Email:<br />
                    <input class="input-feild" type="email" name="email" /></legend><br />
                    <legend>Mobile:<br />
                    <input class="input-feild" type="tel" name="mobile" /></legend><br />
                    <legend>Message:<br />
                    <textarea class="input-feild" type="text" name="message"></textarea></legend><br />
                </fieldset>
                <a href="login.html">Login / Register</a>
            </div>
        </footer>
        <p>All Rights Reserved. No Part of this Website may be reproduced,
            stored in a retrieval system,or transmitted in any form by any means,
             electronic, mechanical, or otherwise, without obtaining the written permission.</p>

        <script>
        function loadCart(user_id) {
            // Perform an AJAX request to load_cart.php
            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    // Insert the response from the PHP file into the HTML element with the id 'cart'
                    document.getElementById("cart").innerHTML = this.responseText;
                }
            };
            xhttp.open("POST", "load_cart.php", true);
            xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xhttp.send("user_id=" + user_id);
        }

        document.body.addEventListener("click", function(event) {
            if (event.target.classList.contains("add-to-cart-btn")) {
                event.preventDefault();
                var user_id = event.target.getAttribute("data-user-id");
                var artwork_id = event.target.getAttribute("data-artwork-id");
                var quantity = document.getElementById("quantity").value;
                
                // Perform an AJAX request to add_to_cart.php
                var xhttp = new XMLHttpRequest();
                xhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                        // Show the response from the PHP file
                        alert(this.responseText);
                        
                        // Reload the cart after the item has been added
                        loadCart(user_id);
                    }
                };
                xhttp.open("POST", "add_to_cart.php", true);
                xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                xhttp.send("user_id=" + user_id + "&artwork_id=" + artwork_id + "&quantity=" + quantity);
            }
        });

        </script>
    </body>
    </html>
_END;

$conn->close();
?>