<?php
/**
 * Created by PhpStorm.
 * User: feler
 * Date: 12/4/2016
 * Time: 8:26 PM
 */

Login::restrictFront();


$objCatalogue = new Catalogue();

$rows = $objCatalogue->getItems();
$total_records = count($rows);

$objPaging = new Paging($rows, 6);
$rows = $objPaging->getRecords();


require_once("_header.php");
?>


    <div class='container'>
        <div class='section friendly'>
            <h1><strong>SEARCH | </strong>&nbsp;&nbsp;&nbsp;Catalogues</h1>
            <div class='article'>

                <form action="" method="get">
                    <table cellpadding="0" cellspacing="0" border="0" class="tbl_insert">
                        <tr>
                            <th><label for="search">Library catalogue:</label></th>
                            <td>
                                <input type="text" name="search" value="" class="fld">
                            </td>
                            <td>
                                <label for="btn_add" class="sbm sbm_blue fl_l">
                                    <input type="submit" id="btn_add" class="btn" value="Search">
                                </label>
                            </td>
                        </tr>


                        <?php
                        $objLibrary = new Library();
                        $libraries = $objLibrary->getlibraries();
                        if (!empty($libraries)) {
                            ?>
                            <tr>
                                <th><label for="library">Library:</label></th>
                                <td>
                                    <?php
                                    $out = "<select name=\"library\" id=\"library\" class=\"sel\">";
                                    $out .= "<option value=\"\">All libraries&hellip;</option>";
                                    foreach ($libraries as $library) {
                                        $out .= "<option value=\"";
                                        $out .= $library['id'];
                                        $out .= "\"";
                                        $out .= ">";
                                        $out .= $library['name'];
                                        $out .= "</option>";
                                    }
                                    $out .= "</select>";
                                    echo $out;
                                    ?>
                                </td>
                            </tr>
                        <?php } ?>

                    </table>


                    <?php

                    $categories = $objCatalogue->getCategories();

                    if (!empty($categories)) {
                        ?>

                        <ul id="filters">
                            <?php foreach ($categories as $category) { ?>
                                <li>
                                    <input type="checkbox" name="filterCat"
                                           id="cat_<?php echo $category['id'];?>"
                                           value="cat_<?php echo $category['id'];?>"
                                    />
                                    <span><?php echo $category['name'];?></span>
                                </li>
                            <?php } ?>
                        </ul>

                    <?php } ?>

                </form>

            </div>
        </div>
    </div>

    


<!--    <div class="catalogue_wrapper">-->
<!--        <div class="catalogue_wrapper_left">-->
<!---->
<!--            <a href="/?page=catalogue-item&amp;category=3&amp;id=31">-->
<!--                <img src="media/catalogue/unavailable.png" alt="Drum" width="120"/>-->
<!--            </a>-->
<!--        </div>-->
<!--        <div class="catalogue_wrapper_right">-->
<!--            <h4>-->
<!--                <a href="/?page=catalogue-item&amp;category=3&amp;id=31"></a>-->
<!--                Drum </h4>-->
<!--            <h4>-->
<!--                Price: &pound145.00;-->
<!--            </h4>-->
<!--            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the-->
<!--                industry&#039;s standard dummy text ever since&hellip;</p>-->
<!--            <p><a href="#" class="add_to_basket" rel="31_1">Add to basket</a></p>-->
<!--        </div>-->
<!--    </div>-->
<!---->
<!---->
<!---->
<!---->
<!---->
<!--    <ul class="paging">-->
<!--        <li><span>First</span></li>-->
<!--        <li><span>Previous</span></li>-->
<!--        <li><a href="/?page=catalogue&category=3&amp;pg=2">Next</a></li>-->
<!--        <li><span>Last</span>-->
<!--        <li>-->
<!--    </ul>-->
<!---->
<!---->
<!--    </div>-->
<!--    <div class="cl">&#160;</div>-->



<?php
if (!empty($rows)) {
    ?>

    <div class="paging">
        <p>Your search found <strong><?php count($total_records)?></strong> records. Displaying records <strong>1</strong> to
            <strong>10</strong>.</p>
    </div>

    <h1></h1>
    
    <?php
    
    foreach ($rows as $row) {
        ?>
        <div class="catalogue_wrapper">
            <div class="catalogue_wrapper_left">
                <?php

                $item_cat = $objCatalogue->getCategory($row['category']);

                $image = !empty($row['image']) ?
                    $objCatalogue->_path . $row['image'] : $objCatalogue->_path_alt . $item_cat['image'];




                $width = Helper::getImgSize($image, 0);
                $width = $width > 120 ? 120 : $width;
                ?>

                <a href="/?page=catalogue">
                    <img src="<?php echo $image; ?>" alt="<?php echo Helper::encodeHTML($item_cat['name'], 1); ?>" width="<?php echo $width;?>" />
                </a>
            </div>
            <div class="catalogue_wrapper_right">
                <h4>
                    <a href="/?page=catalogue"></a>
                    <?php echo Helper::encodeHTML($row['title'], 1); ?>
                </h4>
                <h4>
                    Year: <?php
//                    echo Catalogue::$_currency;
//                    echo number_format($row['price'], 2);
                    ?>;
                </h4>
                <p><?php echo Helper::shortenString(Helper::encodeHTML($row['description'])); ?></p>
<!--                <p>--><?php //echo Basket::activeButton($row['id']);?><!-- </p>-->
            </div>
        </div>
        <?php
    }
    echo $objPaging->getPaging();
} else {
    ?>
    

    <div class="paging">
        <p><strong>No catalogue</strong> found</p>
    </div>
    
    
    <?php
}?>

<?php require_once("_footer.php"); ?>