<?php

declare(strict_types=1);

namespace App\Controller;

use Hyperf\View\RenderInterface;

class IndexController extends AbstractController
{
    public function index(RenderInterface $render)
    {
        // $user = $this->request->input('user', 'Hyperf');
        // $method = $this->request->getMethod();

        // return [
        //     'method' => $method,
        //     'message' => "Hello {$user}.",
        // ];

        return $render->render('index', ['name' => 'Hyperf']);
    }
}
