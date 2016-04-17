<?php
/**
 * Retrieves the essay and its title out of the web page
 */
class Essay implements JsonSerializable {

  private $essay_body;
  private $essay_title;

  function __construct() {
    if(isset($_POST['finish-btn']) && $_POST['finish-btn'] == "submit_essay") {
      if (isset($_POST['essay-body'])) {
        $this->essay_body = htmlentities($_POST['essay-body']);
      } else {
        $this->essay_body = "ERR_SUBMIT";
      }
      if (isset($_POST['essay-title'])) {
        $this->essay_title = htmlentities($_POST['essay-title']);
      } else {
        $this->essay_title = "ERR_SUBMIT";
      }
    } else {
      $this->essay_body = "ERR_SUBMIT";
      $this->essay_title = "ERR_SUBMIT";
    }
  }

  function __get($attr_name) {
    return $this->$attr_name;
  }

  function __set($attr_name, $attr_value) {
    switch ($attr_name) {
      case "essay_title":
        $this->essay_title = $attr_value;
        break;
      case "essay_body":
        $this->essay_body = $attr_value;
        break;
      default:
        echo "EssayError. No such attrubute was found in this class.<br>";
        break;
    }
  }

  function jsonSerialize() {
    $essay_array = array("essay_title" => html_entity_decode($this->essay_title),
                         "essay_body"  => html_entity_decode($this->essay_body));
    return $essay_array;
  }
}

/**
 * Utility class performing operations on Essay
 */
class EssayChecker implements JsonSerializable{

  private $multiple_space_exists;
  private $essay_body_is_empty;
  private $essay_title_is_empty;
  private $len;
  private $sentence_length_exceeds;
  private $no_stanza;
  private $low_Limit;
  private $string_check_low;
  private $contains_spl_chars;
  private $has_num_after_spc;
  private $has_sms;

  function __construct() {
    $this->multiple_space_exists = 0;
    $this->essay_body_is_empty = 0;
    $this->essay_title_is_empty = 0;
    $this->len = 0;
    $this->sentence_length_exceeds=0;
    $this->no_stanza = 0;
    $this->low_Limit = 0;
    $this->string_check_low="";
    $this->contains_spl_chars = 0;
    $this->has_num_after_spc = 0;
    $this->has_sms = 0;
  }

  function __get($attr_name) {
    return $this->$attr_name;
  }

  function spaceChecker(Essay $essay_obj) {
    if(preg_match("/[^\S\r\n]{2,}/i",$essay_obj->essay_body)) {
      $this->multiple_space_exists = 1;
    } else {
      $this->multiple_space_exists = 0;
    }
  }

  function emptinessChecker(Essay $essay_obj) {
    if($essay_obj->essay_body == "") {
      $this->essay_body_is_empty = 1;
    } else {
      $this->essay_body_is_empty = 0;
    }

    if($essay_obj->essay_title == "") {
      $this->essay_title_is_empty = 1;
    } else {
      $this->essay_title_is_empty = 0;
    }
  }

 //dip-----
  function lengthChecker(Essay $essay_obj){
    $this->len=substr_count($essay_obj->essay_body, '.');
    $substring_check=$essay_obj->essay_body;
    for($beg=0;$beg<$this->len;$beg++)
    {
      $pos=strpos($essay_obj->essay_body,".");
      $substring_check=substr($substring_check,$beg,$pos);
      if(str_word_count($substring_check)>14)
      {
        $this->sentence_length_exceeds=1;
        break;
      }
      else
      {
        $this->sentence_length_exceeds=0;
      }
      $substring_left=substr($essay_obj->essay_body,$pos);
      $essay_obj->essay_body=$substring_left;
    }
  }
  function stanzaChecker(Essay $essay_obj){
    if(substr_count($essay_obj->essay_body,"\n")<2)
    {
      $this->no_stanza = 1;
    }
    else
    {
     $this->no_stanza = 0;
    }
  }
  function lowLimitChecker(Essay $essay_obj){
    $this->string_check_low=$essay_obj->essay_body;
    $min_Limit=6;
    if(str_word_count($this->string_check_low)<$min_Limit)
    {
      $this->low_Limit = 1;
    }
    else
    {
     $this->low_Limit = 0;
    }
  }

  function specialCharsChecker(Essay $essay_obj) {
    if(preg_match("/[\^%&*}{@#~><>|=_+¬-]/", $essay_obj->essay_body)) {
      $this->contains_spl_chars = 1;
    } else {
      $this->contains_spl_chars = 0;
    }
  }

  function periodSpaceChecker(Essay $essay_obj) {
    if(preg_match("/(^\d)|([!\.][\s]*\d+)/", $essay_obj->essay_body)) {
      $this->has_num_after_spc = 1;
    } else {
      $this->has_num_after_spc = 0;
    }
  }

  function smsLangChecker(Essay $essay_obj) {
    $smsLangs ="AFAIK,AFK,NM,THNX,THX,C U,C U L8R,SWYP,SWAK,hh,CHX,SAL,WYD,WYA,SWYD,BTW,YOYO,ASAP,OMG,HAK,LOL,ROTFL,WDYMBT,LTWT,FTW,MSG,PLZ,TTYL,ILU,B/C,BCZ,TU,IDK,FYI,SMH,BFN,IMO,IMHO,BF,BFF,GF,SO,IH8U,OMFG,STFU,WTH,WTF,JK,UR,1DRFL,B4,EZ,SUM1,CU,4U,2MRO,2MORO,2MRW,ROF,LW,CY,XOXO,ANY1,NE1,NO1,2DAY,2NE,4GET,A4D,GR8,H8,KK,FRND,4M,R8,N8,NI8,GDN8,GDNI8,GDMRN9,TTYL,4Q";
    $CompStr = $essay_obj->essay_body;
    $len = strlen($CompStr);
    $arr = explode(",",$smsLangs);
    // echo "<pre>";
    // var_dump($arr);
    // echo "</pre>";
    //$result = strncasecmp ( $CompStr , $smsLangs , $len );
    foreach ($arr as $sms) {
      //echo $sms."<br>";
      if (stristr($CompStr, $sms)) {
        // echo $sms;
        // echo '  true<br>';
        $this->has_sms = 1;
      }
    }
  }
//dip
  function jsonSerialize() {
    $essay_corrections = array("multiple_space_exists"   => $this->multiple_space_exists,
                               "essay_title_is_empty"    => $this->essay_title_is_empty,
                               "essay_body_is_empty"     => $this->essay_body_is_empty,
                               "len"                     => $this->len,
                               "sentence_length_exceeds" => $this->sentence_length_exceeds,
                               "no_stanza"               => $this->no_stanza,
                               "min_limit_for_word"      => $this->low_Limit,
                               "essay_content"           => $this->string_check_low,
                               "contains_spl_chars"      => $this->contains_spl_chars,
                               "has_num_after_spc"       => $this->has_num_after_spc,
                               "has_sms"                 => $this->has_sms);
    return $essay_corrections;
  }
}


$essay = new Essay();
$essaychecker = new EssayChecker();
$essaychecker->emptinessChecker($essay);
$essaychecker->spaceChecker($essay);
//$essaychecker->lengthChecker($essay);
$essaychecker->stanzaChecker($essay);
$essaychecker->lowLimitChecker($essay);
$essaychecker->specialCharsChecker($essay);
$essaychecker->periodSpaceChecker($essay);
$essaychecker->smsLangChecker($essay);
$composition_array = array("essay"         => $essay,
                           "essay_checker" => $essaychecker);
echo json_encode($composition_array);





//connection functions----------------------------------------------------------------
	function make_connection() {
		define("DB_SERVER","localhost");
		define("DB_USER","root");
		define("DB_PASS","");
		define("DB_NAME","studentenhancementproject");
	// 1. Creating a database connection_aborted
		$connection = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);

		//testing connection error
		if(mysqli_connect_errno()) {
			die("Database connection failed: " . mysqli_connect_error() .
				" (" . mysqli_connect_errno() . ")"
				);
		}
		return $connection;
	}

	function end_connection($connection) {
		// 5. Close database connection
		mysqli_close($connection);
	}

  function confirm_query($result_set){
		global $connection;
		if(!$result_set){
			//failure
			$message = "creation error";

			die("database query failed.". mysqli_error($connection));
		}
	}

  //creating or making connection
  $connection = make_connection();
  $std_id = "it1251";
  $std_nm = "Dipanjan Bhattacharjee";
  $std_dept = "IT";
  $std_sem = "8th";
  $std_roll = 21;
  $db_essay_title=mysqli_real_escape_string($connection, $essay->essay_title);
  $db_essay_body=mysqli_real_escape_string($connection, $essay->essay_body);

  $query = "INSERT INTO essay_db (std_id, std_nm, std_dept, std_sem, std_roll, essay_title, essay_body) VALUES ('{$std_id}', '{$std_nm}', '{$std_dept}', '{$std_sem}', {$std_roll}, '{$db_essay_title}', '{$db_essay_body}')";
  $result = mysqli_query($connection, $query);
  confirm_query($result);
  // if(mysqli_affected_rows($connection) > 0) {
  //   echo "Successfully";
  // }


?>
