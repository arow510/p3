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
<?php require('calc.php'); ?>

  </head>
  <body>
  <div class="container">
    <h1 class="center">Tip Calculator</h1>
    <form method="post" action="">
      <p class="subtotal">Bill subtotal:$<input class="subtotal" type="text"  name="subtotal" size="10"
          <?php
            if (isset($_POST['subtotal'])) {
              print 'value="' . $_POST ['subtotal'] . '"';
            }
          ?>
        /></p>
      <p class="tip-percentage">Tip percentage:</p>
      <div>
        <ul>
          <?php
            $checkedValue = $defaultPercentage;
            if (!empty($_POST['percentage'])) {
              $checkedValue = (int)$_POST['percentage'];
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
            if (!empty($_POST['percentage']) and htmlspecialchars($_POST['percentage']) == CUSTOM_PERCENTAGE) {
              print ' checked="checked"';
            }
          ?>
          />Custom: <input type="text" name="custom-percentage" size="10"<?php
            if (!empty($_POST['custom-percentage'])) {
              print ' value="' . $_POST['custom-percentage'] . '"';
            }
          ?>
          />%</p>
      </div>
      <p class="split">Split: <input class="split" type="text" name="split" size="10" <?php
          if (isset($_POST['split'])) {
            print ' value="' . $_POST['split'] . '"';
          } else {
            print ' value="1"';
          }
        ?>
        /> person(s)</p>
      <div class="center">
        <p class="submit"><input type="submit" /></p>
      </div>
    </form>





  <div class="output">
      <p>Tip: $<?php
          $subtotal = (int)$_POST('subtotal');
          $percentage = round(15 / 100, 2);
          if (hasValidPercentage()) {
            $percentage = round((int)$_POST['percentage'] / 100, 2);
          } else { // custom percentage
            $percentage = round((int)$_POST['custom-percentage'] / 100, 2);
          }
          $tip = round($subtotal * $percentage, 2);
          print $tip ."->".number_format($tip);
        ?>
      </p>
      <p>Total: $<?php
          $total = round($subtotal + $tip, 2);
          print  $total ."->".number_format($total);
        ?>
      </p>
      <div class="split-output">
        <p>Tip each: $<?php
            $split = (int)$_POST['split'];
            $tipEach = round($tip / $split, 2);
            print  $tipEach ."->".number_format($tipEach);
          ?>
        </p>
        <p>Total each: $<?php
            $totalEach = round($total / $split, 2);
            print  $totalEach ."->".number_format($totalEach);
          ?>
        </p>
      </div>
    </div>
    </div>
  </body>
</html>
