<?php
// auto-generated by sfDatabaseConfigHandler
// date: 2007/03/13 21:34:40

$database = new sfPropelDatabase();
$database->initialize(array (
  'dsn' => 'pgsql://postgres:postgres@localhost/IABIM?schema=SIMA_USER',
), 'sima_user');
$this->databases['sima_user'] = $database;

$database = new sfPropelDatabase();
$database->initialize(array (
  'dsn' => 'pgsql://postgres:postgres@localhost/IABIM?schema=SIMA002',
), 'propel');
$this->databases['propel'] = $database;
