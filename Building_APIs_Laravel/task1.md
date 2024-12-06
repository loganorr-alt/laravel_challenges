# Drafting an endpoint to return all product details from the products table.

I'll use much of the same process and thought process as in 'Creating and designing APIs - PHP'. I encourage reviewing that section before this one to view my thought processes. I will be 'skipping to the end' so to speak in this sections tasks.

- *Api Type:* Rest
- *Endpoint path*: /api/products
- *unique identifier:* n/a - this is a fetch all endpoint
- *Structure:* [See the OpenAPI definition in (openapi.yml)](openapi.yml)
- *Where / how will it be built:* As per the brief, this will be in Laravel.


## Code

I've created a redumentary version of this endpoint in the sample laravel application included in this repo.

In doing these tasks I ran out of time to enable / do the boiler plate to do authentication. My intention was to use Larvels Sanctum library for these examples. The auth would have been done in the api routing file.

**Split out of Laravel:**

- Product Controller: [task1-ProductController.php](task1-ProductController.php)
- Product API Resource (for shaping the database results): [task1-ProductAPIResource.php](task1-ProductAPIResource.php)

**API route:**

```
Route::apiResource('products', ProductController::class);
```

**Within Laravel:**

- Routing: [laravel-sample/routes/api.php](laravel-sample/routes/api.php)
- Controller: [laravel-sample/app/Http/Controllers/Api/OrderController.php](laravel-sample/app/Http/Controllers/Api/ProductController.php)
- Resource:  [laravel-sample/app/Http/Resources/ProductAPIController.php](laravel-sample/app/Http/Controllers/Api/ProductAPIController.php)