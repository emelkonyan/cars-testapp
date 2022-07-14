
# Subscriber MVC project

This is simple vanila PHP-based MVC framework.

## Base capabilities

The project has two modules - user module (for register, login and logout features) 
and subscription module - for adding and removing subscriptions for each user.

Using the `https://libraries.io` API the latest PHP modules are being requested. 
Each user can add any module to its subssription list, preview the list and remove
libs from it.

Basic search and filtering are also posible.

The project is for __backend capabilities only__, please do not pay attention 
to the ugly frontend :)

The project is packed and running in Docker containers, to test simply pull to repo and 
run `docker-compose up`. The project will be ready and running on port 8080

## Future development
The project has a lot of bugs and features to be fixed, most of them are available 
inside the code as comments ot `TODOs`. 

Since this is just a dummy projects, all passwords and keys are submitted in the repo.

__This whole codebase has been writen from complete scratch for a day!!__
