<!-- views/orders/index.php -->


<!-- php ob_start()  -->


<?php foreach ($orders as $order): ?>
	<div class="order" style="margin-left: 0px;">
		
		<a  href="/index.php?controller=orders&action=show&id=<?= $order->id ?>">
			<div class="order_info">
				<h3><?= $order->description ?></h3>
				<div class="info">
					<span><?= $order->order_date ?></span>
					<span class="see_details">See order details...</span>
				</div>
			</div>
		</a>
	</div>
<?php endforeach ?>



<!-- php $content = ob_get_clean()  -->