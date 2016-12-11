<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <title>Online Public Access Catalog </title>
    <meta name="description" content="Online Public Access Catalog project"/>
    <meta name="keywords" content="Online Public Access Catalog project"/>
    <meta http-equiv="imagetoolbar" content="no"/>
    <link href="/css/core.css" rel="stylesheet" type="text/css"/>
</head>
<body>
<div id="header">
    <div id="header_in">
        <h5><a href="/library/?page=checkout">Library Management System</a></h5>
        <?php
        if (Login::isLogged(Login::$_login_lms)) {
            echo '<div id="logged_as">Logged in as <strong>';
            echo Login::getFullNameLMS(Session::getSession(Login::$_login_lms));
            echo ' </strong> | <a href="/library/?page=logout">Logout</a>';
            echo '</div>';
        } else {
            echo '<div id="logged_as"><a href="/library/">Login</a></div>';
        }
        ?>
    </div>
</div>
<div id="outer">
    <div id="wrapper">

        <div id="left">
            <?php if (Login::isLogged(Login::$_login_lms)) { ?>


                <h2>Navigation</h2>
                <div class="dev br_td">&nbsp;</div>
                <ul id="navigation">
                    <li>
                        <a href="/?page=catalogue"
                            <?php
                            echo Helper::getActive(
                                array('page' => 'checkout')
                            );
                            ?>>
                            Check Out
                        </a>
                    </li>

                </ul>
            <?php } else { ?>
                &nbsp;
            <?php } ?>
        </div>
        <div id="right">