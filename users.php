<?php
session_start();
include_once "php/config.php";
if (!isset($_SESSION['unique_id'])) {
  header("location: login.php");
}
?>
<?php include_once "header.php"; ?>

<body>
  <div class="wrapper">
    <section class="users">
      <header>
        <div class="content">
          <?php
          $sql = mysqli_query($conn, "SELECT * FROM users WHERE unique_id = {$_SESSION['unique_id']}");
          if (mysqli_num_rows($sql) > 0) {
            $row = mysqli_fetch_assoc($sql);
          }
          ?>
          <img class="avatar" src="php/images/<?php echo $row['img']; ?>" alt="">
          <div class="details">
            <span><b><?php echo $row['fname'] . " " . $row['lname'] ?></b></span>
            <p class="text-secondary"><?php echo $row['status']; ?></p>
          </div>
        </div>
        <a href="php/logout.php?logout_id=<?php echo $row['unique_id']; ?>" class="logout">Log out &nbsp;&nbsp;<i class="fas fa-sign-out-alt"></i></a>
      </header>
      <div class="search">
        <span class="text">Whom do you wannna chat with?</span>
        <input type="text" placeholder="Enter a name to search...">
        <button><i class="fas fa-search"></i></button>
      </div>
      <div class="users-list">

      </div>
    </section>
  </div>

  <script src="public/js/users.js"></script>

</body>

</html>