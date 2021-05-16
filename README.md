
# wp-config.php
WordPress configuration with local config support and composer autoload if present. Also supports easily setting up  wordpress in a subdirectory and using a different wp-content directory. 

#### EXAMPLES
If your file structure resembels the one below: 
* PROJECT_ROOT/ 
  * public/ # Public/web folder 
    * content/ # Public Content Folder 
      * plugins/ # WordPress Plugins
      * themes/  # WordPress Themes
    * wp/      # WordPress Installed

Your config should look something like this:
```php
  $defaults =[
    ...
    'docroot'        => 'public',      //* PUBLIC DIRECTORY
    'wp_content'     => 'content',     //* WORDPRESS CONTENT DIRECTORY
    'wp_dir'         => 'wp',          //* BLANK UNLESS WORDPRESS IS IN SUB DIRECTORY
    ...
  ];
```

If WordPress starts at your public dir...:
* PROJECT_ROOT/ 
  * public/ # Public/web folder ALSO WordPress 
    * wp-content/ # Public Content Folder 
      * plugins/ # WordPress Plugins
      * themes/  # WordPress Themes

```php
  $defaults =[
    ...
    'docroot'        => 'public',      //* PUBLIC DIRECTORY
    'wp_content'     => 'wp-content',  //* WORDPRESS CONTENT DIRECTORY
    'wp_dir'         => '',            //* BLANK UNLESS WORDPRESS IS IN SUB DIRECTORY
    ...
  ];
```

If WordPress is your PROJECT_ROOT and isn't under a public dir...:
* PROJECT_ROOT/ # Public/web folder ALSO WordPress 
  * content/ # Public Content Folder 
    * plugins/ # WordPress Plugins
    * themes/  # WordPress Themes

```php
  $defaults =[
    ...
    'docroot'        => '',         //* PUBLIC DIRECTORY
    'wp_content'     => 'content',  //* WORDPRESS CONTENT DIRECTORY
    'wp_dir'         => '',         //* BLANK UNLESS WORDPRESS IS IN SUB DIRECTORY
    ...
  ];
```