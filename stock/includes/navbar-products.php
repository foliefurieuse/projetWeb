<div class="navbar">

    <ul>
        <li><a class="active" href="?controller=products&action=index">Products</a></li>
        <?php
            if($_SESSION['admin'])
                echo '<li><a href="?controller=products&action=newProduct">Place New Product</a></li>';
        ?>
    </ul>
</div>