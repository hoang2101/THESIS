<?php 
return array(
/** set your paypal credential **/
'client_id' =>'AWdy3GdKbmQFQ_rhDYu1nruafa3wmIM3iVo25mMYc8TX_ecbhxuuYx1NRvLWyKwM8XT8lpPqF1m8oDAw',
'secret' => 'EJV6L2QX6wqDYopUY4dEE507msGdFX-JxxywpPBfFF2aMhhYwqRab3XEicUPGkstNdOVFCdm9VV8Hogw',
/**
* SDK configuration 
*/
'settings' => array(
/**
* Available option 'sandbox' or 'live'
*/
'mode' => 'sandbox',
/**
* Specify the max request time in seconds
*/
'http.ConnectionTimeOut' => 1000,
/**
* Whether want to log to a file
*/
'log.LogEnabled' => true,
/**
* Specify the file that want to write on
*/
'log.FileName' => storage_path() . '/logs/paypal.log',
/**
* Available option 'FINE', 'INFO', 'WARN' or 'ERROR'
*
* Logging is most verbose in the 'FINE' level and decreases as you
* proceed towards ERROR
*/
'log.LogLevel' => 'FINE'
),
);