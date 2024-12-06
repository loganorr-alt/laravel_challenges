# Develop and endpoint for removing a user entry from the "users" table

This call is destructive, but otherwise isn't much different from any other API call. It is important to make sure calls like these are protected by authentication as the call is destructive.

As per the previous tasks I'll use much of the same process and thought process as in 'Creating and designing APIs - PHP'. I encourage reviewing that section before this one to view my thought processes. I will be 'skipping to the end' so to speak in this sections tasks.

- *Api Type:* Rest
- *Method*: DELETE
- *Endpoint path*: /api/users
- *unique identifier:* an integer - the users id.
- *Structure:* [See the OpenAPI definition in (openapi.yml)](openapi.yml)
- *Where / how will it be built:* As per the brief, this will be in Laravel.
- *authentication*: A Bearer token in the authorization header. 


## Code

In doing these tasks I ran out of time to enable / do the boiler plate to do authentication. My intention was to use Larvels Sanctum library for these examples. The auth would have been done in the api routing file.

**Split out of Laravel:**

- Order Controller: [task3-UserController.php](task3-UserController.php)

**API route:**

```
//Route::middleware('auth:sanctum')->delete('/users/{id}', [UserController::class, 'destroy']);
Route::delete('/users/{id}', [UserController::class, 'destroy']);
```

**Within Laravel:**

- Routing: [laravel-sample/routes/api.php](../laravel-sample/routes/api.php)
- Controller: [laravel-sample/app/Http/Controllers/Api/UserController.php](../laravel-sample/app/Http/Controllers/Api/UserController.php)


## Sample Curl

*Note: I've included an authorization token header but that isn't implemented in my solution*

```
curl -X DELETE http://127.0.0.1:8080/api/users/4 -H "Accept: application/json" -H "Authorization: Bearer <TOKEN>"
```