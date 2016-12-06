<?php
/**
 * Created by PhpStorm.
 * User: feler
 * Date: 12/4/2016
 * Time: 8:26 PM
 */

Login::restrictFront();


$objCatalogue = new Catalogue();


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

    <div class="paging">
        <p>Your search found <strong>18201</strong> records. Displaying records <strong>1</strong> to
            <strong>10</strong>.</p>
    </div>

    <h1></h1>


    <div class="catalogue_wrapper">
        <div class="catalogue_wrapper_left">

            <a href="/?page=catalogue-item&amp;category=3&amp;id=31">
                <img src="media/catalogue/unavailable.png" alt="Drum" width="120"/>
            </a>
        </div>
        <div class="catalogue_wrapper_right">
            <h4>
                <a href="/?page=catalogue-item&amp;category=3&amp;id=31"></a>
                Drum </h4>
            <h4>
                Price: &pound145.00;
            </h4>
            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the
                industry&#039;s standard dummy text ever since&hellip;</p>
            <p><a href="#" class="add_to_basket" rel="31_1">Add to basket</a></p>
        </div>
    </div>
    <div class="catalogue_wrapper">
        <div class="catalogue_wrapper_left">

            <a href="/?page=catalogue-item&amp;category=3&amp;id=31">
                <img src="media/catalogue/unavailable.png" alt="Drum" width="120"/>
            </a>
        </div>
        <div class="catalogue_wrapper_right">
            <h4>
                <a href="/?page=catalogue-item&amp;category=3&amp;id=31"></a>
                Drum </h4>
            <h4>
                Price: &pound145.00;
            </h4>
            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the
                industry&#039;s standard dummy text ever since&hellip;</p>
            <p><a href="#" class="add_to_basket" rel="31_1">Add to basket</a></p>
        </div>
    </div>
    <div class="catalogue_wrapper">
        <div class="catalogue_wrapper_left">

            <a href="/?page=catalogue-item&amp;category=3&amp;id=31">
                <img src="media/catalogue/unavailable.png" alt="Drum" width="120"/>
            </a>
        </div>
        <div class="catalogue_wrapper_right">
            <h4>
                <a href="/?page=catalogue-item&amp;category=3&amp;id=31"></a>
                Drum </h4>
            <h4>
                Price: &pound145.00;
            </h4>
            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the
                industry&#039;s standard dummy text ever since&hellip;</p>
            <p><a href="#" class="add_to_basket" rel="31_1">Add to basket</a></p>
        </div>
    </div>
    <div class="catalogue_wrapper">
        <div class="catalogue_wrapper_left">

            <a href="/?page=catalogue-item&amp;category=3&amp;id=31">
                <img src="media/catalogue/unavailable.png" alt="Drum" width="120"/>
            </a>
        </div>
        <div class="catalogue_wrapper_right">
            <h4>
                <a href="/?page=catalogue-item&amp;category=3&amp;id=31"></a>
                Drum </h4>
            <h4>
                Price: &pound145.00;
            </h4>
            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the
                industry&#039;s standard dummy text ever since&hellip;</p>
            <p><a href="#" class="add_to_basket" rel="31_1">Add to basket</a></p>
        </div>
    </div>


    <ul class="paging">
        <li><span>First</span></li>
        <li><span>Previous</span></li>
        <li><a href="/?page=catalogue&category=3&amp;pg=2">Next</a></li>
        <li><span>Last</span>
        <li>
    </ul>

    </div>
    <div class="cl">&#160;</div>


<?php require_once("_footer.php"); ?>