<?php

namespace App\Http\Transformers\User;

use App\Models\User\User;

class MyTransformer extends UserTransformer
{


    public function transform(User $user)
    {
        $array = parent::transform($user);
        $array['telephone'] = substr_replace($user->telephone, '****', 3, 4);
        $array['username'] = $user->username;
        $array['email'] = $user->email;

        return $array;
    }


}
