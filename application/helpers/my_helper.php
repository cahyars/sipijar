<?php
function _is_logged_in()
{
    if (isset($_SESSION['username'])) {
        return true;
    } else {
        return false;
    }
}
