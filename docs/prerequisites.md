# Prerequisites

## Requirements
* Elasticsearch
* Elasticsearch-PHP library

## Install Elasticsearch

Please refer to [the Elasticsearch documentation](https://www.elastic.co/guide/en/elasticsearch/reference/current/_installation.html) to install Elasticsearch.

## Install Elasticsearch-PHP library

* Create a folder named `elasticsearch-php` within your drupal `sites/all/libraries` directory.
* Move into the `sites/all/libraries/elasticsearch-php` and Run the following command to install the library:

```
curl -s http://getcomposer.org/installer | php
php composer.phar require "elasticsearch/elasticsearch:~5.0"
```

For more details, visit the [Elasticsearch PHP library API](https://www.elastic.co/guide/en/elasticsearch/client/php-api/current/_quickstart.html).