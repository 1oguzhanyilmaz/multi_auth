<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Permission extends \Spatie\Permission\Models\Permission
{
    protected $guard_name = 'admin';

    public static function defaultPermissions(){
        return [
            'list-users',
            'create-users',
            'show-users',
            'edit-users',
            'delete-users',

            'list-posts',
            'create-posts',
            'show-posts',
            'edit-posts',
            'delete-posts',

            'list-roles',
            'create-roles',
            'show-roles',
            'edit-roles',
            'delete-roles',
        ];
    }
}
