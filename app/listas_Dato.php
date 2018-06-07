<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class listas_Dato extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'listas__datos';

    /**
    * The database primary key value.
    *
    * @var string
    */
    protected $primaryKey = 'id';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['nombre', 'marcable', 'referenciable', 'fecha_crea'];

    public function datos()
    {
        return $this->hasMany('App\Dato');
    }

    
}
