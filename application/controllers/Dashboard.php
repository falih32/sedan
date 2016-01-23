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
                        $this->load->model('M_dashboard');
		}
    }
	
    public function index(){
            $data['title'] = 'SEDAN';
            $year = date('Y');
            $role = $this->session->userdata('id_role');
            $user = $this->session->userdata('id_user');
            $tahun = $this->session->userdata('tahun');
            $data['content'] = 'dashboard';
            $data['user'] = $this->m_user->selectById($this->session->userdata('id_user'))->row();
            $data['totalpengadaan'] = $this->M_dashboard->TotalPengadaanbyJenis($tahun);
            $data['chart']=$this->getChart();
            $this->load->view('layout', $data);
    }
    
    public function getChart(){
//        $y=array("Jan","Feb","Mar","Apr","Mei","Jun","Jul","Agu","Sep","Okt","Nop","Des");
//        $x=0;
//        while($x<12){
//            $output['data'][$x]['bulan']=$y[$x];
//            $output['data'][$x]['Barang']=0;
//            $output['data'][$x]['Jasa']=0;
//            $output['data'][$x]['Konsultan']=0;
//            $y++;
//            $x++;
//        }
        
        
        $totpengadaan=$this->M_dashboard->TotalPengadaanPerBulan($this->session->userdata('tahun'));
        $i=0;
        foreach($totpengadaan as $t){
            $output['data'][$i]['bulan']=$t->bulan;    
            $output['data'][$i]['barang']=$t->tot_pgd_barang;
            $output['data'][$i]['jasa']=$t->tot_pgd_jasa;
            $output['data'][$i]['konsultan']=$t->tot_pgd_konsultan;
            $i++;
            
        }
        return json_encode($output);
    }
}
?>