<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Event extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this->load->model('Common_model');
	}


	public function index()
	{
		$data['title'] = 'Event List';

		$data['records'] = $this->Common_model->getRecords('event','*');

		$this->load->view('include/header',$data);
		$this->load->view('event_list');
		$this->load->view('include/footer');
	}

	public function add_event()
	{
		$data['title'] = 'Add Event';

		if ($this->input->post()) {
			$eventTitle = $this->input->post('event_title');
			$startDate = $this->input->post('start_date');
			$endDate = $this->input->post('end_date');
			$recurrenceType = $this->input->post('recurrence_type');
			$repeats = $this->input->post('repeats');
			$repeatEvery = $this->input->post('repeat_every');
			$repeatOccur = $this->input->post('repeat_occur');
			$repeatWeek = $this->input->post('repeat_week');
			$repeatMonth = $this->input->post('repeat_month');

			$this->form_validation->set_rules('event_title','Event Title','required');
			$this->form_validation->set_rules('start_date','Start Date','required');
			$this->form_validation->set_rules('end_date','End Date','required');
			$this->form_validation->set_rules('recurrence_type','Recurrence Type','required');
			if ($recurrenceType == 1) {
				$this->form_validation->set_rules('repeat_occur','Repeat Occur','required');
				$this->form_validation->set_rules('repeat_week','Repeat Week','required');
				$this->form_validation->set_rules('repeat_month','Repeat Month','required');
			} else {
				$this->form_validation->set_rules('repeats','Repeats','required');
				$this->form_validation->set_rules('repeat_every','Repeat Every','required');
			}

			if ($this->form_validation->run()==TRUE) {

				$insertArr = array(
					'event_title' => $eventTitle, 
					'start_date' => date('Y-m-d',strtotime($startDate)), 
					'end_date' => date('Y-m-d',strtotime($endDate)), 
					'recurrence_type' => $recurrenceType, 
					'created' => date('Y-m-d H:i:s')
				);

				if ($recurrenceType == 1) {
					$insertArr['repeat_occur'] = $repeatOccur;
					$insertArr['repeat_week'] = $repeatWeek;
					$insertArr['repeat_month'] = $repeatMonth;
				} else {
					$insertArr['repeats'] = $repeats;
					$insertArr['repeat_every'] = $repeatEvery;
				}


				if($this->Common_model->addEditRecords('event',$insertArr)){
					redirect('/');
				}
			}
		}
		$this->load->view('include/header',$data);
		$this->load->view('add_event');
		$this->load->view('include/footer');
	}

	public function edit_event($eventId)
	{
		$data['title'] = 'Edit Event';

		$data['record'] = $this->Common_model->getRecords('event','*',array('id'=>$eventId),true);

		if ($this->input->post()) {
			$eventTitle = $this->input->post('event_title');
			$startDate = $this->input->post('start_date');
			$endDate = $this->input->post('end_date');
			$recurrenceType = $this->input->post('recurrence_type');
			$repeats = $this->input->post('repeats');
			$repeatEvery = $this->input->post('repeat_every');
			$repeatOccur = $this->input->post('repeat_occur');
			$repeatWeek = $this->input->post('repeat_week');
			$repeatMonth = $this->input->post('repeat_month');

			$this->form_validation->set_rules('event_title','Event Title','required');
			$this->form_validation->set_rules('start_date','Start Date','required');
			$this->form_validation->set_rules('end_date','End Date','required');
			$this->form_validation->set_rules('recurrence_type','Recurrence Type','required');
			if ($recurrenceType == 1) {
				$this->form_validation->set_rules('repeat_occur','Repeat Occur','required');
				$this->form_validation->set_rules('repeat_week','Repeat Week','required');
				$this->form_validation->set_rules('repeat_month','Repeat Month','required');
			} else {
				$this->form_validation->set_rules('repeats','Repeats','required');
				$this->form_validation->set_rules('repeat_every','Repeat Every','required');
			}

			if ($this->form_validation->run()==TRUE) {

				$insertArr = array(
					'event_title' => $eventTitle, 
					'start_date' => date('Y-m-d',strtotime($startDate)), 
					'end_date' => date('Y-m-d',strtotime($endDate)), 
					'recurrence_type' => $recurrenceType, 
					'modified' => date('Y-m-d H:i:s')
				);

				if ($recurrenceType == 1) {
					$insertArr['repeat_occur'] = $repeatOccur;
					$insertArr['repeat_week'] = $repeatWeek;
					$insertArr['repeat_month'] = $repeatMonth;
				} else {
					$insertArr['repeats'] = $repeats;
					$insertArr['repeat_every'] = $repeatEvery;
				}


				if($this->Common_model->addEditRecords('event',$insertArr,array('id'=>$eventId))){
					redirect('/');
				}
			}
		}
		$this->load->view('include/header',$data);
		$this->load->view('add_event');
		$this->load->view('include/footer');
	}

	public function delete_event($eventId)
	{
		$this->Common_model->deleteRecords('event',array('id'=>$eventId));
		redirect('/');
	}


	public function view_event($eventId)
	{
		$this->load->helper('common_helper');
		$data['title'] = 'View Event';

		$data['record'] = $this->Common_model->getRecords('event','*',array('id'=>$eventId),true);
		$record = $data['record'];
		$startDate = $data['record']['start_date'];
		$endDate = $data['record']['end_date'];

		$data['total_records'] = 0;
		$data['week_days'] = dateRange($startDate,$endDate,$record);
		if (!empty($data['week_days'])) {
			$data['total_records'] = sizeof($data['week_days']);
		}
		// echo "<pre>";print_r($date['week_days']);


		$this->load->view('include/header',$data);
		$this->load->view('view_event');
		$this->load->view('include/footer');
	}	

}
