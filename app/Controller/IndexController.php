<?php

declare(strict_types=1);

namespace App\Controller;

class IndexController extends AbstractController
{
    public function test1()
    {
        return inertia('Test1', [])->toResponse($this->request);
    }

    public function test2()
    {
        return inertia('Test2', [])->toResponse($this->request);
    }
}
