<?php
Login::restrictFront();

$objLoan = new Loan();
$objCatalog = new Catalogue();

$user = Session::getSession(Login::$_login_front);
$loans = $objLoan->getLoanByUser($user);

require_once("_header.php"); ?>

    <h1>Current Loans</h1>

<?php if (!empty($loans)) { ?>


    <div id="loan_list">

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

                        <?php
                            $objLoanBR = new LoanBussinessRule();

                        if($objLoanBR->is_renewable($loan['item'], $user)) {
                        ?>
                        <input type="checkbox" 
                               name="loan_items" 
                               id="<?php echo $loan['loan_id'] . '_' . $loan['item']. '_' . $loan['reservation']; ?>"
                               value="<?php echo $loan['loan_id']  . '_' . $loan['item']. '_' . $loan['reservation']; ?>"
                               class="case">
                            <?php } ?>
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

    </div>

<?php } else {
    echo "<p>No loan found</p>";
} ?>


<?php require_once("_footer.php"); ?>