## PRUnderground Frontend Assessment

If you've made it here, we're really excited about potentially working with you!
This assessment is to gauge your ability to:

- Familiarity with Git workflows (clones, commits, pull requests, etc.)
- Quickly get up and running in a new codebase
- Turn requirements into code changes
- Create custom plugins to accomplish common frontend tasks.

## Installation

1. Clone this repo
2. Install Composer: https://getcomposer.org/download/
3. Create your project

```
composer create-project johnpbloch/wordpress-project [YOUR-NAME]-assessment
```

This will create the project in the `[YOUR-NAME]-assessment` directory. The project uses `public` as the document root, so make sure to take that into account in your host configurations.

4. Go into the `[YOUR-NAME]-assessment` that was created after executing the composer command. Then go into `public/wp`.
5. Download the wp-config-sample.php file: https://github.com/WordPress/WordPress/blob/master/wp-config-sample.php
6. Rename `wp-config-sample.php` inside `[YOUR-NAME]-assessment/public/wp` to `wp-config.php`
7. Install MySQL locally and create a new database
8. Edit wp-config.php and modify DB_NAME to point to the DB you create in step 7, DB_USER is your MySQL user, DB_PASSWORD is your MySQL password, DB_HOST can be localhost

Here's are the tasks we'd like you to complete:
