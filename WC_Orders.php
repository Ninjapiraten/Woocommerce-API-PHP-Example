<?php

require __DIR__ . '/vendor/autoload.php';

use Automattic\WooCommerce\Client;
use Automattic\WooCommerce\HttpClient\HttpClientException;

class WC_Orders
{
    private $woocommerce;

    function __construct($url, $consumer_key, $consumer_secret, $options = array())
    {
        $this->woocommerce = new Client(
            $url,
            $consumer_key,
            $consumer_secret,
            $options
        );
    }

    public function getOrders($params = array())
    {
        $result = false;

        try {
            $result = $this->woocommerce->get('orders', $params);
        } catch (HttpClientException $e) {
            echo '<pre><code>' . print_r($e->getMessage(), true) . '</code><pre>'; // Error message.
            echo '<pre><code>' . print_r($e->getRequest(), true) . '</code><pre>'; // Last request data.
            echo '<pre><code>' . print_r($e->getResponse(), true) . '</code><pre>'; // Last response data.
        } finally {
            return $result;
        }
    }

    public function getOrder($id)
    {
        $result = false;

        try {
            $result = $this->woocommerce->get('orders/' . $id);
        } catch (HttpClientException $e) {
            echo '<pre><code>' . print_r($e->getMessage(), true) . '</code><pre>'; // Error message.
            echo '<pre><code>' . print_r($e->getRequest(), true) . '</code><pre>'; // Last request data.
            echo '<pre><code>' . print_r($e->getResponse(), true) . '</code><pre>'; // Last response data.
        } finally {
            return $result;
        }
    }
}
