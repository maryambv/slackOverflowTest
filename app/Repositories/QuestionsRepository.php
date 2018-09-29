<?php
/**
 * Created by PhpStorm.
 * User: maryam
 * Date: 29/09/2018
 * Time: 10:46 PM
 */


namespace App\Repositories;



use App\Question;

class QuestionsRepository
{

    /**
     * @param $question
     * @return array
     */
    public function filter ($question)
    {
        return Question::Where('text', 'like', '%' . $question. '%')->get();

    }

    public function userQuestion($userId){
        return Question::Where('questioner', '=',  $userId)->get();

    }
}
