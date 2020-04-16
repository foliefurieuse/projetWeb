<!-- views/orders/index.php -->


<!-- php ob_start()  -->


<?php foreach ($orders as $order): ?>
	<div class="order" style="margin-left: 0px;">
		
		<a  href="/index.php?controller=orders&action=show&id=<?= $order->id ?>">
			<div class="order_info">
				<h3><?= $order->description ?></h3>
				<div class="info">
					<span><?= $order->order_date ?></span> <br/>
                    <span>Client ID: <?= $order->client_id ?><br/></span>
					<span class="see_details">See order details...</span>
				</div>
			</div>
		</a>
        <span><a href="/index.php?controller=orders&action=edit&id=<?= $order->id ?>">Edit</a> </span> <br>
        <span><a href="/index.php?controller=orders&action=deleteCommande&id=<?= $order->id ?>">Delete</a></span>
	</div>
<?php endforeach ?>



<!-- php $content = ob_get_clean()  -->