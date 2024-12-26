<?php
// Database configuration
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "rural_development";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Sanitize and validate input data
$reg_number = $conn->real_escape_string($_POST['reg_number']);
$date = $conn->real_escape_string($_POST['date']);
$member_name = $conn->real_escape_string($_POST['member_name']);
$father_name = $conn->real_escape_string($_POST['father_name']);
$gender = $conn->real_escape_string($_POST['gender']);
$address = $conn->real_escape_string($_POST['address']);
$phone = $conn->real_escape_string($_POST['phone']);
$post_no = $conn->real_escape_string($_POST['post_no']);
$family_income = $conn->real_escape_string($_POST['family_income']);
$panchayathu = $conn->real_escape_string($_POST['panchayathu']);
$addional_job = $conn->real_escape_string($_POST['addional_job']);
$soc_envo = $conn->real_escape_string($_POST['soc_envo']);
$ed_quli = $conn->real_escape_string($_POST['ed_quli']);
$mem1 = $conn->real_escape_string($_POST['mem1']);
$relative1 = $conn->real_escape_string($_POST['relative1']);
$age1 = (int)$_POST['age1'];
$job1 = $conn->real_escape_string($_POST['job1']);
$mem2 = $conn->real_escape_string($_POST['mem2']);
$relative2 = $conn->real_escape_string($_POST['relative2']);
$age2 = (int)$_POST['age2'];
$job2 = $conn->real_escape_string($_POST['job2']);
// (Repeat similar lines for all inputs...)
$mem3 = $conn->real_escape_string($_POST['mem3']);
$relative3 = $conn->real_escape_string($_POST['relative3']);
$age3 = (int)$_POST['age3'];
$job3 = $conn->real_escape_string($_POST['job3']);

$mem4 = $conn->real_escape_string($_POST['mem4']);
$relative4 = $conn->real_escape_string($_POST['relative4']);
$age4 = (int)$_POST['age4'];
$job4 = $conn->real_escape_string($_POST['job4']);

$mem5 = $conn->real_escape_string($_POST['mem5']);
$relative5 = $conn->real_escape_string($_POST['relative5']);
$age5 = (int)$_POST['age5'];
$job5 = $conn->real_escape_string($_POST['job5']);


$mem6 = $conn->real_escape_string($_POST['mem6']);
$relative6 = $conn->real_escape_string($_POST['relative6']);
$age6= (int)$_POST['age6'];
$job6 = $conn->real_escape_string($_POST['job6']);
$land_own = $conn->real_escape_string($_POST['land_owen']);
$land_length = $conn->real_escape_string($_POST['land_length']);
$land_status = $conn->real_escape_string($_POST['land_status']);
$land_no = (int)$_POST['land_no'];
$water_rich = $conn->real_escape_string($_POST['water_rich']);
$seed_type = $conn->real_escape_string($_POST['seed_type']);
$machine = $conn->real_escape_string($_POST['machine']);
$cow_no = $conn->real_escape_string($_POST['cow_no']);
$bull_no = $conn->real_escape_string($_POST['bull_no']);
$egg_no = $conn->real_escape_string($_POST['egg_no']);
$smallcow_no = $conn->real_escape_string($_POST['smallcow_no']);
$boxchicken_no = $conn->real_escape_string($_POST['boxchicken_no']);
$sheep_no = $conn->real_escape_string($_POST['sheep_no']);
$whitesheep_no = $conn->real_escape_string($_POST['whitesheep_no']);

$hook_no = (int)$_POST['hook_no'];
$milk_eve = (int)$_POST['milk_eve'];
$milk_mor = (int)$_POST['milk_mor'];
$aadhaar = (int)$_POST['aadhaar'];
$pan = $conn->real_escape_string($_POST['pan']);
$ration = $conn->real_escape_string($_POST['ration']);
$kissan = $conn->real_escape_string($_POST['kissan']);
$bank_ac = (int)$_POST['bank_ac'];
$bank_branch = $conn->real_escape_string($_POST['bank_branch']);
$bank_name = $conn->real_escape_string($_POST['bank_name']);
$mgnrgs = $conn->real_escape_string($_POST['mgnrgs']);

$members = [$mem1, $mem2, $mem3, $mem4, $mem5, $mem6];

// Remove empty values
$filteredMembers = array_filter($members, function($value) {
    return trim($value) !== '';
});

// Check for duplicates
if (count($filteredMembers) !== count(array_unique($filteredMembers))) {
    die('<div style="color: red; font-size: 18px; font-weight: bold; background-color: #ffe0e0; padding: 10px; text-align: center;">Error: Duplicate values are not allowed for members.</div>');
}

$today = date('Y-m-d');
if ($date > $today) {
    die('<div style="color: #b22222; font-size: 18px; font-weight: bold; background-color: #ffe6e6; padding: 10px; text-align: center;">Error: Future dates are not allowed.</div>');

}

// Proceed with the query if validation passes
$sql = "INSERT INTO members_data (
    reg_number, date, member_name, father_name, gender, address, phone, post_no, 
    family_income, panchayathu, addional_job, soc_envo, ed_quli, mem1, relative1, age1, job1, 
    mem2, relative2, age2, job2, mem3, relative3, age3, job3, mem4, relative4, age4, job4, 
    mem5, relative5, age5, job5, mem6, relative6, age6, job6, land_owen, land_length, land_status, 
    land_no, water_rich, seed_type, machine, cow_no, bull_no, egg_no, smallcow_no, boxchicken_no, 
    sheep_no, whitesheep_no, hook_no, milk_eve, milk_mor, aadhaar, pan, ration, kissan, 
    bank_ac, bank_branch, bank_name, mgnrgs
) VALUES (
    '$reg_number', '$date', '$member_name', '$father_name', '$gender', '$address', 
    '$phone', '$post_no', '$family_income', '$panchayathu', '$addional_job', '$soc_envo', 
    '$ed_quli', '$mem1', '$relative1', $age1, '$job1', '$mem2', '$relative2', $age2, 
    '$job2', '$mem3', '$relative3', $age3, '$job3', '$mem4', '$relative4', $age4, '$job4', 
    '$mem5', '$relative5', $age5, '$job5', '$mem6', '$relative6', $age6, '$job6', 
    '$land_own', '$land_length', '$land_status', $land_no, '$water_rich', '$seed_type', '$machine', 
    '$cow_no', '$bull_no', '$egg_no', '$smallcow_no', '$boxchicken_no', '$sheep_no', 
    '$whitesheep_no', $hook_no, $milk_eve, $milk_mor, $aadhaar, '$pan', '$ration', '$kissan', 
    $bank_ac, '$bank_branch', '$bank_name', '$mgnrgs'
)";


// Execute the query
if ($conn->query($sql) === TRUE) {
    echo '<div style="color: green; font-size: 20px; font-weight: bold; background-color: #e0ffe0; padding: 10px; text-align: center;">Record saved successfully!</div>';

} else {
    echo "Error: " . $conn->error;
}

// Close the connection
$conn->close();
?>
