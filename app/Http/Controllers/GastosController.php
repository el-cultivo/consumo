<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\StoreGastoRequest;
use App\Http\Controllers\Controller;

use Auth;
use App\User;
use App\Gasto;
use Carbon\Carbon;

class GastosController extends Controller
{
    private $usuarios;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($ano = NULL, $mes = NULL)
    {
        if(!isset($ano) || !isset($mes)){
            $hoy = Carbon::now();
            return redirect('gastos/'.$hoy->year.'/'.$hoy->format('m'));
        }
        $data = array(
            'user' => Auth::user(),
            'fecha' => Carbon::createFromDate($ano, $mes),
            'gastos' => Auth::user()->gastos,
        );
        $data['total'] = number_format( $data['gastos']->sum('cantidad'), 2 );
        return view('gastos.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->usuarios = User::allNameIdArray();
        $data = array(
            'usuarios' => $this->usuarios,
            'usuarios_disponibles_prestamo' => $this->getUsuariosDisponiblesPrestamo(),
            'usuarios_prestamo_disabled' => '',
        );

        if(count($data['usuarios_disponibles_prestamo']) <= 1){
            $data['usuarios_prestamo_disabled'] = 'readonly';
        }
        
        return view('gastos.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreGastoRequest $request)
    {
        $input = $request->all();
        $gasto = new Gasto($input);
        $exito = false;

        if($input['prestamo'] == 'Ninguno'){
            $gasto->prestamo_user_id = NULL;
            if($gasto->save()){
                $exito = true;
            }

        }elseif($input['prestamo'] == 'Prestamo'){
            $gasto->prestamo_user_id = $input['user_id'];
            $gasto->user_id = $input['prestamo_user_id'];

            if($gasto->save()){
                $exito = true;
            }
        }elseif($input['prestamo'] == 'Gasto Compartido'){
            if($this->createGastoCompartido($input)){
                $exito = true;
            }

        }

        if( $exito){
            \Session::flash('flash_message', "¡Se guardó chido! :)");
            return redirect('gastos');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    private function getUsuariosDisponiblesPrestamo(){
        $usuarios = isset($this->usuarios) ? $this->usuarios : User::allNameIdArray();
        unset($usuarios[Auth::user()->id]);
        return $usuarios;
    }

    private function createGastoCompartido($input){
        //dd($input);
        $users = User::all();
        $input['cantidad'] = $input['cantidad']/$users->count();
        $exito = 0;
        
        //dd($gasto);

        foreach ($users as $user) {
            $gasto = new Gasto($input);

            if($input['user_id'] == $user->id){
                $gasto->prestamo_user_id = NULL;
            }else{
                $gasto->tipo_pago = 'Efectivo';
                $gasto->user_id = $user->id;
            }
            if($gasto->save()){
                $exito++;
            }
        }
        if($exito == $users->count() -1){
            return true;
        }
        return false;

    }
}
