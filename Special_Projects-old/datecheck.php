<?php
$date=date('M-d-Y,D');
echo $date.'-Requested date<br>';
$expectedDate = strtotime ( '+4 day' , strtotime ( $date ) ) ;
$expectedDate = date ( 'M-d-Y,D' , $expectedDate );
echo $expectedDate.'-original expected date<br>';
$timestamp = strtotime($expectedDate);

$day = date('D', $timestamp);//kunin ung araw ng expected date
echo $day.'-araw ng expected date<br>';

if($day=='Fri')
{
$expectedDate = strtotime ( '+3 day' , strtotime ( $expectedDate ) ) ;
$expectedDate = date ( 'M-d-Y,D' , $expectedDate );
echo $expectedDate.'Eto and insert natin na date<br>';
}






?>
