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

  function __construct() {
    $this->multiple_space_exists = 0;
    $this->essay_body_is_empty = 0;
    $this->essay_title_is_empty = 0;
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

  function jsonSerialize() {
    $essay_corrections = array("multiple_space_exists" => $this->multiple_space_exists,
                               "essay_title_is_empty"  => $this->essay_title_is_empty,
                               "essay_body_is_empty"   => $this->essay_body_is_empty);
    return $essay_corrections;
  }
}


$essay = new Essay();
$essaychecker = new EssayChecker();
$essaychecker->emptinessChecker($essay);
$essaychecker->spaceChecker($essay);
$composition_array = array("essay" => $essay,
                           "essay_checker" => $essaychecker);
echo json_encode($composition_array);
?>
