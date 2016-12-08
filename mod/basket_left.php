<?php $objBasket = new Basket(); ?>
<h2>Your Reservation</h2>


<dl id="basket_left">
    <dt>No. of items:</dt>
    <dt class="bl_ti">
        <span>
            <?php echo $objBasket->_number_of_items; ?>
        </span>
    </dt>
    <dt class="bl_s max">
        <span>
            <?php echo $objBasket->_summary; ?>
        </span>
    </dt>
</dl>
<div class="dev br_td">&#160;</div>
<p><a href="/?page=basket">View </a> | <a href="/?page=checkout">Reserve now</a></p>
<div class="dev br_td">&#160;</div>

