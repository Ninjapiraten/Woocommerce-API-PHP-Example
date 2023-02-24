<?php
require_once __DIR__ . "/WC_Orders.php";
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

$wc_orders = new WC_Orders(
    $_ENV['WC_URL'],
    $_ENV['WC_KEY'],
    $_ENV['WC_SECRET'],
    [
        'version' => $_ENV['WC_VERSION'],
    ]
);

$orders = $wc_orders->getOrders();
echo '<pre><code>' . print_r($orders, true) . '</code><pre>'; // JSON output.

$order = $wc_orders->getOrder($orders[0]->id);
echo '<pre><code>' . print_r($order, true) . '</code><pre>'; // JSON output.
