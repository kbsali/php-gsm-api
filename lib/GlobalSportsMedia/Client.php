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
     * @param  string $path
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
        $this->getPort($this->url.$path);

        $curl = curl_init();
        if (isset($this->httpAuthUser) && isset($this->httpAuthPwd) && $this->useHttpAuth) {
            curl_setopt($curl, CURLOPT_USERPWD, $this->httpAuthUser.':'.$this->httpAuthPwd );
            curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
        }
        curl_setopt($curl, CURLOPT_URL, $this->url.$path);
        curl_setopt($curl, CURLOPT_VERBOSE, 0);
        curl_setopt($curl, CURLOPT_HEADER, 0);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl, CURLOPT_PORT , $this->port);
        if (80 !== $this->port) {
            curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, $this->checkSslCertificate);
            curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, $this->checkSslHost);
        }

        $tmp = parse_url($this->url.$path);
        if ('xml' === substr($tmp['path'], -3)) {
            curl_setopt($curl, CURLOPT_HTTPHEADER, array(
                'Content-Type: text/xml',
            ));
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

        if(false !== strpos($response, 'not authorized')) {
            $e = new \Exception('Not authorized! Please check your subscription (you requested : '.$tmp['path'].')');
            curl_close($curl);
            throw $e;
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
}
