<meta http-equiv="refresh" content="1">
<?php
require_once('classdatarieng.php');
$fchat2=new faceseochatrieng();
session_start();
error_reporting(E_ALL);
ini_set("display_errors", 1);
class Fork
{
    private $_handles = array();
    private $_mh      = array();
 
    function __construct()
    {
        $this->_mh = curl_multi_init();
    }
 
    function add($url)
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_TIMEOUT, 30);
        curl_multi_add_handle($this->_mh, $ch);
        $this->_handles[] = $ch;
        return $this;
    }
 
    function run()
    {
        $running=null;
        do {
            curl_multi_exec($this->_mh, $running);
            usleep (250000);
        } while ($running > 0);
        for($i=0; $i < count($this->_handles); $i++) {
            $out = curl_multi_getcontent($this->_handles[$i]);
            $data[$i] = json_decode($out);
            curl_multi_remove_handle($this->_mh, $this->_handles[$i]);
        }
        curl_multi_close($this->_mh);
        return $data;
    }
}
 $timese=file_get_contents('time.txt');
$fork = new Fork;
 
$output = $fork->add("http://localhost/faceseo.vn/fchat/chatgroup.php?t=".$timese)
    ->add("http://localhost/faceseo.vn/fchat/onlineuser.php?t=".$timese)
    ->add("http://localhost/faceseo.vn/fchat/chatuser.php?t=".$timese)
    ->run();

$array_content['group']=$output[0]; 
$array_content['onlineuser']=$output[1];
$array_content['chatuser']=$output[2];

$jsonen=json_encode($array_content);
$fp = fopen("chat.txt","wb");
fwrite($fp,$jsonen);
fclose($fp);


$date = date_create();
$timestamp=date_timestamp_get($date);
$fp = fopen("time.txt","wb");
fwrite($fp,$timestamp);
fclose($fp);

?>