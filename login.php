<?php
session_start();
if (isset($_SESSION['unique_id'])) {
  header("location: users.php");
}
?>

<?php include_once "header.php"; ?>

<body>
  <div class="wrapper">
    <section class="form login">
      <div class="text-center">
        <img src="public/images/static/chat-hub-logo.png" alt="" class="w-25 logo">
        <!-- <h2>Chat Hub</h2> -->
        <h1 class="my-3"><b>Sign in</b></h1>
      </div>
      <form action="#" method="POST" enctype="multipart/form-data" autocomplete="off">
        <div class="error-msg"></div>
        <div class="field input">
          <!-- <label>Email Address</label> -->
          <input type="text" name="email" placeholder="Email" required>
        </div>
        <div class="field input">
          <!-- <label>Password</label> -->
          <input type="password" name="password" placeholder="Password" required>
          <i class="fas fa-eye"></i>
        </div>
        <div class="field button">
          <input type="submit" name="submit" value="Proceed to Chat">
        </div>
      </form>
      <div class="link">Not yet signed up? <a href="index.php"><i class="fa-solid fa-pen-to-square mr-2"></i>Sign up now </a></div>
    </section>
  </div>

  <script src="public/js/pass-show-hide.js"></script>
  <script src="public/js/login.js"></script>

</body>

</html>