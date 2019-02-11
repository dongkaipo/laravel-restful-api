<?php

namespace App\Models\User;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;
use Laravel\Passport\HasApiTokens;
use League\OAuth2\Server\Exception\OAuthServerException;

/**
 * @property mixed id
 * @property mixed avatar
 * @property mixed nickname
 * @property mixed username
 * @property mixed email
 * @property mixed telephone
 */
class User extends Authenticatable
{
    use HasApiTokens;
    use Notifiable;
    use SoftDeletes;

    const STATUS_NORMAL = 1;
    const STATUS_FROZEN = 2;

    const GENDER_UNKNOWN = 0;
    const GENDER_MALE = 1;
    const GENDER_FEMALE = 2;


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nickname',
        'username',
        'password',
        'email',
        'telephone',
        'status',
        'avatar'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


    /**
     * Auto hash by set password
     * @param $value
     */
    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = Hash::make($value);
    }

    /**
     * Login by username/telephone/email
     * @param $username
     * @return mixed
     * @throws OAuthServerException
     */
    public function findForPassport($username)
    {
        $user = $this->where('username', $username)
            ->orWhere('telephone', $username)
            ->orWhere('email', $username)
            ->first();

        if ($user !== null && $user->status != User::STATUS_NORMAL) {
            switch ($user->status) {
                case User::STATUS_FROZEN:
                    throw new OAuthServerException('User Frozen', 6, 'account_frozen', 401);
                case User::STATUS_NORMAL:

                default:
                    throw new OAuthServerException('Unknown status', 6, 'account_error', 401);
            }
        }

        return $user;
    }

}
