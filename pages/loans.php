<?php
Login::restrictFront();

$objBorrow = new Borrow();
$objCatalog = new Catalogue();

$loans = $objBorrow->getBorrowByUser(Session::getSession(Login::$_login_front));

require_once("_header.php"); ?>

    <h1>Current Loans</h1>

<?php if (!empty($loans)) { ?>


    <table cellpadding="0" cellspacing="0" border="0" class="tbl_insert">
        <tr>
            <td >
                <div class="sbm sbm_blue fl_r">
<!--                    <a href="#" class="btn">Select All</a>-->
                    <input type="button" id="checkAll" value="Select/Unselect All ">
                </div>
            </td>
            <td >
                <div class="sbm sbm_blue fl_l renew_btn">
                    <a href="#" class="btn">Renew</a>
                </div>
            </td>
        </tr>

    </table>


    <table cellpadding="0" cellspacing="0" border="0" class="tbl_repeat">

            <tr>
                <th></th>
                <th>Item</th>
                <th class="ta_r col_15">Loan Date</th>
                <th class="ta_r col_15">Due Date</th>
            </tr>

            <?php foreach ($loans as $loan) { ?>
                <tr>
                    <td>
                        <input type="checkbox" name="loan_items" id="<?php echo $loan['id'] . '_' . $loan['item']; ?>" class="loan_item">
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


<?php require_once("_footer.php"); ?>