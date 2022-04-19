<?php

use LDAP\Result;

    include_once('sql/config.php');
    include_once('sql/user.php');
    include_once('sql/contacts.php');


    $user = new User($conn);
    $user-> delete_contact($_GET['id']);

?>