<?php

//if (Login::isLogged(Login::$_login_front)) {
//    Helper::redirect(Login::$_dashboard_front);
//}

//
//$objForm = new Form();
//$objValid = new Validation($objForm);
//
//// login form
//if ($objForm->isPost('login_email')) {
//
//    $objAdmin = new Admin();
//
//    if($objAdmin->isUser($objForm->getPost('login_email'), $objForm->getPost('login_password'))){
//        Login::loginAdmin($objAdmin->_id, Url::getCurrentUrl());
//    }else{
//        $objValid->add2Errors('login');
//    }
//}


require_once ('_header.php')
?>

<!--<h1>Login</h1>-->
<!---->
<!--<form action="" method="post">-->
<!--    <table cellspacing="0" cellpadding="0" border="0" class="tbl_insert">-->
<!--        <tr>-->
<!--            <th><label for="login_mail">Login:</label></th>-->
<!--            <td>-->
<!--<!--                -->--><?php ////echo $objValid->validate('login'); ?>
<!--                <input type="text" name="login_email" id="login_email" class="fld" value=""/>-->
<!--            </td>-->
<!--        </tr>-->
<!--        <tr>-->
<!--            <th>-->
<!--                <label for="login_password">Password:</label>-->
<!--            </th>-->
<!--            <td>-->
<!--                <input type="password" name="login_password" id="login_password" class="fld" value=""/>-->
<!--            </td>-->
<!--        </tr>-->
<!---->
<!--        <tr>-->
<!--            <th>&nbsp;</th>-->
<!--            <td>-->
<!--                <label for="btn_login" class="sbm sbm_blue fl_l">-->
<!--                    <input type="submit" id="btn_login" class="btn" value="Login"/>-->
<!--                </label>-->
<!--            </td>-->
<!--        </tr>-->
<!--    </table>-->
<!--</form>-->
<!---->

<!--<div class='container'>-->
<!--    <div class='section friendly'>-->
<!--        <h1><strong>Heroku | Welcome to your new app!</strong></h1>-->
<!--        <div class='article'>-->
<!--            <p>Refer to the <a href="//devcenter.heroku.com/">documentation</a> if you need help deploying.</p>-->
<!--        </div>-->
<!--    </div>-->
<!--</div>-->


<?php require_once ('_footer.php')?>



