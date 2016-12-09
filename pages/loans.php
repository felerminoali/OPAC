<?php
Login::restrictFront();

$objBorrow = new Borrow();

$loans = $objBorrow->getBorrowByUser(Session::getSession(Login::$_login_front));

require_once ("_header.php"); ?>

<h1>Current Loans</h1>

<?php if (!empty($loans)) { ?>


    <div>

        <table cellpadding="0" cellspacing="0" border="0" class="tbl_insert">


            <tr>
                <th></th>
                <th>Item</th>
                <th>Loan Date</th>
                <th>Due Date</th>
                <th>Renew</th>
            </tr>

            <?php foreach ($loans as $loan){ ?>
            <tr>
                <td>
                    <input type="checkbox" name="loan_items" id="<?php echo $loan['id'].'_'.$loan['item'];?>">
                </td>
                <td>
                    <?php echo $loan['loandate'];?>
                </td>
                <td>
                    <?php echo $loan['duedate'];?>
                </td>
                <td>
                    <div class="sbm sbm_blue fl_r">
                        <a href="#" class="btn">Renew</a>
                    </div>
                </td>
            </tr>
        
        <?php } ?>
        </table>


    </div>
        
        
<?php }else{
    echo "<p>No loan found</p>";
} ?>


<?php require_once ("_footer.php"); ?>