<?php


namespace BatBook;
use BatBook\Exempcions\WeekPasswordException;

class User
{
    const PATTERN = '/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,}$/';

    private string $email;
    private string $password;
    private string $nick;

    public function __construct(string $email, string $password, string $nick
    )
    {
        $this->isValidPassword($password);
        $this->password = $password;
        $this->email = $email;
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
        try {
            $this->isValidPassword($this->password);
            $this->password = $password;
        } catch (WeekPasswordException $error) {
            echo $error;
        }
    }

    public function getNick(): string
    {
        return $this->nick;
    }

    public function setNick(string $nick): void
    {
        $this->nick = $nick;
    }

    /**
     * @throws WeekPasswordException
     */
    private function isValidPassword(string $password)
    {
        if (preg_match(self::PATTERN, $password)) {
            return true;
        }
        throw new WeekPasswordException("La contraseña no es correcta");
    }

    public function __toString(): string
    {
        return "<div class='user'>
                    <h3>Nick: $this->nick</h3>
                    <h6>Email: $this->email</h6>
                </div>";
    }
}