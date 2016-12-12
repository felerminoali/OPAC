<?php
/**
 * Created by PhpStorm.
 * User: feler
 * Date: 12/11/2016
 * Time: 5:48 PM
 */

Login::restrictLMS();

$objReservation = new Reservation();

$search = Url::getParam('search');

require_once('template/_header.php');

?>

<h1>Check out:: Search</h1>

<div class='container'>
    <div class='section friendly'>
        <h1><strong>SEARCH</h1>
        <div class='article'>
            <form action="" method="get">
                <?php echo Url::getParams4Search(array('search'), Paging::$_key); ?>
                <table cellpadding="0" cellspacing="0" border="0" class="tbl_insert">
                    <tr>
                        <th><label for="search">Borrower ID:</label></th>
                        <td>
                            <input type="text" name="search" value="<?php echo stripslashes($search); ?>"
                                   class="fld">
                        </td>
                        <td>
                            <label for="btn_add" class="sbm sbm_blue fl_l">
                                <input type="submit" id="btn_add" class="btn" value="Search">
                            </label>
                        </td>
                    </tr>
                </table>
            </form>
        </div>
    </div>
</div>

<?php

if (!empty($search)) {


    $reservation = $objReservation->getReadyReservations($search);

    $objPaging = new Paging($reservation, 5);
    $rows = $objPaging->getRecords();
    $objPaging->_url = '/library' . $objPaging->_url;

    if (!empty($rows)) {
        ?>

        <div class="paging">
            <?php echo $objPaging->getNumberFound(); ?>
        </div>

        <h1></h1>

        <table cellpadding="0" cellspacing="0" border="0" class="tbl_repeat">
            <tr>
                <th>Item</th>
                <th>Category</th>
                <th>Reservation</th>
                <th class="col_15 ta_r">Check out</th>
            </tr>

            <?php
            $objCatalog = new Catalogue();

            foreach ($rows as $row) {

                $item = $objCatalog->getItem($row['item']);
                $category = $objCatalog->getCategory($item['id']);
                ?>

            <tr>
                <td><?php echo $item['title']; ?></td>
                <td><?php echo $category['name']; ?></td>
                <td><?php echo $row['reservation'];?> </td>

                <td class="ta_r">
                    <div class="checkout_loan">
                        <a href="#" rel="<?php echo $row['reservation'].'_'.$row['item'].'_'.$row['user'];?>" id="checkout">
                            Check out
                        </a>
                    </div>
                </td>
            </tr>

            <?php } ?>

        </table>

        <?php
    } else {
        $empty = 'There are no results matching your searching criteria.';
        echo $empty;
    }
    ?>


    <?php
}
require_once('template/_footer.php'); ?>


