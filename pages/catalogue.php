<?php
/**
 * Created by PhpStorm.
 * User: feler
 * Date: 12/4/2016
 * Time: 8:26 PM
 */

Login::restrictFront();


$objCatalogue = new Catalogue();

$objSearchForm = new SearchForm();

$search = Url::getParam('search');
$param_library = Url::getParam('library');
$param_categories = Url::getParam('category');


$rows = $objCatalogue->getItems();



$objPaging = new Paging($rows, 6);
$rows = $objPaging->getRecords();


require_once("_header.php");
?>


    <div class='container'>
        <div class='section friendly'>
            <h1><strong>SEARCH | </strong>&nbsp;&nbsp;&nbsp;Catalogues</h1>
            <div class='article'>

                <form action="" method="get">
                    <?php echo Url::getParams4Search(array('search'), Paging::$_key); ?>
                    <table cellpadding="0" cellspacing="0" border="0" class="tbl_insert">
                        <tr>
                            <th><label for="search">Library catalogue:</label></th>
                            <td>
                                <input type="text" name="search" value="<?php echo stripslashes($search); ?>" class="fld">
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
                                    <?php  echo $objSearchForm->getLibrariesSelect($libraries, !empty($param_library) ? stripslashes($param_library) : null); ?>
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

                                    <input type="checkbox" name="category[]"
                                           id="category_<?php echo $category['id']; ?>"
                                           value="<?php echo $category['id']; ?>"

                                           <?php 
                                           if (in_array($category['id'], $param_categories)){
                                               echo $objSearchForm->stickyCheckedFilter();
                                           } 
                                           ?>
                                    />
                                    <span><?php echo $category['name']; ?></span>
                                </li>
                            <?php } ?>
                        </ul>

                    <?php } ?>

                </form>

            </div>
        </div>
    </div>


<?php
if (!empty($rows)) {
    ?>

    <div class="paging">
        <?php echo $objPaging->getNumberFound(); ?>
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
                    <img src="<?php echo $image; ?>" alt="<?php echo Helper::encodeHTML($item_cat['name'], 1); ?>"
                         width="<?php echo $width; ?>"/>
                </a>
            </div>
            <div class="catalogue_wrapper_right">
                <h4>
                    <a href="/?page=catalogue"></a>
                    <strong>
                        <?php echo Helper::encodeHTML($row['title'], 1); ?>
                    </strong>
                </h4>

                <?php if (!empty($row['author'])) { ?>
                    <p>
                        by: <u><?php echo $row['author']; ?></u>;
                    </p>
                <?php } ?>

                <?php if (!empty($row['year'])) { ?>
                    <p>
                        <?php echo $row['year']; ?>;
                    </p>
                <?php } ?>

                <?php if (!empty($row['publishing_date'])) { ?>
                    <p>
                        <?php echo $row['publishing_date']; ?>;
                    </p>
                <?php } ?>


                <?php if (!empty($row['description'])) { ?>
                    <p><?php echo Helper::shortenString(Helper::encodeHTML($row['description'])); ?></p>
                <?php } ?>
                <p>
                    <?php
                    $item_status = $objCatalogue->getStatus($row['status']);
                    $out = '<strong>'.$item_cat['name'].'</strong>';
                    $out .= ': ' . $item_status['status'];

                    echo $out;
                    ?>;
                </p>


                <p><?php echo Basket::activeButton($row['id']); ?> </p>
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
} ?>

<?php require_once("_footer.php"); ?>