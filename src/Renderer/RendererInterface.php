<?php
declare(strict_types=1);

namespace ChooseMyCar\Renderer;

use Illuminate\Support\Collection;

interface RendererInterface
{
    public function render(Collection $data);
}
