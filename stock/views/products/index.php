<!-- views/orders/index.php -->


<!-- php ob_start()  -->
<li>
    <form name="CategoryToShow" method="get">
        <select name='showCategory' onchange='location.assign(location.origin.concat("/index.php?controller=products&action=index&showCategory=",this.value.toString()))'>
            <option value='0'>Toutes les catégories</option>
            <?php
            global $categoriesTab;
            foreach($categoriesTab as $number => $nameCategorie)
            {
                if(isset($_GET['showCategory']) AND $_GET['showCategory']==$number)
                    echo '<option value='.$number.' selected="selected">'.$nameCategorie.'</option>';
                else
                    echo '<option value='.$number.'>'.$nameCategorie.'</option>';
            }

            ?>

        </select>
    </form>
</li>


<?php foreach ($products as $product): ?>
	<div class="order" style="margin-left: 0px;">
		
		<a  href="/index.php?controller=products&action=show&id=<?= $product->prodid ?>">
			<div class="order_info">
				<h3><?= $product->name ?></h3>
				<div class="info">
                    <span><img src="../../controllers/afficherImageProduit.php?id=<?= $product->prodid ?>"></span>
                    <span><?= $product->description ?></span>
					<span><?= $product->date_added ?></span>
					<span class="see_details">See product details...</span>
				</div>
			</div>
		</a>
	</div>
<?php endforeach ?>



<!-- php $content = ob_get_clean()  -->