<?php

namespace App\Model\Admin;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    //
     /**
     * 与模型关联的数据表
     *
     * @var string
     */
    protected $table = 'user';

    protected $primaryKey  = 'id';

    public $timestamps = false;

    protected $guarded = [];

    /**
     * 获得此用户的角色。
     */
    public function roles()
    {
        return $this->belongsToMany('App\Model\Admin\Role','user_role','user_id','role_id');
    }

}
