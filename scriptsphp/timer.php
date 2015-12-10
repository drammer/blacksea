<?php
/**
 * Created by PhpStorm.
 * User: drammer
 * Date: 10.12.15
 * Time: 12:10
 */
$real_time = date("Y-m-d H:I:s", time());
$date_1 = new DateTime('2014-02-13 02:40:48');
//$date_2 = new DateTime('2015-12-10 13:11:50');
$date_2 = new DateTime($real_time);

$interval = $date_1->diff($date_2);

$day_count = $interval->format('%R%a');
$h_count = $interval->format('%H%');
$m_count = $interval->format('%I%');

?>
<div class="timer-ocupation-top">
    <div class="title-timer">Оккупация Крыма:</div>
    <div class="clock-timer"><span class="day-timer"><?php echo substr($day_count, 1); ?> : <span>дней</span></span> <span class="hour-timer"><?php echo $h_count; ?> : <span>часов</span></span><span class="minute-timer"><?php echo $m_count; ?><span>минут</span></span></div>
<!--<img src="--><?php //echo get_stylesheet_directory_uri(); ?><!--/images/timer-img.png" />-->

</div>