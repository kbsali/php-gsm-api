<?php

namespace GlobalSportsMedia\Api;

/**
 * @link   http://client.globalsportsmedia.com/documentation/basketball
 * @author Kevin Saliou <kevin at saliou dot name>
 */
class Basketball extends AbstractApi
{
    protected $section = 'basketball';

    /**
     * @link http://client.globalsportsmedia.com/documentation/basketball/functions/get_injuries
     * @param  int $id
     * @param  string $type (competition|player|match|team)
     * @return \SimpleXMLElement
     */
    public function get_injuries($id, $type)
    {
        $defaults = array(
            'id' => $id,
            'type' => $type,
        );

        return $this->get('/'.$this->section.'/get_injuries', $defaults, $params);
    }

    /**
     * @link http://client.globalsportsmedia.com/documentation/basketball/functions/get_rankings
     * @param  array $params array of optional params
     * @return \SimpleXMLElement
     */
    public function get_rankings(array $params = array())
    {
        throw new \Exception('Not implemented yet');
    }
}
