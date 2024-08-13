<?php

namespace App\Repositories\Interfaces;

use Illuminate\Foundation\Http\FormRequest;

interface CarRepositoryInterface
{
    public function all();

    public function getByRequest(FormRequest $request);
}
