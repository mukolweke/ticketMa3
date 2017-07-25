<?php

class Admin extends CI_Controller {

    function index() {
        $this->opp();
    }

    //get current operatorid
    function get_operator_id() {
        if ($this->session->userdata('logged_in')) {
            $session_data = $this->session->userdata('logged_in');

            $operator_id = $session_data['operatorId'];

            return $operator_id;
        } else {
            //If no session, redirect to login page
            $this->login();
        }
    }

    //user index
    function opp() {
        if ($this->session->userdata('logged_in')) {

            $data = array(
                'operatorId' => $this->get_operator_id(),
                'operatorDetails' => $this->Operator->get_operator_details($this->get_operator_id()),
                'activeOperations' => $this->Operator->get_all_schedules($this->get_operator_id()),
                'numberActiveOperations' => $this->Operator->get_active_operation_count($this->get_operator_id()),
                'activeTickets' => $this->Operator->get_all_tickets($this->get_operator_id()),
                'numberActiveTickets' => $this->Operator->get_active_tickets_count($this->get_operator_id())
            );

            $this->load->view('operator/home', $data);
        } else {
            //If no session, redirect to login page
            $this->login();
        }
    }

    //logout function
    function signout() {
        $this->session->unset_userdata('logged_in');
        session_destroy();
        //Go to doctor login area
        $this->login();
    }

    //login page
    function login() {
        //Go to operator login area
        redirect('login', 'refresh');
    }

    //add schedule
    function add_opp_schedule() {
        $opp_id = $_POST['opp_id'];
        $sch_from = $_POST['sch_from'];
        $sch_to = $_POST['sch_to'];
        $sch_day = $_POST['sch_date_day'];
        $sch_month = $_POST['sch_date_month'];
        $sch_year = $_POST['sch_date_year'];
        $sch_time = $_POST['sch_time'];
        $sch_bus = $_POST['sch_bus'];
        $sch_bus_capacity = $_POST['sch_bus_capacity'];
        $sch_bus_cost = $_POST['sch_bus_cost'];

        if ($sch_month > date("m") & $sch_day > date("d") | $sch_month == date("m") & $sch_day > date("d") |$sch_month == date("m") & $sch_day == date("d")) {
            $sch_date = "$sch_day-$sch_month-$sch_year";

            //pass variable to schedule add model
            $add_schedule_success = $this->Operator->add_schedule($opp_id, $sch_from, $sch_to, $sch_date, $sch_time, $sch_bus, $sch_bus_capacity, $sch_bus_cost);

            //redirect if inserted
            if ($add_schedule_success) {
                $data = array(
                    'success' => TRUE,
                    'msg' => "Successfully updated"
                );
                echo json_encode($data);
            } else {
                $data = array(
                    'success' => FALSE,
                    'error' => "Something went wrong"
                );

                echo json_encode($data);
            }
        } else {
            $data = array(
                'success' => FALSE,
                'error' => "Can't add schedule for past date"
            );

            echo json_encode($data);
        }
    }

    //add operation
    function add_operations() {
        $data = array(
            'operatorId' => $this->get_operator_id(),
            'operatorDetails' => $this->Operator->get_operator_details($this->get_operator_id())
        );

        $this->load->view('operator/add_operation', $data);
    }

    //load active operations
    function active_operations() {
        $data = array(
            'operatorId' => $this->get_operator_id(),
            'operatorDetails' => $this->Operator->get_operator_details($this->get_operator_id()),
            'activeOperations' => $this->Operator->get_all_schedules($this->get_operator_id()),
            'numberActiveOperations' => $this->Operator->get_active_operation_count($this->get_operator_id())
        );

        $this->load->view('operator/active_operation', $data);
    }

    //schedule preview
    function schedule_preview() {

        $scheduleId = $_GET['schedule-id'];
        $data = array(
            'operatorId' => $this->get_operator_id(),
            'operatorDetails' => $this->Operator->get_operator_details($this->get_operator_id()),
            'scheduleDetails' => $this->Operator->get_schedule_details($scheduleId),
            'scheduleId' => $scheduleId
        );
        $this->load->view('operator/schedule_preview', $data);
    }

    //update schedule
    function update_opp_schedule() {
        $sch_id = $_POST['sch_id'];
        $sch_from = $_POST['sch_from'];
        $sch_to = $_POST['sch_to'];
        $sch_date = $_POST['sch_date'];
        $sch_time = $_POST['sch_time'];
        $sch_bus = $_POST['sch_bus'];
        $sch_bus_capacity = $_POST['sch_bus_capacity'];
        $sch_bus_cost = $_POST['sch_bus_cost'];

        //pass variable to schedule add model
        $update_schedule_success = $this->Operator->update_schedule($sch_id, $sch_from, $sch_to, $sch_date, $sch_time, $sch_bus, $sch_bus_capacity, $sch_bus_cost);

        //redirect if updated
        if ($update_schedule_success) {
            $data = array(
                'success' => TRUE
            );
            echo json_encode($data);
        } else {
            $data = array(
                'success' => FALSE,
                'error' => "Something went wrong"
            );

            echo json_encode($data);
        }
    }

    //update schedule
    function delete_opp_schedule() {
        $sch_id = $_POST['sch_id'];

        //pass variable to schedule delete model
        $delete_schedule_success = $this->Operator->delete_schedule($sch_id);

        //redirect if deleted
        if ($delete_schedule_success) {
            $data = array(
                'success' => TRUE
            );
            echo json_encode($data);
        } else {
            $data = array(
                'success' => FALSE,
                'error' => "Something went wrong"
            );

            echo json_encode($data);
        }
    }

    //update success notification
    function update_schedule_suc_notification($sch_id) {

        $data = array(
            'operatorId' => $this->get_operator_id(),
            'operatorDetails' => $this->Operator->get_operator_details($this->get_operator_id()),
            'scheduleDetails' => $this->Operator->get_schedule_details($sch_id),
            'scheduleId' => $sch_id,
            'message_class' => "alert alert-success text-center",
            'alert_message' => '<p>Your bus schedule was successfully updated</p>'
        );
        $this->load->view('operator/schedule_preview', $data);
    }

    //update error notification
    function update_schedule_err_notification($sch_id) {

        $data = array(
            'operatorId' => $this->get_operator_id(),
            'operatorDetails' => $this->Operator->get_operator_details($this->get_operator_id()),
            'scheduleDetails' => $this->Operator->get_schedule_details($sch_id),
            'scheduleId' => $sch_id,
            'message_class' => "alert alert-danger text-center",
            'alert_message' => '<p>Sorry an error occured. Try again</p>'
        );
        $this->load->view('operator/schedule_preview', $data);
    }

    //update operator profile
    function edit_profile() {

        $operatorName = $_POST['oppName'];
        $operatorMail = $_POST['oppMail'];
        $operatorId = $_POST['oppId'];
        $operatorZipcode = $_POST['oppZipcode'];

        //validate submitted data
        $this->form_validation->set_rules('oppName', 'Company name', "trim|required");
        $this->form_validation->set_rules('oppMail', 'Your email', 'trim|required');
        $this->form_validation->set_rules('oppZipcode', 'Your location', 'trim|required');


        if ($this->form_validation->run() == TRUE) {
            $update_data = array(
                'operatorName' => $operatorName,
                'operatorMail' => $operatorMail,
                'operatorZipcode' => $operatorZipcode
            );

            $this->db->where('operatorId', $operatorId);
            $update_true = $this->db->update('OPERATOR', $update_data);

            if ($update_true) {
                $data = array(
                    'success' => TRUE
                );
                echo json_encode($data);
            } else {
                $data = array(
                    'success' => FALSE,
                    'error' => "Something went wrong"
                );

                echo json_encode($data);
            }
        } else {
            $data = array(
                'success' => FALSE,
                'error' => validation_errors()
            );

            echo json_encode($data);
        }
    }

    //load active operations
    function active_tickets() {
        $data = array(
            'operatorId' => $this->get_operator_id(),
            'operatorDetails' => $this->Operator->get_operator_details($this->get_operator_id()),
            'activeTickets' => $this->Operator->get_all_tickets($this->get_operator_id()),
            'numberActiveTickets' => $this->Operator->get_active_tickets_count($this->get_operator_id())
        );

        $this->load->view('operator/active_ticket', $data);
    }

    //find a ticket
    function search_ticket() {
        $ticket_number = $_POST['ticket_number'];

        $this->db->select('customerName, ticketId');
        $this->db->where('ticketKey', $ticket_number);
        $this->db->or_where('customerId', $ticket_number);
        $search_result = $this->db->get('TICKET');

        if ($search_result->num_rows() > 0) {
            foreach ($search_result->result() as $row) {
                $cName = $row->customerName;
                $tId = $row->ticketId;
            }
            $data = array(
                'success' => TRUE,
                'cname' => $cName,
                'tid' => $tId
            );
            echo json_encode($data);
        } else {
            $data = array(
                'success' => FALSE,
                'error' => "Ticket not found"
            );
            echo json_encode($data);
        }
    }
    
     //load operation tickets
    function operation_tickets() {
        
        $scheduleId = $_GET['oppId'];
        
        $data = array(
            'operatorId' => $this->get_operator_id(),
            'operatorDetails' => $this->Operator->get_operator_details($this->get_operator_id()),
            'activeTickets' => $this->Operator->get_schedule_tickets($scheduleId),
            'numberActiveTickets' => $this->Operator->get_schedule_tickets_count($scheduleId)
        );

        $this->load->view('operator/operation_ticket', $data);
    }

    //ticket preview
    function ticket_preview() {

        $ticketId = $_GET['ticket-id'];
        $data = array(
            'operatorId' => $this->get_operator_id(),
            'operatorDetails' => $this->Operator->get_operator_details($this->get_operator_id()),
            'ticketDetails' => $this->Operator->get_ticket_details($ticketId),
            'ticketId' => $ticketId
        );
        $this->load->view('operator/ticket_preview', $data);
    }

    //update ticket cancel
    function cancel_opp_ticket() {
        $ticket_id = $_POST['ticket_id'];

        //pass variable to schedule delete model
        $cancel_ticket_success = $this->Operator->cancel_ticket($ticket_id);

        //redirect if deleted
        if ($cancel_ticket_success) {
            $data = array(
                'success' => TRUE
            );
            echo json_encode($data);
        } else {
            $data = array(
                'success' => FALSE,
                'error' => "Something went wrong"
            );

            echo json_encode($data);
        }
    }

    //update ticket confirm
    function confirm_opp_ticket() {
        $ticket_id = $_POST['ticket_id'];

        //pass variable to schedule delete model
        $confirm_ticket_success = $this->Operator->confirm_ticket($ticket_id);

        //redirect if deleted
        if ($confirm_ticket_success) {
            $data = array(
                'success' => TRUE
            );
            echo json_encode($data);
        } else {
            $data = array(
                'success' => FALSE,
                'error' => "Something went wrong"
            );

            echo json_encode($data);
        }
    }

    //load active group bookings
    function active_groups() {
        $data = array(
            'operatorId' => $this->get_operator_id(),
            'operatorDetails' => $this->Operator->get_operator_details($this->get_operator_id()),
            'activeTickets' => $this->Operator->get_all_tickets($this->get_operator_id()),
            'numberActiveTickets' => $this->Operator->get_active_tickets_count($this->get_operator_id())
        );

        $this->load->view('operator/active_group', $data);
    }

}
