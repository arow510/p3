
<?php require('Form.php'); ?>
<?php require('helpers.php'); ?>

<style type="text/css">


<?php




    if (isset($_POST['subtotal']) and isset($_POST['percentage']) and isset($_POST['split'])) {
      $shouldShow = true;
      function showTotal($show) {
        if ($show) {
          print '.output {
              display: block;
            }';
        }
      }
      if ((int)$_POST['subtotal'] <= 0) {
        $shouldShow = false;
        print 'p.subtotal {

            }
            input.subtotal {

            }';
      }
      if (!(hasValidPercentage() or hasValidCustomPercentage())) {
        $shouldShow = false;
        print 'p.tip-percentage {

            };';
      }
      if ((int)$_POST['split'] <= 0) {
        $shouldShow = false;
        print 'p.split {

            }
            input.split {

            }';
      }
      showTotal($shouldShow);
    }
    // Whether to show tip/total for each in split.
    if (empty($_POST['split']) or (int)$_POST['split'] <= 1) {
      print '.split-output {
              display: none;
            }';
    }
  ?>
</style>
