<?php
/**
 * Format Class
 */
class Format {
    public function formatDate($date) {
        return date('F j, Y, g:i a', strtotime($date));
    }
    public function textShorten($text, $limit = 400) {
        $text = $text . " ";
        $text = substr($text, 0, $limit);
        $text = substr($text, 0, strrpos($text, ' '));
        $text = $text . "....";
        return $text;
    }

    public function validation($data) {
        $data = trim($data);
        $data = htmlspecialchars($data);
        $data = stripslashes($data);
        return $data;
    }

    public function verify_password($password, $password_from_datebase) {
        if($password == $password_from_datebase) {
            return true;
        } else {
            return false;
        }
    }

    public function title() {
        $path = $_SERVER["SCRIPT_FILENAME"];
        $title = basename($path, '.php');
        if($title == 'index') {
            $title = "home";
        } elseif ($title == 'contact') {
            $title = "contact";
        }
        return $title = ucwords($title);
    }
}





?>