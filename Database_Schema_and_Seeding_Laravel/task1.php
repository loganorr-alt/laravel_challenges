<?php
//products
Schema::create('products', function (Blueprint $table) {
    $table->id();
    $table->timestamps();
    $table->string('name');
    $table->text('description');
    $table->decimal('price', 10, 2);
});

//orders
Schema::create('orders', function (Blueprint $table) {
    $table->id();
    $table->timestamps();
    $table->foreignId('customer_id')->constrained()->on('customers');
    $table->decimal('total', 10, 2);
});

// The products ordered would be a one-to-many relationship with the order so we need a seperate table to store these.
Schema::create('orderedproducts', function (Blueprint $table) {
    $table->id();
    $table->timestamps();
    $table->foreignId('order_id')->constrained()->on('orders');
    $table->foreignId('product_id')->constrained()->on('products');
    $table->integer('quantity');
});

//customers
Schema::create('customers', function (Blueprint $table) {
    $table->id();
    $table->timestamps();
    $table->string('name');
    $table->string('email');
    $table->string('phone');
});

//reviews
Schema::create('reviews', function (Blueprint $table) {
    $table->id();
    $table->timestamps();
    $table->foreignId('customer_id')->constrained()->on('customers');
    $table->foreignId('product_id')->constrained()->on('products');
    $table->text('review');
    $table->integer('rating');
});

