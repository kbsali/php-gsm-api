<?php

namespace GlobalSportsMedia\Api;

/**
 * @link   http://client.globalsportsmedia.com/documentation/motorsports
 * @author Kevin Saliou <kevin at saliou dot name>
 */
class Motorsports extends AbstractApi
{
    protected $section = 'motorsports';

    /**
     * @link http://client.globalsportsmedia.com/documentation/golf/functions/get_circuits
     * @param  int               $id
     * @param  string            $type   (area|championship|competition|season|session|circuit)
     * @param  array             $params array of optional params (lang, detailed)
     * @return \SimpleXMLElement
     */
    public function get_circuits($id, $type, array $params = array())
    {
        $defaults = array(
            'id' => $id,
            'type' => $type,
            'lang' => null,
            'detailed' => null, // yes|no
        );

        return $this->get(__METHOD__, $defaults, $params);
    }

    /**
     * @link http://client.globalsportsmedia.com/documentation/motorsports/functions/get_sessions
     * @param  int               $id
     * @param  string            $type   (area|season|session|team)
     * @param  array             $params array of optional params (detailed, start_date, end_date, lang, last_updated)
     * @return \SimpleXMLElement
     */
    public function get_sessions($id, $type, array $params = array())
    {
        $defaults = array(
            'id' => $id,
            'type' => $type,
            'detailed' => null, // yes|no
            'start_date' => null, // yyyy-mm-dd hh:mm:ss
            'end_date' => null, // yyyy-mm-dd hh:mm:ss
            'lang' => null,
            'last_updated' => null, // yyyy-mm-dd hh:mm:ss
        );

        return $this->get(__METHOD__, $defaults, $params);
    }

    /**
     * @link http://client.globalsportsmedia.com/documentation/{$this->section}/functions/get_tables
     * @param  int               $id
     * @param  string            $type   (championship)
     * @param  int               $year
     * @param  array             $params array of optional params (tabletype, lang)
     * @return \SimpleXMLElement
     */
    public function get_tables($id, $type = 'championship', $year, array $params = array())
    {
        $defaults = array(
            'id' => $id,
            'type' => $type,
            'year' => $year,
            'tabletype' => null, // driver|team|race
            'lang' => null,
        );

        return $this->get(__METHOD__, $defaults, $params);
    }

    /**
     * @link http://client.globalsportsmedia.com/documentation/motorsports/functions/get_teammembers
     * @param  int               $id
     * @param  string            $type   (area|season|team)
     * @param  array             $params array of optional params (detailed, lang, last_updated, active)
     * @return \SimpleXMLElement
     */
    public function get_teammembers($id, $type, array $params = array())
    {
        $defaults = array(
            'id' => $id,
            'type' => $type,
            'detailed' => null, // yes|no
            'lang' => null,
            'last_updated' => null, // yyyy-mm-dd hh:mm:ss
            'active' => null, // yes|no
        );

        return $this->get(__METHOD__, $defaults, $params);
    }
}
