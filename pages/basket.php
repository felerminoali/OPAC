<?php

Login::restrictFront();

$session = Session::getSession('basket');

$objBasket = new Basket();

$out = array();

if (!empty($session)) {
    $objCatalogue = new Catalogue();

    foreach ($session as $key => $value) {
        $out[$key] = $objCatalogue->getItem($key);
    }
}

require_once('_header.php');
?>

    <h1>My Reservation</h1>

<?php if (!empty($out)) { ?>
    <div id="big_basket">

        <table cellpadding="0" cellspacing="0" border="0" class="tbl_repeat">
            <tr>
                <th>Item</th>
                <th class="ta_r">Category</th>
                <th class="ta_r col_15">Estimation waiting days</th>
                <th class="ta_r col_15">Estimation collect date</th>
                <th class="ta_r col_15">Remove</th>

            </tr>

            <?php foreach ($out as $item) { ?>
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

                        $total_waiting_day = 0;
                        $objReservation = new Reservation();
                        $queue_list = $objReservation->getResevationsByItem($item['id']);


                        if(!empty($queue_list)){
                            $no_of_waiting_days = $cat['loanPeriod'];
                            $total_waiting_day = $no_of_waiting_days * count($queue_list);
                        }

                        echo $total_waiting_day;
                        ?>

                    </td>
                    <td class="ta_r">
                        <?php

                        $objBorrow = new Borrow();
                        $borrow = $objBorrow->getBorrow($item['id']);

                        if(!empty($borrow)){
                            // Due date if this catalogue was borrowed
                            $start_date = new DateTime($borrow['duedate']);
                        }else{
                            // Current date if this catalogue was not borrowed
                            $start_date = new DateTime();
                        }

                        if($total_waiting_day !=0){
                            $start_date->modify('+ ' . $total_waiting_day . ' days');
                        }

                        echo $start_date->format('d/m/Y');

                        ?>

                    </td>
                    <td class="ta_r"><?php echo Basket::removeButton($item['id']); ?></td>
                </tr>

            <?php } ?>

        </table>

        <div class="dev br_td">&#160;</div>
        <div class="sbm sbm_blue fl_r">
            <a href="/?page=checkout" class="btn">Place Hold</a>
        </div>

        <div class="fl_l">
            <a href="javascript:history.go(-1)">Go back</a>
        </div>


    </div>
    <?php
} else { ?>
    <p>Your reservation is currently empty</p>
<?php } ?>
    <br/>
<?php require_once('_footer.php'); ?>