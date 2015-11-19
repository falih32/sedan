<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard extends CI_Controller{
    //put your code here
    public function __construct(){
        parent::__construct();
		if($this->session->userdata('id_user') == ''){
			$this->session->set_flashdata('message', array('msg' => 'Silahkan <strong>login</strong> untuk melanjutkan','class' => 'danger'));
			redirect('login');
		}
		else
		{
			$this->load->helper('url');
			$this->load->database();
                        $this->load->model('m_user');
		}
    }
	
    public function index(){
            $data['title'] = 'SEDAN';
            $year = date('Y');
            $role = $this->session->userdata('id_role');
            $user = $this->session->userdata('id_user');
            $data['content'] = 'l_pengadaan';
            $data['user'] = $this->m_user->selectById($this->session->userdata('id_user'))->row();
            
            $this->load->view('layout', $data);
    }

    public function ajaxSuratMasukPending(){
        $min=$this->input->post('min');
        $max=$this->input->post('max');
        if($min == '') $min = '0000-00-00';
        if($max == '') $max = '9999-12-31';
        $result = $this->m_dashboard->selectAjaxSMskStatus($min, $max, '-1');
        echo $result;
    }
    
    public function ajaxSuratMasukDisposisi(){
        $min=$this->input->post('min');
        $max=$this->input->post('max');
        if($min == '') $min = '0000-00-00';
        if($max == '') $max = '9999-12-31';
        $result = $this->m_dashboard->selectAjaxSMskStatus($min, $max, '0');
        echo $result;
    }

    public function ajaxSuratMasukSelesai(){
        $min=$this->input->post('min');
        $max=$this->input->post('max');
        if($min == '') $min = '0000-00-00';
        if($max == '') $max = '9999-12-31';
        $result = $this->m_dashboard->selectAjaxSMskStatus($min, $max, '1');
        echo $result;
    }
    
    public function ajaxProcessDisposisi($status){
        $min=$this->input->post('min');
        $max=$this->input->post('max');
        if($min == '') $min = '0000-00-00';
        if($max == '') $max = '9999-12-31';
        $result = $this->m_dashboard->selectAjaxDisposisiByStatus($min, $max, $status);
        echo $result;
    }

    public function ajaxProcessDisposisiPerUser($status){
        $user = $this->session->userdata('id_user');
        $min=$this->input->post('min');
        $max=$this->input->post('max');
        if($min == '') $min = '0000-00-00';
        if($max == '') $max = '9999-12-31';
        $result = $this->m_dashboard->selectAjaxDisposisiByStatusPerUser($min, $max, $status, $user);
        echo $result;
    }
    
    public function ajaxTabelDispo($status, $year){
        $result = $this->m_dashboard->getBagianDispo($status, $year)->result();
        echo json_encode($result);
    }
    
    public function getChart1Ajaxx($bln){
        $start =  date('Y-m-01', strtotime('-'.($bln-1).' months'));
        $month = $this->m_dashboard->selectBulan($start);
        $sm = $this->m_surat_masuk->selectTotalBulan($start);
        $dp = $this->m_disposisi->selectTotalBulan($start);
        $m = array();
        foreach ($month as $row){
            array_push($m, $row->month." ".$row->year);
        }
        foreach ($sm as $row){
            $c_sm[$row->month." ".$row->year] = $row->total;
        }
        foreach ($dp as $row){
            $c_dp[$row->month." ".$row->year] = $row->total;
        }
        $i = 0;
        $output = array();
        foreach($m as $row){
            $output[$i]=array();
            $output[$i]['bulan'] = $m[$i];
            
            if(isset($c_sm[$row])){$output[$i]['suratmasuk'] = $c_sm[$row];}
            else{$output[$i]['suratmasuk'] = '0';}
            
            if(isset($c_dp[$row])){$output[$i]['disposisi'] = $c_dp[$row];}
            else{$output[$i]['disposisi'] = '0';}
            $i++;
        }

        return json_encode($output);
    }
    
    public function getChart2Ajaxx($bln){
        $start =  date('Y-m-01', strtotime('-'.($bln-1).' months'));
        $dp = $this->m_disposisi->selectTotalBulan($start);
        
        $m = array();
        $month = array();
        $c_dp = array();
        foreach ($dp as $row){
            array_push($m, $row->month." ".$row->year);
            array_push($month, $row->month_num);
            array_push($c_dp, $row->total);
        }
        
        $stat = $this->m_status_disposisi->selectAll()->result();
        $i = 0;
        $output = array();
        foreach($month as $row1){
            $j = 0;
            $output['data'][$i]['bulan'] = $m[$i];
            foreach($stat as $row2){
                $stat_tot = $this->m_dashboard->selectTotalDisposisiByMonthStatus($row1, $row2->sds_id)->row();
                $output['data'][$i][$row2->sds_nama_status]= $stat_tot->total;
                $j++;
            }
            $i++;
        }
        $output['status'] = array();
        foreach($stat as $row){
            $output['warna'][$row->sds_nama_status]= $this->m_dashboard->selectStatusDispo($row->sds_id)->sds_color;
            array_push($output['status'], $row->sds_nama_status);
        }
        return json_encode($output);
    }
    public function getChart2AjaxPerUserx($bln){
        $user = $this->session->userdata('id_user');
        $start =  date('Y-m-01', strtotime('-'.($bln-1).' months'));
        $dp = $this->m_disposisi->selectTotalBulan($start);
        
        $m = array();
        $month = array();
        $c_dp = array();
        foreach ($dp as $row){
            array_push($m, $row->month." ".$row->year);
            array_push($month, $row->month_num);
            array_push($c_dp, $row->total);
        }
        
        $stat = $this->m_status_disposisi->selectAll()->result();
        $i = 0;
        $output = array();
        foreach($month as $row1){
            $j = 0;
            $output['data'][$i]['bulan'] = $m[$i];
            foreach($stat as $row2){
                $stat_tot = $this->m_dashboard->selectTotalDisposisiByMonthStatusPerUser($row1, $row2->sds_id, $user)->row();
                $output['data'][$i][$row2->sds_nama_status]= $stat_tot->total;
                $j++;
            }
            $i++;
        }
        $output['status'] = array();
        foreach($stat as $row){
            $output['warna'][$row->sds_nama_status]= $this->m_dashboard->selectStatusDispo($row->sds_id)->sds_color;
            array_push($output['status'], $row->sds_nama_status);
        }
        return json_encode($output);
    }

    public function getChart1Ajax($bln){
        $start =  date('Y-m-01', strtotime('-'.($bln-1).' months'));
        $month = $this->m_dashboard->selectBulan($start);
        $sm = $this->m_surat_masuk->selectTotalBulan($start);
        $dp = $this->m_disposisi->selectTotalBulan($start);
        $m = array();
        foreach ($month as $row){
            array_push($m, $row->month." ".$row->year);
        }
        foreach ($sm as $row){
            $c_sm[$row->month." ".$row->year] = $row->total;
        }
        foreach ($dp as $row){
            $c_dp[$row->month." ".$row->year] = $row->total;
        }
        $i = 0;
        $output = array();
        foreach($m as $row){
            $output[$i]=array();
            $output[$i]['bulan'] = $m[$i];
            
            if(isset($c_sm[$row])){$output[$i]['suratmasuk'] = $c_sm[$row];}
            else{$output[$i]['suratmasuk'] = '0';}
            
            if(isset($c_dp[$row])){$output[$i]['disposisi'] = $c_dp[$row];}
            else{$output[$i]['disposisi'] = '0';}
            $i++;
        }

        echo json_encode($output);
    }
    
    public function getChart2Ajax($bln){
        $start =  date('Y-m-01', strtotime('-'.($bln-1).' months'));
        $dp = $this->m_disposisi->selectTotalBulan($start);
        
        $m = array();
        $month = array();
        $c_dp = array();
        foreach ($dp as $row){
            array_push($m, $row->month." ".$row->year);
            array_push($month, $row->month_num);
            array_push($c_dp, $row->total);
        }
        
        $stat = $this->m_status_disposisi->selectAll()->result();
        $i = 0;
        $output = array();
        foreach($month as $row1){
            $j = 0;
            $output['data'][$i]['bulan'] = $m[$i];
            foreach($stat as $row2){
                $stat_tot = $this->m_dashboard->selectTotalDisposisiByMonthStatus($row1, $row2->sds_id)->row();
                $output['data'][$i][$row2->sds_nama_status]= $stat_tot->total;
                $j++;
            }
            $i++;
        }
        $output['status'] = array();
        foreach($stat as $row){
            $output['warna'][$row->sds_nama_status]= $this->m_dashboard->selectStatusDispo($row->sds_id)->sds_color;
            array_push($output['status'], $row->sds_nama_status);
        }
        echo json_encode($output);
    }
    
    
    public function getChart2AjaxPerUser($bln){
        $user = $this->session->userdata('id_user');
        $start =  date('Y-m-01', strtotime('-'.($bln-1).' months'));
        $dp = $this->m_disposisi->selectTotalBulan($start);
        
        $m = array();
        $month = array();
        $c_dp = array();
        foreach ($dp as $row){
            array_push($m, $row->month." ".$row->year);
            array_push($month, $row->month_num);
            array_push($c_dp, $row->total);
        }
        
        $stat = $this->m_status_disposisi->selectAll()->result();
        $i = 0;
        $output = array();
        foreach($month as $row1){
            $j = 0;
            $output['data'][$i]['bulan'] = $m[$i];
            foreach($stat as $row2){
                $stat_tot = $this->m_dashboard->selectTotalDisposisiByMonthStatusPerUser($row1, $row2->sds_id, $user)->row();
                $output['data'][$i][$row2->sds_nama_status]= $stat_tot->total;
                $j++;
            }
            $i++;
        }
        $output['status'] = array();
        foreach($stat as $row){
            $output['warna'][$row->sds_nama_status]= $this->m_dashboard->selectStatusDispo($row->sds_id)->sds_color;
            array_push($output['status'], $row->sds_nama_status);
        }
        echo json_encode($output);
    }
    
    function hex2rgba($color, $opacity = false) {

    $default = 'rgb(0,0,0)';

    //Return default if no color provided
    if(empty($color))
              return $default;

    //Sanitize $color if "#" is provided
            if ($color[0] == '#' ) {
             $color = substr( $color, 1 );
            }

            //Check if color has 6 or 3 characters and get values
            if (strlen($color) == 6) {
                    $hex = array( $color[0] . $color[1], $color[2] . $color[3], $color[4] . $color[5] );
            } elseif ( strlen( $color ) == 3 ) {
                    $hex = array( $color[0] . $color[0], $color[1] . $color[1], $color[2] . $color[2] );
            } else {
                    return $default;
            }

            //Convert hexadec to rgb
            $rgb =  array_map('hexdec', $hex);

            //Check if opacity is set(rgba or rgb)
            if($opacity){
             if(abs($opacity) > 1)
             $opacity = 1.0;
             $output = 'rgba('.implode(",",$rgb).','.$opacity.')';
            } else {
             $output = 'rgb('.implode(",",$rgb).')';
            }

            //Return rgb(a) color string
            return $output;
    }
    
    public function getCount(){
        $data['totalSuratPending'] = $this->m_dashboard->countSuratMasukPending();
        $data['totalDisposisiBlmSls'] = $this->m_dashboard->countDisposisi('1');
        $data['totalDisposisiTunda'] = $this->m_dashboard->countDisposisi('2');
        $data['totalDisposisiTgKonfirm'] = $this->m_dashboard->countDisposisi('3');
    }
}
?>