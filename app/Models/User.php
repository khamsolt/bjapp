<?php


namespace App\Models;


/**
 * Class User
 * @package App\Models
 *
 * @property $id;
 * @property $name;
 * @property $surname;
 * @property $email;
 * @property $password;
 * @property $createdAt;
 * @property $updatedAt;
 */
class User extends Model
{
    /**
     * @return string
     */
    public function getUsername(): string
    {
        return $this->name . ' ' . $this->surname;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getSurname(): string
    {
        return $this->surname;
    }

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @return string
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    /**
     * @return string
     */
    public function getUpdatedAt(): string
    {
        return $this->updated_at;
    }

    /**
     * @return string
     */
    public function getCreatedAt(): string
    {
        return $this->created_at;
    }
}