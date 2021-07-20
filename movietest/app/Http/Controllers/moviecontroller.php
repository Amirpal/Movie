<?php

namespace App\Http\Controllers;

use Illuminate\Support\facades\DB;
use Illuminate\Http\Request;
use App\Models\movie;
use App\Models\comments;
use GuzzleHttp\Psr7\Message;
use Illuminate\Support\Facades\Auth;
use App\Models\user;
use App\Models\watchlist;
use Storage;
use Error;
use Symfony\Component\Console\EventListener\ErrorListener;

//use Illuminate\Support\Facades\DB;

class moviecontroller extends Controller
{
    public function setrate($id)
    {

        $rated = watchlist::where('mid', '=', $id)->where('uid', '=', Auth::user()->id)->first();
        if ($rated == NULL) {
            $rated = new watchlist();
            $rated->uid = Auth::user()->id;
            $rated->mid = $id;
            $rated->rated = '1';
            $rated->score = request("rate");
            $rated->save();

            return redirect("/movies/$id");
        } else if ($rated->rated == '0') {
            $rated->rated = '1';
            $rated->score = request("rate");
            $rated->save();

            return redirect("/movies/$id");
        } else if ($rated->rated == '1') {
            //echo '<script language="javascript">';
            //echo 'alert("You have already rated!")';
            // echo '</script>';
            $rated->rated = '1';
            $rated->score = request("rate");
            $rated->save();
            return redirect("/movies/$id");
        }
    }
    public function addremovetofav($id)
    {
        $favstatus = watchlist::where('mid', '=', $id)->where('uid', '=', Auth::user()->id)->first();
        if ($favstatus == NULL) {
            $watchlist = new watchlist();
            $watchlist->uid = Auth::user()->id;
            $watchlist->mid = $id;
            $watchlist->watchlist = '1';
            $watchlist->save();
        } else if ($favstatus->watchlist == '0') {
            $favstatus->watchlist = '1';
            $favstatus->save();
        } else if ($favstatus->watchlist == '1') {
            $favstatus->watchlist = '0';
            $favstatus->save();
        }
        return redirect("/movies/$id");
    }
    public  function setreview($id)
    {
        if (Auth::user()) {
            $comment = new comments();
            $comment->uid = Auth::user()->id;
            $comment->mid = $id;
            $comment->cm = request('userreview');
            $comment->save();
            return redirect("/movies/$id");
        } else {
            return redirect("/login");
        }
    }
    public function showmovie($id)
    {
        //$comment=comment::findOrFail($id,'mid');
        $favstatus = 0;
        if (Auth::user()) {
            $favstatus = watchlist::where('mid', '=', $id)->where('uid', '=', Auth::user()->id)->where('watchlist', '=', '1')->get();
            if ($favstatus->count() == 0)
                $favstatus = 0;
            else
                $favstatus = 1;
        }

        $movie = movie::findOrFail($id);
        $comment = comments::where('mid', '=',  $id)->get();
        $user = user::all();
        //  $all=array('movie=')
        $score = watchlist::where('mid', '=', $id)->where('rated', '=', '1')->get();
        $sumscore = 0;
        $i = 0;
        foreach ($score as $s) {
            $sumscore = $s->score + $sumscore;
            $i++;
        }
        if ($i != 0)
            $sumscore = $sumscore / $i;
        $sumscore = (int)$sumscore;
        return view('movies/moviesingles', ['movie' => $movie, 'comment' => $comment, 'user' => $user, 'score' => $sumscore, 'fav' => $favstatus]);
    }

    public function movielist()
    {
        $movie = movie::all();
        return view('movies/showplus', ['movies' => $movie]);
    }
    public function create()
    {
        if (Auth::user()->id == '4')
            return view('movies/create');
        else
            return ("<h1>You Can't access to this page  <br><a href='/'>home</a></h1>");
    }
    public function store()
    {

        $movie = new movie();
        $movie->movie_name = request('movie_name');
        $movie->movie_year = request('movie_year');
        $movie->movie_director = request('movie_director');
        $movie->movie_genre = request('movie_genre');
        $movie->movie_casts = request('movie_casts');
        $movie->movie_story = request('movie_story');
        $movie->save();
        return redirect('/movies/create');
    }
    public function destroy($id)
    {
        $movie = movie::findOrFail($id);
        $movie->delete();
        return redirect('/movies');
    }
    public function watchlist()
    {
       
        $movies = DB::table('movie')->join('watchlist', 'movie.id', '=', 'watchlist.mid')->where('uid', '=', Auth::user()->id)->where('watchlist', '=', '1')->get();
        return view('/movies/watchlist', ['movie' => $movies]);
        
      
        
    }
    public function setwatched($mid)
    {

        $watched = watchlist::where('mid', '=',$mid)->where('uid', '=', Auth::user()->id)->first();
        if ($watched->watched == 1) {
            $watched->watched = 0;
        } else {
            $watched->watched = 1;
        }
        $watched->save();
        return redirect('/watchlist');
    }

}
