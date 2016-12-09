<?php
/**
 * Created by PhpStorm.
 * User: feler
 * Date: 12/9/2016
 * Time: 4:35 PM
 */

Login::restrictFront();


$objSForm = new SForm();

require_once ("_header.php");
?>


<h1>Place reservation</h1>


<form action="">

    <table cellpadding="0" cellspacing="0" border="0" class="tbl_insert">



        <?php
        $objLibrary = new Library();
        $libraries = $objLibrary->getlibraries();
        if (!empty($libraries)) {
            ?>
            <tr>
                <th><label for="library">Pickup Location: * </label></th>
                <td>
                    <?php  echo $objSForm->getLibrariesSelect($libraries, null, false); ?>
                </td>
            </tr>
        <?php } ?>

        <tr>
            <th>
                <label for="notes">Notes: </label>
            </th>
            <td>
<!--                <input type="text" name="notes" id="notes" class="fld" value="--><?php //echo $objForm->stickyText('notes'); ?><!--"/>-->
                <input type="text" name="notes" id="notes" class="fld" value=""/>
                
            </td>
        </tr>

        </table>
</form>

<?php require_once ("_footer.php"); ?>
