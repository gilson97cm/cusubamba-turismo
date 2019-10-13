<?php

namespace App\Http\Controllers\Admin;

use App\Event;
use App\EventCategories;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class EventController extends Controller
{
    public function index(Request $request)
    {
        $name = $request->get('name_event');
        $description = $request->get('description_event');
        $start_event = $request->get('start_event');
        $end_event = $request->get('end_event');
        $category_id = $request->get('event_categories_id');

        $categories = EventCategories::orderBy('name_event_category', 'ASC')->pluck('name_event_category', 'id');

        $events = Event::orderBy('name_event', 'ASC')
            ->name($name)
            ->description($description)
            ->start_event($start_event)
            ->end_event($end_event)
            ->event_categories_id($category_id)
            ->paginate(10);
        return view('backend.admin.events.index', compact('events', 'categories'));

    }

    public function create()
    {
        $categories = EventCategories::orderBy('name_event_category', 'ASC')->pluck('name_event_category', 'id');
        return view('backend.admin.events.create', compact('categories'));
    }

    public function store(Request $request)
    {
        // dd($request);
        $event = Event::create($request->all());

        if ($request->file('avatar_event')) {
            $path = Storage::disk('public')->put('temp/avatar_events', $request->file('avatar_event'));
            $event->fill(['avatar_event' => $path])->save();
        } else {
            $event->fill(['avatar_event' => 'assets/images/sin_img.jpg'])->save();
        }
    }

    public function show_in_calendar()
    {
        $data = array(); //declaramos un array principal que va contener los datos
        $id = Event::all()->pluck('id'); //listamos todos los id de los eventos
        $name_event = Event::all()->pluck('name_event');
        $description_event = Event::all()->pluck('description_event');
        $location_event = Event::all()->pluck('location_event');
        $start_date = Event::all()->pluck('start_event');
        $end_event = Event::all()->pluck('end_event');
        $all_day_event = Event::all()->pluck('all_day_event');
        $color_event = Event::all()->pluck('color_event');
        $avatar_event = Event::all()->pluck('avatar_event');
        $category_event = Event::all()->pluck('event_categories_id');


        $count = count($id); //contamos los ids obtenidos para saber el numero exacto de eventos
        //hacemos un ciclo para anidar los valores obtenidos a nuestro array principal $data
        $dias = 1;
        for ($i = 0; $i < $count; $i++) {
            if ($all_day_event[$i] == 1)
                $all = true;
            else
                $all = false;

            //primero damos a la fecha el formato y-m-d 218-09-05
            $aux = date("Y-m-d", strtotime("$start_date[$i]"));
            $aux2 = date("Y-m-d", strtotime("$end_event[$i]"));
            // dd($aux,$aux2);
            if ($aux2 > $aux)
                $e = date("Y-m-d H:i", strtotime("$end_event[$i] + $dias day"));
            else
                $e = $end_event[$i];


            //corregir que solo se sume el 1 a las fechas que se quito 1

            $data[$i] = array(
                "title" => $name_event[$i], //obligatoriamente "title", "start" y "url" son campos requeridos
                "description" => $description_event[$i],
                "location" => $location_event[$i],
                "start" => $start_date[$i], //por el plugin asi que asignamos a cada uno el valor correspondiente
                "end" => $e,
                "allDay" => $all,
                "className" => $color_event[$i],
                "avatar" => asset($avatar_event[$i]),
                "id" => $id[$i],
                "category_event" => $category_event[$i],
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
        // dd($request);
        //alores recibidos via ajax/
        $id = $_POST['id'];
        $title = $_POST['title'];
        $start = $_POST['start'];
        $end = $_POST['end'];
        $allDay = $_POST['allday'];
        //$back = $_POST['back'];

        $dias = 1; // los días a restar
        $horas = 1;


        $evento = Event::find($id);
        if ($end == 'NULL') {
            $aux = date("H:i", strtotime("$start"));
            if ($aux == '00:00') {
                $evento->end_event = $start;
                $allDay = 1;
            } else {
                $end_date = date("Y-m-d H:i", strtotime("$start + $horas hour"));
                //se suma 1 hora a la hora de inicio del evento para no enviar un Null a la bbdd
                $evento->end_event = $end_date;
                $allDay = 0;
            }
        } else {
            $e = date("Y-m-d H:i", strtotime("$end - $dias day"));
            // se resta un dia porque el fullcalendar envia un dia mas es decir si se eloge 2018-01-15 al 2018-01-20
            // se recibe => 2019-01-21 (+1)
            if ($e < $start)
                $evento->end_event = $end;
            else
                $evento->end_event = $e;
        }
        //  dd($end, $e);
        $evento->all_day_event = $allDay;
        $evento->start_event = $start;
        $evento->name_event = $title;
        $evento->save();
        //return back();
    }

    public function updateForm(Request $request)
    {
        //dd($request->avatar_event);

        $event = Event::find($request->id);
        $event->fill($request->all())->save();

        //image
        if ($request->file('avatar_event')) {
            $path = Storage::disk('public')->put('temp/avatar_events', $request->file('avatar_event'));
            $event->fill(['avatar_event' => $path])->save();
        }
        //return back();
    }

    public function destroy(Request $request)
    {
        Event::destroy($request->id);
    }

    public function destroy_list(Request $request, Event $event)
    {
        if ($request->ajax()) {
            $event->delete();
            return response()->json([
                'message' => 'Evento eliminada con exito.',
            ]);
        }
    }

    public function show_list($id){
        $event = Event::find($id);
        if ($event)
            return view('backend.admin.activities.show', compact('event'));
        else
            return redirect()->route('home');
    }
}

