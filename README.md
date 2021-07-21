# Docker + Laravel Notes

Laravel based project with an example of Docker environment.
It is not a fully functional project. Thing are left here like notes mostly.
Since the entire Laravel project codebase is quite large not all things are kept here.
Only files that have some meaningful changes are here with the corresponding folders structure.

## Environment

- MariaDB 57
- nginx + php-fpm
- PHP 7.3
- Laravel 8

## Configuration

Based on [this tutorial](https://liquid.fish/current/creating-a-simple-laravel-docker-environment)

### Please Note!

Code styles, formatting, clean code - all of that are not related to the project.
All things here are just the notes, and that's why there are a lot of "dirty" places, e.g. different code styles, undeleted comments, etc

### Main features

The main one part where I tried to be close to code cleareness.

#### Roles & Permissions

Any user could have a single role assigned to. Every role has a list of permissions:
* **Author** - can _Create Posts_. Also he can edit/delete his own posts.
* **Editor** - has _Create Posts_, _Edit Posts_ and _Delete Posts_ permissions that allow him to edit/delete any posts.
* **Admin** - has the same privileges as the **Editor**. Additionally, **Admin** can _List Users_, _Edit Users_ and _Delete Users_. The owner of the role can view users and change their roles.

Roles and permissions correlation - [Database\Seeders\Seeder](https://github.com/dsobolev/laravel-docker/blob/master/www/database/seeders/RolesAndPermissionsSeeder.php) ;
Policies - [App\Policies\PostPolicy](https://github.com/dsobolev/laravel-docker/blob/master/www/app/Policies/PostPolicy.php), [App\Policies\UserPolicy](https://github.com/dsobolev/laravel-docker/blob/master/www/app/Policies/UserPolicy.php)

Unauthorized users and users without any role can see a list of posts on [posts/all.blade.php](https://github.com/dsobolev/laravel-docker/blob/master/www/resources/views/posts/all.blade.php). Those one who can _Edit Posts_ and _Delete Posts_ see _Edit_ and _Delete_ buttons also.

The roles don't assigned by default. There's another feature ...

#### Role assignment

When a new user registered there's no role assigned to him. Instead, `UserRegisteredNotification` listener is subscribed to `Registered` event emmitted by `Auth` module. The listener just sends a new `UserRegistered` notification. The notification itself holds the ID of registered user.
Code to refer:
* [App\Providers\EventServiceProvider](https://github.com/dsobolev/laravel-docker/blob/master/www/app/Providers/EventServiceProvider.php)
* [App\Listeners\UserRegisteredNotification](https://github.com/dsobolev/laravel-docker/blob/master/www/app/Listeners/UserRegisteredNotification.php)
* [App\Notifications\UserRegistered](https://github.com/dsobolev/laravel-docker/blob/master/www/app/Notifications/UserRegistered.php)

The list of notifications is available to **Admin** user on [views/users/notifications.blade.php](https://github.com/dsobolev/laravel-docker/blob/master/www/resources/views/users/notifications.blade.php). It's easy to get to the _Edit User_ page from there ([views/users/edit](https://github.com/dsobolev/laravel-docker/blob/master/www/resources/views/users/edit.blade.php)). The role is the only thing that can be changed.

#### Repositories

There are not a lot of code there but I tried to make use of the Repository pattern. The cases:
* [App\Repositories\RoleRepository](https://github.com/dsobolev/laravel-docker/blob/master/www/app/Repositories/RoleRepository.php)
* [App\Repositories\UserRepository](https://github.com/dsobolev/laravel-docker/blob/master/www/app/Repositories/UserRepository.php)
However, I decided to not move some methods to the `UserRepository` since it seemed more natural to use them on particular single object - [App\Models\User](https://github.com/dsobolev/laravel-docker/blob/master/www/app/Models/User.php)