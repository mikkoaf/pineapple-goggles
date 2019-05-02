<?php

namespace App\Repositories;

use App\TextLocation;

class TextLocationRepository
{

    protected $textLocation;

    public function __construct(TextLocation $textLocation)
    {
        $this->textLocation = $textLocation;
    }
    public function create($attributes)
    {
        return $this->textLocation->create($attributes);
    }

    public function all()
    {
        return $this->textLocation::all();
    }

    public function find($id)
    {
        return $this->textLocation->find($id);
    }

    public function update($id, array $attributes)
    {
        return $this->textLocation->find($id)->update($attributes);
    }

    public function delete($id)
    {
        return $this->textLocation->find($id)->delete();
    }
}
