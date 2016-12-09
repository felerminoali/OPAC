<?php


Login::restrictFront();

$objReservation = new Reservation();
$reservations = $objReservation->getUserReservations(Session::getSession(Login::$_login_front));


//$objPaging = new Paging($orders, 5);
//$rows = $objPaging->getRecords();


require_once("_header.php"); ?>

<?php if (!empty($reservations)) { ?>

    <?php foreach ($reservations as $reservation) { ?>

        <table Border = "1" Cellpadding = "5" Cellspacing = "5">
            <tr>
                <th Colspan = "2" Align = "Center">Time Table</th>
            </tr>
            <tr>
                <td>Column 1</td>
                <td>Column 2</td>
            </tr>
        </table>

        <br/>

    <?php } ?>

<?php } else {
    echo 'There no reservations';
} ?>

<?php require_once("_footer.php"); ?>
