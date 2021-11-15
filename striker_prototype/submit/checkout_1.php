<?php

require 'vendor/autoload.php';
\Stripe\Stripe::setApiKey('sk_test_51JvQsbLn2Kc8UgfYf3V0sFykXbE39CxrL6Pcz4praX2yYcCf8ktO5vSF2OhshjkXaau1kYeZhkMBKxzvZgj8El6K00Tc3iz5bu');

header('Content-Type: application/json');

$YOUR_DOMAIN = 'http://localhost/striker_prototype';

$checkout_session = \Stripe\Checkout\Session::create([
  'line_items' => [[
    # Provide the exact Price ID (e.g. pr_1234) of the product you want to sell
    'price' => 'price_1JvQzvLn2Kc8UgfY9bg9IRnd',
    'quantity' => 1,
  ]],
  'payment_method_types' => [
    'card',
  ],
  'mode' => 'payment',
  'success_url' => $YOUR_DOMAIN . '/success.php',
  'cancel_url' => $YOUR_DOMAIN . '/cancel.html',
]);

header("HTTP/1.1 303 See Other");
header("Location: " . $checkout_session->url);