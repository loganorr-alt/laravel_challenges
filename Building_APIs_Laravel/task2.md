# Write an endpoint that lets users place an order containing multiple products

The primary difference between this and the previous API tasks is that this api call needs to create multiple objects. The order + a number of ordered product objects. As an extra, it would be good to calculate the order total as well and store that.

In order to track the ordered items, the structure doesn't need to change much. I've just added a "Products" item to the order definition. Which itself is an array of OrderedProducts. An OrderedProduct contains the product id, and the quantity being ordered. 

As per the previous tasks I'll use much of the same process and thought process as in 'Creating and designing APIs - PHP'. I encourage reviewing that section before this one to view my thought processes. I will be 'skipping to the end' so to speak in this sections tasks.

- *Api Type:* Rest
- *Method*: POST
- *Endpoint path*: /api/orders
- *unique identifier:* n/a - this is a fetch all endpoint
- *Structure:* [See the OpenAPI definition in (openapi.yml)](openapi.yml)
- *Where / how will it be built:* As per the brief, this will be in Laravel.

## Code

In doing these tasks I ran out of time to enable / do the boiler plate to do authentication. My intention was to use Larvels Sanctum library for these examples. The auth would have been done in the api routing file.

As a result of no authentication, I've needed to add an extra variable to the message body 'customer_id'. This really should come from the current logged in user however, and in practice we wouldn't trust a customer_id provided by the client. It could allow somebody to post and charge an order to any customer.

Split out of Laravel:

- Order Controller: [task2-OrderController.php](task2-OrderController.php)

**API route:**

```
//Route::middleware('auth:sanctum')->post('/orders', [OrderController::class, 'store']);
Route::post('/orders', [OrderController::class, 'store']);`
```

**Within Laravel:**

- Routing: [laravel-sample/routes/api.php](../laravel-sample/routes/api.php)
- Controller: [laravel-sample/app/Http/Controllers/Api/OrderController.php](../laravel-sample/app/Http/Controllers/Api/OrderController.php)


## Sample Curl

```
curl -X POST http://localhost:8080/api/orders -H "Content-Type: application/json" -H "Accept: application/json" -d '{
    "customer_id": 1,
    "billing_name": "Test User",
    "billing_address": "1234 Street",
    "products": [
        {
            "product_id": 1,
            "quantity": 2
        },
        {
            "product_id": 3,
            "quantity": 1
        }
    ]
}'
```