<!-- views/orders/show.php -->

<div style="clear:left">
    <br />
    <h2>Product Details: <?= $myproduct->description ?></h2>
</div>


<div class="date">Product Date: <?= $myproduct->date_added ?></div>
<div class="body">
   Total Amount: $<?= $myproduct->price ?><br/>
    Category : <?php global $categoriesTab; echo $categoriesTab[$myproduct->catid]; ?><br/>
</div>


