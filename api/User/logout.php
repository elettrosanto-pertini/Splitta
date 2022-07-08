<?php
session_start();
session_destroy();
exit(json_encode(array('message'=>'Logout effettuato')));