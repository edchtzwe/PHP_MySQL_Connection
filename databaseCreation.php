<?php
/*
This is the PHP file where we create database tables
We can also use this to test our DB connection
We could also probably just rip some commonly used code
and put them into a utility file
*/

function databaseSetup()
{	
	 $con = mysqli_connect('localhost');
	 if (!$con) {
		die("Not connected: " . mysql_error());
	}
	
	$sql = 'CREATE DATABASE MEDICALRETRIEVAL';
	$res = $con->query($sql);
	if($res){
		echo("Database created." . "<br>");	
	}
	else{
		echo("Database creation failed" . "<br>");	
	}
	
	
	createTable($con);	 	
	
}

function createTable($con)
{
	$sql = "CREATE TABLE PATIENTS(
FName varchar(25)  NULL,
LName varchar(25)  NULL,
Gender char(1)  NULL,
DOB date  NULL,
PostCode int(4)  NULL,
CID varchar(10) NOT NULL,
siblingID char(1)  NULL,
ICD varchar(255)  NULL,
Status varchar(5)  NULL,
DateOfDiagnosis date  NULL,
Comments varchar(255)  NULL,
Extra varchar(255)  NULL,
PRIMARY  KEY (CID)
);";
	
	mysqli_select_db($con, 'MEDICALRETRIEVAL');
	
	$res = $con->query($sql);
	if($res == false){
		echo "Table Patients not created. " . mysql_error() . "<br>";	
	}
	else{
		echo("Table Patients created." . "<br>");	
	}
	
	$sql = "
	CREATE TABLE USERS(
UserID int(10) NOT NULL,
User varchar(25) NOT NULL,
Password varchar(25) NOT NULL,
accountType varchar(10) NOT NULL,
PRIMARY KEY (UserID)
);";
	
	$res = $con->query($sql);
	if($res == false){
		echo "Table Users not created. " . mysql_error() . "<br>";	
	}
	else{
		echo("Table Users created." . "<br>");	
	}
}

?>