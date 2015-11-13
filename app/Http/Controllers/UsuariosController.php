<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Requests\CreateUserRequest;
use App\Http\Controllers\Controller;
use Auth;
use App\User;
use App\Modulo;
use Excel;
use Gate;
use PDF;

class UsuariosController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        if (Gate::denies('canRead', 'Usuarios')) {
            return redirect()->route('inicio');
        }

        $usuarios=User::all();
        $edit = Gate::allows('canUpdate', 'Usuarios');
        $delete = Gate::allows('canDelete', 'Usuarios');

        return view('usuarios.index', compact('usuarios', 'edit', 'delete'));
    }

    public function getPDFAllUsers(){
        if (Gate::denies('canPDF', 'Usuarios')) {
            return redirect()->route('inicio');
        }

        $usuarios=User::all();
        $url=url($this->index());
        $pdf=PDF::loadHTML($url);

        return $pdf->stream('usuarios.pdf');
    }

    public function getExcelAllUsers(){
        Excel::create('All Users', function($excel){
            $excel->sheet('Hoja 1', function($sheet){
                $usuarios=User::select('nombre', 'usuario', 'email')->get();
                $sheet->fromModel($usuarios);
            });
        })->export('xlsx');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $modulos=Modulo::all();

        if (Gate::denies('canCreate', 'Usuarios')) {
            return redirect()->route('inicio');
        }

        return view('usuarios.create', compact('modulos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(CreateUserRequest $request)
    {
        $newUser=User::create(array(
            'nombre'   => $request['nombre'],
            'usuario'  => $request['usuario'],
            'email'    => $request['email'],
            'password' => $request['password'],
        ));

        $modulos=Modulo::all();

        foreach ($modulos as $modulo) {
            $access=$request[$modulo->id];

            if ($access == 1) {
                
                for ($i = 0; $i < 9; $i++) { 
                    
                    if (!$request->has($modulo->id.'_'.$i)) {
                        $request[$modulo->id.'_'.$i] = 0;
                    }
                }

                $newUser->modulos()->attach($modulo->id, array(
                    'c'       => $request[$modulo->id.'_0'],
                    'r'       => $request[$modulo->id.'_1'],
                    'u'       => $request[$modulo->id.'_2'],
                    'd'       => $request[$modulo->id.'_3'],
                    's'       => $request[$modulo->id.'_4'],
                    'excel'   => $request[$modulo->id.'_5'],
                    'pdf'     => $request[$modulo->id.'_6'],
                    'correos' => $request[$modulo->id.'_7'],
                    's4'      => $request[$modulo->id.'_8'],
                ));
            }
        }

        return redirect()->route('usuarios.create');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        if (Gate::denies('canUpdate', 'Usuarios')) {
            return redirect()->route('inicio');
        }

        $user = User::findOrFail($id);
        $modulos = Modulo::all();
        $permisos = $user->modulos;
        
        return view('usuarios.edit', compact('user', 'modulos', 'permisos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        $modulos=Modulo::all();
        $user = User::findOrFail($id);
        $permisos=$user->modulos;
        
        $user->nombre = $request->nombre;
        $user->usuario = $request->usuario;
        $user->email = $request->email;
        $user->password = $request->password;
        $user->save();

        if ($request->ajax()) {
            foreach ($modulos as $modulo) {
                $access=$request[$modulo->id];
                if ($access == 1) {
                    for ($i = 0; $i < 9; $i++) { 
                        if (!$request->has($modulo->id.'_'.$i)) {
                            $request[$modulo->id.'_'.$i] = 0;
                        }
                    }

                    if (!$permisos->contains($modulo)) {
                            $user->modulos()->attach($modulo->id, array(
                                'c'       => $request[$modulo->id.'_0'],
                                'r'       => $request[$modulo->id.'_1'],
                                'u'       => $request[$modulo->id.'_2'],
                                'd'       => $request[$modulo->id.'_3'],
                                's'       => $request[$modulo->id.'_4'],
                                'excel'   => $request[$modulo->id.'_5'],
                                'pdf'     => $request[$modulo->id.'_6'],
                                'correos' => $request[$modulo->id.'_7'],
                                's4'      => $request[$modulo->id.'_8'],
                            ));
                    }

                    else{
                            $user->modulos()->updateExistingPivot($modulo->id, array(
                                'c'       => $request[$modulo->id.'_0'],
                                'r'       => $request[$modulo->id.'_1'],
                                'u'       => $request[$modulo->id.'_2'],
                                'd'       => $request[$modulo->id.'_3'],
                                's'       => $request[$modulo->id.'_4'],
                                'excel'   => $request[$modulo->id.'_5'],
                                'pdf'     => $request[$modulo->id.'_6'],
                                'correos' => $request[$modulo->id.'_7'],
                                's4'      => $request[$modulo->id.'_8'],
                            ));
                        }   
                }

                else if ($permisos->contains($modulo)) {
                    $user->modulos()->detach($modulo->id);
                }
            }
            //$request->session()->flash('message', 'Permiso No Asignado');
            return response()->json(['msj' => 'Modificación correcta']);
        }

        

        return redirect()->route('usuarios.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->modulos()->detach();
        $user->destroy($id);

        return redirect()->route('usuarios.index');
    }
}
