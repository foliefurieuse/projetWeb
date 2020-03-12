<!-- views/layout.php -->
<html>

<head>
<link href="css/style.css" rel="stylesheet">
    <title> mon site </title>
</head>

<body>
    <h1> web site </h1>

    <div>
        <ul>
            <li><a href="/index.php?controller=orders&action=index">show all orders</a></li>
            <li><a href="/index.php">Main Page</a></li>
            
        </ul>
    </div>
    <?php require_once('routes/router.php'); ?>
  
</body>

</html>