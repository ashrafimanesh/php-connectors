# php-connectors
PHP simple and light weight Curl, socket, soap connectors.
The php connectors allow you for communicate to many different types of servers with curl, socket and soap connectors

## Documents

###config.php
On this file you can add/edit index of array : 

return [
    'curl'=>['curl/iCurl.php','iCurl'],
];

For example:
curl index used on call connector for set connector type. this index has 2 items: 1- directory of file 2- class name

###init.php
Include abstrac class for all connectors and static class for call connectors on your projects

For example:
You can call Connector::connect('curl',array()) for connect to server. 
After call connect method it return a abstConnector object on success conection and then you can call Connector::post($abstConnector,$params) for send data to sever


## License

The PHP additional functions is open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT).
