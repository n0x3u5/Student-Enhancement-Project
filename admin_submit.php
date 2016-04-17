<?php
var_dump($_POST);
$check=$_POST['count_group'];
foreach ($check as $count) {
	echo $count."<br>";
}
class adminEntry{

	private $title,$comments;
	private $option;
	private $charOnly,$wordOnly,$charLimit,$wordLimit;

	function __construct() {

		if(isset($_POST['submit_topic']) ) {

			echo "hello dlrow";	
			$this->title="My title";
		}
		else {
				echo "omg";
				echo $_POST['submit_topic'];
			}	
	}


	function __get($attr_name) {
    return $this->$attr_name;
  	}	

  	function __set($attr_name, $attr_value) {
   	 	switch ($attr_name) {
      	case "title":
       	 $this->title = $attr_value;
       	 break;
      	default:
       	 echo "EssayError. No such attrubute was found in this class.<br>";
       	 break;
    	}
    }	

}
$admin_qsn = new adminEntry();
// $admin_qsn->title="hhhhhhhhh";
$tit=$admin_qsn->title;
echo $tit;
echo $_POST["topic_name"];
echo $_POST["title_op1"];
echo $_POST["max_char"];
echo $_POST["max_word"];
echo $_POST["comments"];

?>