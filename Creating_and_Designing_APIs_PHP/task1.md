# An endpoint to retrieve a users profile using a unique ID.

To plan an api / end point, there are a few decisions to make:

1. What type of API should be used.
2. What should the api urls look like.
3. What unique identifer should the urls use
4. What structure the response should take. 
5. What should this endpoint be *built in*?

The first two steps are already done for us, the result is JSON, and it's a standard GET request you'd expect as part of a CRUD (Create, read, update, delete) api. So the API should be REST. Secondly the endpoint url has already been defined.

The fourth step has been partially completed. An example of the response has been provided, but not the formalities. For this step I'll use OpenAPI - I'll explain this reasoning in it's section below.

I'll run through this task on the premise that the first two steps haven't already been done. The decisions made are good ones, so I'll justify them.

## 1. What type of API should be used:
**REST**

Rest is a good choice for the API type - it's simple, easy to use, and needs no special libraries to use. Rest returns JSON, which is not only easily human readable, but it's very easy to parse as well. The big alternatives are SOAP and RPC.  

SOAP is ussually recommend against. It is big and unwieldy, it's not fun to read (being xml), and no fun to use in code either.

RPC has had a surge of popular lately, though it's older than Rest. For our needs, Rest is the better system of the two for standard CRUD tasks. So we'll go with that.

## 2. What should the api url look like:  
**`/api/{noun in plural}/{optional id}` - the verb will be the request method. `/api/users/{user_id}`**

`/api/{noun in plural}/{optional id}` is my go to for api urls. It's nice and easy to interpret, and cleanly groups all calls related to a feature together. 

It also makes great use of the method in the HTTP request to define the verb. e.g a POST request to `/api/users` would create a new user, and a PATCH or PUT would edit. A GET will either get a full list of users if you call `/api/users` or just a single user if an id is provided e.g `/api/users/5`.

If the api is expected to evolve alot, I would recommend including a version in the path. E.g `/api/v1/users`. I typically don't do this unless I'm expecting a lot of changes - and it can always be done in later versions if you need to. E.g you started with `/api/users` but then a couple years later the structure of users changed, so a version was attached to maintain backward compatibilty with any applications using the api (it can take months/years to completely roll a release out to phones) - `/api/v2/users`.  

Finally, we are placing the unique identifer {user_id} inside the url. The alternative is to place it as a query paramater. This is arguably a matter of taste, placing the identifer in the url looks cleaner, and much more intuitive to use for me. Presumably extra parameters will be using query parameters already (e.g paging), so keeping the id in the url path itself makes it easier to scan.

I won't touch on many alternative url path approaches here. One I have seen a few times in the past is the `/api/verb/noun` approach. E.g `/api/fetch/user/{user_id}` or `/api/create/user`. This is *fine*, it works, but in my experience it gets messy quickly. The verb is also redundent, to fetch i still *should* be using a GET request. To create I *should* be using a POST request etc. Should, because you don't have to, but you're making things harder for yourself.

## 3 - What unique identifer should the urls use
**An integer**

There are a few different thoughts on what to use for the identifer in the url. I'll cover the three most common here.

1. **Integers** - e.g `/api/users/1`. Integers used to be very common, but are now considered bad practice. They are easy to use, quick to implement, and easy to read to begin with (once you hit the millions, no so). However, they expose your api to a traversal attack on your ids. A hacker can use this approach to deduct information about your services, and if there a weak points in your permission model, quickly expose them. For this end point we'll use an integer as that is what the task has asked for.
2. **Guids/uuids** - e.g `/api/users/7d057ff2-b51c-495c-911e-773d02499e85`. This is the approach that you'll see in most new applications. Uuids don't *always* follow a pattern, so a traversal apporach is impossible. It comes at a cost of making your urls hard to read. This is fine for an api which will be app driven anyway, but can be a hassle if it will appear in a website url. In practice I'd recommend uuids for most usages - except for when the next option is available.
Note - uuidv7 does infact follow a pattern - the first few digits use the current timestamp, and this is a good thing - it allows for faster sorting, just not good for an exposed id.   
3. **Machine name / name** - e.g `/api/users/test_name`. This approach creates by far the most human readable urls. They are great in cases where a name isn't expected to change much and it's not revealing to much information. In the example here we're using the users full name, a hacker could use this to deduct the correct id for a user, or even use it to determine if we have a user in our system at all. Machine names also have a problem where if the field we are using for the name changes (e.g a person changes their name to Test Name 2) then all urls will either have to keep using the old - now incorrect - name, or the url changes, and all hardcoded endpoints break.

## 4. What structure the response should take.
**[See the OpenAPI schema here (openapi.yml), this is for both Task1 and Task2](openapi.yml)**

**404 will be used for both invalid id AND permission denied**

The formality of what the response and request should look like. There are a few ways to do this, a simple document with a table listing the fields and their datatypes will do the trick. We should also define what the responses should be, - e.g what a 404 looks like. Finally it's a good time to consider auth rules.

In this example I have chosen to make a permission denied to view a user return a 404. This is becoming standard practice for private data. It makes it harder for a hacker (or someone snooping), to deduct if a user id exists in the system or not. A 404 could either mean the user isn't in the system, or that they just can't see it - the ambiquity makes their job harder.

For this exercise though I will use an OpenAPI definition. OpenAPI is very versitile - you can use it to not only generate the Documentation, but you can use it to generate both the client library, and the boilerplate for the server api itself. 

With this in mind, OpenAPI is great for keeping the documentation, client, and server, all in sync. Part of your CI/CD pipeline can run a list of jobs to update your documentation, and the client library for example. I would recommend the OpenAPI schemas being kept with the server, implementing or changing an endpoint on the server should trigger the documentation and client to be generated.

## 5. What should this endpoint be *built in*?
**Laravel**

The api needs to be built in something. Though you can build an API directly in PHP, or javascript (if using Node.js), it's not recommended, you'll be increasing your workload significantly. Rather it's better to use a framework where the bulk of the boilerplate has been done for you. Laravel in PHP for example, or Koa.js in Javascript.

There can be a few considerations over what you choose to use for your framework. Which is out of scope here. Typically this will be based on your tooling you have available, what your developers are comfortable, and what the current systems already use.

I've already set up Laravel, so I'll use that*.

* *Not actually, since i'm not implementing this end point. But I will use Laravel for task 2*