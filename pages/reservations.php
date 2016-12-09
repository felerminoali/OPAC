<?php


Login::restrictFront();

$objReservation = new Reservation();
$reservations = $objReservation->getUserReservations(Session::getSession(Login::$_login_front));


//$objPaging = new Paging($orders, 5);
//$rows = $objPaging->getRecords();


require_once("_header.php"); ?>

<?php if (!empty($reservations)) { ?>

    <?php foreach ($reservations as $reservation) { ?>

        <!--        <table Border = "1" Cellpadding = "5" Cellspacing = "5">-->
        <table cellpadding="0" cellspacing="0" border="0" class="tbl_repeat">
            <tr>
                <th Colspan="3" Align="Center">Time Table</th>
            </tr>
            <tr>
                <th>Mon</th>
                <th>Tue</th>
            </tr>
            <tr>
                <td class="ta_r">Column 1</td>
                <td class="ta_r">Column 2</td>
                <td class="ta_r">Column 2</td>
            </tr>
        </table>

        <br/>

    <?php } ?>

<?php } else {
    echo 'There no reservations';
} ?>

<?php require_once("_footer.php"); ?>
