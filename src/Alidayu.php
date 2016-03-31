<?php
namespace xiaokus\alisms;
include "TopSdk.php";
date_default_timezone_set('Asia/Shanghai');
class Alidayu{
	
    private $topclient;
    public function __construct($appkey,$secretkey) {
        $this->topclient = new \TopClient($appkey, $secretkey);
    }
    public function sendSms($phone,$code,$template_code,$sign, Array $msg_param=null) {
        $req = new \AlibabaAliqinFcSmsNumSendRequest();
        $req->setSmsType('normal');
        $req->setExtend($code);
        $req->setSmsFreeSignName($sign);
        if($msg_param) {
            $msg_param_json = json_encode($msg_param);
            $req->setSmsParam($msg_param_json);
        }
        $req->setRecNum($phone);
        $req->setSmsTemplateCode($template_code);
        return $this->topclient->execute($req);
    }
}


?>