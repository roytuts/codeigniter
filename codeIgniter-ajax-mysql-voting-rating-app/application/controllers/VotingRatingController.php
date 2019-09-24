<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class VotingRatingController extends CI_Controller {

	function __construct() {
        parent::__construct();
        $this->load->model('VotingRating_Model', 'vr');
    }

    function index() {
        //the hard-coded blog id value 1 should come from UI
        $blog_id = 1;
        $vote_results = $this->vr->get_blog_rating($blog_id);
        $data['blog_vote_overall_rows'] = $vote_results['vote_rows'];
        $data['blog_vote_overall_rate'] = $vote_results['vote_rate'];
        $data['blog_vote_overall_dec_rate'] = $vote_results['vote_dec_rate'];
		
        $vote_results = $this->vr->get_blog_rating_from_ip($blog_id);
        $data['blog_vote_ip_rate'] = $vote_results['vote_rate'];
		
        $this->load->view('voting-rating', $data);
    }

    function rate_blog() {
        if (isset($_POST)) {
            $blog_id = $_POST['blog_id'];
            $rating = $_POST['rating'];
			
			//echo $blog_id . ' ' . $rating;
			
            $vote_results = $this->vr->rate_blog($blog_id, $rating);
			
			//print_r($vote_results);
			
            $blog_vote_overall_rows = $vote_results['vote_rows'];
            $blog_vote_overall_rate = $vote_results['vote_rate'];
            $blog_vote_overall_dec_rate = $vote_results['vote_dec_rate'];
            $blog_vote_ip_rate = $vote_results['vote_curr_rate'];
            $stars = '';
            for ($i = 1; $i <= floor($blog_vote_overall_rate); $i++) {
                $stars .= '<div class="star" id="' . $i . '"></div>';
            }
            //THE OVERALL RATING (THE OPAQUE STARS)
            echo '<div class="r"><div class="rating">' . $stars . '</div>' .
            '<div class="transparent">
                <div class="star" id="1"></div>
                <div class="star" id="2"></div>
                <div class="star" id="3"></div>
                <div class="star" id="4"></div>
                <div class="star" id="5"></div>
                <div class="votes">(' . $blog_vote_overall_dec_rate . '/5, ' . $blog_vote_overall_rows . ' ' . ($blog_vote_overall_rows > 1 ? ' votes' : ' vote') . ') ' . ($blog_vote_ip_rate > 0 ? '<strong>You rated this: <span style="color:#39C;">' . $blog_vote_ip_rate . '</span></strong>' : '') . '</div>
              </div>
            </div>';
        }
    }
}
