<?php
include('config.php');

$db->query("CREATE TABLE IF NOT EXISTS `tokens` (
`id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `app_id` int(11) NOT NULL,
  `token` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;");