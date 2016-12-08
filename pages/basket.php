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

require_once ('_header.php');
?>

<h1>My Reservation</h1>

<?php if (!empty($out)) { ?>
    <div id="big_basket">

            <table cellpadding="0" cellspacing="0" border="0" class="tbl_repeat">
                <tr>
                    <th>Item</th>
                    <th class="ta_r">Category</th>
                    <th class="ta_r col_15">Estimation collection date</th>
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
                        <td>

                            <?php

                            $current_date = Helper::setDate();

                            $estimation_date = date('Y-m-d-H:i:s', strtotime('+1 day', $current_date));

                            echo $current_date;

//                            echo $estimation_date;
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
<?php require_once ('_footer.php'); ?>