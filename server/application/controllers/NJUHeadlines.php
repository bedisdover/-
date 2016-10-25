<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Created by PhpStorm.
 * User: wzh
 * Date: 2016/10/25
 * Time: 下午2:25
 */
class NJUHeadlines extends CI_Controller
{

    public function getSchoolNews(){

        $date = date("Y-m-d");
        $sql = "select * from tb_news WHERE type = 'school' AND date = '$date'";
        $this->load->database();
        $query = $this->db->query($sql);
        if($query->num_rows()==0) {
            $date = date("Y-m-d",strtotime("-2 day"));
            $sql = "select * from tb_news WHERE type = 'school' AND date = '$date'";
            $query = $this->db->query($sql);
        }
        $resultList = "[";
        foreach ($query->result() as $row)
        {
            $resultList = $resultList.json_encode($row).",";
        }
        $resultList = $resultList."]";
        $this->output->set_content_type('application/json')->set_output($resultList);
    }

    public function getSocialNews(){

        $date = date("Y-m-d");
        $sql = "select * from tb_news WHERE type = 'social' AND date = '$date'";
        $this->load->database();
        $query = $this->db->query($sql);
        if($query->num_rows()==0) {
            $date = date("Y-m-d",strtotime("-2 day"));
            $sql = "select * from tb_news WHERE type = 'social' AND date = '$date'";
            $query = $this->db->query($sql);
        }
        $resultList = "[";
        foreach ($query->result() as $row)
        {
            if(!strpos($row->title,"\\")){
                $resultList = $resultList.json_encode($row).",";
            }

        }
        $resultList = $resultList."]";
        $this->output->set_content_type('application/json')->set_output($resultList);
    }

    public function getNotice(){
        $sql = "select * from tb_notice order by id desc";
        $this->load->database();
        $query = $this->db->query($sql);
        $resultList = "[";
        foreach ($query->result() as $row)
        {
            $resultList = $resultList.json_encode($row).",";
        }
        $resultList = $resultList."]";
        $this->output->set_content_type('application/json')->set_output($resultList);
    }

    public function getTopical(){
        $date = date("Y-m-d");
        $sql = "select * from tb_topical WHERE date = '$date'";
        $this->load->database();
        $query = $this->db->query($sql);
        if($query->num_rows()==0) {
            $date = date("Y-m-d",strtotime("-2 day"));
            $sql = "select * from tb_topical WHERE  date = '$date'";
            $query = $this->db->query($sql);
        }
        $resultList = "[";
        foreach ($query->result() as $row)
        {
            $resultList = $resultList.json_encode($row).",";
        }
        $resultList = $resultList."]";
        $this->output->set_content_type('application/json')->set_output($resultList);
    }

    public function getWechatOther(){
        $id = $this->input->get('id');
        $sql = "select * from tb_wechat_other WHERE ";
        $date = date("Y-m-d");
        $this->load->database();
        $start_id = 0;
        $end_id = 0;
        if($id==0){
            $sql2 = "select min(id) from tb_wechat_other WHERE date = '$date'";
            $query = $this->db->query($sql2);
            $row = $query->result_array()[0];
            if(count($row==0)){
                $date = date("Y-m-d",strtotime("-2 day"));
                $sql2 = "select min(id) from tb_wechat_other WHERE date = '$date'";
                $query = $this->db->query($sql2);
                $row = $query->result_array()[0];
            }

            $start_id = $row['min(id)'];
        }else{
            $start_id = $id+10;
        }
        $end_id = $start_id+10;
        $subsql= "id > $start_id and id < $end_id";
        $sql = $sql.$subsql;
        $query = $this->db->query($sql);
        $resultList = "[";
        foreach ($query->result() as $row)
        {
            $resultList = $resultList.json_encode($row).",";
        }
        $resultList = $resultList."]";
        $this->output->set_content_type('application/json')->set_output($resultList);
    }


    public function getWechatRec(){
        $id = $this->input->get('id');
        $sql = "select * from tb_wechat_rec WHERE ";
        $date = date("Y-m-d");
        $this->load->database();
        $start_id = 0;
        $end_id = 0;
        if($id==0){
            $sql2 = "select min(id) from tb_wechat_rec WHERE date = '$date'";
            $query = $this->db->query($sql2);
            $row = $query->result_array()[0];
            if(count($row==0)){
                $date = date("Y-m-d",strtotime("-2 day"));
                $sql2 = "select min(id) from tb_wechat_rec WHERE date = '$date'";
                $query = $this->db->query($sql2);
                $row = $query->result_array()[0];
            }

            $start_id = $row['min(id)'];
        }else{
            $start_id = $id+10;
        }
        $end_id = $start_id+10;
        $subsql= "id > $start_id and id < $end_id";
        $sql = $sql.$subsql;
        $query = $this->db->query($sql);
        $resultList = "[";
        foreach ($query->result() as $row)
        {
            $resultList = $resultList.json_encode($row).",";
        }
        $resultList = $resultList."]";
        $this->output->set_content_type('application/json')->set_output($resultList);
    }

}