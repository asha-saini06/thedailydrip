<?php

$db_name = 'mysql:host=localhost;dbname=contact_db';
$username = 'root';
$password = '';

$conn = new PDO($db_name, $username, $password);

if (isset($_POST['send'])) {

  $name = $_POST['name'];
  $name = filter_var($name, FILTER_SANITIZE_STRING);
  $number = $_POST['number'];
  $number = filter_var($number, FILTER_SANITIZE_STRING);
  $guests = $_POST['guests'];
  $guests = filter_var($guests, FILTER_SANITIZE_STRING);


  $select_contact = $conn->prepare("SELECT * FROM `contact_form` WHERE name = ? AND number = ? AND guests = ? ");
  $select_contact->execute([$name, $number, $guests]);

  if ($select_contact->rowCount() > 0) {
    $message[] = 'meassage sent already.';
  } else {
    $insert_contact = $conn->prepare("INSERT INTO `contact_form`(name,number,guests) VALUES(?,?,?)");
    $insert_contact->execute([$name, $number, $guests]);
    $message[] = 'meassage sent successfully!';
  }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>The Daily Drip</title>

  <!-- font awesome cdn link  -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />

  <!-- custom css file link  -->
  <link rel="stylesheet" href="css/style.css" />
</head>

<body>

  <?php

  if (isset($message)) {
    foreach ($message as $message) {
      echo '
        <div class="message">
          <span>' . $message . '</span>
          <i class="fas fa-times" onclick="this.parentElement.remove();"></i>
        </div>
      ';
    }
  }

  ?>

  <!-- header section starts -->
  <header class="header">
    <section class="flex">
      <a href="#home" class="logo"><img src="images/Coffee_logo.png" alt="" /></a>

      <nav class="navbar">
        <a href="#home">home</a>
        <a href="#about">about</a>
        <a href="#menu">menu</a>
        <a href="#gallery">gallery</a>
        <a href="#team">team</a>
        <a href="#contact">contact</a>
      </nav>

      <div id="menu-btn" class="fas fa-bars"></div>
    </section>
  </header>
  <!-- header section ends -->

  <!-- home section starts  -->
  <div class="home-bg">
    <section class="home" id="home">
      <div class="content">
        <h3>the daily drip</h3>
        <p>
          Lorem ipsum dolor sit amet consectetur adipisicing elit. Repellat
          architecto similique nam ab exercitationem fuga?
        </p>
        <a href="#about" class="btn">about us</a>
      </div>
    </section>
  </div>
  <!-- home section ends  -->

  <!-- about section starts  -->
  <section class="about" id="about">
    <div class="image">
      <img src="./images/Hot beverage-bro.png" alt="" />
    </div>

    <div class="content">
      <h3>Today's good mood is sponsored by coffee.</h3>
      <p>
        Lorem ipsum dolor, sit amet consectetur adipisicing elit. Quos quidem
        perspiciatis temporibus corrupti ea aut id in nemo nam earum
        voluptates veritatis, sit quibusdam? Accusantium enim exercitationem
        consequatur optio ipsum.
      </p>
      <a href="#menu" class="btn">our menu</a>
    </div>
  </section>
  <!-- about section ends  -->

  <!-- facilities section starts  -->
  <section class="facility">
    <div class="heading">
      <img class="divider" src="images/divider-cup.png" alt="" />
      <h3>our facility</h3>
    </div>

    <div class="box-container">
      <div class="box">
        <img src="images/coffee-cup.png" alt="" />
        <h3>varieties of coffees</h3>
        <p>
          Lorem ipsum dolor sit amet consectetur adipisicing elit. Dicta,
          laudantium?
        </p>
      </div>

      <div class="box">
        <img src="images/coffee-beans.png" alt="" />
        <h3>Coffee beans</h3>
        <p>
          Lorem ipsum dolor sit amet consectetur adipisicing elit. Dicta,
          laudantium?
        </p>
      </div>

      <div class="box">
        <img src="images/crossiant.png" alt="" />
        <h3>breakfast and sweets</h3>
        <p>
          Lorem ipsum dolor sit amet consectetur adipisicing elit. Dicta,
          laudantium?
        </p>
      </div>

      <div class="box">
        <img src="images/coffee-to-go.png" alt="" />
        <h3>Ready to go coffee</h3>
        <p>
          Lorem ipsum dolor sit amet consectetur adipisicing elit. Dicta,
          laudantium?
        </p>
      </div>
    </div>
  </section>
  <!-- facilities section ends   -->

  <!-- menu section starts  -->
  <section class="menu" id="menu">
    <div class="heading">
      <img class="divider" src="images/divider-cup.png" alt="" />
      <h3>popular menu</h3>
    </div>

    <div class="box-container">
      <div class="box">
        <img src="./images/menu-1.png" alt="" />
        <h3>Love you coffee</h3>
      </div>

      <div class="box">
        <img src="./images/menu-2.png" alt="" />
        <h3>cappucino</h3>
      </div>

      <div class="box">
        <img src="./images/menu-3.png" alt="" />
        <h3>mocha coffee</h3>
      </div>

      <div class="box">
        <img src="./images/menu-4.png" alt="" />
        <h3>frappucino</h3>
      </div>

      <div class="box">
        <img src="./images/menu-5.png" alt="" />
        <h3>black coffee</h3>
      </div>

      <div class="box">
        <img src="./images/menu-6.png" alt="" />
        <h3>Latte</h3>
      </div>
    </div>
  </section>
  <!-- menu section ends  -->

  <!-- gallery section starts -->
  <section class="gallery" id="gallery">
    <div class="heading">
      <img class="divider" src="images/divider-cup.png" alt="" />
      <h3>our gallery</h3>
    </div>

    <div class="box-container">
      <img src="images/gallery-1.jpg" alt="" />
      <img src="images/gallery-2.jpg" alt="" />
      <img src="images/gallery-3.jpg" alt="" />
      <img src="images/gallery-4.jpg" alt="" />
      <img src="images/gallery-5.jpg" alt="" />
      <img src="images/gallery-6.jpg" alt="" />
    </div>
  </section>

  <!-- gallery section ends -->

  <!-- team section starts -->
  <section class="team" id="team">
    <div class="heading">
      <img class="divider" src="images/divider-cup.png" alt="" />
      <h3>our team</h3>
    </div>

    <div class="box-container">
      <div class="box">
        <img src="images/t1.png" alt="" />
        <h3>emily spencer</h3>
      </div>

      <div class="box">
        <img src="images/t2.png" alt="" />
        <h3>evan mason</h3>
      </div>

      <div class="box">
        <img src="images/t3.png" alt="" />
        <h3>william</h3>
      </div>

      <div class="box">
        <img src="images/t4.png" alt="" />
        <h3>Kochō Shinobu</h3>
      </div>

      <div class="box">
        <img src="images/t5.png" alt="" />
        <h3>shin bora</h3>
      </div>

      <div class="box">
        <img src="images/t6.png" alt="" />
        <h3>kim hyunbin</h3>
      </div>
    </div>
  </section>
  <!-- team section ends -->

  <!-- contact section starts -->
  <section class="contact" id="contact">
    <div class="heading">
      <img class="divider" src="images/divider-cup.png" alt="" />
      <h3>contact us</h3>
    </div>

    <div class="row">
      <div class="image">
        <img src="./images/Conversation-bro.png" alt="" />
      </div>

      <form action="" method="post">
        <h3>book a table</h3>
        <input type="text" name="name" required class="box" maxlength="20" placeholder="enter your name" />
        <input type="number" name="number" required class="box" maxlength="20" placeholder="enter your number" min="0" max="9999999999" onkeypress="if(this.value.length ==10) return false" />
        <input type="number" name="guests" required class="box" maxlength="20" placeholder="how many guests" min="0" max="99" onkeypress="if(this.value.length ==2) return false" />
        <input type="submit" name="send" value="send message" class="btn" />
      </form>
    </div>
  </section>
  <!-- contact section ends -->

  <!-- footer section starts -->
  <section class="footer">
    <div class="box-container">
      <div class="box">
        <i class="fas fa-envelope"></i>
        <h3>our email</h3>
        <p>lune@gmail.com</p>
        <p>hyacinth@phantomsynthe.com</p>
      </div>

      <div class="box">
        <i class="fas fa-clock"></i>
        <h3>opening hours</h3>
        <p>07:00AM to 09:PM</p>
      </div>

      <div class="box">
        <i class="fas fa-map-marker-alt"></i>
        <h3>Shop location</h3>
        <p>Purple Hyacinth, Phantom Synthe</p>
      </div>

      <div class="box">
        <i class="fas fa-phone"></i>
        <h3>our number</h3>
        <p>+123-456-7890</p>
        <p>+111-456-2350</p>
      </div>
    </div>

    <div class="credit">&copy; <span>2023</span> All rights reserved</div>
  </section>
  <!-- footer section starts -->

  <!-- custom js file link  -->
  <script src="js/script.js"></script>
</body>

</html>