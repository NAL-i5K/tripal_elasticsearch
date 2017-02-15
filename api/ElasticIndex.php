<?php

/**
 * Created by PhpStorm.
 * User: mingchen
 * Date: 1/23/17
 * Time: 5:12 PM
 */
class ElasticIndex
{

    protected $client;

    public function __construct($client)
    {

        $this->client = $client;

    }

    public function GetIndexHealth()
    {

        $param['v'] = True;

        $client_health = $this->client->cat()->health($params);
        $client_health = preg_split('/\s+/', $client_health);
        foreach (range(0, 13) as $i) {
            $client_health_arr[$client_health[$i]] = $client_health[$i + 14];
        }

        $output = "<h2>Elasticsearch cluster health information:</h2>\n";
        $output .= '<ul>';
        foreach ($client_health_arr as $key => $value) {
            $output .= "<li><b>$key:</b> $value</li>";
        }

        $output .= '</ul>';

        return $output;
    }

    public function GetIndices ()
    {
        $mappings = $this->client->indices()->getMapping();
        $indices = [];
        foreach (array_keys($mappings) as $index) {
            $indices[$index] = $index;
        }

        return $indices;
    }

    public function GetMappings ($index_name)
    {
        $mappings = $this->client->indices()->getMapping(['index' => $index_name]);
        $fields = array_keys($mappings[$index_name]['mappings']['_default_']['properties']);
        return $fields;
    }

    public function BuildIndex($param)
    {
        return $this->client->index($param);
    }

    /*
     * @indices an array of index names
     * Delete a list of indices
     */
    public function DeleteIndices (array $indices = [])
    {
        if (empty($indices))
        {
            drupal_set_message("No index were selected.", "warning");

            return null;
        }

        foreach ($indices as $index)
        {
            try
            {
                $this->client->indices()->delete(["index" => $index]);
                drupal_set_message("$index has been successfully deleted");
            }
            catch (Exception $exception)
            {
                drupal_set_message($exception->getMessage(), "error");
            }

        }
    }
}