<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . 'libraries/RestController.php';

use chriskacerguis\RestServer\RestController;


class ApiEmployeeController extends RestController
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('EmployeeModel');
    }
    public function index_get()
    {
        //echo 'I am Employee REStAPI ...';
        $employee = new EmployeeModel;
        $result_employee = $employee->get_employee();
        //$this->response($result_employee, 200);
    }

    public function storeEmployee_post()
    {
        $employee = new EmployeeModel;
        $data = [
            'first_name'    => $this->input->post('first_name'),
            'last_name'    => $this->input->post('last_name'),
            'phone'    => $this->input->post('phone'),
            'email'    => $this->input->post('email'),
        ];
        $result = $employee->insertEmployee($data);
        if($result > 0){
            $this->response([
                'status'    => TRUE,
                'message'   => 'Employee Created Successfully'
            ], RestController::HTTP_OK);
        }else{
            $this->response([
                'status'    => FALSE,
                'message'   => 'Not Created Employee Data'
            ], RestController::HTTP_BAD_REQUEST);
        }
        //$this->response($data, 200);
    }
}
?>