<?php

$fullName = $_POST['fullName'];
$initialName = $_POST['initialName'];
$nationality = $_POST['nationality'];
$male = $_POST['male'];
$female = $_POST['female'];
$age = $_POST['age'];
$birthday = $_POST['birthday'];
$idNumber = $_POST['idNumber'];
$address = $_POST['address'];
$telephone = $_POST['telephone'];
$email = $_POST['email'];

$firstAttemptYear = $_POST['firstAttemptYear'];
$secondAttemptYear = $_POST['secondAttemptYear'];
$thirdAttemptYear = $_POST['thirdAttemptYear'];

$firstAttemptPhy = $_POST['firstAttemptPhy'];
$secondAttemptPhy = $_POST['secondAttemptPhy'];
$thirdAttemptPhy = $_POST['thirdAttemptPhy'];

$firstAttemptChem = $_POST['firstAttemptChem'];
$secondAttemptChem = $_POST['secondAttemptChem'];
$thirdAttemptChem = $_POST['thirdAttemptChem'];

$firstAttemptComMaths = $_POST['firstAttemptComMaths'];
$secondAttemptComMaths = $_POST['secondAttemptComMaths'];
$thirdAttemptComMaths = $_POST['thirdAttemptComMaths'];

$firstAttemptAdvMaths = $_POST['firstAttemptAdvMaths'];
$secondAttemptAdvMaths = $_POST['secondAttemptAdvMaths'];
$thirdAttemptAdvMaths = $_POST['thirdAttemptAdvMaths'];

$firstAttemptIndex = $_POST['firstAttemptIndex'];
$secondAttemptIndex = $_POST['secondAttemptIndex'];
$thirdAttemptIndex = $_POST['thirdAttemptIndex'];

$firstAttemptZ = $_POST['firstAttemptZ'];
$secondAttemptZ = $_POST['secondAttemptZ'];
$thirdAttemptZ = $_POST['thirdAttemptZ'];

$firstAttemptMinus = $_POST['firstAttemptMinus'];
$secondAttemptMinus = $_POST['secondAttemptMinus'];
$thirdAttemptMinus = $_POST['thirdAttemptMinus'];

$firstAttemptResult = $_POST['firstAttemptResult'];
$secondAttemptResult = $_POST['secondAttemptResult'];
$thirdAttempResult = $_POST['thirdAttempResult'];

$testMediumS = $_POST['testMediumS'];
$testMediumE = $_POST['testMediumE'];
$testMediumT = $_POST['testMediumT'];

if (!empty($fullName)||!empty($initialName)||!empty($nationality)
    ||!empty($age)||!empty($birthday)||!empty($idNumber)
    ||!empty($address)||!empty($telephone)||!empty($email)) {

  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "regiaterationdb";

  // Create connection
  $conn = new mysqli($servername, $username, $password, $dbname);

  // Check connection
  if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
  }else {
    $SELECT = "SELECT email From studentdata Where email = ? Limit 1";
    $INSERT = "INSERT Into studentdata (fullName, initialName, nationality, male, female, 
    age, birthday, idNumber, address, telephone, email, firstAttemptYear, secondAttemptYear,
    thirdAttemptYear, firstAttemptPhy, secondAttemptPhy, thirdAttemptPhy, firstAttemptChem,
    secondAttemptChem, thirdAttemptChem, firstAttemptComMaths, secondAttemptComMaths, 
    thirdAttemptComMaths,  )
    values(?, ?)";
/*
    // Create database
    $sql = "CREATE DATABASE msDB";
    if ($conn->query($sql) === TRUE) {
    echo "Database created successfully";
} else {
    echo "Error creating database: " . $conn->error;
}

    // sql to create table
    $sql = "CREATE TABLE msTable (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    fullName VARCHAR(30) NOT NULL,
    initialName VARCHAR(30) NOT NULL,
    nationality VARCHAR(30) NOT NULL,
    male VARCHAR(30) NOT NULL,
    female VARCHAR(30) NOT NULL,
    age INT(2),
    birthday DATE(),
    idNumber VARCHAR(30) NOT NULL,
    homeAddress  VARCHAR(30) NOT NULL,
    telephone INT(10),
    email VARCHAR(50),
    firstAttemptYear  VARCHAR(30) NOT NULL,
    secondAttemptYear  VARCHAR(30) NOT NULL,
    thirdAttemptYear VARCHAR(30) NOT NULL,
    firstAttemptPhy VARCHAR(30) NOT NULL,
    secondAttemptPhy VARCHAR(30) NOT NULL,
    thirdAttemptPhy VARCHAR(30) NOT NULL,
    firstAttemptChem VARCHAR(30) NOT NULL,
    secondAttemptChem VARCHAR(30) NOT NULL,
    thirdAttemptChem VARCHAR(30) NOT NULL,
    firstAttemptComMaths VARCHAR(30) NOT NULL,
    secondAttemptComMaths VARCHAR(30) NOT NULL,
    thirdAttemptComMaths VARCHAR(30) NOT NULL,
    firstAttemptAdvMaths VARCHAR(30) NOT NULL,
    secondAttemptAdvMaths VARCHAR(30) NOT NULL,
    thirdAttemptAdvMaths VARCHAR(30) NOT NULL,
    firstAttemptIndex VARCHAR(30) NOT NULL,
    secondAttemptIndex VARCHAR(30) NOT NULL,
    thirdAttemptIndex VARCHAR(30) NOT NULL,
    firstAttemptZ VARCHAR(30) NOT NULL,
    secondAttemptZ VARCHAR(30) NOT NULL,
    thirdAttemptZ VARCHAR(30) NOT NULL,
    firstAttemptMinus VARCHAR(30) NOT NULL,
    secondAttemptMinus VARCHAR(30) NOT NULL,
    thirdAttemptMinus VARCHAR(30) NOT NULL,
    firstAttemptResult VARCHAR(30) NOT NULL,
    secondAttemptResult VARCHAR(30) NOT NULL,
    thirdAttempResult VARCHAR(30) NOT NULL,
    testMediumS VARCHAR(30) NOT NULL,
    testMediumE VARCHAR(30) NOT NULL,
    testMediumT VARCHAR(30) NOT NULL,
    reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
    )";
    
    if ($conn->query($sql) === TRUE) {
        echo "Table MyGuests created successfully";
    } else {
        echo "Error creating table: " . $conn->error;
    }
    */

      //prepare Statement
      $stmt = $conn->prepare($SELECT);
      $stmt->bind_param("s", $email);
      $stmt->execute();
      $stmt->bind_result($email);
      $stmt->store_result();
      $rnum = $stmt->num_rows;

      if ($rnum==0) {
        $stmt->close();

        $stmt  = $conn->prepare($INSERT);
        $stmt->bind_param("sssssisssisssssssssssssssssssssssssssssss",$fullName, $initialName, $nationality, $male, $female, 
        $age, $birthday, $idNumber, $address, $telephone, $email, $firstAttemptYear, 
        $secondAttemptYear, $thirdAttemptYear, $firstAttemptPhy, $secondAttemptPhy, $thirdAttemptPhy),
        $firstAttemptChem, $secondAttemptChem, $thirdAttemptChem, $firstAttemptComMaths, $secondAttemptComMaths, 
        $thirdAttemptComMaths, $firstAttemptAdvMaths, $secondAttemptAdvMaths, $thirdAttemptAdvMaths,
        $firstAttemptIndex, $secondAttemptIndex, $thirdAttemptIndex, $firstAttemptZ, $secondAttemptZ, $thirdAttemptZ,
        $firstAttemptMinus, $secondAttemptMinus, $thirdAttemptMinus, $firstAttemptResult, $secondAttemptResult, $thirdAttempResult,
        $testMediumS, $testMediumE, $testMediumT);
        $stmt->execute();
        echo "New record create successfully";

      }else {
        echo "Someone already registered using this email";
      }
      $stmt->close();
      $conn->close();
  }

}else {
  echo "All fileds are required";
  die();
}

?>
