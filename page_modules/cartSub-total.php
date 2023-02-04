<?php
echo'
<div id="total">
<div id="item_kind">
    <span>Total</span>
    <span class="total_contents">'.$num_item.' Item(s)</span>
</div>
<div id="total_qty_amount">
    <span>Total Quantity: </span><span class="total_contents">'.$total_num_qty.' ea </span>
    <span>/ Sub Total</span>
    <span class="total_contents">CAD '.number_format($total, 2, '.', '').'</span>
</div>
</div>
';
?>