<?php

require_once 'vendor/autoload.php';

$client = new GlobalSportsMedia\Client('http://webpull.globalsportsmedia.com', 'demo', 'demo');

try {
    $xml = $client->api('soccer')->get_betting_statistics(8055, 'season', 'result');
    $xml = $client->api('soccer')->get_deleted(array('type' => 'person'));
    $xml = $client->api('soccer')->get_career(961, 'team');
    $xml = $client->api('soccer')->get_matches(8318, 'season');
    $xml = $client->api('soccer')->get_matches_live(array(
        'now_playing' => 'no',
        'minutes' => 'yes',
        'type' => 'match',
        'id' => 1445860,
        'date' => '2013-06-11',
    ));
    $xml = $client->api('soccer')->get_matches_live_updates(array(
        'last_updated' => '2012-03-23 13:25:00 ',
    ));
    $xml = $client->api('soccer')->get_match_commentary(1286864, array(
        'source' => 'auto'
    ));
    $xml = $client->api('soccer')->get_squads(663, 'team');
    $xml = $client->api('soccer')->get_tables(8055, 'season');
    $xml = $client->api('soccer')->get_tables_live(4943, 'season');
    $xml = $client->api('soccer')->get_teams(661, 'team', array('detailed' => 'yes'));

    print_r($xml);die;



    $xml = $client->api('soccer')->get_competitions();
    $ret = array();
    foreach ($xml->competition as $competition) {
        $ret[(int) $competition['competition_id']] = array(
            'competition_id' => (int) $competition['competition_id'],
            'name' => (string) $competition['name'],
            'soccertype' => (string) $competition['soccertype'],
            'teamtype' => (string) $competition['teamtype'],
            'display_order' => (int) $competition['display_order'],
            'format' => (string) $competition['format'],
            'area_id' => (int) $competition['area_id'],
            'area_name' => (string) $competition['area_name'],
            'last_updated' => (string) $competition['last_updated'],
            'countrycode' => (string) $competition['countrycode'],
        );
    }
    print_r($ret);die;



    $xml = $client->api('soccer')->get_areas(array('area_id' => 7));
    $ret = array();
    foreach ($xml->area->area as $area) {
        $ret[(int) $area['area_id']] = array(
            'area_id' => (int) $area['area_id'],
            'countrycode' => (string) $area['countrycode'],
            'name' => (string) $area['name'],
        );
    }
    print_r($ret);die;



    $xml = $client->api('am_football')->get_areas(array('area_id' => 7));
    $ret = array();
    foreach ($xml->area->area as $area) {
        $ret[(int) $area['area_id']] = array(
            'area_id' => (int) $area['area_id'],
            'countrycode' => (string) $area['countrycode'],
            'name' => (string) $area['name'],
        );
    }
    print_r($ret);die;

} catch(\Exception $e) {
    die('ERROR : '.$e->getMessage());
}