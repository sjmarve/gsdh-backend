# GSDH backend

>“Like mathematics, programming — when done well — is a valuable intellectual exercise that sharpens our ability to think.”   Bjarne Stroustrup

This code base contains simple API endpoint for products and an Admin backend for managing those products.

This is a laravel project. To run it follow the [laravel.com](www.laravel.com) documention for how to set up its dev enviromnent if not already setup.

The simplest way is to use [laravel valet](https://laravel.com/docs/5.8/valet) if you are on Mac but `php artisan serve` should also work.

It has to be noted that the url link to this backend will be needed for the frontend.

After making sure that the `.env` file is up to date with your setup, the following are commands that need to be run:  
>`php artisan migrate`  
`php artisan storage:link`

The Admin Portal for managing products is behind an auth wall. The following are the super secure credentials:

>`Email: admin@example.com`  
`Password: secret`

The rest should be straight forward from then on.

__  
Shalom
