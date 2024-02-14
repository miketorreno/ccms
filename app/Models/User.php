<?php

namespace App\Models;

use App\Models\Court;
use App\Models\CourtCase;
use Orchid\Filters\Types\Like;
use Orchid\Filters\Types\Where;
use Orchid\Platform\Models\Role;
use Illuminate\Support\Facades\DB;
use Orchid\Filters\Types\WhereDateStartEnd;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Orchid\Platform\Models\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'permissions',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'permissions'          => 'array',
        'email_verified_at'    => 'datetime',
    ];

    /**
     * The attributes for which you can use filters in url.
     *
     * @var array
     */
    protected $allowedFilters = [
           'id'         => Where::class,
           'name'       => Like::class,
           'email'      => Like::class,
           'updated_at' => WhereDateStartEnd::class,
           'created_at' => WhereDateStartEnd::class,
    ];

    /**
     * The attributes for which can use sort in url.
     *
     * @var array
     */
    protected $allowedSorts = [
        'id',
        'name',
        'email',
        'updated_at',
        'created_at',
    ];

    public function scopeFilterClerks() {
        return DB::table('role_users')
            ->leftJoin('users', 'users.id', '=', 'role_users.user_id')
            ->where('role_id', 1)
            ->orderBy('id', 'DESC')
            ->get();
    }

    public function scopeFilterClients() {
        return DB::table('role_users')
            ->leftJoin('users', 'users.id', '=', 'role_users.user_id')
            ->where('role_id', 2)
            ->orderBy('id', 'DESC')
            ->get();
    }

    public function scopeFilterJudges() {
        return DB::table('role_users')
            ->leftJoin('users', 'users.id', '=', 'role_users.user_id')
            ->where('role_id', 3)
            ->orderBy('id', 'DESC')
            ->get();
    }

    public function scopeFilterLawyers() {
        return DB::table('role_users')
            ->leftJoin('users', 'users.id', '=', 'role_users.user_id')
            ->where('role_id', 4)
            ->orderBy('id', 'DESC')
            ->get();
    }

    public function court()
    {
        return $this->hasOne(Court::class);
    }
}
