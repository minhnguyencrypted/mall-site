<?php
    session_start();
    require_once($_SERVER['DOCUMENT_ROOT'] . '/php/API/data/file_parser.php');

    //get the product id
    $product_id = $_GET['id'] ?? '';
    $product = read_file_match_value(PRODUCTS_DATA_FILE_PATH, $product_id, 'id');
    $product = $product[0] ?? [];

    if (isset($_POST['add_this_item'])) {
    	if (!isset($_SESSION['items_id'])) {
    		$_SESSION['items_id'] = [];
	    }
    	$_SESSION['items_id'][$product_id] = $_SESSION['items_id'][$product_id] + 1 ?? 1;
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<link rel="stylesheet" type="text/css" href="product_dt_style.css">
	<link rel="stylesheet" type="text/css"
	      href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="../../css/footer.css">
	<link rel="stylesheet" href="../../css/header.css">
	<meta charset="UTF-8">
	<!-- Change the web page title -->
	<title>Product Details</title>
	<link href="../products/css/productpage.css" rel="stylesheet">
	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body>
<header id="header_main">
	<title>Foo Mall</title>

	<!-- Set page logo here -->
	<div class="logo">
		<h1>Mall-site</h1>
	</div>
	<!-- Navigation bar -->
	<div class="nav">
		<ul class="nav-list">
			<li class="nav-list-item"><a href="/index.php">Home</a></li>
			<li class="nav-list-item"><a href="/aboutus.html">About Us</a></li>
			<li class="nav-list-item"><a href="/fees.html">Fees</a></li>
			<li class="nav-list-item"><a href="/my_account/my_account.php">My Account</a></li>
			<li class="nav-list-item"><a href="#">Browse</a></li>
			<li class="nav-list-item"><a href="/faq.html">FAQs</a></li>
			<li class="nav-list-item"><a href="/">Contact</a></li>
		</ul>
	</div>
</header>
<?php
    if (empty($product)) {
        echo "<p>Product not found</p>";
    } else {
?>
		<div class="pInfo-frame">
			<div class="product-info">
				<h2 class="pTitle">
                    <?= $product['name'] ?>
				</h2>
				<br>
				<p class="pPrice">$<?= $product['price'] ?></p>
				<form action="product_dt.php" method="POST">
					<button type="submit" name="add_this_item">Order this time</button>
				</form>
			</div>
		</div>
        <?php
    }
?>

<div class="footer">
	<ul>
		<div class="footer_content">

			<div class="footer_content_policies">
				<li>
					<p><a href="Thinh_policies.htmnl">Policies</a>
					</p>
				</li>

				<br><br>
			</div>

			<div class="footer_content_faq">
				<li>
					<p><a href="Thinh_faq.html">FAQ</a>
					</p>
				</li>
				<br></br>
			</div>
		</div>

	</ul>
	<div class="copyright">
		<small>Copyright &copy; 2021, Nhat Dang Nguyen, Hien Cong Gia Nguyen, Minh Nhat Nguyen and Thinh Hung
			Huynh</small>
	</div>
</div>
</body>

<script src="../../js/CartItems.js"></script>
<script src="../../js/webStorage.js"></script>
<script>
    //As all items are stored in "items" array, a member of CartItems class (refer to js/CartItems.js)
    //Assign productIndex corresponding to such array's element
    let productIndex = 0;

    //onclick Function
    function buttonAddProduct() {
        let addedItemName = addItemToCart(productIndex);
        alert("Added " + addedItemName + " to cart.");
    }
</script>
</html>