<?php
class Picture_Gallery extends CI_Controller {

        public function __construct()
        {
                parent::__construct();

                $this->load->model('backend/login_model');
                $this->load->model('backend/picture_model');
                $this->load->model('backend/school_visit_model');
                $this->load->model('backend/seo_settings_model');
			    $this->load->model('backend/banner_model');
			    $this->load->model('backend/school_visit_blog_model');
			    $this->load->model('backend/picture_gallery_model');
			    $this->load->model('backend/theme_model');
			    $this->load->model('backend/seo_settings_model');
			    $this->load->helper('function_helper');
        }
        
		public function index()
		{
			$data['theme_color']=$this->theme_model->get_all_info('theme-color');
		    $data['font_color']=$this->theme_model->get_all_info('font-color');
			$data['companyinfo']=$this->login_model->getuserinfoid('1');
		    $data['title']=$data['companyinfo']['company_name'].' | Picture Gallery';
		    $this->load->model('backend/home_page_model');
		    $data['bannerlist']=$this->home_page_model->getactivebannerlistmodel();
			$data['categorylist']=$this->picture_model->fixedbannerlistmodel();
			$data['gallerylist']=$this->picture_gallery_model->fixedbannerlistmodel();
			$data['totalrec']=$this->picture_gallery_model->countactivepicture();
	        $data['nowpage']=1;
			$data['picturecatlist']=$this->school_visit_model->getfeaturedbannerlistmodel();
			$data['bloglist']=$this->school_visit_blog_model->getfeaturedbannerlistmodel();
            $data['banner']=$this->banner_model->getbannerbyslug('picture_gallery');
			$data['metainfo']=$this->seo_settings_model->getmetainfomodel(3);
            if (count($data['bannerlist']) != 1 && array_key_exists('is_bg_constant', $data['bannerlist'][0])) {
                    //single const
                    //echo "abcd";
                    $filtered_arr = array_filter($data['bannerlist'], function($item){
                        return $item['is_bg_constant'] == 1;
                    });
                    if (count($filtered_arr)) {
                        foreach ($filtered_arr as $key => $value) {
                            $data['filtered_arr'] = $value;
                        }
                    } else {
                        $data['filtered_arr'] = array();
                    }
            } else {
            //  //both const.
                $data['filtered_arr'] = array();
            }

            //check for fg constant
            if (count($data['bannerlist']) != 1 && array_key_exists('is_fg_constant', $data['bannerlist'][0])) {
                //single const
                //echo "single constant";
                $filtered_arr_fg = array_filter($data['bannerlist'], function($item_fg) {
                    return $item_fg['is_fg_constant'] == 1;
                });
                if (count($filtered_arr_fg)) {
                    foreach ($filtered_arr_fg as $key2 => $value2) {
                        $data['filtered_arr_fg'] = $value2;
                    }
                } else {
                    $data['filtered_arr_fg'] = array();
                }
            } else {
                //both const.
                //echo "both const";
                $data['filtered_arr_fg'] = array();
            }
		    $this->load->view('user/picture_gallery_view',$data);
		}

		public function category($getid)
		{

			$data['theme_color']=$this->theme_model->get_all_info('theme-color');
			$data['font_color']=$this->theme_model->get_all_info('font-color');
			$data['companyinfo']=$this->login_model->getuserinfoid('1');
			$data['title']=$data['companyinfo']['company_name'].' | Picture Gallery';
			$data['categorylist']=$this->picture_model->fixedbannerlistmodel();
			$data['categoryinfo']=$this->picture_model->getbannerslugmodel($getid);
			$data['gallerylist']=$this->picture_model->picturelistmodel($data['categoryinfo']['picture_id']);
			$data['totalrec']=1;
			$data['nowpage']=1;
			$data['picturecatlist']=$this->school_visit_model->getfeaturedbannerlistmodel();
			$data['bloglist']=$this->school_visit_blog_model->getfeaturedbannerlistmodel();
            $data['banner']=$this->banner_model->getbannerbyslug('picture_gallery');
			$data['metainfo']=$this->seo_settings_model->getmetainfomodel(3);
		    $this->load->view('user/picture_gallery_view',$data);
		}

		public function page($getpage)
	    {
            $this->load->model('backend/home_page_model');
			$data['theme_color']=$this->theme_model->get_all_info('theme-color');
			$data['font_color']=$this->theme_model->get_all_info('font-color');
			$data['companyinfo']=$this->login_model->getuserinfoid('1');
		    $data['title']=$data['companyinfo']['company_name'].' | Picture Gallery';
			$data['categorylist']=$this->picture_model->fixedbannerlistmodel();
			$data['gallerylist']=$this->picture_gallery_model->paginationsort($getpage);
	        $data['totalrec']=$this->picture_gallery_model->countactivepicture();
	        $data['nowpage']=$getpage;
			$data['picturecatlist']=$this->school_visit_model->getfeaturedbannerlistmodel();
			$data['bloglist']=$this->school_visit_blog_model->getfeaturedbannerlistmodel();
            $data['banner']=$this->banner_model->getbannerbyslug('picture_gallery');
			$data['metainfo']=$this->seo_settings_model->getmetainfomodel(3);
            $data['bannerlist']=$this->home_page_model->getactivebannerlistmodel();
			$this->load->view('user/picture_gallery_view',$data);
	    }

	    public function category_picture()
	    {
	    	$category=$this->input->post('catagory');
	    	$gallerylist=$this->picture_model->picturelistmodel($category);
	    	
	    	$result="";

	    	if(count($gallerylist)>0){ 
                foreach($gallerylist as $gallerylistdata) { 
                $result.= '<a href="http://unitegallery.net">
                                <img alt="'.$gallerylistdata['gpicture_title'].'" src="'. BASE_URI.'uploads/picture/'.$gallerylistdata['gpicture_image'].'" data-image="'.BASE_URI.'uploads/picture/'.$gallerylistdata['gpicture_image'].'" data-description="This is a Lemon Slice" style="display:none">
                            </a>';
                }  
            } else { 
             $result= ' <h3>No Picures Found</h3>' ;          
            } 

            print_r($result);
	    }
	   
	   
}

?>