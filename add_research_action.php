<?php
include "DBConn.php";
//Verifying if variaables have value
if(isset($_POST['title']) && isset($_POST['author']) && isset($_POST['date']) && isset($_POST['place']) && isset($_POST['tags']) && isset($_POST['department'])) {
  if($_POST['title'] != "" && $_POST['author'] != "" && $_POST['summary'] != "" && $_POST['date'] != "" && $_POST['place'] != "" && $_POST['tags'] != "" && $_POST['department'] != ""){
    //validation if research title already exists
    $title = $_POST['title'];
    $stmt = $conn->prepare("SELECT research_code from research_files where thesis_title = ?");
    $stmt->bind_param("s", $title);

    $stmt->execute();
    $result = $stmt->get_result();

    if($result->num_rows < 1) {

      $stmt = $conn->prepare("INSERT INTO research_files (thesis_title, author, date_of_research, place_of_study, summary, tags, department) VALUES (?, ?, ?, ?, ?, ?, ?)");
      $stmt->bind_param("sssssss", $title, $author, $date, $place, $summary, $tags, $department);

      //initializations
      $author = $_POST['author'];
      $date = $_POST['date'];
      $place = $_POST['place'];
      $tags = $_POST['tags'];
      $summary = $_POST['summary'];
      $department = $_POST['department'];



      // $sql = "INSERT INTO research_files (thesis_title, author, date_of_research, place_of_study, summary, tags, department) VALUES('$title', '$author', '$date', '$place', '$summary', '$tags', '$department')";

      if($stmt->execute()) {
        echo "success";
      }
      else{ // if upload fails
        echo  'Failed to add the research';
      }
    }
    else {
      echo 'Research already exists';
    }
  }
  else{
    echo 'All field are required1';
  }
}
else {
  echo 'All field are required';
}
?>
