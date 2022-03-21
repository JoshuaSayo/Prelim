<?php
  session_start();
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="description" content="This is an example of a meta description. This will often show up in search results.">
    <meta name=viewport content="width=device-width, initial-scale-1">
    <title></title>
    <link rel="stylesheet" href="style.css">
 </head>
  <body>

    <header>
    <nav>
      <a href="#">
        <img src="img/logo.png" alt="logo">
      </a>
      <ul>
        <li><a href="index.php">Home</a></li>
      </ul>
      <div class="header-login">
        <?php
          if (isset($_SESSION['userid'])) {
            echo '<form action="includes/logout.inc.php" method="post">
            <button type="submit" name="logout-submit">Logout</button>
            </form>';
          }
          else {
            echo "<div style=\"color: red;text-align:center\">";
            echo '<form action="includes/login.inc.php" method="post">
            <input type="text" name="mailuid" placeholder="Username/E-mail...">
            <input type="password" name="pwd" placeholder="Password...">
            <button type="submit" name="login-submit">Login</button>
            </form>
            
            <a href="signup.php"<center>Signup</a>';
          }
        ?>
      </div>
    </nav>
    </header>
  <script src="scripts/main.js"></script>
  </body>
</html>  

