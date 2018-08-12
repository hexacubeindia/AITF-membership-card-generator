<html>
<title>AITF Membership ID Card Generator</title>
<head>
<style>
@media print {
  #printPageButton {
    display: none;
  }
}
.mempic
{
	    margin: -22px 0px 0px 30px;
	-webkit-box-shadow: 0px 0px 0px 5px rgba(0,0,0,0.75);
    -moz-box-shadow: 0px 0px 0px 5px rgba(0,0,0,0.75);
    box-shadow: 0px 0px 0px 5px rgba(0,0,0,0.75);
}

.memtype
{
    padding: 1px 0px 4px 2px;
    margin: 0 43% 0 42%;
    font-size: 24px;
    font-family: "Segoe UI",Arial,sans-serif;
    font-weight: 700;
    border: solid;
}

img.sig 
{
    padding: 21px 0px 0px 393px;
}

.udataname 
{
    padding: 37px 0px 16px 50px;
    font-weight: 700;
    font-family: "Segoe UI",Arial,sans-serif;
    font-size: 30px;
}

.udataid 
{
    padding: 0px 0px 16px 50px;
    font-weight: 700;
    font-family: "Segoe UI",Arial,sans-serif;
    font-size: 24px;
}

.backcontent 
{
    padding: 5px 0px 5px 20px;
    font-weight: 700;
    font-family: "Segoe UI",Arial,sans-serif;
    font-size: 24px;
}

.backcontentad 
{
    padding: 5px 0px 5px 20px;
    font-weight: 700;
    font-family: "Segoe UI",Arial,sans-serif;
    font-size: 20px;
}

.backlabel 
{
    padding: 5px 10px 5px 20px;
    font-weight: 700;
    font-family: "Segoe UI",Arial,sans-serif;
    font-size: 20px;
	text-align: left;
	vertical-align:top;
}

.backcolon
{
    padding: 5px 10px 5px 10px;
    font-weight: 700;
    font-family: "Segoe UI",Arial,sans-serif;
    font-size: 20px;
	text-align: left;
	vertical-align:top;
}

.iffound
{
    padding: 5px 10px 5px 10px;
    font-family: "Segoe UI",Arial,sans-serif;
    font-size: 14px;
	text-align: center;
	vertical-align: middle;
}

.myButton {
	-moz-box-shadow:inset 0px 1px 0px 0px #97c4fe;
	-webkit-box-shadow:inset 0px 1px 0px 0px #97c4fe;
	box-shadow:inset 0px 1px 0px 0px #97c4fe;
	background:-webkit-gradient(linear, left top, left bottom, color-stop(0.05, #3d94f6), color-stop(1, #1e62d0));
	background:-moz-linear-gradient(top, #3d94f6 5%, #1e62d0 100%);
	background:-webkit-linear-gradient(top, #3d94f6 5%, #1e62d0 100%);
	background:-o-linear-gradient(top, #3d94f6 5%, #1e62d0 100%);
	background:-ms-linear-gradient(top, #3d94f6 5%, #1e62d0 100%);
	background:linear-gradient(to bottom, #3d94f6 5%, #1e62d0 100%);
	filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#3d94f6', endColorstr='#1e62d0',GradientType=0);
	background-color:#3d94f6;
	-moz-border-radius:6px;
	-webkit-border-radius:6px;
	border-radius:6px;
	border:1px solid #337fed;
	display:inline-block;
	cursor:pointer;
	color:#ffffff;
	font-family:Arial;
	font-size:15px;
	font-weight:bold;
	padding:6px 24px;
	text-decoration:none;
	text-shadow:0px 1px 0px #1570cd;
}
.myButton:hover {
	background:-webkit-gradient(linear, left top, left bottom, color-stop(0.05, #1e62d0), color-stop(1, #3d94f6));
	background:-moz-linear-gradient(top, #1e62d0 5%, #3d94f6 100%);
	background:-webkit-linear-gradient(top, #1e62d0 5%, #3d94f6 100%);
	background:-o-linear-gradient(top, #1e62d0 5%, #3d94f6 100%);
	background:-ms-linear-gradient(top, #1e62d0 5%, #3d94f6 100%);
	background:linear-gradient(to bottom, #1e62d0 5%, #3d94f6 100%);
	filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#1e62d0', endColorstr='#3d94f6',GradientType=0);
	background-color:#1e62d0;
}
.myButton:active {
	position:relative;
	top:1px;
}

</style>
</head>
<body>
<?php

// DB details
$servername = "localhost";
$username = "<db username>";
$password = "<db password>";
$dbname = "<db name>";

// Extract member id from url
$pageurlraw = $_SERVER['REQUEST_URI'];
$pageurl = substr($pageurlraw, strpos($pageurlraw, '?') + 1);
$memberid =$pageurl;

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "SELECT form_id, form_post_id, form_value FROM wp_b1b0d88a97_db7_forms";
$result = $conn->query($sql);

function get_string_between($string, $start, $end)
{
    $string = ' ' . $string;
    $ini = strpos($string, $start);
    if ($ini == 0) return '';
    $ini += strlen($start);
    $len = strpos($string, $end, $ini) - $ini;
    return substr($string, $ini, $len);
}

if ($memberid == '')
{
	echo "Invalid submission. Contact AITF if the issue persists.";
}
else
{
	

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) 
	{
        $var1=$row["form_value"];
		if (strpos($var1, $memberid) !== false) 
		{
		 // Generate Name
		 $membernameraw = get_string_between($var1, '"full-name";s:', ':"father-name"');
		 $membernameraw1 = substr($membernameraw, strpos($membernameraw, '"') + 1);
		 $membername = 'NAME : '.strstr($membernameraw1, '"', true);
		 // Generate Name ends
		 
		 // Generate Member ID
		 $uidraw = get_string_between($var1, 'membership-id";s:', ':"full-name');
		 $uidraw1 = substr($uidraw, strpos($uidraw, '"') + 1);
		 $uid = 'MEMBER ID : '.strstr($uidraw1, '"', true);
		 // Generate Member ID ends
		 
		 // Generate Photo URL
		 $photoraw = get_string_between($var1, 'photo-uploadcfdb7_file";', ';}');
		 $photoraw1 = substr($photoraw, strpos($photoraw, '"') + 1);
		 $photourl = strstr($photoraw1, '"', true);
		 // Generate Photo URL ends		 
		 
		 // Generate Father name
		 $fathernameraw = get_string_between($var1, '"father-name";s:', ':"mother-name"');
		 $fathernameraw1 = substr($fathernameraw, strpos($fathernameraw, '"') + 1);
		 $fathername = strstr($fathernameraw1, '"', true);
		 // Generate Father name ends
		 
		 // Generate Date of Birth
		 $dobraw = get_string_between($var1, '"date-of-birth";s:', ':"blood-group"');
		 $dobraw1 = substr($dobraw, strpos($dobraw, '"') + 1);
		 $dob = strstr($dobraw1, '"', true);
		 $newdob = date("d-m-Y", strtotime($dob));
		 // Generate Date of Birth ends
		 
		 // Generate Blood Group
		 $bloodraw = get_string_between($var1, '"blood-group"', ':"gender"');
		 $bloodraw1 = substr($bloodraw, strpos($bloodraw, '"') + 1);
		 $blood = strstr($bloodraw1, '"', true);
		 // Generate Blood Group ends
		 
		 // Generate Mobile number
		 $mobileraw = get_string_between($var1, '"mobile-number"', ':"email"');
		 $mobileraw1 = substr($mobileraw, strpos($mobileraw, '"') + 1);
		 $mobile = strstr($mobileraw1, '"', true);		 
		 // Generate Mobile number ends
		 
		 // Generate Address starts
		 // Door No, Street, Area
		 $address01raw = get_string_between($var1, '"address"', ':"city"');
		 $address01raw1 = substr($address01raw, strpos($address01raw, '"') + 1);
		 $address01 = strstr($address01raw1, '"', true);
		 
		 // City
		 $address02raw = get_string_between($var1, '"city"', ':"pincode"');
		 $address02raw1 = substr($address02raw, strpos($address02raw, '"') + 1);
		 $address02 = strstr($address02raw1, '"', true);

		 // District
		 $address03raw = get_string_between($var1, '"district"', ':"state"');
		 $address03raw1 = substr($address03raw, strpos($address03raw, '"') + 1);
		 $address03 = strstr($address03raw1, '"', true);		 
		 
		 // State
		 $address04raw = get_string_between($var1, '"state"', ':"country"');
		 $address04raw1 = substr($address04raw, strpos($address04raw, '"') + 1);
		 $address04 = strstr($address04raw1, '"', true);
		 
		 // Pincode
		 $address05raw = get_string_between($var1, '"pincode"', ':"district"');
		 $address05raw1 = substr($address05raw, strpos($address05raw, '"') + 1);
		 $address05 = strstr($address05raw1, '"', true);		 
		 
		 // Consolidated Address
		 $address = $address01.",<br>".$address02.",<br>".$address03." District,<br>".$address04." - ".$address05.".";
		 // Generate Address ends
		 
		 }
		 
    }
} else {
    echo "No data found. Kindly contact AITF";
}
$conn->close();

// Display ID card

// ID front
echo '<button id="printPageButton" class="myButton" onClick="window.print()">Click here to Print ID Card</button>';
echo "<br>";
echo "<br>";
echo
'<table frame="box">
  <tr>
    <th colspan="3"><img src="https://www.allindiatf.com/wp-content/uploads/memcard/mem_card_header.jpg" width="750" height="144" /></th>
  </tr>
  <tr>
    <td colspan="3"><div class="memtype">MEMBER</div></td>
  </tr>
  <tr>
    <td rowspan="3">';echo '<img class="mempic" src="https://www.allindiatf.com/wp-content/uploads/cfdb7_uploads/'.$photourl.'" width="150" height="150" />'; echo'</td>
    <td colspan="2"><div class="udataname">';echo $membername; echo '</div></td>
  </tr>
  <tr>
    <td colspan="2"><div class="udataid">';echo $uid; echo '</div></td>
  </tr>
  <tr>
    <td colspan="2"><img class="sig" src="https://www.allindiatf.com/wp-content/uploads/memcard/mem_card_signature.jpg" width="150" height="84" /></td>
  </tr>
</table>';

echo "<br>";

// ID back

echo "<br>";
echo 
'<table frame="box">
<col width="200">
<col width="30">
<col width="520">
  <tr>
    <th colspan="3"><img src="https://www.allindiatf.com/wp-content/uploads/memcard/mem_card_headerback.jpg" width="750" height="14" /></th>
  </tr>
  <tr>
    <td><div class="backlabel">Father Name</div></td>
	<td><div class="backcolon">:</div></td>	
    <td><div class="backcontent">';echo $fathername; echo '</div></td>
  </tr>
  <tr>
    <td><div class="backlabel">Date of Birth</div></td>
	<td><div class="backcolon">:</div></td>	
    <td><div class="backcontent">';echo $newdob; echo '</div></td>
  </tr>
  <tr>
    <td><div class="backlabel">Blood Group</div></td>
	<td><div class="backcolon">:</div></td>	
    <td><div class="backcontent">';echo $blood; echo '</div></td>
  </tr>
  <tr>
    <td><div class="backlabel">Mobile Number</div></td>
	<td><div class="backcolon">:</div></td>		
    <td><div class="backcontent">';echo $mobile; echo '</div></td>
  </tr>
  <tr>
    <td><div class="backlabel">Address</div></td>
	<td><div class="backcolon">:</div></td>	
    <td><div class="backcontentad">';echo $address; echo '</div></td>
  </tr>
  <tr>
    <th colspan="3"><div class="iffound"><hr>If found please return to : <u>All India Telugu Federation</u><br><em>#306, Poonamallee High Road, Kilpauk, Chennai – 600010</em><br>Email: info@allindiatf.com | Web: www.allindiatf.com | Ph: 044-264-133-00 / 44</div></th>
  </tr>
</table>'
;
echo "<br>";
echo '<button id="printPageButton" class="myButton" onClick="window.print()">Click here to Print ID Card</button>';
}

?>
</body>
</html>
