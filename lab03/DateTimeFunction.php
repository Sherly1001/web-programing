<?php
function handleDate($birth) {
    $split = explode('-', $birth);
    $date = $split[2];
    $month = $split[1];
    $year = $split[0];
    $birth = strtotime($birth);
    $day = date('l', $birth);

    $res = $day . ", ";

    switch ($month) {
        case '1':
            $res .= "January";
            break;
        case '2':
            $res .= "February";
            break;
        case '3':
            $res .= "March";
            break;
        case '4':
            $res .= "April";
            break;
        case '5':
            $res .= "May";
            break;
        case '6':
            $res .= "June";
            break;
        case '7':
            $res .= "July";
            break;
        case '8':
            $res .= "August";
            break;
        case '9':
            $res .= "September";
            break;
        case '10':
            $res .= "October";
            break;
        case '11':
            $res .= "November";
            break;
        default:
            $res .= "December";
            break;
    }
    $res .= " " . $date . ", " . $year;
    return $res;
};
function dateCal($birth1, $birth2){
    $date1 = strtotime($birth1);
    $date2 = strtotime($birth2);
    $dateDiff = round(abs($date1 - $date2) / (60*60*24));
    return $dateDiff;
};
function nowAge($birth){
    $nowDate = time();
    $date = strtotime($birth);
    $yearDiff = floor(($nowDate - $date)/(60*60*24*365));
    return $yearDiff;
};
function yearDiff($birth1, $birth2){
    $date1 = strtotime($birth1);
    $date2 = strtotime($birth2);
    $dateDiff = round(abs($date1 - $date2) / (60*60*24*365));
    return $dateDiff;
};
if(array_key_exists('birth1', $_POST) && array_key_exists('birth2', $_POST)){
    $birth1 = $_POST['birth1'];
    $birth2 = $_POST['birth2'];
    echo "<p>First Person's BirthDay is: " . handleDate($birth1) . "</p>";
    echo "<p>Second Person's BirthDay is: " . handleDate($birth2) . "</p>";
    echo "<p>Days Different: " . dateCal($birth1, $birth2) . "</p>";
    echo "<p>Now Age First Person: " . nowAge($birth1) . "</p>";
    echo "<p>Now Age Second Person: " . nowAge($birth2) . "</p>";
    echo "<p>Years Different: " . yearDiff($birth1, $birth2) . "</p>";
}
?>
