# Welcome to EdenUgo!

Hi! I'm Nwokorobia Ugochukwu and this is my work sample for the eden application. It is built using laravel, blade for templating, postgres for the database, boostrap css and jquery. To reduce the complexity of deployment I opted to use the blade template engine as my frontend although ideal the frontend would be better suited as an SPA using a tool such as react or vue. 
	
The endpoints were designed with REST patterns in mind and each end point returns a json result. 
Authentication and authorization are implemented by leveraging the excellent laravel sanctum and fortify packages

The api endpoints accessible are the 
api/customer
api/location 
api/gardners
api/country

 and these are accessible through the ui deployed on heroku at http://edenugo.herokuapp.com/ default credentials have been setup for your convenience  but you can also register a new account if you wish. When you register you  are automatically assigned a gardener in your location to handle your needs.
If a gardener doesnt exist in your location during account registration, the profile creation form fails and throws an error but the user credntials are saved and the user can try again at a later date


Complete Route List can  be accessed by cloning the repo and using the command php artisan route:list in the project directory