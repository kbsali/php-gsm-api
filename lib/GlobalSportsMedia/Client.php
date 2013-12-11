<?php

namespace GlobalSportsMedia;

use SimpleXMLElement;

/**
 * Simple PHP GlobalSportsMedia client
 * @author Kevin Saliou <kevin at saliou dot name>
 * Website: http://github.com/kbsali/php-globalsportsmedia-api
 */
class Client
{
    /**
     * @var array
     */
    private static $defaultPorts = array(
        'http'  => 80,
        'https' => 443,
    );

    /**
     * @var int
     */
    private $port;

    /**
     * @var string
     */
    private $url;

    /**
     * @var boolean
     */
    private $checkSslCertificate = false;

    /**
     * @var boolean
     */
    private $checkSslHost = false;

    /**
     *
     * Flag to determine authentication method
     *
     * @var boolean
     */
    private $useHttpAuth = true;

    /**
     * @var array APIs
     */
    private $apis = array();

    /**
     * @var string
     */
    private $httpAuthUser;

    /**
     * @var string
     */
    private $httpAuthPwd;

    /**
     * @var string
     */
    private $cacheDir;

    /**
     * @var boolean
     */
    private $useCache = true;

    /**
     * @param string $url
     * @param string $user http auth username
     * @param string $pwd  http auth password
     */
    public function __construct($url, $user = '', $pwd = '')
    {
        $this->url          = $url;
        $this->httpAuthUser = $user;
        $this->httpAuthPwd  = $pwd;
    }

    /**
     * @param  string                    $name
     * @return Api\AbstractApi
     * @throws \InvalidArgumentException
     */
    public function api($name)
    {
        if (!isset($this->apis[$name])) {
            switch ($name) {

                case 'soccer':
                    $api = new Api\Soccer($this);
                    break;
                case 'am_football':
                    $api = new Api\AmericanFootball($this);
                    break;
                case 'aus_football':
                    $api = new Api\AustralianFootball($this);
                    break;
                case 'baseball':
                    $api = new Api\Baseball($this);
                    break;
                case 'basketball':
                    $api = new Api\Basketball($this);
                    break;
                case 'cricket':
                    $api = new Api\Cricket($this);
                    break;
                case 'golf':
                    $api = new Api\Golf($this);
                    break;
                case 'handball':
                    $api = new Api\Handball($this);
                    break;
                case 'hockey':
                    $api = new Api\Hockey($this);
                    break;
                case 'motorsports':
                    $api = new Api\Motorsports($this);
                    break;
                case 'rugby':
                    $api = new Api\Rugby($this);
                    break;
                case 'tennis':
                    $api = new Api\Tennis($this);
                    break;
                case 'volleyball':
                    $api = new Api\Volleyball($this);
                    break;

                default:
                    throw new \InvalidArgumentException();
            }

            $this->apis[$name] = $api;
        }

        return $this->apis[$name];
    }

    /**
     * Returns Url
     * @return string
     */
    public function getUrl()
    {
       return $this->url;
    }

    /**
     * HTTP GETs a xml $path
     * @param  string            $path
     * @return \SimpleXMLElement
     */
    public function get($path)
    {
        if (false === $xml = $this->runRequest($path, 'GET')) {
            return false;
        }

        return $xml;
    }

    /**
     * Turns on/off ssl certificate check
     * @param boolean $check
     */
    public function setCheckSslCertificate($check = false)
    {
        $this->checkSslCertificate = $check;
    }

    /**
     * Turns on/off ssl host certificate check
     * @param boolean $check
     */
    public function setCheckSslHost($check = false)
    {
      $this->checkSslHost = $check;
    }

    /**
     * Turns on/off http auth
     * @param bool $use
     * @internal param bool $check
     */
    public function setUseHttpAuth($use = true)
    {
        $this->useHttpAuth = $use;
    }

    /**
     * Set the port of the connection
     * @param int $port
     */
    public function setPort($port = null)
    {
        if (null !== $port) {
            $this->port = (int) $port;
        }
    }

    /**
     * Set the cache directory
     * @param string $cacheDir
     */
    public function setCacheDir($cacheDir = null)
    {
        if (null !== $cacheDir) {
            $this->cacheDir = $cacheDir;
        }
        if (!is_dir($this->cacheDir)) {
            mkdir($this->cacheDir, 0777, true);
        }
    }

    /**
     * @param boolean $useCache
     */
    public function setUseCache($useCache = true)
    {
        $this->useCache = (bool) $useCache;
    }

    /**
     * Returns the port of the current connection,
     * if not set, it will try to guess the port
     * from the given $urlPath
     * @param  string $urlPath the url called
     * @return int    the port number
     */
    public function getPort($urlPath = null)
    {
        if (null === $urlPath) {
            return $this->port;
        }
        if (null !== $this->port) {
            return $this->port;
        }
        $tmp = parse_url($urlPath);

        if (isset($tmp['port'])) {
            $this->setPort($tmp['port']);

            return $this->port;
        }
        $this->setPort(self::$defaultPorts[$tmp['scheme']]);

        return $this->port;
    }

    /**
     * @param  string                        $path
     * @param  string                        $method
     * @param  string                        $data
     * @return false|SimpleXMLElement|string
     * @throws \Exception                    If anything goes wrong on curl request
     */
    private function runRequest($path, $method = 'GET', $data = '')
    {
        if (true === $this->useCache) {
            if (null === $this->cacheDir) {
                throw new \Exception('Specify cache directory');
            }
            $cacheFile = $this->cacheDir.'/'.$this->slugify($this->url.$path);
            if (file_exists($cacheFile)) {
                return new \SimpleXMLElement(file_get_contents($cacheFile));
            }
        }
        $this->getPort($this->url.$path);

        $curl = curl_init();

        curl_setopt($curl, CURLOPT_URL, $this->url.$path);
        curl_setopt($curl, CURLOPT_VERBOSE, 0);
        curl_setopt($curl, CURLOPT_HEADER, 0);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl, CURLOPT_PORT , $this->port);

        // curl_setopt($curl, CURLOPT_CONNECTTIMEOUT, 5); // The number of seconds to wait while trying to connect
        // curl_setopt($curl, CURLOPT_TIMEOUT, 3); // The maximum number of seconds to allow cURL functions to execute.

        // GSM API is XML only
        curl_setopt($curl, CURLOPT_HTTPHEADER, array(
            'Content-Type: text/xml',
        ));

        if (isset($this->httpAuthUser) && isset($this->httpAuthPwd) && $this->useHttpAuth) {
            curl_setopt($curl, CURLOPT_USERPWD, $this->httpAuthUser.':'.$this->httpAuthPwd );
            curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
        }
        if (80 !== $this->port) {
            curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, $this->checkSslCertificate);
            curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, $this->checkSslHost);
        }

        switch ($method) {
            case 'POST':
                curl_setopt($curl, CURLOPT_POST, 1);
                if (isset($data)) {curl_setopt($curl, CURLOPT_POSTFIELDS, $data);}
                break;
            case 'PUT':
                curl_setopt($curl, CURLOPT_CUSTOMREQUEST, 'PUT');
                if (isset($data)) {curl_setopt($curl, CURLOPT_POSTFIELDS, $data);}
                break;
            case 'DELETE':
                curl_setopt($curl, CURLOPT_CUSTOMREQUEST, 'DELETE');
                break;
            default: // GET
                break;
        }
        $response = curl_exec($curl);

        if (false !== strpos($response, 'class="errors"')) {
            $xml = new \DOMDocument();
            $xml->loadHTML($response);
            foreach($xml->getElementsByTagName('div') as $div) {
                if('errors' == $div->getAttribute('class')) {
                    $tmp = parse_url($this->url.$path);
                    $e = new \Exception((string)$div->nodeValue.' - (you requested : '.$tmp['path'].'?'.$tmp['query'].')');
                    curl_close($curl);
                    throw $e;
                }
            }
        }

        if (true === $this->useCache) {
            file_put_contents($cacheFile, $response);
        }

        if (curl_errno($curl)) {
            $e = new \Exception(curl_error($curl), curl_errno($curl));
            curl_close($curl);
            throw $e;
        }
        curl_close($curl);

        if ($response) {
            if ('<' === substr($response, 0, 1)) {
                return new \SimpleXMLElement($response);
            }

            return $response;
        }

        return true;
    }

    public function slugify($text)
    {
        $text = preg_replace('~[^\\pL\d]+~u', '-', $text);
        $text = trim($text, '-');
        $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);
        $text = strtolower($text);
        $text = preg_replace('~[^-\w]+~', '', $text);

        if (empty($text)) {
           return 'n-a';
        }

        return $text;
    }

}
