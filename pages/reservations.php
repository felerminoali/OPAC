<?php


Login::restrictFront();

$objReservation = new Reservation();
$reservations = $objReservation->getUserReservations(Session::getSession(Login::$_login_front));

$objCatalogue = new Catalogue();


require_once("_header.php"); ?>

<h1>Reservation History</h1>

<?php if (!empty($reservations)) { ?>

    <?php foreach ($reservations as $reservation) { ?>

        <table cellpadding="0" cellspacing="0" border="0" class="tbl_repeat">
            <tr>
                <th colspan="5" class="ta_c">
                    <h4>
                        <strong>
                            <a href="/?page=reservation&amp;id=<?php echo $reservation['id']; ?>"">
                            Reservation ID: <?php echo $reservation['id']; ?>
                            </a>
                        </strong>
                    </h4>
                </th>
            </tr>
            <tr>
                <th>Item</th>
                <th class="ta_r">Category</th>
                <th class="ta_r col_15">Estimation waiting days</th>
                <th class="ta_r col_15">Estimation collect date</th>
                <th class="ta_r col_15">Status</th>
            </tr>

            <?php


            $items = $objReservation->getItemByReservation($reservation['id']);

            foreach ($items as $item_res) {
                $item = $objCatalogue->getItem($item_res['item'])
                ?>
                <tr>
                    <td>
                        <a href="/?page=catalogue-item&amp;id=<?php echo $item['id']; ?>">
                            <?php echo Helper::encodeHTML($item['title']); ?>
                        </a>
                    </td>
                    <td class="ta_r">
                        <?php
                        $cat = $objCatalogue->getCategory($item['category']);
                        echo Helper::encodeHTML($cat['name']);
                        ?>
                    </td>
                    <td class="ta_r">

                        <?php

                        $objRBR = new ReservationBussinessRule();

                        $user = Session::getSession(Login::$_login_front);

                        echo $objRBR->get_total_waiting_day($item['id'], $cat['loanPeriod'], $user);
                        ?>

                    </td>
                    <td class="ta_r">
                        <?php


                        echo $objRBR->get_pick_up_date($item['id'], $cat['loanPeriod'], $user);
                        ?>

                    </td>
                    <?php 
                    /*  Status:
                     *    1. On Waiting
                     *    2. Ready for Pick up
                     * */
                    ?>
                    <td class="ta_r">
                        <?php
                            echo ($item_res['readyForPickUp'] == 1) ? "Ready for pickup" : "On Waiting";
                        ?>

                    </td>
                </tr>

            <?php } ?>
        </table>

        <br/>
        <br/>

    <?php } ?>

    <div class="fl_l">
        <a href="javascript:history.go(-1)">Go back</a>
    </div>

<?php } else {
    echo 'There no reservations';
} ?>

<?php require_once("_footer.php"); ?>
