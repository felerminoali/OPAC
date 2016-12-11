<?php
/**
 * Created by PhpStorm.
 * User: feler
 * Date: 12/11/2016
 * Time: 5:48 PM
 */

require_once('template/_header.php');
?>

<h1>Check out:: Search</h1>

<div class='container'>
    <div class='section friendly'>
        <h1><strong>SEARCH | </strong>&nbsp;&nbsp;&nbsp;Catalog</h1>
        <div class='article'>
<form action="" method="get">
    <?php echo Url::getParams4Search(array('search'), Paging::$_key); ?>
    <table cellpadding="0" cellspacing="0" border="0" class="tbl_insert">
        <tr>
            <th><label for="search">Key Word:</label></th>
            <td>
                <input type="text" name="search" value="<?php echo stripslashes($search); ?>" class="fld">
            </td>
            <td>
                <label for="btn_add" class="sbm sbm_blue fl_l">
                    <input type="submit" id="btn_add" class="btn" value="Search">
                </label>
            </td>
        </tr>
    </table>
</form>



<?php require_once('template/_footer.php'); ?>


