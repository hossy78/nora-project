<?php
namespace Nora\Module\App\Controller;

use Nora\System\Web\Controller as WebController;

class IndexController extends WebController
{
    protected function initController( )
    {
    }

    /**
     * @route /
     * @inject view
     */
    public function index ($vew, $context)
    {
        $context->response()
            ->write('Welcome')
            ->send();
    }
}
