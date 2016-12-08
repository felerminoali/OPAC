<?php $objBasket = new Basket(); ?>
<h2>Your Reservation</h2>


<dl id="basket_left">
    <dt>No. of items:</dt>
    <dd class="bl_ti">
        <span>
            <?php echo $objBasket->_number_of_items; ?>
        </span>
    </dd>

    <dt>Books:</dt>
    <dd class="bl_tb">
        <span>
            1
<!--            --><?php //echo number_format($objBasket->_sub_total, 2); ?>
        </span>
    </dd>

    <dt>Audio:</dt>
    <dd class="bl_ta">
        <span>
            2
            <!--            --><?php //echo number_format($objBasket->_sub_total, 2); ?>
        </span>
    </dd>

    <dt>Videos:</dt>
    <dd class="bl_tv">
        <span>
            3
            <!--            --><?php //echo number_format($objBasket->_sub_total, 2); ?>
        </span>
    </dd>


    <dt>Periodicals:</dt>
    <dd class="bl_tp">
        <span>
            4
            <!--            --><?php //echo number_format($objBasket->_sub_total, 2); ?>
        </span>
    </dd>
    
</dl>
<div class="dev br_td">&#160;</div>
<p><a href="/?page=basket">View </a> | <a href="/?page=checkout">Reserve now</a></p>
<div class="dev br_td">&#160;</div>

