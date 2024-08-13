<?php


namespace App\Repositories;


use App\Models\Car;
use App\Repositories\Interfaces\RepositoryInterface;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Foundation\Http\FormRequest;

class CarRepository implements RepositoryInterface
{
    public function all(): Collection
    {
        return Car::userPositionCars()->get();
    }

    public function getByRequest(FormRequest $request): Collection
    {
        $dateStart = $request->input('start_time');
        $dateEnd = $request->input('end_time');

        $builder = Car::userPositionCars()
            ->with(['driver'])
            ->whereDoesntHave('trips', function ($query) use ($dateStart, $dateEnd) {
                $query->where('start_trip', '<', $dateEnd)
                    ->where('end_trip', '>', $dateStart);
            });

        if ($request->has('car')) {
            $builder->where('id', $request->input('car'));
        }

        if ($request->has('comfort_class')) {
            $builder->where('comfort_class_id', $request->input('comfort_class'));
        }

        return $builder->get();
    }
}
