<?php
namespace Drupal\listings;

use Drupal\listings\Classes;

/**
 * Provides listings.
 */
class Students extends Classes {

  protected $studentUid;

  /**
   * Set student Uid
   */
  public function setStudentUid($uid) {
    $this->studentUid = $uid;
  }

  /**
   * Get student Uid
   */
  public function getStudentUid() {
    return $this->studentUid;
  }

  /**
   * Return student name by uid
   */
  public function getStudentNameByUid() {
    $student_name = db_query("Get student name using $this->getStudentUid()");
  }
  /**
   * Return students of a class of a school.
   */
  public function getStudentsInAClassOfSchool() {
    $students_uid = db_query("Write a query using $this->getSchoolTid and $this->getClassTid");
    foreach ($students_uid as $value) {
      $this->setStudentUid($value['uid']);
      $student_names[] = $this->getStudentNameByUid();
    }
    return $student_names;
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