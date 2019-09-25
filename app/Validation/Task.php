<?php


namespace App\Validation;

use HttpInvalidParamException;

/**
 * Class Task
 * @package App\Validation
 */
class Task extends BaseValidation
{
    /** @var array */
    private $data = [];
    /** @var bool */
    private $isValid = false;

    /**
     * @return Task
     * @throws HttpInvalidParamException
     */
    public function valid(): self
    {
        $this->data = [
            'name' => $this->getName(),
            'surname' => $this->getSurname(),
            'email' => $this->getEmail(),
            'text' => $this->getTask(),
        ];
        $this->isValid = true;
        return $this;
    }

    /**
     * @return string
     * @throws HttpInvalidParamException
     */
    public function getName(): string
    {
        if (empty($name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING))) {
            throw new HttpInvalidParamException('Имя должно состоять только из букв, заглавными или строчными.');
        }
        return $name;
    }

    /**
     * @return mixed
     * @throws HttpInvalidParamException
     */
    public function getSurname()
    {
        if (empty($surname = filter_input(INPUT_POST, 'surname', FILTER_SANITIZE_STRING))) {
            throw new HttpInvalidParamException('Фамилия должно состоять только из букв, заглавными или строчными.');
        }
        return $surname;
    }

    /**
     * @return string
     * @throws HttpInvalidParamException
     */
    public function getEmail(): string
    {
        if (empty($email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL))) {
            throw new HttpInvalidParamException('Введите корректные данные электронной почты.');
        }
        return $email;
    }

    /**
     * @return string
     * @throws HttpInvalidParamException
     */
    public function getTask(): string
    {
        if (empty($task = filter_input(INPUT_POST, 'task', FILTER_SANITIZE_STRING))) {
            throw new HttpInvalidParamException('Задача должно состоять только из букв, заглавными или строчными.');
        }
        return $task;
    }

    /**
     * @return array
     */
    public function getData(): array
    {
        return $this->data;
    }
}