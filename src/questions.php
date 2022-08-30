<?php

namespace App;

use App\question;

class questions
{
    protected array $questions = [];

    public function __construct(array $questions = [])
    {
        $this->questions = $questions;
    }

    /**
     * @return array
     */
    public function getQuestions(): array
    {
        return $this->questions;
    }

    /**
     * @param array $questions
     */
    public function setQuestions(array $questions): void
    {
        $this->questions = $questions;
    }

    public function readMdFile(string $path): array
    {
        $data = file_get_contents($path);
        $content = explode('######', $data);
        array_shift($content);
        foreach ($content as $value) {
            $answer = explode('####', $value);
            $this->questions[] = new question($answer[0],$answer[1]);
//            array_shift($answer);
//            $answer = implode("" ,$answer);
//
//            $question = explode('####', $value);
//            array_pop($question);
//            $question = implode("" , $question);
//
//            $question = strip_tags($question);
//            $question = trim(preg_replace('/\s+/', ' ', $question));
//            $question = str_replace("Đáp án", '', $question);
//            $answer = strip_tags($answer);
//            $answer = trim(preg_replace('/\s+/', ' ', $answer));
//
//            $ojb[] = new question($question,$answer);
        }
//        $this->questions = $ojb;
//        return $ojb;
        return $this->questions;

//        $this->questions = $content;
//        return $content;
    }

    public function getQuestion(int | array $indexes){
        return $this->questions[$indexes] ?: throw new Exception("No have question");
    }

    public function all(){
        return $this->questions;
    }

}