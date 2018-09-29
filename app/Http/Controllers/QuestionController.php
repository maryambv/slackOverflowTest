<?php

namespace App\Http\Controllers;

use App\Question;
use App\Repositories\QuestionsRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Tymon\JWTAuth\Facades\JWTAuth;

class QuestionController extends Controller
{

    protected $repository;

    public function __construct(QuestionsRepository $repository)
    {
        $this->repository = $repository;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $questions = Question::all();

        return $questions;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $question = new Question();

        $question->tags = $request->tags;
        $question->status = $request->status;
        $question->text = $request->text;

        $question->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $question = Question::find($id);

        return $question;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $question = Question::find($id);

        $question->text = $request->text;
        $question->status = $request->status;

        $question->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $question = Question::find($id);

        $question->delete();
    }
    public function search(){
        $question = Input::get('query');
        return $this->repository->filter($question);
    }

    public function userQuestion(){
        JWTAuth::parseToken()->authenticate();

        $currentUser = Auth::id();
        return $this->repository->userQuestion($currentUser);

    }
}
