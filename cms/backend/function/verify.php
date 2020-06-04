<?php
    function checkMember(){
        if(!$_SESSION){
            header("location:index.php");
        }
    }
    function checkAdmin(){
        if(!$_SESSION || $_SESSION["LEVEL"] != 0){
            header("location:index.php");
        }
    }