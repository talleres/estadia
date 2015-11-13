<?php

namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class User extends Model implements AuthenticatableContract,
                                    AuthorizableContract,
                                    CanResetPasswordContract
{
    use Authenticatable, Authorizable, CanResetPassword;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table='usuarios';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    
    protected $fillable = ['nombre', 'usuario', 'email', 'password', 'remember_token'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token'];

    public function setPasswordAttribute($valor){
        if (!empty($valor)) {
            $this->attributes['password'] = bcrypt($valor);
        }
    }

    private function SelectModulo($modulo){
        return $this->modulos()->where('nombre', $modulo)->first();
    }

    //Relationship
    public function modulos(){
        return $this->belongsToMany('\App\Modulo', 'permisos')
        ->withPivot('c','r','u','d','s','excel','pdf','correos','s4');
    }

    //ACL Authorization
    public function AllowToCreate($modulo){
        //$permisosUser = $this->modulos()->where('nombre', $modulo)->first();

        //return $permisosUser->pivot->c == 1;
        return $this->SelectModulo($modulo)->pivot->c == 1;
    }

    public function AllowToRead($modulo){
        return $this->SelectModulo($modulo)->pivot->r == 1;
    }

    public function AllowToUpdate($modulo){
        return $this->SelectModulo($modulo)->pivot->u == 1;        
    }

    public function AllowToDelete($modulo){
        return $this->SelectModulo($modulo)->pivot->d == 1;        
    }

    public function AllowToSearch($modulo){
        return $this->SelectModulo($modulo)->pivot->s == 1;        
    }    

    public function AllowExcel($modulo){
        return $this->SelectModulo($modulo)->pivot->excel == 1;
    }

    public function AllowPDF($modulo){
        return $this->SelectModulo($modulo)->pivot->pdf == 1;
    }

    public function AllowEmail($modulo){
        return $this->SelectModulo($modulo)->pivot->correos == 1;
    }
}
