<?php
include "../config.php";
    /*
    Script  : PHP-PDO-JSON-mysql-googlechart
    Author  : Enam Hossain
    version : 1.0

    */

    /*
    --------------------------------------------------------------------
    Usage:
    --------------------------------------------------------------------

    Requirements: PHP, Apache and MySQL

    Installation:

      --- Create a database by using phpMyAdmin and name it "chart"
      --- Create a table by using phpMyAdmin and name it "googlechart" and make sure table has only two columns as I have used two columns. However, you can use more than 2 columns if you like but you have to change the code a little bit for that
      --- Specify column names as follows: "weekly_task" and "percentage"
      --- Insert some data into the table
      --- For the percentage column only use a number

          ---------------------------------
          example data: Table (googlechart)
          ---------------------------------

          weekly_task     percentage
          -----------     ----------

          Sleep           30
          Watching Movie  10
          job             40
          Exercise        20     


    */


    try {
      /* Establish the database connection */
      $db=config::getconnexion();

      /* select all the weekly tasks from the table googlechart */
      $result = $db->query('SELECT nom,quantite FROM equipementmed');

      /*
          ---------------------------
          example data: Table (googlechart)
          --------------------------
          weekly_task     percentage
          Sleep           30
          Watching Movie  10
          job             40
          Exercise        20       
      */



      $rows = array();
      $table = array();
      $table['cols'] = array(

        // Labels for your chart, these represent the column titles.
        /* 
            note that one column is in "string" format and another one is in "number" format 
            as pie chart only required "numbers" for calculating percentage 
            and string will be used for Slice title
        */

        array('label' => 'nom', 'type' => 'string'),
        array('label' => 'quantite', 'type' => 'number')

    );
        /* Extract the information from $result */
        foreach($result as $r) {

          $temp = array();

          // the following line will be used to slice the Pie chart

          $temp[] = array('v' => (string) $r['nom']); 

          // Values of each slice

          $temp[] = array('v' => (int) $r['quantite']); 
          $rows[] = array('c' => $temp);
        }

    $table['rows'] = $rows;

    // convert data into JSON format
    $jsonTable = json_encode($table);
    //echo $jsonTable;
    } catch(PDOException $e) {
        echo 'ERROR: ' . $e->getMessage();
    }

    ?>