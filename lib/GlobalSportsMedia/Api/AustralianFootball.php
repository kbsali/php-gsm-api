<?php

namespace GlobalSportsMedia\Api;

/**
 * @link   http://client.globalsportsmedia.com/documentation/australian_football
 * @author Kevin Saliou <kevin at saliou dot name>
 */
class AustralianFootball extends AbstractApi
{
    protected $section = 'australianfootball';

    public function get_player_statistics()
    {
        throw new \Exception(__METHOD__.' - this method does not exist');
    }
}
