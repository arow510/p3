@extends('welcome')
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

/// Div Section

<div class="output">
    <p>Tip: $<?php

    if (isset($_POST['subtotal']))

        $subtotal = (int)$_POST['subtotal'];
        $percentage = round(15 / 100, 2);
        if (hasValidPercentage()) {
          $percentage = round((int)$_POST['percentage'] / 100, 2);
        } else { // custom percentage

      if (isset($_POST['custom-percentage']))

          $percentage = round((int)$_POST['custom-percentage'] / 100, 2);
        }
        if (isset($_POST['$subtotal']))

        $tip = round($subtotal * $percentage, 2);

        if (isset($_POST['$tip']))

        print $tip ."->".number_format($tip);
      ?>
    </p>
    <p>Total: $<?php

    if (isset($_POST['$subtotal']))


        $total = round($subtotal + $tip, 2);

        if (isset($_POST['$total']))


        print  $total ."->".number_format($total);
      ?>
    </p>
    <div class="split-output">
      <p>Tip each: $<?php

      if (isset($_POST['$split']))

          $split = (int)$_POST['split'];

          if (isset($_POST['$tip']))

          if (isset($_POST['$tipEach']))

          $tipEach = round($tip / $split, 2);

        if (isset($_POST['$tipEach']))


          print  $tipEach ."->".number_format($tipEach);
        ?>
      </p>
      <p>Total each: $<?php

      if (isset($_POST['$totalEach']))


          $totalEach = round($total / $split, 2);

       if (isset($_POST['$totalEach']))

          print  $totalEach ."->".number_format($totalEach);
        ?>
      </p>
    </div>
  </div>
  </div>
