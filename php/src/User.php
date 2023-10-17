<?php

use exceptions\WeekPasswordException;

include ("exceptions/WeekPasswordException.php");

class User{

    private string $email;
    private string $password;
    private string $nick;
    public function __construct($email,$password,$nick){
        $this->validatePassword($password);
        $this->email = $email;
        $this->password = $password;
        $this->nick = $nick;
    }

    public function getEmail(): string
    {
        return $this->email;
    }
    public function setEmail(string $email): void
    {
        $this->email = $email;
    }
    public function getPassword(): string
    {
        return $this->password;
    }
    public function setPassword(string $password): void
    {
        $this->password = $password;
    }
    public function getNick(): string
    {
        return $this->nick;
    }
    public function setNick(string $nick): void
    {
        $this->nick = $nick;
    }

    public function __toString(): string{
        return "<div class='user'>
                    <h3>Nick: ". $this->nick ."</h3>
                    <h6>Email: ". $this->email ."</h6>
                </div>";
    }
    function validatePassword($password) {
        // Comprova si la contrasenya té almenys 8 caràcters.
        if (strlen($password) < 8) {
            throw new WeekPasswordException("La contrasenya ha de tenir almenys 8 caràcters.");
        }

        // Comprova si la contrasenya conté almenys una lletra majúscula.
        if (!preg_match('/[A-Z]/', $password)) {
            throw new WeekPasswordException("La contrasenya ha de contenir almenys una lletra majúscula.");
        }

        // Comprova si la contrasenya conté almenys una lletra minúscula.
        if (!preg_match('/[a-z]/', $password)) {
            throw new WeekPasswordException("La contrasenya ha de contenir almenys una lletra minúscula.");
        }

        // Comprova si la contrasenya conté almenys un número.
        if (!preg_match('/\d/', $password)) {
            throw new WeekPasswordException("La contrasenya ha de contenir almenys un número.");
        }

        // Si la contrasenya compleix totes les condicions, no es llança cap excepció.
    }
}