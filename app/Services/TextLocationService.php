<?php

namespace App\Services;

use App\Repositories\TextLocationRepository;
use Illuminate\Http\Request;

class TextLocationService
{
    public function __construct(TextLocationRepository $textLocationRepository)
    {
        $this->textLocation = $textLocationRepository;
    }

    public function index()
    {
        return $this->textLocation->all();
    }

    public function create($attributes)
    {
        return $this->textLocation->create($attributes);
    }

    public function read($id)
    {
        return $this->textLocation->find($id);
    }

    public function update(Request $request, $id)
    {
        $attributes = $request->all();

        return $this->textLocation->update($id, $attributes);
    }

    public function delete($id)
    {
        return $this->textLocation->delete($id);
    }
}
