<?php
if(ISSET($_POST))
{
	$name=$_POST['name'];
  $email=$_POST['email'];
	$phone=$_POST['phone'];
  $address=$_POST['address'];
	$city=$_POST['city'];
  $state=$_POST['state'];
  $zip_code=$_POST['zip_code'];
  $country=$_POST['country'];
  $dob=$_POST['dob'];
  $hear_about=$_POST['hear_about'];
  $member_rule=$_POST['member_rule'];
  
  $field1="<b>Address: </b>"."<br>"."Street: ".$address."<br>"."City: ".$city."<br>"."State: ".$state."<br>"."Zip Code: ".$zip_code."<br>"."Country: ".$country."<br>"."<b>Date of Birth:</b> ".$dob."<br>"."<b>Where did you hear about us?:</b> ".$hear_about."<br>"."<b>Membership Rule:</b> ".$member_rule;
}
else
{
echo "Thanks";	
exit();	
}
$Token_Key='#'; // Located in admin section under setup
$WebURL='#'; // CRM Url like https://www.abc.com/crm-folder
//Lead Fields
$post_data=array('name'=>$name,'phone'=>$phone,'email'=>$email, 'field_1'=>$field1);
$PHPCRM = curl_init();
curl_setopt_array($PHPCRM, array(
  CURLOPT_URL=>$WebURL.'/index.php/crm_api/leads/add_lead/'.$Token_Key,
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'POST',
  CURLOPT_POSTFIELDS => $post_data,
));

$response = curl_exec($PHPCRM);
curl_close($PHPCRM);
header("Location:thanks.php");
exit();
//echo $response;
?>