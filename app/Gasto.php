<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Gasto extends Model
{
     /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'gastos';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['nombre', 'cantidad', 'tipo_pago', 'user_id', 'created_at', 'prestamo_user_id'];
    protected $dates = ['created_at', 'updated_at'];

    public static $tipos_prestamos = [
        'Ninguno' => 'Ninguno',
        'Gasto Compartido' => 'Gasto Compartido',
        'Prestamo' => 'Prestamo'
    ];

    public function setCreatedAtAttribute($date)
    {
        $this->attributes['created_at'] = Carbon::createFromFormat('Y-m-d', $date);
    }
}
