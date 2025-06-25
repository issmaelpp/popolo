<?php

namespace App\Services;

use App\Models\Address;
use Illuminate\Pagination\LengthAwarePaginator;

class AddressService
{
    public function getAll(): LengthAwarePaginator
    {
        return Address::paginate(10);
    }

    public function find(int $id): Address
    {
        return Address::findOrFail($id);
    }

    public function create(array $data): Address
    {
        return Address::create($data);
    }

    public function update(int $id, array $data): bool
    {
        $address = Address::findOrFail($id);
        return $address->update($data);
    }

    public function delete(int $id): bool
    {
        return Address::destroy($id);
    }
}
