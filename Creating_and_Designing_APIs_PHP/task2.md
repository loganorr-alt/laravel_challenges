# Create an end point to allow a new post by providing title and body content.

I'll use much of the same process and thought process as task 1 so I won't repeat it here. Rather i'll place the decisions here.

- *Api Type:* Rest
- *Endpoint path*: /api/posts
- *unique identifier:* n/a - this is a post endpoint
- *Structure:* [See the OpenAPI definition in (openapi.yml)](openapi.yml)** - of note here is I've mentioned a user should have authotisation be able to both write and a read posts. Only write is required, but it's nice to send back the post as part of the 200 response.
- *Where / how will it be built:* As per my reasoning in task1, I will build it in laravel. Here @TODO