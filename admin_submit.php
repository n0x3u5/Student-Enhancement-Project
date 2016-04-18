<?php
var_dump($_POST);
$check=$_POST['count_group'];
foreach ($check as $count) {
	echo $count."<br>";
}
class adminEntry{

	private $title,$comments;
	private $option;
	private $charOrWord,$charLimit,$wordLimit;

	function __construct() {

		if(isset($_POST['submit_topic']) ) {

			$this->title=$_POST["topic_name"];
			$this->comments=$_POST["comments"];
			$this->option=$_POST["title_op1"];
			$this->charLimit=$_POST["max_char"]===""?0:$_POST["max_char"];
			$this->wordLimit=$_POST["max_word"]===""?0:$_POST["max_word"];
			$this->charOrWord=$_POST["count_group"];

		}
		else {
				echo "False submision";
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
	$connection = make_connection();

	echo "-------------";
	echo $admin_qsn->title;
	echo $admin_qsn->comments;
	echo "<hr>";
	var_dump($admin_qsn->charLimit);
	echo "<hr>";
	//$query='insert into essay_topics(topic_id,topic_name,title_present,char_or_word_count,char_limit,word_limit,imp_points) values(?,'$admin_qsn->title','$admin_qsn->option','$admin_qsn->count_group',$admin_qsn->max_char,$admin_qsn->max_word,'$admin_qsn->comments')';
	if (sizeof($admin_qsn->charOrWord) === 2) {
		$query='insert into essay_topics(topic_id,topic_name,title_present,char_or_word_count,char_limit,word_limit,imp_points) values(NULL,"'.$admin_qsn->title.'","'.$admin_qsn->option.'","charswords",'.$admin_qsn->charLimit.','.$admin_qsn->wordLimit.',"'.$admin_qsn->comments.'")';
	} else {
		$query='insert into essay_topics(topic_id,topic_name,title_present,char_or_word_count,char_limit,word_limit,imp_points) values(NULL,"'.$admin_qsn->title.'","'.$admin_qsn->option.'","'.$admin_qsn->charOrWord[0].'",'.$admin_qsn->charLimit.','.mysqli_real_escape_string($connection, $admin_qsn->wordLimit).',"'.$admin_qsn->comments.'")';
	}

	var_dump($query);


	// $query='INSERT INTO essay_topics(topic_id, topic_name, title_present, char_or_word_count, char_limit,word_limit, imp_points) VALUES ([?],[$admin_qsn->title],[$admin_qsn->option],[$admin_qsn->count_group],[$admin_qsn->max_char],[$admin_qsn->max_word],[$admin_qsn->comments])';

	$result = mysqli_query($connection, $query);
	confirm_query($result);

?>
