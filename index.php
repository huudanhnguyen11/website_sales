<?php
if (!isset($_GET['function'])) {
    header('Location: Views/home.php');
} else if ($_GET['function'] == 'laptop') {
    header('Location: Views/product.php?cate=1');
} else if ($_GET['function'] == 'PC') {
    header('Location: Views/product.php?cate=8');
} else if ($_GET['function'] == 'manhinh') {
    header('Location: Views/product.php?cate=9');
} else if ($_GET['function'] == 'linhkien') {
    header('Location: Views/product.php?cate=10');
} else if ($_GET['function'] == 'chuot') {
    header('Location: Views/product.php?cate=11');
} else if ($_GET['function'] == 'banphim') {
    header('Location: Views/product.php?cate=12');
} else if ($_GET['function'] == 'thietbimang') {
    header('Location: Views/product.php?cate=13');
} else if ($_GET['function'] == 'loa') {
    header('Location: Views/product.php?cate=14');
} else if ($_GET['function'] == 'add_cart' && isset($_GET['product_id'])) {
    include 'Models/product_db.php';
    $product = getProduct((int)$_GET['product_id'])->fetch();
    session_start();
    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = array();
        $_SESSION['cart'][(int)$_GET['product_id']] = $product;
        $_SESSION['cart'][(int)$_GET['product_id']]['soluong'] = 1;
    } else {
        if (isset($_SESSION['cart'][(int)$_GET['product_id']])) {
            $_SESSION['cart'][(int)$_GET['product_id']]['soluong'] += 1;
        } else {
            $_SESSION['cart'][(int)$_GET['product_id']] = $product;
            $_SESSION['cart'][(int)$_GET['product_id']]['soluong'] = 1;
        }
    }
    if (count($_SESSION['cart']) > 0) {
        header('Location: Views/QLGiohang.php');
    }
} else if ($_GET['function'] == 'update_cart' && isset($_GET['product_id'])) {
    session_start();
    if ($_GET['process'] == 'down' && $_SESSION['cart'][(int)$_GET['product_id']]['soluong'] > 1) {
        $_SESSION['cart'][(int)$_GET['product_id']]['soluong'] -= 1;
    }
    if ($_GET['process'] == 'up') {
        $_SESSION['cart'][(int)$_GET['product_id']]['soluong'] += 1;
    }
    header('Location: Views/QLGiohang.php');
} else if ($_GET['function'] == 'delete_cart' && isset($_GET['product_id'])) {
    session_start();
    unset($_SESSION['cart'][(int)$_GET['product_id']]);
    array_values($_SESSION['cart']);
    header('Location: Views/QLGiohang.php');
} else if ($_GET['function'] == 'order') {
    include 'Models/customer_db.php';
    include 'Models/order_db.php';
    include 'Models/orderdetail_db.php';
    // Customer
    $customerId = 0;
    $customer = getCustomerByPhone($_POST['phone'])->fetch();
    if ($customer != null) {
        $customerId = $customer['Id'];
    } else {
        $customerId = insertCustomer($_POST['customerName'], $_POST['phone'], $_POST['address'], $_POST['email'], $_POST['description']);
    }
    if ($customerId > 0) {
        // Order
        $orderId = insertOrder($_POST['shippingAddress'], $_POST['shippingCity'], $_POST['paymentType'], $customerId, $_POST['shippingType']);
        if ($orderId > 0) {
            // Orderdetail
            session_start();
            foreach ($_SESSION['cart'] as $product) {
                insertOrderdetails($orderId, $product['ProductId'], $product['soluong']) . '<br>' ;
            }
            $_SESSION['cart'] = array();
            $mes = 'Đặt hàng thành công';
            header("Location: views/QLGiohang.php?mes=$mes");
        }
    }
}
