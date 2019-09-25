<?php


namespace App\Data\Url;


use Pecee\Http\Exceptions\MalformedUrlException;
use Pecee\SimpleRouter\Router;

class Paginator
{
    /**
     * @var Router
     */
    private $router;

    public function __construct(Router $router)
    {
        $this->router = $router;
    }

    /**
     * @param int $currentPage
     * @param int $totalPages
     * @return array
     * @throws MalformedUrlException
     */
    public function generate(int $currentPage, int $totalPages)
    {
        $links = [
            'firstPage' => 1,
            'lastPage' => $totalPages,
            'currentPage' => $currentPage,
        ];
        for ($i = 1; $i <= $totalPages; $i++) {
            $links[$i] = $this->router->getUrl('home', null, ['page' => $i])->getRelativeUrl();
        }
        return $links;
    }

}