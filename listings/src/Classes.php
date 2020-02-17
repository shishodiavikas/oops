<?php
namespace Drupal\listings;

use Drupal\listings\School;

/**
 * Provides listings.
 */
class Classes extends School {

  protected $classTid;

  /**
   * Set class tid
   */
  public function setClassTid($tid) {
    $this->classTid = $tid;
  }

  /**
   * Return class tid
   */
  public function getClassTid() {
    return $this->classTid;
  }

  /**
   * Return classes of all school.
   */
  public function classesInSchool() {
    $schools_tid = $this->getSchools();
    foreach ($schools_tid as $value) {
      // Get school name using tid
      $this->setSchoolTid($value['tid']);
      $school_name = $this->getSchoolsNameByTid();

      // will get classess for particular school
      $classes = $this->getClassesBySchoolTid();
      $classes_array[$school_name][] = $classes;
    }
    return $classes_array;
  }

  /**
   * Return classes for particular school.
   */
  public function getClassesBySchoolTid() {
    $school_tid = $this->getSchoolTid();
    // Write query to return all classes for particular school using $school_tid
    return $classes;
  }

}