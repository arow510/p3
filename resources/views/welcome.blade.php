
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Tip Calculator</title>

    <link type='text/css' rel='stylesheet' href='style.css'/>


    <?php
      define('PERCENTAGES', array(10, 15, 20));
      $defaultPercentage = 15;
      define('CUSTOM_PERCENTAGE', 'CUSTOM_PERCENTAGE');
      function hasValidPercentage() {
        return isset($_POST['percentage']) and in_array((int)$_POST['percentage'], PERCENTAGES);
      }
      function hasValidCustomPercentage() {
        return isset($_POST['percentage']) and htmlspecialchars($_POST['percentage']) == CUSTOM_PERCENTAGE
            and !empty($_POST['custom-percentage'])
            and (int)$_POST['custom-percentage'] > 0;
      }
    ?>


  </head>
  <body>


  <div class="container">
    <h1 class="center">Tip Calculator</h1>

    <form method="get" action="" >

      <p class="subtotal">Bill subtotal:$<input class="subtotal" type="text"  name="subtotal" size="10"
          <?php
            if (isset($_GET['subtotal'])) {
              print 'value="' . $_GET ['subtotal'] . '"';
            }
          ?>
        /></p>
      <p class="tip-percentage">Tip percentage:</p>
      <div>
        <ul>
          <?php
            $checkedValue = $defaultPercentage;
            if (!empty($_GET['percentage'])) {
              $checkedValue = (int)$_GET['percentage'];
            }
            foreach (PERCENTAGES as $value) {
              print '<li><input type="radio" name="percentage" value="' . $value . '"';
              if ($value == $checkedValue) {
                print ' checked="checked"';
              }
              print '> ' . $value . '%' . '</li>';
            }
          ?>
        </ul>
        <p class="custom-percentage">
          <input type="checkbox" name="percentage" <?php
            print 'value="CUSTOM_PERCENTAGE"';
            if (!empty($_GET['percentage']) and htmlspecialchars($_GET['percentage']) == CUSTOM_PERCENTAGE) {
              print ' checked="checked"';
            }
          ?>
          />Custom: <input type="text" name="custom-percentage" size="10"<?php
            if (!empty($_GET['custom-percentage'])) {
              print ' value="' . $_GET['custom-percentage'] . '"';
            }
          ?>
          />%</p>
      </div>
      <p class="split">Split: <input class="split" type="text" name="split" size="10" <?php
          if (isset($_GET['split'])) {
            print ' value="' . $_GET['split'] . '"';
          } else {
            print ' value="1"';
          }
        ?>
        /> person(s)</p>
      <div class="center">
        <p class="submit"><input type="submit" /></p>
      </div>
    </form>




  </body>
</html>
