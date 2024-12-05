/* 
 *  gets all users' names and email adddreses from users, 
 * also returns a uuid (could also just be user_id) in case there are duplicates. u.email is a logical primary key
 */
SELECT u.uuid, u.name, u.email FROM users u;