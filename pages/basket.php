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

<h1>My Basket</h1>

<?php if (!empty($out)) { ?>
    <div id="big_basket">

        <form action="" method="POST" id="frm_basket">
            <table cellpadding="0" cellspacing="0" border="0" class="tbl_repeat">
                <tr>
                    <th>Item</th>
                    <th class="ta_r">Category</th>
<!--                    <th class="ta_r">Qty</th>-->
<!--                    <th class="ta_r col_15">Price</th>-->
                    <th class="ta_r col_15">Remove</th>
                    <th class="ta_r col_15">Estimation collection date</th>
                </tr>

                <?php foreach ($out as $item) { ?>
                    <tr>
                        <td><?php echo Helper::encodeHTML($item['title']); ?></td>
                        <td class="ta_r">
                            <?php
                            $cat = $objCatalogue->getCategory($item['category']);
                            echo Helper::encodeHTML($cat['name']);
                            ?>
                        </td>
                        <td><?php echo '12-11-2016'; ?></td>
<!--                        <td>-->
<!--                            <input type="text" name="qty---><?php //echo $item['id']; ?><!--"-->
<!--                                   id="qty---><?php //echo $item['id']; ?><!--" class="fld_qty"-->
<!--                                   value="--><?php //echo $session[$item['id']]['qty']; ?><!--" />-->
<!--                        </td>-->
<!--                        <td class="ta_r">&pound;--><?php //echo number_format($objBasket->itemTotal($item['price'], $session[$item['id']]['qty']), 2); ?><!--</td>-->
                        <td class="ta_r"><?php echo Basket::removeButton($item['id']); ?></td>
                    </tr>

                <?php } ?>

                </table>

                <div class="dev br_td">&#160;</div>
                <div class="sbm sbm_blue fl_r">
                    <a href="/?page=checkout" class="btn">Place Hold</a>
                </div>


            </form>
        </div>
  <?php
} else { ?>
    <p>Your basket is currently empty</p>
<?php } ?>
<?php require_once ('_footer.php'); ?>