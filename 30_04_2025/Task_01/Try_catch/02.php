<?php
class customException extends Exception
{
    public function errorMessage()
    {
        $errorMsg = 'Error on line ' . $this->getLine() . ' in ' . $this->getFile()
            . ': <b>' . $this->getMessage() . '</b> is not a valid E-Mail address';
        return $errorMsg;
    }
}
$email = "someone@example...com";
try {
    //check if
    if (filter_var($email, FILTER_VALIDATE_EMAIL) === FALSE) {
        throw new customException($email);
    }
} catch (customException $e) {
    //display custom message
    echo $e->errorMessage();
}
