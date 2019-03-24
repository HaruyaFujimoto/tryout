<?php
namespace App\Http\Composers;
use Illuminate\View\View;
use Auth;
class AuthComposer
{
    public function __construct()
    {
        $this->user = Auth::user();
    }
    public function compose(View $view)
    {
        $view->with('user', $this->user);
    }
}