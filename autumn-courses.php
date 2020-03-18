<?php
require 'index.php';

$courseAction = new CourseActions();

$autumn_semester_courses = $courseAction->getAutumnCourses($arr);

$result = $twig->render('autumn.html',
    ['autumn_title' => $autumn_title, 'autumn_courses' => $autumn_semester_courses]
);

echo $result;