<?php

namespace App\Http\Controllers\User;

use App\Http\Requests\Test\UserRequest;
use App\Http\Transformers\User\MyTransformer;
use App\Http\Transformers\User\UserTransformer;
use App\Models\User\User;
use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class UserController extends Controller
{

    public function index()
    {
        $users = User::paginate();
        return $this->response->paginator($users, new UserTransformer());
    }

    public function my()
    {
        $user = Auth::guard('api')->user();
        return $this->response->item($user, new MyTransformer());
    }

    public function show(User $user)
    {
        return $this->response->item($user, new UserTransformer());
    }

    public function store(UserRequest $request)
    {
        $payload = $request->all();
        $payload['status'] = User::STATUS_NORMAL;
        try {
            $user = User::create($payload);
        } catch (Exception $exception) {
            Log::error($exception);
            return $this->response->errorInternal('Server internal error');
        }
        return $this->response->created(hashid_encode($user->id));
    }

    public function update(UserRequest $request)
    {
        $user = Auth::guard('api')->user();
        $payload = $request->all();
        $paylod = array_only($payload, [
            'nickname',
            'avatar'
        ]);
        try {
            $user->update($payload);
        } catch (Exception $exception) {
            Log::error($exception);
            return $this->response->errorInternal('Server internal error');
        }
    }
}
