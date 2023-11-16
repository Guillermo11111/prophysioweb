<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use ZipArchive;
use App\Models\Historial;
use App\Exceptions;
use Illuminate\Support\Facades\Auth;

class BackupController extends Controller
{
    public function index(){
        $historial = Historial::select('historial_respaldos.created_at', 'historial_respaldos.nombre_respaldo', 'historial_respaldos.tipo_respaldo', 'users.name')
        ->join('users','historial_respaldos.user_id','=','users.id')
        ->orderby('historial_respaldos.created_at','desc')
        ->get();
        return view('admin.db.respaldos',compact('historial'));
    }

    public function restore(){
        return view('admin.db.restauracion');
    }

    public function respaldoCompleto(){
        
        $nombre = env('DB_DATABASE'); //"prophysio_huejutla";
        $usuario = env('DB_USERNAME'); //"root";
        $password = env('DB_PASSWORD'); //"";

        $fecha = date('Y-m-d_His');

        $nombre_sql = $nombre . '-' . $fecha . '.sql';

        $dump = "mysqldump --add-drop-database --databases --user=$usuario --password=$password $nombre > $nombre_sql";

        exec($dump);

        header("Location: $nombre_sql");

        $ultimo = Historial::orderby('created_at','desc')->first();
        try {
            unlink($ultimo->nombre_respaldo);
        }catch(\Exception $ex){

        }

        $nuevo = new Historial();
        $nuevo->nombre_respaldo = $nombre_sql;
        $nuevo->tipo_respaldo = 'completo';
        $nuevo->user_id = Auth::user()->id;
        $nuevo->save();

        exit();

        /*
        //para guardar en .zip
            $zip = new ZipArchive();

            $nombre_zip = $nombre .'-'.$fecha.'.zip';

            if($zip->open($nombre_zip,ZipArchive::CREATE) === true){
                $zip->addFile($nombre_sql);
                $zip->close();
                unlink($nombre_sql);
                header("Location: $nombre_zip");
                //unlink($nombre_zip);
                exit();
            };*/
    }

    public function respaldarTabla(Request $request){
        $nombre = env('DB_DATABASE'); //"prophysio_huejutla";
        $usuario = env('DB_USERNAME'); //"root";
        $password = env('DB_PASSWORD'); //"";
        $tabla = $request->name_table;

        $fecha = date('Y-m-d_His');

        $nombre_sql = $nombre . '-' . $tabla .'-' . $fecha . '.sql';

        $dump = "mysqldump --user=$usuario --password=$password $nombre $tabla > $nombre_sql";

        exec($dump);

        header("Location: $nombre_sql");

        $ultimo = Historial::orderby('created_at','desc')->first();
        try {
            unlink($ultimo->nombre_respaldo);
        }catch(\Exception $ex){

        }

        $nuevo = new Historial();
        $nuevo->nombre_respaldo = $nombre_sql;
        $nuevo->tipo_respaldo = 'tabla';
        $nuevo->user_id = Auth::user()->id;
        $nuevo->save();

        exit();
    }

    public function restaurar(Request $request){
        $request->validate([
            'scriptbd' => ['required']
        ]);
        if(pathinfo($request->scriptbd->getClientOriginalName(), PATHINFO_EXTENSION)!=='sql'){
            return redirect(route('admin.db.restore'))->with('info','La base de datos debe ser un tipo de archivo .sql');
        };

        $nombre = env('DB_DATABASE'); 
        $usuario = env('DB_USERNAME'); 
        $password = env('DB_PASSWORD'); 

        $restaurar = "mysql --user=$usuario --password=$password $nombre < $request->scriptbd"; 
        exec($restaurar);
        return redirect(route('admin.dashboard'))->with('Restauracion','Se ha restaurado la base de datos');
    }
}
