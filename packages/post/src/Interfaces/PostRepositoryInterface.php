<?php

namespace datnguyen\post\Interfaces;

interface PostRepositoryInterface
{
    public function create(array $data);

    public function update($id, array $data);

    public function delete($id);

    public function find($id);

    // Other method declarations...
}
