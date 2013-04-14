## Twitter Pics

### Display tweets and pictures for a specified hashtag

1. Run composer install at your project root
  
  ```curl -sS https://getcomposer.org/installer | php```
  ```php composer.phar install```

2. Configure app.php
3. Setup database.php
4. Migrate database structure

  ```php artisan migrate```

5. Configure app/database/seed/DatabaseSeeder.php with an admin account
6. Seed the database

    ```php artisan db:seed```
    
7. Get tweets

  ```php artisan twitter:scan```
  
8. Moderate tweets at http://\<your-install\>/dashboard
9. Configure a cron service to launch the twitter:scan