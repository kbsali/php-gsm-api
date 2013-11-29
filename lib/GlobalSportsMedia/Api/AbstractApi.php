<?php

namespace GlobalSportsMedia\Api;

use GlobalSportsMedia\Client;

/**
 * Abstract class for Api classes
 * @author Kevin Saliou <kevin at saliou dot name>
 */
abstract class AbstractApi
{
    /**
     * The client
     *
     * @var Client
     */
    protected $client;

    /**
     * @var string
     */
    protected $section;

    /**
     * @param Client $client
     */
    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    /**
     * Constructs the full url request and forwards it to the Client
     * @param  string $path
     * @param  array $defaults
     * @param  array $params
     * @return \SimpleXmlElement
     */
    protected function get($path, array $defaults = null, array $params = null)
    {
        if(null === $defaults || null === $params) {
            return $this->client->get($path);
        }

        $params = array_filter(
            array_merge($defaults, $params),
            array($this, 'isNotNull')
        );

        return $this->client->get($path . '?' . http_build_query($params));
    }

    /**
     * Checks if the variable passed is not null
     *
     * @param mixed $var Variable to be checked
     *
     * @return bool
     */
    protected function isNotNull($var)
    {
        return !is_null($var);
    }

    /**
     * Retrieves all the elements of a given endpoint (even if the
     * total number of elements is greater than 100)
     *
     * @param  string $endpoint API end point
     * @param  array  $params   optional parameters to be passed to the api (offset, limit, ...)
     * @return array  elements found
     */
    protected function retrieveAll($endpoint, array $params = array())
    {
        if (empty($params)) {
            return $this->get($endpoint);
        }
        $defaults = array();
        $params = array_filter(
            array_merge($defaults, $params),
            array($this, 'isNotNull')
        );

        $ret = $this->get($endpoint . '?' . http_build_query($params));

        return $ret;
    }

    /**
     * Returns all areas, which can be 'world', continents and countries.
     * @link http://client.globalsportsmedia.com/documentation/{$this->section}/functions/get_areas
     * @param  array $params array of optional params (area_id, lang)
     * @return \SimpleXMLElement
     */
    public function get_areas(array $params = array())
    {
        $defaults = array(
            'area_id' => null,
            'lang' => null,
        );

        return $this->get('/'.$this->section.'/get_areas', $defaults, $params);
    }

    /**
     * @link http://client.globalsportsmedia.com/documentation/{$this->section}/functions/get_competitions
     * @param  array $params array of optional params (area_id, lang, authorized)
     * @return \SimpleXMLElement
     */
    public function get_competitions(array $params = array())
    {
        $defaults = array(
            'area_id' => null,
            'lang' => null,
            'authorized' => null, // yes|no
        );

        return $this->get('/'.$this->section.'/get_competitions', $defaults, $params);
    }

}
