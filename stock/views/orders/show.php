<!-- views/orders/show.php -->

<div style="clear:left">
    <br />
    <h2>Order Details: <?= $myorder->description ?></h2>
</div>


<div class="date">Order Date: <?= $myorder->order_date ?></div>
<div class="body">
   Total Amount: $<?= $myorder->order_total ?><br/>
    Order Status: <?= $myorder->order_status ?><br/>
    Client ID: <?= $myorder->client_id ?><br/>
</div>


