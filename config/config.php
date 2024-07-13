<?php
return [
  'postgresDatabase' => [
    'name' => 'solati_db',
    'username' => 'root',
    'password' => '',
    'connection' => 'pgsql:host=localhost',
    'options' => [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    ],
  ],
];