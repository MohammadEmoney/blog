<?php

namespace App\View\Composers;

use App\Models\Image;
use Illuminate\View\View;

class HeaderComposer
{
    /**
     * The user repository implementation.
     *
     * @var \App\Repositories\UserRepository
     */
    protected $image;

    /**
     * Create a new profile composer.
     *
     * @param  \App\Repositories\UserRepository  $image
     * @return void
     */
    public function __construct(Image $image)
    {
        $this->image = $image;
    }

    /**
     * Bind data to the view.
     *
     * @param  \Illuminate\View\View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $view->with('backgroundImage', $this->image->src);
    }
}
