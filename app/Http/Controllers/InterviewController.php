<?php

namespace Bulkly\Http\Controllers;

use Bulkly\SocialPostGroups;
use Bulkly\SocialPosts;
use Carbon\Carbon;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use function GuzzleHttp\Promise\all;

class InterviewController extends Controller
{
    function index()
    {
       $type = SocialPostGroups::distinct()->get();
        $socials = SocialPosts::latest()->paginate(15);
        return view('interview.index', compact('socials','type'));
    }

    function search(Request $request)
    {
        $type = SocialPostGroups::distinct()->get();
       $query= $request->name;
        $socials = SocialPosts::orWhere('id', 'like', '%' . $query . '%')->paginate(15);
        return view('interview.index', compact('socials','type'));

    }

    function searchdate(Request $request)
    {
        $type = SocialPostGroups::distinct()->get();
        $newDate = date("d-m-Y", strtotime($request->date));

        $socials = SocialPosts::Where('created_at', 'like', '%' . $newDate . '%')->paginate(15);
        return view('interview.index', compact('socials','type'));
    }

    public function type(Request $request){

        $type = SocialPostGroups::distinct()->get();

       $socials = SocialPosts::whereHas('group', function ($query) use ($request) {
            $query->Where('type', 'like', '%' . $request->type . '%');
        })->paginate(15);
        return view('interview.index', compact('socials','type'));

    }
}
