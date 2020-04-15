<?php
    function format_date($date){
        return date('F j, Y, g:i a', strtotime($date));
    }
?>