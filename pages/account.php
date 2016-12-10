<?php
/**
 * Created by PhpStorm.
 * User: feler
 * Date: 12/11/2016
 * Time: 12:49 AM
 */

Login::restrictFront();

$user = Session::getSession(Login::$_login_front);

require_once ("_header.php"); ?>

<h1>My account</h1>


<?php require_once ("_footer.php"); ?>
