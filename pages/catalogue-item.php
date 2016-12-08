<?php

Login::restrictFront();

$id = Url::getParam('id');

if (!empty($id)) {

    $objCatalogue = new Catalogue();
    $item = $objCatalogue->getItem($id);

    if (!empty($item)) {
        $category = $objCatalogue->getCategory($item['category']);

        require_once('_header.php');
        ?>


        <h1>Catalogue :: <?php echo $category['name']; ?></php></h1>


        <div class="fl_l">

            <?php
            $image = !empty($item['image']) ? $objCatalogue->_path . $item['image'] : $objCatalogue->_path_alt . $category['image'];


            if (!empty($image)) {
                $width = Helper::getImgSize($image, 0);
                $width = $width > 120 ? 120 : $width;
                ?>

                <div class="lft">
                    <img src="<?php echo $image; ?>" alt="<?php echo Helper::encodeHTML($category['name'], 1); ?>"
                         width="<?php echo $width; ?>"/>
                </div>

                <?php
            } ?>

            <div class="rgt">
                <h3>
                    <strong>
                        <?php echo $item['title']; ?>
                    </strong>
                </h3>


                <?php if (!empty($item['author'])) { ?>
                    <p>
                        by: <u><?php echo $item['author']; ?></u>;
                    </p>
                <?php } ?>

                <?php if (!empty($item['year'])) { ?>
                    <p>
                        <?php echo $item['year']; ?>;
                    </p>
                <?php } ?>

                <?php if (!empty($item['publishing_date'])) { ?>
                    <p>
                        <?php echo $item['publishing_date']; ?>;
                    </p>
                <?php } ?>

                <?php echo Basket::activeButton($item['id']); ?>

            </div>
        </div>
        <div class="dev">&#160;</div>
        <p><?php echo Helper::encodeHTML($item['description']); ?></p>
        <div class="dev br_td">&#160;</div>
        <p><a href="javascript:history.go(-1)">Go back</a></p>

        <?php
        require_once('_footer.php');
    } else {
        require_once('error.php');
    }
} else {
    require_once('error.php');
}