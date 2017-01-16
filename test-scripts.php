<?php

require_once drupal_get_path('module', 'tripal_elasticsearch').'/vendor/autoload.php';

  $client = Elasticsearch\ClientBuilder::create()->setHosts(variable_get('elasticsearch_hosts', array('localhost:9200')))->build();
  $mappings = $client->indices()->getMapping();
  var_dump($mappings);
/*
  $sql = "SELECT nid FROM node WHERE status=1 ORDER BY nid LIMIT 1;";
  $result = db_query($sql)->fetchAll();
  foreach($result as $record) {
    var_dump($record->nid);
  }


    $sql_table_list = "SELECT table_name FROM information_schema.tables WHERE (table_schema = 'public' OR table_schema = 'chado') ORDER BY table_name;";
    $sql_public_tables = "SELECT table_name FROM information_schema.tables WHERE table_schema = 'public' ORDER BY table_name;";
    $public_tables = db_query($sql_public_tables);
    foreach($public_tables as $record) {
      $table = $record->table_name;
      $public_tables[$table] = $table;
    } 



$files = scandir(drupal_get_path('module', 'tripal_elasticsearch').'/elasticsearch_indices_json_templates', SCANDIR_SORT_DESCENDING);
foreach($files as $key=>$value) {
  if(!preg_match('/\.json$/', $value)) {
    unset($files[$key]);
  }
}

var_dump($files);


var_dump(variable_get('elasticsearch_hots'));
$client = Elasticsearch\ClientBuilder::create()->setHosts(variable_get('elasticsearch_hosts', array('127.0.0.1:9201')))->build();



$elasticsearch_index_json = json_decode(file_get_contents(drupal_get_path('module', 'tripal_elasticsearch').'/elasticsearch_index.json'), true);
var_dump($elasticsearch_index_json);
$response = $client->indices()->create($elasticsearch_index_json);
var_dump($response);
*/