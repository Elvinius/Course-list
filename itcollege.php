<?php
require 'index.php';

$courseAction = new CourseActions();

$it_college_courses = $courseAction->getSubjectCodes($arr, '/^I[0-9]+/'); // to get IT college courses according to regex pattern for IT college
array_multisort(array_column($it_college_courses, 'points'), SORT_DESC, SORT_NUMERIC, $it_college_courses); //this function sorts the courses in the descending order on the basis of course points

echo $twig->render('index.html',
    ['title' => $title, 'courses' => $it_college_courses]
);