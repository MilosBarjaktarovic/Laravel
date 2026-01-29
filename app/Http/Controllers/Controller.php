<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
<<<<<<< HEAD
=======
use Illuminate\Foundation\Bus\DispatchesJobs;
>>>>>>> 3faf0935aace4f9e4e1c2cfea8a82898d5c33d4f
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
<<<<<<< HEAD
    use AuthorizesRequests, ValidatesRequests;
=======
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
>>>>>>> 3faf0935aace4f9e4e1c2cfea8a82898d5c33d4f
}
