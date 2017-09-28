Sample news feed realisation
===================
## Installation ##

```
run migration
/migrations/db.sql

```


## Usage ##
```php

$db = new \App\Core\DB('localhost', 'testbase', 'root', 'root');


$categoryRepository = new CategoryRepository($db);

$category = $categoryRepository->create('Категория подарки');

$newsRepository = new NewsRepository($db);

$article = $newsRepository->create($category, 'Привет мир!');

$user = new UserRepository($db);

$user->create('test@test.ru');

$newsRepository->like($article, $user);

```