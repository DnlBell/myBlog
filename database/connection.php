<?php
/**
 * Created by PhpStorm.
 * User: dnlbe
 * Date: 3/4/2018
 * Time: 3:36 PM
 */
include "config.php";

  class Db
  {
      private static $instance = NULL;

      private function __construct()
      {
      }

      public static function getInstance()
      {
          if (!isset(self::$instance)) {
              self::$instance = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE, DB_PORT);
              if (mysqli_connect_error()) {
                  die('Connect Error (' . mysqli_connect_errno() . ') ' . mysqli_connect_error());
                  echo 'connection failure';
              }
          }
          return self::$instance;
      }
  }