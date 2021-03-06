<?php
/**
 * Created by PhpStorm.
 * User: feler
 * Date: 12/9/2016
 * Time: 4:35 PM
 */

Login::restrictFront();


$objSForm = new SForm();
$objReservation = new Reservation();

$session = Session::getSession('basket');
$objBasket = new Basket();

$items = array();

if (!empty($session)) {
    $objCatalogue = new Catalogue();

    foreach ($session as $key => $value) {
        $items[$key] = $objCatalogue->getItem($key);
    }
}


if ($objSForm->isPost('pickuplocation')) {
    
    
    $reservation['user'] = $objSForm->getPost('user');
    $reservation['pickuplocation'] = $objSForm->getPost('pickuplocation');
    $comment = $objSForm->getPost('notes');
    $reservation['dateRevesed'] = Helper::setDate();
    
    if($objReservation->placeRevervation($reservation, $items, $comment)){
        Session::clear('basket');
        Helper::redirect('/?page=reserved');
    }else{
        Helper::redirect('/?page=reserve-failed');
    }
}


require_once("_header.php");
?>


<h1>Place reservation</h1>

<?php if (!empty($items)) { ?>

<form action="" method="post" id="frm_ph">

    <input type="hidden" name="user" value="<?php echo Session::getSession(Login::$_login_front); ?>">

    <table cellpadding="0" cellspacing="0" border="0" class="tbl_insert">


        <?php
        $objLibrary = new Library();
        $libraries = $objLibrary->getlibraries();
        if (!empty($libraries)) {
            ?>
            <tr>
                <th><label for="pickuplocation">Pickup Location: </label></th>
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
                <textarea name='notes' id='notes' rows="15" cols="50"></textarea><br/>
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
