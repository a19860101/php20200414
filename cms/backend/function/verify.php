<?php
    function checkMember(){
        if(!$_SESSION){
            header("location:index.php");
        }
    }