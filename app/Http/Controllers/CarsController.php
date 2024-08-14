<?php

namespace App\Http\Controllers;

use App\Http\Requests\CarsRequest;
use App\Http\Resources\CarResource;
use App\Repositories\Interfaces\RepositoryInterface;

class CarsController extends Controller
{
    private $carRepository;

    public function __construct(RepositoryInterface $carRepository)
    {
        $this->carRepository = $carRepository;
    }

    public function all()
    {
        return new CarResource($this->carRepository->all());
    }

    public function getAvailableCars(CarsRequest $request)
    {
        return new CarResource($this->carRepository->getByRequest($request));
    }
}
