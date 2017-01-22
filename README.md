# PHP based react server side rendering


## Travis CI build status
![Build status](https://travis-ci.org/varyandeveloper/php-based-react-backend-rendering.svg?branch=master)

## Bifore Installation

Before running composer make sure you have installed V8Js PHP extension

You can find how to install V8Js extension for...

* Windows
    * https://blog.xenokore.com/how-to-install-v8js-for-php-on-windows/
* Linux
    * https://blog.xenokore.com/how-to-install-v8js-for-php-on-linux/
    
## Intallation

* composer require varyan/php-based-react-backend-rendering dev-master
    
## Requirements

* php at less 5.6.24
* reactjs/react-php-v8js

## Usage

For MVC systems like...

* Codeigniter

    * file application/config/config.php
    
    ```
        //Add following lines
        
        \VarYans\ReactPHP\Config::setReactSource('path/to/to-es5-compiled/react/js/file');
        \VarYans\ReactPHP\Config::setAppSource('path/to/to-es5-compiled/app/js/file');
        
        //optional you can add error handler for custom error catching
        \VarYans\ReactPHP\Config::setErrorHandler(function(\V8JsException $exception){
            // code coming here
        });
    ```
    
    * file application/config/route.php
    
    ```
        //Add following line in your routes list
        
        $route['home/hello'] = "HomeController/Hello";
    
    ```
    
    * file application/controllers/HomeController.php
    
    ```
        <?php
        
        use VarYans\ReactPHP\React;
    
        class HomeController extends CI_Controller{
        
            /**
            * @return void
            */
            public function hello(){
                echo React::quickRender("Hello",[
                    "name" => "User"
                ]);
            }
            
             /**
             * if you want to use react component as part of your view 
             * you can write it like this
             * @return \View
             */           
            public function bye(){
                $this->load->view("bye",[
                    "var1"=>"val1",
                    "componentAbout"=>React::quickRender("Bye",[
                        "prop1"=>"val1"
                    ])                    
                ]);
            }
        }
    ```

* Laravel 5.3 (version mentioned because laravel folders structure are different in different versions) 

    * file bootstrap/app.php
    
    ```
        //Add following lines
        
        \VarYans\ReactPHP\Config::setReactSource('path/to/to-es5-compiled/react/js/file');
        \VarYans\ReactPHP\Config::setAppSource('path/to/to-es5-compiled/app/js/file');
        
        //optional you can add error handler for custom error catching
        \VarYans\ReactPHP\Config::setErrorHandler(function(\V8JsException $exception){
            // code coming here
        });
    ```
    
    * file routes/web.php
    
    ```
        Route::get('/home/hello','HomeController@hello');
        Route::get('/home/bye','HomeController@bye');
    ```
    
    * file app/Http/Controllers/HomeController.php

    ```
        <?php
        
        namespace App\Http\Controllers;
        
        use VarYans\ReactPHP\React;
    
        class HomeController extends Controller{
        
            /**
            * @return void
            */
            public function hello(){
                return React::quickRender("Hello",[
                    "name" => "User"
                ]);
            }
            
            /**
            * if you want to use react component as part of your view 
            * you can write it like this
            * @return \View
            */
            public function bye(){
                return view('bye',[
                    "var1"=>"val1",
                    "componentAbout"=>React::quickRender("Bye",[
                        "prop1"=>"val1"
                    ])
                ]);
            } 
        }        
    ```
    
## Quick example

Use backend in Usage part

* copy files and folders from example folder in your root directory
    * create build folder inside folder where your index.php file located 
    * open package.json file 
        * if your index.php file inside different folder then your root 
            * change build/react-build.min.js > <folder name where index.php located>/build/react-build.min.js  
            * change build/app.js > <folder name where index.php located>/build/app.js
    * In terminal run
        * npm i && npm run make

## Versioning

For now you can use only dev-master version

## Authors

* Varazdat Stepanyan

## License

This project is licensed under the MIT License - see the [LICENSE.md](LICENSE.md) file for details