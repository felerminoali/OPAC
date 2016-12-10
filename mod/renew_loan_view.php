<?php
/**
 * Created by PhpStorm.
 * User: feler
 * Date: 12/10/2016
 * Time: 5:46 PM
 */

require_once('../inc/autoload.php');

$objBorrow = new Borrow();
$objCatalog = new Catalogue();

$loans = $objBorrow->getBorrowByUser(Session::getSession(Login::$_login_front));
 ?>

<?php if (!empty($loans)) { ?>


    

        <table cellpadding="0" cellspacing="0" border="0" class="tbl_insert">
            <tr>
                <td >
                    <div class="sbm sbm_blue fl_l renew_btn">
                        <a href="#" class="btn">Renew</a>
                    </div>
                </td>
            </tr>

        </table>


        <table cellpadding="0" cellspacing="0" border="0" class="tbl_repeat">

            <tr>
                <th><input type="checkbox" id="selectall"/></th>
                <th>Item</th>
                <th class="ta_r col_15">Loan Date</th>
                <th class="ta_r col_15">Due Date</th>
            </tr>

            <?php foreach ($loans as $loan) { ?>
                <tr>
                    <td>
                        <input type="checkbox"
                               name="loan_items"
                               id="<?php echo $loan['id'] . '_' . $loan['item']. '_' . $loan['reservation']; ?>"
                               value="<?php echo $loan['id'] . '_' . $loan['item']. '_' . $loan['reservation']; ?>"
                               class="case">
                    </td>

                    <td>
                        <?php
                        $item = $objCatalog->getItem($loan['item']); ?>
                        <a href="/?page=catalogue-item&amp;id=<?php echo $item['id']; ?>">
                            <?php echo Helper::encodeHTML($item['title']); ?>
                        </a>
                    </td>
                    <td class="ta_r">
                        <?php echo Helper::setDate(1, $loan['loandate']); ?>
                    </td>
                    <td class="ta_r">
                        <?php echo Helper::setDate(1, $loan['duedate']); ?>
                    </td>

                </tr>

            <?php } ?>
        </table>

    
<?php } else {
    echo "<p>No loan found</p>";
} ?>
