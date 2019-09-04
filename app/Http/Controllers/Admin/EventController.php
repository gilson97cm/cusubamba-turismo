<?php

namespace App\Http\Controllers\Admin;

use App\Event;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class EventController extends Controller
{
    public function index()
    {


    }

    public function create()
    {
        return view('backend.admin.events.create');
    }

    public function store(Request $request)
    {
       // dd($request);
        //Valores recibidos via ajax
        $name_event_ = $_POST['name_event'];
        //$des = $_POST['des'];
       // $description_event_ = $_POST['description_event'];
        $start_event_ = $_POST['start_event'];
      //  $time_event_ = $_POST['time_event'];
        $color_event_ = $_POST['color_event'];

        //Insertando evento a base de datos
        $evento = new Event;
        $evento->name_event = $name_event_;
       // $evento->description_event = $des;
        $evento->start_event = $start_event_;
        //$evento->time_event = $time_event_;
        $evento->all_day_event = 'true';
        $evento->color_event = $color_event_;

        //$evento->fechaFin=$end;


        $evento->save();
    }

    public function show()
    {
        $data = array(); //declaramos un array principal que va contener los datos
        $id = Event::all()->pluck('id'); //listamos todos los id de los eventos
        $name_event = Event::all()->pluck('name_event'); //lo mismo para lugar y fecha
        $start_date = Event::all()->pluck('start_event');
          $end_event = Event::all()->pluck('end_event');
        $all_day_event = Event::all()->pluck('all_day_event');
        $color_event = Event::all()->pluck('color_event');
        //$borde = Event::all()->lists('borde');
        $count = count($id); //contamos los ids obtenidos para saber el numero exacto de eventos

        //hacemos un ciclo para anidar los valores obtenidos a nuestro array principal $data
        for ($i = 0; $i < $count; $i++) {
            $data[$i] = array(
                "title" => $name_event[$i], //obligatoriamente "title", "start" y "url" son campos requeridos
                "start" => $start_date[$i], //por el plugin asi que asignamos a cada uno el valor correspondiente
                "end"=>$end_event[$i],
                "allDay" => $all_day_event[$i],
                "className"=> $color_event[$i],
                // "borderColor"=>$borde[$i],
                "id" => $id[$i]
                //"url"=>"cargaEventos".$id[$i]
                //en el campo "url" concatenamos el el URL con el id del evento para luego
                //en el evento onclick de JS hacer referencia a este y usar el método show
                //para mostrar los datos completos de un evento
            );
        }

        json_encode($data); //convertimos el array principal $data a un objeto Json
        return $data; //para luego retornarlo y estar listo para consumirlo
    }

    public function update(Request $request)
    {
       //dd($request);
        //alores recibidos via ajax/
         $id = $_POST['id'];
        $title = $_POST['title'];
        $start = $_POST['start'];
        //$end = $_POST['end'];
        //$allDay = $_POST['allday'];
        //$back = $_POST['back'];

        $evento = Event::find($id);

        //if ($end == 'NULL') {
           // $evento->end_event = NULL;
        //} else {
           // $evento->end_event = $end;
        //}
        $evento->all_day_event = true;
        $evento->start_event = $start;
        ///$evento->color_event = $back;
        $evento->name_event = $title;
        $evento->save();
        //return back();
    }

    public function destroy (){
        //Valor id recibidos via ajax
        $id = $_POST['id'];

        Event::destroy($id);
    }
}

