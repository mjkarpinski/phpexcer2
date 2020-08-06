<?php
declare(strict_types=1);

namespace ChooseMyCar\Renderer;

use Illuminate\Support\Collection;

final class ArrayRenderer implements RendererInterface
{
    public function render(Collection $data)
    {
        return $data->map(function($car) {
            return $car->toArray();
        })
            ->values()
            ->toArray();
    }
}
