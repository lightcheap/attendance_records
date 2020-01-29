<?php
    if (isset($errors)){
        print("<div class='flashMessage'><ul>");
        foreach($errors as $value){
            print("<li>");
            print($value);
            print("</li>");
        }
        print("</ul></div>");
    }
?>