# newsbystasden_website

[Hosted website](http://newsbystasden.site)*  
**Host can be expired. See the project in [Gallery](https://github.com/StasDen/newsbystasden_website#gallery)* instead

Studying Drupal  
Implementing Drupal news website(UA)  
Using **Drupal 9**, **PHP 8.1**

Usage
-----
In order to use this project locally, you need to:
* Download the latest version of [XAMPP](https://www.apachefriends.org/download.html)
* Copy `private` and `public_html` repository folders to `xampp\htdocs`
* Using XAMPP Control Panel(`xampp-control.exe`), run Apache and MySQL
* In [phpMyAdmin](http://localhost/phpmyadmin) create new database  
**IMPORTANT:** db name, user and password should be as in following `public_html\sites\default\settings.php`(*line 804*). Also don't forget to set them in `xampp\phpMyAdmin\config.inc.php`
* Import `u535130821_drupal.sql` repository file to this db
* Go to [website](http://localhost/drupal)

For more details see also [step by step guide how to install Drupal with XAMPP](https://www.youtube.com/watch?v=kMfv_cVKOaA&t=239s)

Gallery
-------
![](https://user-images.githubusercontent.com/93178776/218453795-c8980d56-dece-459f-907c-3d3e7d7b8863.gif)
![](https://user-images.githubusercontent.com/93178776/218455185-140050d8-ff67-42b4-ba7d-09334f0e6ad7.png)
![](https://user-images.githubusercontent.com/93178776/218455301-16cef113-2d91-4033-9231-31c4417b2446.png)
![](https://user-images.githubusercontent.com/93178776/218455445-789962ea-dcd9-4e3c-98e7-e8b68b49f07e.png)

License
-------
This project is licensed under the [Apache License](https://github.com/StasDen/newsbystasden_website/blob/main/LICENSE.md)
