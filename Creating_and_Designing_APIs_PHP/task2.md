# Create an end point to allow a new post by providing title and body content.

I'll use much of the same process and thought process as task 1 so I won't repeat it here. Rather I'll place the decisions here.

- *Api Type:* Rest
- *Endpoint path*: /api/posts
- *unique identifier:* n/a - this is a post endpoint
- *Structure:* [See the OpenAPI definition in (openapi.yml)](openapi.yml)** - of note here is I've mentioned a user should have authotisation be able to both write and a read posts. Only write is required, but it's nice to send back the post as part of the 200 response.
- *Where / how will it be built:* As per my reasoning in task1, I will build it in laravel. 

## Code

I implemented this into the sample Laravel install included in this repository. The key parts of this code is the Controller and the API route which i've split out below:

- Posts Controller: [PostsController.php](task2-PostsController.php)

**API route:**

```
//Route::middleware('auth:sanctum')->post('/posts', [PostsController::class, 'store']);
Route::post('/posts', [PostsController::class, 'store']);
```

**Within Laravel:**

- Routing: [laravel-sample/routes/api.php](laravel-sample/routes/api.php)
- Controller: [laravel-sample/app/Http/Controllers/Api/PostsController.php](laravel-sample/app/Http/Controllers/Api/PostsController.php)


## Sample Curl

```
curl -X POST http://localhost:8080/api/posts \
-H "Content-Type: application/json" \
-H "Accept: application/json" \
-d '{
    "title": "A title",
    "content": "Test content",
}'
```