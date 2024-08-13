<?php

namespace App\Http\Controllers;

use App\Http\Requests\CarsRequest;
use App\Repositories\Interfaces\CarRepositoryInterface;

class CarsController extends Controller
{
    private $carRepository;

    public function __construct(CarRepositoryInterface $carRepository)
    {
        $this->carRepository = $carRepository;
    }

    public function all()
    {
        return response()->json(
            $this->carRepository->all()
        );
    }

    public function getAvailableCars(CarsRequest $request)
    {
        return response()->json(
            $this->carRepository->getByRequest($request)
        );
    }
}
