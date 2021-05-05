<?php 
  require 'database/functions.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="styles/style.css">
  <title>Speaker Portal</title>
  <script src="modules/jquery/dist/jquery.min.js"></script>
  <script src="modules/jquery-ui-1.12.1/jquery-ui.min.js"></script>
  <script src="app.js" async></script>
</head>
<body>
  <?php require_once "components/header.php" ?>

  <main>
    <section class="container container-list">
      <ul class="list" id="list">
      <?php if (count(get_list_content()) > 0): ?>
        <?php


        $items = get_list_content();
        foreach($items as $item) {
          ?>
          <li class="list-item" id=<?php echo $item["content"] ?> value=<?php echo $item["content"] ?>>
            <p><?php echo $item["content"]; ?></p>
        </li>
          <?php
        }
        ?>
        <?php endif ?>
      </ul>

      <button class="button-submit">Save</button>
    </section>

    <?php if (isset($_GET['success'])): ?>
        <p class="message">Your list has been succesful saved.</p>
      <?php endif ?>
  </main>

  <?php require_once "components/footer.php" ?>
</body>
</html>