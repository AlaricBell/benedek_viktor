<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="styles/style.css">
  <title>Speaker Portal</title>
</head>
<body>
  <?php require_once "components/header.php" ?>

  <main>
    <section class="container container-auth">
      <form action="database/login.php" method="POST">
        <h6>Please Sign In</h6>
        <label for="input-username">User name:</label>
        <input type="text" name="uname" id="input-username"/>
        <label for="input-password">Password:</label>
        <input type=" password" name="pwd" id="input-password"/>
        <button type="submit" name="login-submit" class="button-submit">enter</button>
      </form>
      <?php if (isset($_GET['error'])): ?>
        <p class="message">Your user name or password was incorrect.<br/> Please try it again.</p>
      <?php endif ?>
    </section>
  </main>

  <?php require_once "components/footer.php" ?>
</body>
</html>