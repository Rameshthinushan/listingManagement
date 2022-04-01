<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname="dataStore";

$con = new mysqli($servername, $username, $password,$dbname);

if ($con->connect_error) {

  die("Connection failed: " . $con->connect_error);

}

//-----------------------------------

// Reference;
// First Name;
// Last Name;
// Company;
// Sender Address 1;
// Sender Address 2;
// Sender Postal Code;
// Sender City;Sender Region;
// Sender Country;
// Sender Phone;
// Sender Email;
// Receiver First Name;
// Receiver Last Name;
// Receiver Company name;
// Receiver Address 1;
// Receiver Address 2;
// Receiver Postal Code;
// Receiver City;
// Receiver Region;
// Receiver Country;
// Receiver Phone;
// Receiver Email;
// Insurance;
// Content;
// Value;
// Width;
// Length;
// Height;
// Weight


// 171-0619374-5357968-puv;
// FABRE;
// CELINE;
// Ledsone ltd;
// Rue Antonin Georges Belin;
// 192;
// 95100;
// Argenteuil;
// FR;
// FR;
//----------------------------