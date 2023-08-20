<?php

namespace app\database\model;

class User extends Model
{
    protected string $table = 'users';
    public readonly string $id;
    public readonly string $firstName;
    public readonly string $lastName;
    public readonly string $email;
    public readonly string $password;
    public readonly string $image;
    public readonly string $created_at;
    public readonly string $updated_at;
}
