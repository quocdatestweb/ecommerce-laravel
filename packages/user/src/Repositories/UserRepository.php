<?php

namespace datnguyen\user\Repositories;
use datnguyen\user\Models\User;
use datnguyen\user\Interfaces\UserRepositoryInterface;

class UserRepository implements UserRepositoryInterface
{
    public function create(array $data)
    {
        // Create a new user in the database
        return User::create($data);
    }

    public function update($id, array $data)
    {
        // Find the user by ID and update the fields
        $user = User::findOrFail($id);
        $user->update($data);

        return $user;
    }

    public function delete($id)
    {
        // Find the user by ID and delete
        $user = User::findOrFail($id);
        $user->delete();
    }

    public function find($id)
    {
        // Find the user by ID
        return User::findOrFail($id);
    }

    public function getAll()
    {
        return User::all();
    }

    // Other methods...
}
