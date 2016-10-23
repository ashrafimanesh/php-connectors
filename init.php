<?php
namespace phpConnectors;
/**
 * abstract class for import connector class
 *
 * @author ramin ashrafimanesh <ashrafimanesh@gmail.com>
 */

abstract class abstConnector{
    public abstract function connect($params);
    public abstract function post($params);
}

class Connector {
    public static function connect($type,$params=array()){
        $types=  require __DIR__.'/config.php';
        if(isset($types[$type])){
            require_once $types[$type][0];
            $class=new $types[$type][1];
            $class->connect($params);
            return $class;
        }
        die('invliad connector type');
    }
    public static function post(abstConnector $abstConnector,$params){
        return $abstConnector->post($params);
    }
}
