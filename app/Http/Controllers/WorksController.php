<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


class WorksController extends Controller {

	public function index(Request $request)
	{
		$day = $request['day'];
		$category_id = $request['category_id'];
		$area_province = $request['area_province'];
		$area_city = $request['area_city'];
		$area_cities = null;
		
		$works = \App\Work::select('users.*', 'works.*')->join('users', 'users.id', '=', 'works.user_id');
		if(!empty($day))
		{
			$date = date('Y-m-d');
			$date = date('Y-m-d',(strtotime ( '-'.$day.' day' , strtotime ( $date) ) ));
			$works = $works->where(\DB::raw('TO_DAYS(works.created_at)'), '>=', \DB::raw("TO_DAYS('".$date."')"));
		}
		if(!empty($category_id))
		{
			$works = $works->where('works.sub_work_category_id', '=', $category_id);
		}
		if(!empty($area_city))
		{
			$works = $works->where('works.city', $area_city);
		}
		elseif(!empty($area_province))
		{
			$works = $works->where('works.province', $area_province);
		}
		if(!empty($area_province))
		{
			$area_cities = \App\AreaCity::where('provincecode', '=', $area_province)->orderBy('sort', 'asc')->get(array('id','code', 'name', 'id'));
		}

		$works = $works->paginate(4);
		$work_categories = \App\WorkCategory::orderBy('sort', 'asc')->get();
		$area_provinces = \App\AreaProvince::orderBy('sort', 'asc')->get(array('id','code', 'name', 'id'));
		
		return view('works.index')->with('works', $works)->with('work_categories', $work_categories)->with('area_provinces', $area_provinces)->with('area_cities', $area_cities);
	}
	
	public function show($id)
	{
		$work = \App\Work::find($id);
		return view('works.show')->with('work', $work);
	}

	public function create()
	{
		if(\Auth::user()->guest()){
			return redirect("/");
		}
		$area_provinces = \App\AreaProvince::orderBy('sort', 'asc')->get(array('id','code', 'name', 'id'));
		$work_categories = \App\Industry::orderBy("sort")->get();
		return view('works.create')->with('area_provinces', $area_provinces)->with('work_categories', $work_categories);
	}
	
	
	
}
