<?php
namespace Drupal\listings\Controller;

use Drupal\listings\School;
use Drupal\listings\Classes;

/**
 * Provides listings.
 */
class Lists {

  /**
   * Returns a simple page with listings.
   *
   * @return array
   *   A simple renderable array.
   */
  public function listing() {

    // Get argument from url
    $arg = $this->getArgument();

    switch ($arg) {
      case "schools":
        $schools = new School();
        $list = $schools->getSchools();
        break;
      case "class-in-schools":
        $classes = new Classes();
        $list = $classes->classesInSchool();
        break;
      case "teachers-of-schools":
        $teachers = new Teachers();
        // Set school tid
        $teachers->setSchoolTid($tid);
        $list = $teachers->getTeachersInSchool();
        break;
      case "students-in-a-class-of-one-school":
        // use $school_tid and $class_tid 
        $students = new Students();
        // Set school tid
        $students->setSchoolTid($school_tid);
        // Set class tid
        $students->setClassTid($class_tid);
        $list = $students->getStudentsInAClassOfSchool();
        break;
      case "All-hods-of-physics":
        // get all physics hods of all schools
        // use $subject_id and $designation
        $teachers = new Teachers();
        $teachers->subjectId = $subject_id;
        $teachers->designationId = $designation;
        $subjectHods = $teachers->getSubjectTeachersWithDesignation();
        break;
    }
    print_r($list);
    die();
    $element = array(
      '#markup' => 'pass "type=schools" as an argument to get schools listing</br>
                    pass "type=class-in-schools" as an argument to get classes in schools listing</br>' . $list,
    );
    return $element;
  }

  /**
   * Return arguments in url
   */
  public function getArgument() {
    return $_GET['type'];
  }
}