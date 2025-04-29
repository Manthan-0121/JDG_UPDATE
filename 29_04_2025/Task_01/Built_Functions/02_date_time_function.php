<?php
// Getting Current Date/Time

echo "<br>";
echo date('Y-m-d H:i:s');
echo "<br>";

echo "<br>";
echo time();
echo "<br>";

echo "<br>";
echo microtime();
echo "<br>";

echo "<br>";
print_r(getdate());
echo "<br>";

echo "<br>";
print_r(localtime());
echo "<br>";

// Y - 4-digit year (2023)
// m - Month (01-12)
// d - Day (01-31)
// H - 24-hour format (00-23)
// i - Minutes (00-59)
// s - Seconds (00-59)
// D - Short day name (Mon)
// l - Full day name (Monday)
// F - Full month name (January)


// Date Formatting


echo "<br>";
echo date("d-m-Y");
echo "<br>";

echo "<br>";
echo strftime("%A %d %B %Y"); // deprecated in PHP 8.1
echo "<br>";

echo "<br>";
print_r(gmdate("Y-m-d H:i:s"));
echo "<br>";


// Date Parsing and Conversion


echo "<br>";
echo strtotime("next Sunday") . "<br>";
echo "<br>";

echo "<br>";
echo mktime(15, 10, 20, 8, 15, 2023);
echo "<br>";

echo "<br>";
$dtformat = DateTime::createFromFormat('d/m/Y', '29/04/2025');
echo $dtformat->format('Y-m-d');
echo '<br>';

echo "<br>";
$date = new DateTime('2025-04-29');
date_add($date, new DateInterval('P2MT24H'));
echo $date->format('Y-m-d');
echo '<br>';

// P2MT24H is equivalent to 2 months, 24 hours

// Symbol	Meaning	Example
// P	Period start (required)	
// Y	Years	P2Y → 2 years
// M	Months	P3M → 3 months
// D	Days	P10D → 10 days
// T	Time part starts	
// H	Hours	T5H → 5 hours
// I	Minutes	T30M → 30 minutes
// S	Seconds	T45S → 45 seconds

echo '<br>';
$date = new DateTime('2025-04-29');
date_sub($date, new DateInterval('P1M'));
echo $date->format('Y-m-d');
echo '<br>';

echo '<br>';
$date1 = new DateTime('29-04-2025');
$date2 = new DateTime('2025-05-01');
$diff = date_diff($date1, $date2);
echo $diff->format('%y years, %m months, %d days');
echo '<br>';
// Symbol	Meaning
// %y	Years difference
// %m	Months difference
// %d	Days difference
// %h	Hours
// %i	Minutes
// %s	Seconds
// %R	Sign (+ or -)

echo '<br>';
echo strtotime("+3 days");
echo "<br>";


// Time Zone Handling


echo "<br>";
date_default_timezone_set('Asia/Tokyo');
$tokyoTime = new DateTime('now', new DateTimeZone('Asia/Tokyo'));
echo $tokyoTime->format('Y-m-d H:i:s');
echo '<br>';

echo "<br>";
echo "Current Timezone: ". date_default_timezone_get();
echo "<br>";


// Advanced Date/Time (DateTime Class)


echo "<br>";

$dt = new DateTime('2025-04-29 15:10:00');
echo $dt->format('Y-m-d H:i:s');
echo '<br>';

echo '<br>';
$date->modify('+1 day');
echo $date->format('Y-m-d');
echo '<br>';

echo '<br>';
if(checkdate(2, 29, 2023)) {
    echo "Exist Date";
} else {
    echo "Notexists Date";
}

echo "<br>";
$date = DateTime::createFromFormat('d/m/Y', '31/02/2023');

// $errors = DateTime::getLastErrors();

// print_r($errors);
// echo '<br>';