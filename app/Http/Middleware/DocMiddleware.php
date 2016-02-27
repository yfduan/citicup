<?php namespace App\Http\Middleware;

use Auth;
use View;
use Closure;
use App\Process;

class DocMiddleware {

	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @return mixed
	 */
	public function handle($request, Closure $next)
	{
		$team = Auth::user()->team;
		$count = $team->unreadcount();
		View::share('data',['count'=>$count,'name'=>$team->name]);
		$report = $team->report;
		if(empty($report)){
			return view('state')->withErrors('请先提交项目报告。');
		}
		$process = Process::find(3);
		$curtime = date('Y-m-d H:i:s',time());
		if($curtime>$process->time){
			return view('state')->withErrors('当前时间：'.$curtime.'  最终作品已截止提交。');
		}
		return $next($request);
	}

}
