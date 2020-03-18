<?php
require '/Users/elvinabbasli/vendor/autoload.php';

$loader = new Twig_Loader_Filesystem('views');
$twig = new Twig_Environment($loader, array('auto_reload' => true, 'cache' => false));

//File handling
$file = 'courses.csv';
$handle = fopen($file, "rb");
$title = 'Courses of IT college';
$autumn_title = "Courses of autumn semester";

//create a Course class with properties
class Course
{
    public $code;
    public $name;
    public $points;
    public $semester;
}

//create a CourseActions class with the filtering method
class CourseActions
{
    function getSubjectCodes($courses, $identifier)
    {
        $newCourses = array();
        for ($i = 0; $i < sizeof($courses); $i++) {
            if (preg_match($identifier, $courses[$i]->code)) {
                array_push($newCourses, $courses[$i]);

            }
        }
        return $newCourses;
    }

    function getAutumnCourses($courses)
    {
        $autumnCourses = array();
        for ($i = 0; $i < sizeof($courses); $i++) {
            if ($courses[$i]->semester == "autumn") {
                array_push($autumnCourses, $courses[$i]);

            }
        }
        return $autumnCourses;
    }

}

//The following operation helps to create a Course object and assign csv file details to the array object
$arr = array();
while (($data = fgetcsv($handle, 1000, ";")) !== FALSE) {
    $courseObj = new Course();
    $courseObj->code = $data[0];
    $courseObj->name = $data[1];
    $courseObj->points = $data[2];
    $courseObj->semester = $data[3];
    array_push($arr, $courseObj);
}

fclose($handle);

