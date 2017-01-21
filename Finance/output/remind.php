<?php
@ini_set("display_errors","1");
@ini_set("display_startup_errors","1");

require_once("include/dbcommon.php");
require_once('classes/remindpwdpage.php');
require_once('include/xtempl.php');
require_once(getabspath("classes/cipherer.php"));





$layout = new TLayout("remind2", "RoundedOffice", "MobileOffice");
$layout->version = 2;
$layout->blocks["top"] = array();
$layout->containers["remind"] = array();
$layout->container_properties["remind"] = array(  );
$layout->containers["remind"][] = array("name"=>"remindheader",
	"block"=>"remindheader", "substyle"=>2  );

$layout->containers["remind"][] = array("name"=>"message",
	"block"=>"message_block", "substyle"=>1  );

$layout->containers["remind"][] = array("name"=>"wrapper",
	"block"=>"", "substyle"=>1 , "container"=>"fields" );
$layout->containers["fields"] = array();
$layout->container_properties["fields"] = array(  );
$layout->containers["fields"][] = array("name"=>"remindfields",
	"block"=>"", "substyle"=>1  );

$layout->containers["fields"][] = array("name"=>"remindbuttons",
	"block"=>"remindbuttons", "substyle"=>2  );

$layout->skins["fields"] = "fields";


$layout->skins["remind"] = "1";

$layout->blocks["top"][] = "remind";
$page_layouts["remind"] = $layout;

$layout->skinsparams = array();
$layout->skinsparams["empty"] = array("button"=>"button2");
$layout->skinsparams["menu"] = array("button"=>"button1");
$layout->skinsparams["hmenu"] = array("button"=>"button1");
$layout->skinsparams["undermenu"] = array("button"=>"button1");
$layout->skinsparams["fields"] = array("button"=>"button1");
$layout->skinsparams["form"] = array("button"=>"button1");
$layout->skinsparams["1"] = array("button"=>"button1");
$layout->skinsparams["2"] = array("button"=>"button1");
$layout->skinsparams["3"] = array("button"=>"button1");






$layout = new TLayout("remind_success2", "RoundedOffice", "MobileOffice");
$layout->version = 2;
$layout->blocks["top"] = array();
$layout->containers["remindsuccess"] = array();
$layout->container_properties["remindsuccess"] = array(  );
$layout->containers["remindsuccess"][] = array("name"=>"remindheader",
	"block"=>"remindheader", "substyle"=>2  );

$layout->containers["remindsuccess"][] = array("name"=>"wrapper",
	"block"=>"", "substyle"=>1 , "container"=>"fields" );
$layout->containers["fields"] = array();
$layout->container_properties["fields"] = array(  );
$layout->containers["fields"][] = array("name"=>"weresent_message",
	"block"=>"", "substyle"=>1  );

$layout->skins["fields"] = "fields";


$layout->containers["remindsuccess"][] = array("name"=>"remindsucbuttons",
	"block"=>"", "substyle"=>2  );

$layout->skins["remindsuccess"] = "1";

$layout->blocks["top"][] = "remindsuccess";
$page_layouts["remind_success"] = $layout;

$layout->skinsparams = array();
$layout->skinsparams["empty"] = array("button"=>"button2");
$layout->skinsparams["menu"] = array("button"=>"button1");
$layout->skinsparams["hmenu"] = array("button"=>"button1");
$layout->skinsparams["undermenu"] = array("button"=>"button1");
$layout->skinsparams["fields"] = array("button"=>"button1");
$layout->skinsparams["form"] = array("button"=>"button1");
$layout->skinsparams["1"] = array("button"=>"button1");
$layout->skinsparams["2"] = array("button"=>"button1");
$layout->skinsparams["3"] = array("button"=>"button1");



$xt = new Xtempl();

$id = postvalue("id");
$id = $id ? $id : 1;


$params = array();
$params["id"] = $id;
$params['xt'] = &$xt;
$params["pageType"] = PAGE_REMIND;
$params["tName"]= NOT_TABLE_BASED_TNAME;
$params["templatefile"] = "remind.htm";
$params["needSearchClauseObj"] = false;
$params["captchaValue"] = postvalue("value_captcha_" . $id);
$params["userEmail"] = postvalue("username_email");
$params["action"] = postvalue("btnSubmit");
$params["mode"] = RemindPasswordPage::readRemindModeFromRequest();

$pageObject = new RemindPasswordPage( $params );
$pageObject->init();

$pageObject->process();

?>
