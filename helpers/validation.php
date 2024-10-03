<?php
function validateInput($data) {
    return htmlspecialchars(strip_tags($data));
}
