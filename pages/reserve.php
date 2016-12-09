<?php
/**
 * Created by PhpStorm.
 * User: feler
 * Date: 12/9/2016
 * Time: 4:35 PM
 */

Login::restrictFront();


$objSForm = new SForm();
$objValid = new Validation($objSForm);
$objReservation = new Reservation();

$session = Session::getSession('basket');
$objBasket = new Basket();

$out = array();

if (!empty($session)) {
    $objCatalogue = new Catalogue();

    foreach ($session as $key => $value) {
        $out[$key] = $objCatalogue->getItem($key);
    }
}


if ($objSForm->isPost('library')) {
    
    $objValid->_expected = array(
        'user',
        'pickuplocation',
        'notes'
    );

    $objValid->_post['dateRevesed'] = Helper::setDate();
    
    if($objReservation->placeRevervation($objValid->_post, $out)){
        Helper::redirect('/?page=reserved');
    }else{
        Helper::redirect('/?page=reserve-failed');
    }
}


require_once("_header.php");
?>


<h1>Place reservation</h1>

<?php if (!empty($out)) { ?>

<form action="" method="post" id="frm_ph">

    <input type="hidden" name="user" value="<?php echo Session::getSession(Login::$_login_front); ?>">

    <table cellpadding="0" cellspacing="0" border="0" class="tbl_insert">


        <?php
        $objLibrary = new Library();
        $libraries = $objLibrary->getlibraries();
        if (!empty($libraries)) {
            ?>
            <tr>
                <th><label for="pickuplocation">Pickup Location: * </label></th>
                <td>
                    <?php echo $objSForm->getLibrariesSelect($libraries, 'pickuplocation', null, false); ?>
                </td>
            </tr>
        <?php } ?>

        <tr>
            <th>
                <label for="notes">Notes: </label>
            </th>
            <td>
                <textarea name='notes' id='notes' style="border: 1px"></textarea><br/>
            </td>
        </tr>


        <tr>
            <th>&#160;</th>
            <td>
                <label for="btn" class="sbm sbm_blue fl_l">
                    <input type="submit" id="btn"
                           class="btn" value="Submit"/>
                </label>
            </td>
        </tr>

    </table>


</form>

<?php } else{
    echo '<p>Your reservation is currently empty</p>';
}?>


<?php require_once("_footer.php"); ?>
