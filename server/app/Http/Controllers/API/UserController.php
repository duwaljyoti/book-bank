<?php

namespace App\Http\Controllers\API;

use App\Http\Services\CommonService;
use App\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    private $commonService;
    private $user;

    public function __construct(CommonService $commonService, User $user)
    {
        $this->commonService = $commonService;
        $this->user = $user;
    }

    public function create(Request $request)
    {
        $attributes = $request->all();
        $attributes['email'] = $request->email;
        $attributes['name'] = $request->name;
        $attributes['password'] = "google-authenticated";

        return $this->commonService->save($this->user, $attributes);
    }

}
