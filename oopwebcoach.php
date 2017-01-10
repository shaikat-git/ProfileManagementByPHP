//Webcoachbd
//Properties and Method
<?php
class Webcoachbd{
	
	public $title = "default value";
	public $length;
	public function getTutorial($name){
		echo "Webcoach bd has massive tutorial on PHP";
	}
}
$productObject = new Webcoachbd();

echo $productObject->title."<br/>";
$productObject->getTutorial('OOP');

?>
// $this =>
<?php
class Webcoachbd{
	
	public $title = "default value";
	public $length;
	public function getTutorial($name = NULL){
		echo "Webcoach bd has massive tutorial on". $this->title = $name. "<br/>";
	}
}
$productObject = new Webcoachbd();

$productObject->title = "Joomla";
echo $productObject->title."<br/>";
$productObject->getTutorial('OOP');
echo $productObject->title."<br/>";

?>

// Constructor
class Webcoachbd{
	public $title;
	public $number;
	
	public function __construct($thetile, $thenumber){
		$this->title = $thetile;
		$this->number = $thenumber;
	}
	public function getToturial(){
		echo "webcoach bd has massivee tutorial on ".$this->title. " of the totoal number
		of ".$this->number;
	}
}
$prod = new Webcoachbd("PHP", 50);
$prod->getToturial();

// Encapsulation
<?php
class WebcoachbdProduct{
public $tutorial = "HTML to SEO";
private $resource = "forum images";
protected $profile = "users profile";
public function codeTester(){
echo $this->tutorial."<br/>";
echo $this->resource."<br/>";
echo $this->profile."<br/>";
}
}
$productObject = new WebcoachbdProduct();
$productObject->codeTester();
echo $productObject->tutorial;
?>

// Inheritance 
<?php
class DepartmentInfo {
 public $departmentName;
 public $chairman;
 public $classRoom;
 public $numberOfStudents;
 public function __construct($dept, $chair, $room, $stdNumber) {
   $this->departmentName = $dept;
   $this->chairman = $chair;
   $this->classRoom = $room;
   $this->numberOfStudents = $stdNumber;
 }
 public function departmentActivity() {
   echo "Deartment of " . $this->departmentName . " arrange a tour in every year" . "<br/>";
  }
 }
class StatisticsDept extends DepartmentInfo {
  public $labsNumber;
}

class CseDept extends DepartmentInfo {
  public $labsNumber;
  public function programmingActivity() {
  echo "Department of " . $this->departmentName . " should arrange programming contest like other university" . "<br/>";
 }
}

$statistics = new StatisticsDept("Statistics", "Dr. Rowshan Jahan", 6, 300);
echo "Chairman - " . $statistics->chairman . " * Students - " . $statistics->numberOfStudents . "<br/>";
$statistics->departmentActivity();
$cse = new CseDept("Computer Science and Engineering", "Dr.Jugal Krishna Das", 5, 300);
echo "Chairman - " . $cse->chairman . " * Students - " . $cse->numberOfStudents . "<br/>";
$cse->departmentActivity();
$cse->programmingActivity();
?>

//Construct method and Inheritance
<?php
class DepartmentInfo {
 public $departmentName;
 public $chairman;
 public $classRoom;
 public $numberOfStudents;
public function __construct($dept, $chair, $room, $stdNumber) {
 $this->departmentName = $dept;
 $this->chairman = $chair;
 $this->classRoom = $room;
 $this->numberOfStudents = $stdNumber;
}
 
public function departmentActivity() {
  echo "Deartment of " . $this->departmentName . " arrange a tour in every year" . "<br/>";
 }
}
 
class StatisticsDept extends DepartmentInfo {
 public $labsNumber;
 public function __construct($dept, $chair, $room, $stdNumber, $labs) {
   parent::__construct($dept, $chair, $room, $stdNumber);
   $this->labsNumber = $labs;
 }
}
 
class CseDept extends DepartmentInfo {
 public $labsNumber;
 public function __construct($dept, $chair, $room, $stdNumber, $labs) {
   parent::__construct($dept, $chair, $room, $stdNumber);
   $this->labsNumber = $labs;
}
 
 public function programmingActivity() {
   echo "Department of " . $this->departmentName . " should arrange programming contest like other university" . "<br/>";
 }
}
 
$statistics = new StatisticsDept("Statistics", "Dr. Rowshan Jahan", 6, 300, 2);
echo $statistics->labsNumber . " labs are available in " . $statistics->departmentName . " department <br/>";
echo "Chairman - " . $statistics->chairman . " * Students - " . $statistics->numberOfStudents . "<br/>";
$statistics->departmentActivity();
 
$cse = new CseDept("Computer Science and Engineering", "Dr.Jugal Krishna Das", 5, 300, 1);
echo $cse->labsNumber . " lab available in " . $cse->departmentName . " department <br/>";
echo "Chairman - " . $cse->chairman . " * Students - " . $cse->numberOfStudents . "<br/>";
$cse->departmentActivity();
$cse->programmingActivity();
?>

//method overriding

<?php


class DepartmentInfo {


public $departmentName;
public $chairman;
public $classRoom;
public $numberOfStudents;


public function __construct($dept, $chair, $room, $stdNumber) {
$this->departmentName = $dept;
$this->chairman = $chair;
$this->classRoom = $room;
$this->numberOfStudents = $stdNumber;
}


public function departmentActivity() {
echo "Deartment of " . $this->departmentName . " arrange a tour in every year" . "<br/>";
}


}


class StatisticsDept extends DepartmentInfo {


public $labsNumber;


public function departmentActivity() {
parent::departmentActivity();
echo $this->departmentName . " department publish a journal yearly <br/>";
}


}


class CseDept extends DepartmentInfo {


public $labsNumber;
public function departmentActivity() {
parent::departmentActivity();
echo $this->departmentName . " department recently arranged a seminar on web development <br/>";
}
public function programmingActivity() {
echo "Department of " . $this->departmentName . " should arrange programming contest like other university" . "<br/>";
}


}


$statistics = new StatisticsDept("Statistics", "Dr. Rowshan Jahan", 6, 300);


$statistics->departmentActivity();
$cse = new CseDept("Computer Science and Engineering", "Dr.Jugal Krishna Das", 5, 300);
$cse->departmentActivity();
?>


//type hinting
<?php


class DepartmentInfo {


public $departmentName;
public $chairman;
public $classRoom;
public $numberOfStudents;


public function __construct($dept, $chair, $room, $stdNumber) {
$this->departmentName = $dept;
$this->chairman = $chair;
$this->classRoom = $room;
$this->numberOfStudents = $stdNumber;
}


public function departmentActivity() {
echo "Deartment of " . $this->departmentName . " arrange a tour in every year" . "<br/>";
}


}
class TeacherInfo{
public $teacherName;
public function __construct($tName) {
$this->teacherName = $tName;
}
public function getTeacher(DepartmentInfo $dept){
echo $this->teacherName . " is a teacher of " . $dept->departmentName . " Department";
}
}
$dept = new DepartmentInfo("CSE", "Dr.Monirul Islam", 10, 250);
$tinfo = new TeacherInfo("Dr. M. Kaykobad");
$tinfo->getTeacher($dept);
?>

//static properties and method
<?php


class DepartmentInfo {


public static $departmentName;
public static $chairman;


public static function departmentHead($dName, $chair) {
self::$departmentName = $dName;
self::$chairman = $chair;
echo "Department - " . self::$departmentName . "<br/>" . "Chaiman - " . self::$chairman . "<br/>";
}


}


DepartmentInfo::departmentHead("Statistics", "Dr. Rowshan jahan");
echo DepartmentInfo::$departmentName;
?>

//Static class subclass
<?php
class User {
  static protected $r = 'normal user';
  public static function tester() {
   echo static::$r;
 }
}
class Agent extends User {
 static protected $r = 'This is agent';
}
Agent::tester();
?>

//abstract class
<?php
 
abstract class DepartmentInfo {
 
abstract public function departmentActivity();
}
 
class StatisticsDept extends DepartmentInfo {
 
public function departmentActivity() {
echo "Statistics department arrange a tour yearly<br/>";
}
 
}
 
class CseDept extends DepartmentInfo {
 
public function departmentActivity() {
echo "CSE department should arrange programming contest";
}
 
}
 
$sdept = new StatisticsDept();
$sdept->departmentActivity();
$cdept = new CseDept();
$cdept->departmentActivity();
?>

//interface 
<?php


interface Moveable {


public function move();
}


class Man implements Moveable {


public function move() {
echo "A man can move<br/>";
}


}


class Vehicle implements Moveable {


public function move() {
echo "A Vehicle also can move";
}


}


$mans = new Man();
$mans->move();
$machine = new Vehicle();
$machine->move();
?>

//namespace
<?php

namespace Framework {
class Webcoachbd {
    public $title = "default value";
    public function getTutorial($name) {
    echo "Webcoachbd provide massive tutorial on" . $name;
    }
  }
}
namespace OOPHP {
class Webcoachbd {
   public $title = "different value";
   public function getTutorial($name) {
   echo "Webcoachbd provide massive tutorial on" . $name . "<br/>";
   }
  }
}



$objWeb = new OOPHP\Webcoachbd();
$objWeb->getTutorial(' OOPHP');
$objFrm = new Framework\Webcoachbd();
$objFrm->getTutorial(' Framework');
?>

