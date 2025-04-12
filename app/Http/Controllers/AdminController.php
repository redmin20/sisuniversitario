<?php

namespace App\Http\Controllers;

use App\Models\Carrera;
use App\Models\Gestion;
use App\Models\Nivel;
use App\Models\Materia;
use App\Models\Role;
use App\Models\Administrativos;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role as ModelsRole;

class AdminController extends Controller
{
    public function index()
    {
        $total_gestiones = Gestion::count();
        $total_carreras = Carrera::count();
        $total_niveles = Nivel::count();  
        $total_materias = Materia::count();
        $total_roles = ModelsRole::count();
        $total_administrativos = Administrativos::count();
       
        //dd($total_paralelos);
        return view('admin.index',compact('total_gestiones','total_carreras','total_niveles',
        'total_materias','total_roles','total_administrativos'));
    }
}
