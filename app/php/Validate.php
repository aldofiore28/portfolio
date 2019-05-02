<?php

class Validate
{
    private $email;
    private $title;
    private $content;

    public function __construct(string $email, string $title, string $content)
    {
        $this->email = $email;
        $this->title = $title;
        $this->content = $content;
    }

    public function validate()
    {
        $validEmail = $this->validateEmail($this->email);
        $validTitle = $this->validateString($this->title);
        $validContent = $this->validateString($this->content);
        return [
          'email'=>$validEmail,
          'title'=>$validTitle,
          'content'=>$validContent
        ];
    }

    public function validateEmail (string $email)
    {
        return filter_var($email, FILTER_VALIDATE_EMAIL);
    }

    public function validateString(string $string)
    {
        return preg_replace('/[^A-Za-z0-9\-]/', '', $string);
    }
}