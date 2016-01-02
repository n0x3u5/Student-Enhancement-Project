<?php
/**
 * Retrieves the essay and its title out of the web page
 */
class Essay implements JsonSerializable {

  private $essay_body;
  private $essay_title;

  function __construct() {
    if (isset($_POST['essay-body'])) {
      $this->essay_body = $_POST['essay-body'];
    } else {
      $this->essay_body = "No essay body received.<br>";
    }
    if (isset($_POST['essay-title'])) {
      $this->essay_title = $_POST['essay-title'];
    } else {
      $this->essay_title = "No essay title received.<br>";
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
    $essay_array = array("essay_title" => $this->essay_title,
                         "essay_body"  => $this->essay_body);
    return $essay_array;
  }
}

/**
 * Utility class performing operations on Essay
 */
class EssayChecker implements JsonSerializable{

  private $multiple_space_exists;
  function __construct() {
    $this->multiple_space_exists = 0;
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

  function jsonSerialize() {
    $essay_corrections = array("multiple_space_exists" => $this->multiple_space_exists);
    return $essay_corrections;
  }
}


$essay = new Essay();
$essaychecker = new EssayChecker();
$essaychecker->spaceChecker($essay);
$composition_array = array("essay" => $essay,
                           "essay_checker" => $essaychecker);
echo json_encode($composition_array);
// if(isset($_POST['test_data'])) {
//   echo "{
//           \"glossary\": {
//             \"title\": \"example glossary\",
//         		\"GlossDiv\": {
//               \"title\": \"S\",
//       			  \"GlossList\": {
//                 \"GlossEntry\": {
//                   \"ID\": \"SGML\",
//     					    \"SortAs\": \"SGML\",
//     					    \"GlossTerm\": \"Standard Generalized Markup Language\",
//     					    \"Acronym\": \"SGML\",
//     					    \"Abbrev\": \"ISO 8879:1986\",
//     					    \"GlossDef\": {
//                     \"para\": \"A meta-markup language, used to create markup languages such as DocBook.\",
//     						    \"GlossSeeAlso\": [\"GML\", \"XML\"]
//                   },
//     					    \"GlossSee\": \"markup\"
//                 }
//               }
//             }
//           }
//         }";
// }
?>
