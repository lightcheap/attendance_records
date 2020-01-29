<?php
// htmlspecialcharsを短くする
function h($str)
{
    return htmlspecialchars($str, ENT_QUOTES, 'UTF-8');
}
?>