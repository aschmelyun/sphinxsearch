Sphinx Search for Laravel 5.4
=======================
Simple Laravel 5.4 package for make queries to Sphinx Search.

This is a fork version of [sngrl/sphinxsearch](https://github.com/sngrl/sphinxsearch)

Installation
=======================

Run the following command in your console to pull down the package from packagist.

```php
composer require cugr/sphinxsearch:dev-master
```

After updating composer, add the ServiceProvider to the "providers" array in config/app.php:

```php
	'providers' => [
        /*** Some others providers ***/
        CuGR\SphinxSearch\SphinxSearchServiceProvider::class,
    ],
```

You can add this line to the files, where you may use SphinxSearch:

```php
use CuGR\SphinxSearch\SphinxSearch;
```

Configuration
=======================

To use Sphinx Search, you need to configure your indexes and what model it should query. To do so, publish the configuration into your app.

```php
php artisan vendor:publish --provider="CuGR\SphinxSearch\SphinxSearchServiceProvider"
```

This will create the file `config/sphinxsearch.php`. Modify as needed the host and port, and configure the indexes, binding them to a table and id column.

```php
return [
	'host'    => '127.0.0.1',
	'port'    => 9312,
	'indexes' => array (
		'my_index_name' => array ( 'table' => 'my_keywords_table', 'column' => 'id' ),
	)
];
```
Or disable the model querying to just get a list of result ids.
```php
return [
	'host'    => '127.0.0.1',
	'port'    => 9312,
	'indexes' => array (
		'my_index_name' => FALSE,
	)
];
```


Usage
=======================

Basic query (raw sphinx results)
```php
$sphinx = new SphinxSearch();
$results = $sphinx->search('my query', 'index_name')->query();
```

Basic query (with Eloquent)
```php
$results = $sphinx->search('my query', 'index_name')->get();
```

Query another Sphinx index with limit and filters.
```php
$results = $sphinx->search('my query', 'index_name')
	->limit(30)
	->filter('attribute', array(1, 2))
	->range('int_attribute', 1, 10)
	->get();
```

Query with match and sort type specified.
```php
$result = $sphinx->search('my query', 'index_name')
	->setFieldWeights(
		array(
			'partno'  => 10,
			'name'    => 8,
			'details' => 1
		)
	)
	->setMatchMode(\Sphinx\SphinxClient::SPH_MATCH_EXTENDED)
	->setSortMode(\Sphinx\SphinxClient::SPH_SORT_EXTENDED, "@weight DESC")
	->get(true);  //passing true causes get() to respect returned sort order
```


License
=======================

CuGR Sphinx Search is open-sourced software licensed under the [MIT license]('LICENSE')
