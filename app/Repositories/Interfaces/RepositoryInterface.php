<?php

namespace App\Repositories\Interfaces;

use Illuminate\Foundation\Http\FormRequest;

interface RepositoryInterface
{
    public function all();

    public function getByRequest(FormRequest $request);
}
