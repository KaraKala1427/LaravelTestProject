<?php

namespace App\Services;
use App\Models\Declaration;
use Illuminate\Database\Eloquent\ModelNotFoundException;
class DeclarationService
{
    public function search($id)
    {
        $model = Declaration::find($id);
        if (!$model) {
            throw new ModelNotFoundException('Declaration not found by ID ' . $id);
        }
        return $model;
    }
}
