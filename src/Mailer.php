<?php

class Mailer {

    /**
     * Send a message
     *
     * @param string $email The email adddress
     * @param string $message The message
     * @return boolean True if sent, false otherwise
     */
    public function sendMessage($email, $message) {
        if (empty($email)) {
            throw new Exception('email cannot be empty');
        }

        // Use mail() or PHPMailer for example
        sleep(3);

        echo "send '$message' to '$email'";

        return true;
    }
}
