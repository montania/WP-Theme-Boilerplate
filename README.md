This is the boilerplate that we use for new WordPress themes for our customers. It's somewhat based upon the html5boilerplate found at http://html5boilerplate.com/.

You are free to use this as you please, but if you find any errors or have suggestions of improvements please do share them. 

Montania System AB
http://www.montania.se/ (mostly in Swedish)

## Installation
1. Search and replace for "Boilerplate" and change it to your theme name, and rename Boilerplate.php to your new class name
2. Run command ```$ npm install```
3. Run command ```$ grunt build```
4. Run command ```$ composer install```

## Usage

### Grunt commands

- ```$ grunt build``` compiles scss files and js files to style.min.css and main.min.js
- ```$ grunt watch``` Auto compiles scss and js files when there are changes in them
- ```$ grunt bs``` Set up a broswer sync, requires that you have set the proxy in "Gruntfile.js"