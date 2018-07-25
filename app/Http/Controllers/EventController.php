<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Calendar;
use App\Event;
use Auth;
use Validator;
class EventController extends Controller
{
    public function index()
    {
        $events = [];
        $data = Event::all();
       // print_r($data);die;
        if($data->count()) {
            foreach ($data as $key => $value) {
                $events[] = Calendar::event(
                    $value->title,
                    true,
                    new \DateTime($value->start_date),
                    new \DateTime($value->end_date.' +1 day'),
                    null,
                    // Add color and link on event
	                [
	                    'color' => '#f05050',

	                ]
                );
            }
        }
        $calendar = Calendar::addEvents($events);
        //print_r($calendar);die;
        return view('admin/fullcalender', compact('calendar'));
    }
    public function create()
    {
       return view('admin.event_add');
    }
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
            'eventsdetails'=>'required'
        ]);
 
        if ($validator->fails()) {
        	\Session::flash('warnning','Please enter the valid details');
            return Redirect::to('/events')->withInput()->withErrors($validator);
        }
 
        $event = new Event;
        $event->title = $request['title'];
        $event->start_date = $request['start_date'];
        $event->end_date = $request['end_date'];
        $event->save();
 
        \Session::flash('success','Event added successfully.');
        return redirect()->to('/admin/events')->with(['success'=>'Inserted Successfully',]);
    }

    
}
