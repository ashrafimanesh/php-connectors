<?php

/**
 * Description of iCurl
 *
 * @author ramin ashrafimanesh <ashrafimanesh@gmail.com>
 */
class iCurl extends abstConnector{
    private $conn;
    
    /**
     * connect to url
     * @param array $params ['url'=>'example.com']
     * @return mixed
     */
    public function connect($params){
        $url=$params['url'];
        $this->conn=curl_init($url);
        return  (!$this->conn || !is_resource($this->conn)) ? false : $this->conn;
    }
    /**
     * post data to connection
     * @param type $params ['data'=>array(),'options'=>array()]
     * @return mixed
     */
    public function post($params){
        $data=isset($params['data']) ? $params['data'] : null;
        $options = isset($params['options']) ? $params['options'] : array();
        if($data){
            $options[CURLOPT_POSTFIELDS] = $data;
        }
        if (!is_array($options)){
    		$options = array();
    	}
    	else if (in_array(CURLOPT_POSTFIELDS, $options) AND sizeof($options[CURLOPT_POSTFIELDS]) > 0){
    		$options[CURLOPT_POST] = true;
    	}
//        $options[CURLOPT_USERAGENT]=!isset($options[CURLOPT_USERAGENT]) ? 'PHP' : $options[CURLOPT_USERAGENT];
        $options[CURLOPT_RETURNTRANSFER]= !isset($options[CURLOPT_RETURNTRANSFER]) ? true : $options[CURLOPT_RETURNTRANSFER];
        return $this->_exec($options);
    }
    
    private function _exec($options){
        if ($this->conn AND is_resource($this->conn)){
            curl_setopt_array($this->conn, $options); // set options for cURL transfer 
            $result = curl_exec($this->conn); // execute cURL session
            curl_close($this->conn); // close cURL session
        }
        else{
            $result = false;
        }
    	
    	return $result;
    }
}
