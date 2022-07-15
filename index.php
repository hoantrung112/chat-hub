<?php
session_start();
if (isset($_SESSION['unique_id'])) {
  header("location: users.php");
}
?>

<?php include_once "header.php"; ?>

<body>
  <div class="wrapper">
    <section class="form signup">
      <div class="text-center">
        <img src="public/images/static/chat-hub-logo.png" alt="" class="w-25">
        <h1 class="my-3"><b>Sign up</b></h1>
      </div>
      <form action="#" method="POST" enctype="multipart/form-data" autocomplete="on">
        <div class="error-msg"></div>
        <div class="name-details">
          <div class="field input">
            <!-- <label>First Name</label> -->
            <input type="text" name="fname" placeholder="First name" required>
          </div>
          <div class="field input">
            <!-- <label>Last Name</label> -->
            <input type="text" name="lname" placeholder="Last name" required>
          </div>
        </div>
        <div class="field input">
          <!-- <label>Email Address</label> -->
          <input type="text" name="email" placeholder="Email" required>
        </div>
        <div class="field input">
          <!-- <label>Password</label> -->
          <input type="password" name="password" placeholder="Password" required>
          <i class="fas fa-eye "></i>
        </div>
        <div class="field image">
          <label class="my-2"><span class="fa-solid fa-upload mr-2"></span>Select avatar</label>
          <input type="file" name="image" accept="image/x-png,image/gif,image/jpeg,image/jpg" required>
        </div>
        <div class="field button">
          <input type="submit" name="submit" value="Proceed to chat">
        </div>
      </form>
      <div class="link">Already signed up? <a href="login.php"><i class="fas fa-sign-in-alt mr-2"></i>Log in now</a></div>
    </section>
  </div>

  <script src="public/js/pass-show-hide.js"></script>
  <script src="public/js/signup.js"></script>

</body>

</html>