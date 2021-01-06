## About PWorks

PWorks is a laravel project which is the migration of a non-OO legacy application into the Laravel/Eloquent framework

### Installation
- Run command in bash terminal 
```bash
git clone https://github.com/pamekar/pworks.git && cd pworks
```
- Install required packages with
```bash
composer install
```
- Set up your DB environment, and ensure the DB credentials of your server matches with your .env file 
- Migrate and seed database
```bash
php artisan migrate:fresh --seed
```
- Run
```bash
php artisan serve
```
- Finally, Click this link https://127.0.0.1:8000, and we're good.

### Functionality Ported
1. GET requests with URL parameters "?id=X" should return the existing styled HTML for some user with
id "X". All input must be validated. **This feature can be accessed via [GET] http://127.0.0.1:8000/comments/{id} where 
_id_ is the user's id, and it shows the list of comments for the specified user** 
2. POST requests with form fields "password", "id" and "comments" will append the value of 'comments'
to the existing comments field of user with identifier 'id' provided the 'password' is a given static value.
All input must be validated. **This feature can be accessed via [POST] http://127.0.0.1:8000/comments where "id", 
"comments" and "password" must be provided**
3. POST requests with a JSON object containing "password", "id" and "comments" will do exactly the
same as (2) above. All input must be validated. **This feature can be accessed via [POST] http://127.0.0.1:8000/comments 
where "id", "comments" and "password" must be provided in the JSON object**
4. Command line executions such as "php controller.php ID COMMENTS" will essentially do the same as
(2) above, too, where "ID" is the user identifier and "COMMENTS" is some amount of comments,
potentially with spaces. No password is required for this execution type. All input must be validated.
Hint: behavior should be ported over to Artisan console commands. **This feature can be accessed via command 
`php artisan pworks:store_comments {id} {comment}`**
5. Parts 1-4 above should be ported with expected functionality using native Laravel behavior (e.g. url “?
id=x” should be available via "/user/{id}"). **IMO A minor deviation here is that we used "/comments/{id}" since the app 
functionality is around user's comments {CREATE/LISTING}.**
6. Migrations must be provided. Seeders must be provided. And .env.example file should be filled in with
the relevant info. **Mirgations and Seeders were created for the Users and "Comments" table. A one-to-many relationship 
was created for the Users and Comments, which provides flexibilty for our app.**
7. Documentation must list all the routes implemented, params and what they do. **Postman collection detailing all the 
routes implemented, params, and what they do can be found here https://documenter.getpostman.com/view/8895372/TVzNHKQ5**

### Note
- You can also register new users and login with the /register and /login routes.
- The default password for all users is `password`
