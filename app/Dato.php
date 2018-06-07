<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dato extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'datos';

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
    protected $fillable = ['nombre', 'telefono', 'mail', 'celular', 'lista_id'];

    public function lista()
    {
        return $this->belongsTo('App\lista');
    }

    
}
