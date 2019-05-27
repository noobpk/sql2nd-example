<?php
class Session{
    public function send($value) {
        $_SESSION['user'] = $value;
    }

    public function start() {
        session_start();
    }
 
    public function get() {
        if (isset($_SESSION['user']))
        {
            $value = $_SESSION['user'];
        }
        else
        {
            $value = '';
        }
        return $value;
    }

    public function destroy() {
        session_destroy();
    }
}
?>