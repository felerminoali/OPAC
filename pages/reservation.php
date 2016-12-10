<?php
/**
 * Created by PhpStorm.
 * User: feler
 * Date: 12/10/2016
 * Time: 11:28 PM
 */


Login::restrictFront();


$id = Url::getParam('id');

if (!empty($id)) {


    $objReservation = new Reservation();
    $reservation = $objReservation->getReservation($id);

    $objCatalogue = new Catalogue();

    if (!empty($reservation)) {

        require_once('_header.php');
        ?>

        <h1>Reservation</h1>

        <table cellpadding="0" cellspacing="0" border="0" class="tbl_insert">


            <tr>

                <td>
                    <div class="fl_l">
                        <a href="javascript:history.go(-1)">Go back</a>
                    </div>
                </td>
                <td>
                    <div class="sbm sbm_blue fl_l cancel_reservation">
                        <a href="#" class="btn">Cancel</a>
                    </div>
                </td>
            </tr>
        </table>

        <table cellpadding="0" cellspacing="0" border="0" class="tbl_repeat">
            <tr>
                <th colspan="5" class="ta_c">
                    <h4>
                        <strong>
                            Reservation ID: <?php echo $reservation['id']; ?>
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

                        $total_waiting_day = 0;
                        $queue_list = $objReservation->getResevationsByItem($item['id']);


                        if (!empty($queue_list)) {
                            $no_of_waiting_days = $cat['loanPeriod'];
                            $total_waiting_day = $no_of_waiting_days * count($queue_list);
                        }

                        echo $total_waiting_day;
                        ?>

                    </td>
                    <td class="ta_r">
                        <?php

                        $objBorrow = new Loan();
                        $borrow = $objBorrow->getLoan($item['id']);

                        if (!empty($borrow)) {
                            // Due date if this catalogue was borrowed
                            $start_date = new DateTime($borrow['duedate']);
                        } else {
                            // Current date if this catalogue was not borrowed
                            $start_date = new DateTime();
                        }

                        if ($total_waiting_day != 0) {
                            $start_date->modify('+ ' . $total_waiting_day . ' days');
                        }

                        echo $start_date->format('d/m/Y');

                        ?>

                    </td>
                    <td class="ta_r">On Waiting</td>
                </tr>

            <?php } ?>
        </table>


        <br/>
        <br/>

        <h1>Feedback comments</h1>


        <table>

            <tr>
                <td>
                    <strong>Your comments</strong>
                </td>
                <td>
                    <textarea name="comments" rows="8" cols="75"></textarea>
                </td>
            </tr>

            <tr>
                <td></td>
                <td>
                    <div class="sbm sbm_blue fl_r submit_comment">
                        <a href="#" class="btn">Submit</a>
                    </div>
                </td>
            </tr>


            <?php

            $feedback_comments = $objReservation->getCommentsByReservation($reservation['id']);
            
            var_dump($feedback_comments);

            if (!empty($feedback_comments)) {

                foreach ($feedback_comments as $comment) {
                    ?>
                    <tr>
                        <td colspan="2">
                            <p><?php echo $comment['comment']; ?></p>
                        </td>
                    </tr>

                <?php }
            } ?>


        </table>

        <?php
        require_once('_footer.php');
    } else {
        require_once('error.php');
    }
} else {
    require_once('error.php');
} ?>