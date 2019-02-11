<?php

namespace App\Http\Transformers\User;

use App\Models\User\User;
use League\Fractal\TransformerAbstract;

class UserTransformer extends TransformerAbstract
{
    protected $availableIncludes = [
    ];


    public function transform(User $user)
    {
        $array = [
            'id' => hashid_encode($user->id),
            'avatar' => $user->avatar,
            'nickname' => $user->nickname,
        ];

        return $array;
    }

}
