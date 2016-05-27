<?php
/**
 * Yii2 cURL wrapper
 * With RESTful support.
 *
 * @category  Web-yii2
 * @package   yii2-curl
 * @author    Nils Gajsek <info@linslin.org>
 * @copyright 2013-2015 Nils Gajsek<info@linslin.org>
 * @license   http://opensource.org/licenses/MIT MIT Public
 * @version   1.0.4
 * @link      http://www.linslin.org
 *
 */
namespace common\components;
use common\events\CurlEvent;
use Yii;
use yii\base\Component;
use yii\base\Event;
use yii\base\Exception;
use yii\base\Object;
use yii\helpers\Json;
use yii\web\HttpException;
/**
 * cURL class
 */
class Curl extends Component
{
    const EVENT_AFTER_REQUEST = 'afterRequest';
    // ################################################ class vars // ################################################
    /* @var $method string post|get|put|delete */
    public $method;

    public $url;
    /**
     * @var string
     * Holds response data right after sending a request.
     */
    public $response = null;
    /**
     * @var integer HTTP-Status Code
     * This value will hold HTTP-Status Code. False if request was not successful.
     */
    public $responseCode = null;
    /**
     * @var array HTTP-Status Code
     * Custom options holder
     */
    private $_options = [];
    /**
     * @var array default curl options
     * Default curl options
     */
    private $_defaultOptions = [
        CURLOPT_USERAGENT      => 'Yii2-Curl-Agent',
        CURLOPT_TIMEOUT        => 10,
        CURLOPT_CONNECTTIMEOUT => 10,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_HEADER         => false,
        CURLOPT_SSL_VERIFYHOST => false,
        CURLOPT_SSL_VERIFYPEER => false
    ];
    /**
     * @var array 可接受的请求方法
     */
    private $_methods = ['head', 'get', 'post', 'put', 'delete'];
    /**
     * @var int curl执行时间
     */
    private $execTime = 0;
    // ############################################### class methods // ##############################################
    /**
     * Start performing GET-HTTP-Request
     *
     * @param string  $url
     * @param boolean $raw if response body contains JSON and should be decoded
     *
     * @return mixed response
     */
	public function __call($name, $params)
    {
        if (in_array($name, $this->_methods)) {
            $this->method = strtoupper($name);
            return call_user_func_array([$this, 'httpRequest'], $params);
        }
        return parent::__call($name, $params);
    }

    /**
     * Set curl option
     *
     * @param string $key
     * @param mixed  $value
     *
     * @return $this
     */
    public function setOption($key, $value)
    {
        //set value
        $this->_options[$key] = $value;
        //return self
        return $this;
    }
    /**
     * Unset a single curl option
     *
     * @param string $key
     *
     * @return $this
     */
    public function unsetOption($key)
    {
        //reset a single option if its set already
        if (isset($this->_options[$key])) {
            unset($this->_options[$key]);
        }
        return $this;
    }
    /**
     * Unset all curl option, excluding default options.
     *
     * @return $this
     */
    public function unsetOptions()
    {
        //reset all options
        if (isset($this->_options)) {
            $this->_options = [];
        }
        return $this;
    }
    /**
     * Total reset of options, responses, etc.
     *
     * @return $this
     */
    public function reset()
    {
        //reset all options
        if (isset($this->_options)) {
            $this->_options = [];
        }
        //reset response & status code
        $this->response = null;
        $this->responseCode = null;
        return $this;
    }
    /**
     * Return a single option
     *
     * @return mixed // false if option is not set.
     */
    public function getOption($key)
    {
        //get merged options depends on default and user options
        $mergesOptions = $this->getOptions();
        //return value or false if key is not set.
        return isset($mergesOptions[$key]) ? $mergesOptions[$key] : false;
    }
    /**
     * Return merged curl options and keep keys!
     *
     * @return array
     */
    public function getOptions()
    {
        return $this->_options + $this->_defaultOptions;
    }
    /**
     * Performs HTTP request
     *
     * @param string  $method
     * @param string  $url
     * @param boolean $raw if response body contains JSON and should be decoded -> helper.
     *
     * @throws Exception if request failed
     * @throws HttpException
     *
     * @return mixed
     */
    public function httpRequest($url, $params = [], $raw = false)
    {
        //Init
        $body = '';
        $this->url = $url;
        $this->method =  strtoupper($this->method);
        //set request type and writer function
        $this->setOption(CURLOPT_CUSTOMREQUEST, $this->method);
        //check if method is head and set no body
        if ($this->method === 'HEAD') {
            $this->setOption(CURLOPT_NOBODY, true);
            $this->unsetOption(CURLOPT_WRITEFUNCTION);
        } else {
            if($this->method === 'POST'){
                if(!empty($params)){
                    $this->setOption(CURLOPT_POSTFIELDS, is_array($params) ? http_build_query($params, PHP_QUERY_RFC3986) : $params);
                }
            }
            if($this->method === 'GET'){
                if(!empty($params)){
                    $url .= '?'.http_build_query($params, PHP_QUERY_RFC3986);
                }
            }

			if($this->method === 'PUT') {
				if(!empty($params)){
                    $this->setOption(CURLOPT_POSTFIELDS, Json::encode($params));
                }
			}

            $this->setOption(CURLOPT_WRITEFUNCTION, function ($curl, $data) use (&$body) {
                $body .= $data;
                return mb_strlen($data, '8bit');
            });
        }
        /**
         * proceed curl
         */
        $curl = curl_init($url);
        curl_setopt_array($curl, $this->getOptions());
        //定义请求开始时间
        $curlBeginTime = microtime(true);
        $body = curl_exec($curl);
        $this->execTime = microtime(true) - $curlBeginTime;
        //check if curl was successful
        if ($body === false) {
            throw new Exception('curl request failed: ' . curl_error($curl) , curl_errno($curl));
        }
        //retrieve response code
        $this->responseCode = curl_getinfo($curl, CURLINFO_HTTP_CODE);
        $this->response = $body;
        //stop curl
        curl_close($curl);
        // 触发EVENT_AFTER_REQUEST事件
        $event = new CurlEvent(['params' => $params]);
        $this->trigger(self::EVENT_AFTER_REQUEST, $event);
        //check responseCode and return data/status
        if ($this->responseCode >= 200 && $this->responseCode < 300) { // all between 200 && 300 is successful
            if ($this->getOption(CURLOPT_CUSTOMREQUEST) === 'HEAD') {
                return true;
            } else {
                return $raw ? $this->response : Json::decode($this->response);
            }
        } elseif ($this->responseCode >= 400 && $this->responseCode <= 510) { // client and server errors return false.
            return false;
        } else { //any other status code or custom codes
            return true;
        }
    }
    public function init()
    {
        $this->on(self::EVENT_AFTER_REQUEST, [$this, 'log']);
    }

    public function log($event)
    {
        // 记录日志
        Yii::info(join(' ', [
            strtoupper($event->sender->method),
            $event->sender->url,
            http_build_query($event->params, PHP_QUERY_RFC3986),
            str_replace(' ', '%20', $event->sender->response),
            $event->sender->getExecTime()
        ]), 'access\curl');
    }
    /**
     * @return int 获取curl执行时间 只读
     */
    public function getExecTime()
    {
        return $this->execTime;
    }
}