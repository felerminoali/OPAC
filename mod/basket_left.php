<?php $objBasket = new Basket(); ?>
<h2>Your Reservation</h2>


<dl id="basket_left">
    <dt>No. of items:</dt>
    <dd class="bl_ti">
        <span>
            <?php echo $objBasket->_number_of_items; ?>
        </span>
    </dd>
    <dt class="bl_s maximized">
        <span>
            <?php echo $objBasket->_summary; ?>
        </span>
    </dt>
</dl>
<div class="dev br_td">&#160;</div>
<p><a href="/?page=basket">View </a> | <a href="/?page=reserve">Place Hold</a></p>
<div class="dev br_td">&#160;</div>

