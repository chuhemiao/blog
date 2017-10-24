<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use JonathanTorres\MediumSdk\Medium;

class CallbackController extends Controller
{

    /**
     * Display the medium resource.
     * 
     * @return mixed
     */

    protected $medium;
    protected $mediumClient;
    protected $authorizationCode = '2d50a0653548e893d46cd6da3e73a23762ec8901b4b3bef1505015a431565b94b';

    protected $credentials = [
        'client-id' => 'fc9bdfbf939d',
        'client-secret' => 'dcfd38acda64dc7188fd04ad22ba452ee91ee1b9',
        'redirect-url' => 'https://btxiaobai.com/callback/medium',
        'state' => 'somesecret',
        'scopes' => 'scope1,scope2',
    ];

    public function __construct()
    {
        $this->medium = new Medium();
        $this->medium->connect($this->authorizationCode);
    }


    public function medium()
    {
        $user = $this->medium->getAuthenticatedUser();
        echo 'Authenticated user name is: ' . $user->data->name;
       
    }
}

