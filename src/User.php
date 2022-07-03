<?php

class User {
    /**
     * First name
     *
     * @var string
     */
    public $firstName;

    /**
     * Last name
     *
     * @var string
     */
    public $lastName;

    /**
     * Email address
     *
     * @var string
     */
    public $email;

    /**
     * Mailer object
     *
     * @var Mailer
     */
    protected $mailer;

    /**
     * Set the mailer dependency
     *
     * @param Mailer $mailer The Mailer object
     * @return void
     */
    public function setMailer(Mailer $mailer) {
        $this->mailer = $mailer;
    }

    /**
     * Get the user's full name from their first and and last name
     *
     * @return string The user's full name
     */
    public function getFullName() {
        return trim("$this->firstName $this->lastName");
    }

    /**
     * Send the user a message
     *
     * @param string $message The message
     * @return boolean True if send, false otherwise
     */
    public function notify($message) {
        return $this->mailer->sendMessage($this->email, $message);
    }
}
