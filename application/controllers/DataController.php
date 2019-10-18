<?php defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Created by PhpStorm.
 * @author Great Hari <hari@extrogene.com>
 * @copyright (c) Extrogene Software
 * Date: 17-Oct-19
 * Time: 1:57 PM
 */

class DataController extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('DataModel');
	}

	function getLettersAssignmentQuestions(){
		$response = array();
		$questions = $this->DataModel->getLettersAssignment();
		if (isset($questions) && !empty($questions)){
			$response["questions"] = array();
			foreach ($questions as $question){
				$ques = array();
				$ques["id"] = $question->question_id;
				$ques["question"] = $question->question;
				$ques["answer1"] = $question->answer1;
				$ques["answer2"] = $question->answer2;
				$ques["answer3"] = $question->answer3;
				$ques["answer4"] = $question->answer4;
				$ques["correctAnswer"] = $question->correctAnswer;
				array_push($response['questions'], $ques);
			}
			$response["success"] = 1;
//			echo json_encode($response);
		}else{
			$response["success"] = 0;
			$response["message"] = "No products found";
//			echo json_encode($response);
		}
		$this->output
			->set_content_type('application/json')
			->set_output(json_encode($response));
	}

	function getItems(){
		$response = array();
		$response["questions"] = array();
		for ($i = 0; $i<10; $i++){
			$ques = array();
			$ques["id"] = 1;
			$ques["question"] = "question->question";
			$ques["answer1"] = "question->answer1";
			$ques["answer2"] = "question->answer2";
			$ques["answer3"] = "question->answer3";
			$ques["answer4"] = "question->answer4";
			$ques["correctAnswer"] = "question->correctAnswer";
			array_push($response['questions'], $ques);
		}
		$response["success"] = 1;
//		echo json_encode($response);
		$this->output
			->set_content_type('application/json')
			->set_output(json_encode($response));
	}

}
