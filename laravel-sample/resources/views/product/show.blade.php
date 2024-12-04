<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Details</title>
</head>
<body>
    <h1>Product: {{ $product->name }}</h1>
    <p><strong>Price:</strong> {{ $product->price }}</p>
    <p><strong>Description:</strong> {{ $product->description }}</p>
    <p><em>This is a simple, unthemed test page to allow confirming Task 3 for Automated Testing (Laravel) works.</em></p>
</body>
</html>