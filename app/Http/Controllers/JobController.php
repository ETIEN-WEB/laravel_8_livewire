<?php

namespace App\Http\Controllers;
use App\Models\Job;
use Illuminate\Http\Request;

class JobController extends Controller
{
    //$jobs = Job::online()->latest()->get();
    // recuper les dernières jobs
    public function index(){
        $jobs = Job::online()->latest()->get();

        return view('jobs.index', ['jobs' => $jobs]);
    }

    public function show(Job $id)
    {
        return view('jobs.show', ['job' => $id]);
    }

}
