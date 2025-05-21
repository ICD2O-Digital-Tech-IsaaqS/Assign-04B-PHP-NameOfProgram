<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Meta and Page Title -->
  <meta charset="UTF-8">
  <meta name="description" content="Japanese Cheesecake Order, PHP">
  <meta name="keywords" content="Immaculata, ICD2O">
  <meta name="author" content="Isaaq Simon">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="apple-touch-icon" sizes="180x180" href="./favicon_io (19)/apple-touch-icon.png">
  <link rel="icon" type="image/png" sizes="32x32" href="./favicon_io (19)/favicon-32x32.png">
  <link rel="icon" type="image/png" sizes="16x16" href="./favicon_io (19)/favicon-16x16.png">
  <link rel="manifest" href="./favicon_io (19)/site.webmanifest">
  <title>Japanese Cheesecake Order</title>
  <!-- Link to external CSS -->
  <link rel="stylesheet" href="./css/style.css">
</head>
<body>

<header>
  <h1>Order Your Japanese Cheesecake</h1>
</header>

<!-- Order Form -->
<form method="POST">
  <!-- Cake Pan Size Selection -->
  <section>
    <label for="size">Choose Cake Pan Size:</label>
    <select name="size" id="size">
      <option value="">-- Select Size --</option>
      <option value="6">6-inch round cake pan with 3-inch sides</option>
      <option value="7">7-inch round cake pan with 4-inch sides</option>
      <option value="8">8-inch round cake pan with 3-inch sides</option>
    </select>
  </section>

  <!-- Cheesecake Type Selection -->
  <section>
    <label for="type">Choose Cheesecake Type:</label>
    <select name="type" id="type">
      <option value="Souffle">Souffle (Default)</option>
      <option value="Rare">Rare Cheesecake ($0.29)</option>
      <option value="Baked">Baked Cheesecake ($0.79)</option>
      <option value="Matcha">Matcha Cheesecake ($1.99)</option>
      <option value="Basque">Basque Cheesecake ($1.99)</option>
    </select>
  </section>

  <input type="submit" value="Submit">
</form>

<!-- Output Section -->
<div class="output">
<?php
// PHP Backend Processing Logic

// Pricing configuration
$sizePrices = array(
  "6" => 8.99,
  "7" => 11.79,
  "8" => 9.49
);

$typePrices = array(
  "Souffle" => 0.00,
  "Rare" => 0.29,
  "Baked" => 0.79,
  "Matcha" => 1.99,
  "Basque" => 1.99
);

// Tax constant
$HST = 0.13;

// Process form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $size = $_POST["size"] ?? '';
  $type = $_POST["type"] ?? 'Souffle';

  if ($size === '') {
    echo "<p>Please select a size and type of Japanese Cheesecake you want.</p>";
  } else {
    $sizeCost = $sizePrices[$size];
    $typeCost = $typePrices[$type];
    $subtotal = $sizeCost + $typeCost;
    $tax = $subtotal * $HST;
    $total = $subtotal + $tax;

    $height = $size == "7" ? "4" : "3";

    if ($typeCost == 0) {
      echo "<p>You ordered an {$size}-inch round cake pan with {$height}-inch sides for your cheesecake. The default type is {$type}. Would you like to change it? If not, please enter your credit/debit card below and hit submit.</p>";
    } else {
      echo "<p>You ordered an {$size}-inch round cake pan with {$height}-inch sides for your {$type} cheesecake. Your total is $" . number_format($total, 2) . ". Please enter your credit/debit card below and hit submit.</p>";
    }

    echo "<p>Subtotal: $" . number_format($subtotal, 2) . "</p>";
    echo "<p>Tax (HST): $" . number_format($tax, 2) . "</p>";
    echo "<p>Total Cost: $" . number_format($total, 2) . "</p>";
  }
}
?>
</div>

<!-- Link to optional external JS file -->
<script src="script.js"></script>
</body>
</html>