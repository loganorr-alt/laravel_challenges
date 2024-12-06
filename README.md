# Section 1: Programming Challenges (PHP)

See directory, Programming Challenges - PHP. 

If PHP has been installed, all three tasks can be run from the command line e.g: `php task1.php`

- [Task 1](Programming_Challenges_PHP/task1.php)
- [Task 2](Programming_Challenges_PHP/task2.php)
- [Task 3](Programming_Challenges_PHP/task3.php)

# Section 2: Creating and Designing APIs (PHP)

For task 1 I went into detail on my thought process for designing an API. The endpoint and example json is technically part of the design process, but it's very close to the decisions I would have made anyway. So I went through the justification process as well. The only decision I disagreed with was the use of the {user_id} - this is now considered bad practice.

For task 2 I have only summarised my decisions, as I used the same decisions and justifications made in task 1.

An important artifact of planning and designing an API is an openAPI spec. Which I've included in the Creating_and_designing_APIs_PHP directory. This covers both task 1 and 2.

- [Task 1](Creating_and_Designing_APIs_PHP/task1.md)
- [Task 2](Creating_and_Designing_APIs_PHP/task2.md)
- [Open API yaml definition](Creating_and_Designing_APIs_PHP/openapi.yml)


# Section 3: Working with Database queries (PHP).

For these exercises I 'invented' in my mind a schema to work with. 

These were written with PostgreSQL in mind (but that shouldn't matter).

- [Task 1](Working_With_Database_Queries_PHP/task1.sql)
- [Task 2](Working_With_Database_Queries_PHP/task2.sql)
- [Task 3](Working_With_Database_Queries_PHP/task3.sql)


# Section 4: Building APIS (Laravel)

**Note:** This is the last section I worked on, and as may be evident, incomplete, and rushed.

The design phase uses the same process as in the Creating and Designing APIs section. So I've mostly summarised my decisions here, only going into a little detail when something is different

- [Task 1](Building_APIs_Laravel/task1.md)
- [Task 2](Building_APIs_Laravel/task2.md)
- [Task 3](Building_APIs_Laravel/task3.md)
- [Open API yaml definition](Building_APIs_Laravel/openapi.yml)



# Section 5: Automated Testing (Laravel)

I built these into laravel, with some basic boiler plate to get them running. Both tasks 1 and 3 can be found in [laravel-sample/tests/Feature/ProductTest.php](laravel-sample/tests/Feature/ProductTest.php)

I skipped task 2 due to time constraints. The set up time to get a Dusk environment running appeared potentially (possibly incorrectly) finicky. I placed this item to do at the end if I have time (a stretch task so to speak) but never got to it. I'm happy to come back and do this if requested. I've not used Dusk, but it gives me Cypress / Selenium vibes (I've used both).

- [Task 1](Automated_Testing_Laravel/task1.php)
- [Task 3](Automated_Testing_Laravel/task3.php)


# Section 6: Automated infrastructure Setup (Laravel)

It was difficult to think of a good way to present Task 1 and 2, so I decided to take the approach of a quick guide. I used a slightly different approach for both.

- [Task 1](Automating_Infrastructure_Setup_Laravel/task1.md)
- [Task 2](Automating_Infrastructure_Setup_Laravel/task2.md)


# Section 7: Database Schema and Seeding (Laravel)

As with Automated testing, I built these directly into the laravel sample and they can be seen in the migration and seeder directories respectively:

- [laravel-sample/database/migrations](laravel-sample/database/migrations)
- [laravel-sample/database/seeders](laravel-sample/database/seeders)

- [Task 1 - split out from Laravel](Database_Schema_and_Seeding_Laravel/task1.php)
- [Task 2 - split out from Laravel](Database_Schema_and_Seeding_Laravel/task2.php)
- [Task 3 - split out from Laravel - The Seeder](Database_Schema_and_Seeding_Laravel/task3-seeder.php)
- [Task 3 - split out from Laravel - The Factory](Database_Schema_and_Seeding_Laravel/task3-factory.php)