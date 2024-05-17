<?php

namespace datnguyen\product\Interfaces;

interface UserRepositoryInterface
{
    public function create(array $data);

    public function update($id, array $data);

    public function delete($id);

    public function find($id);

    // Other method declarations...
}
