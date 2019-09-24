<?php

if (!defined('BASEPATH'))
exit('No direct script access allowed');

/**
* Description of VotingRating_Model
*
* @author https://www.roytuts.com
*/

class VotingRating_Model extends CI_Model {

	private $blog_vote = 'blog_vote';

    function get_blog_rating($blog_id) {
        $sql = 'SELECT COUNT(DISTINCT(bv.vote_id)) total_rows,
            IFNULL(SUM(bv.blog_vote),0) total_rating, bv.blog_id
            FROM ' . $this->blog_vote . ' bv
            WHERE bv.blog_id=' . $blog_id . ' LIMIT 1';

        $query = $this->db->query($sql);
        $row = $query->row();
        $total_rows = $row->total_rows;
        $total_rating = $row->total_rating;
        $results['vote_rows'] = $total_rows;
        
		$rating = 0;
		
        if ($total_rows > 0) {
            $rating = $total_rating / $total_rows;
        }
		
        $dec_rating = round($rating, 1);
        $results['vote_rate'] = $rating;
        $results['vote_dec_rate'] = $dec_rating;
		
        return $results;
    }

    function get_blog_rating_from_ip($blog_id) {
        $ip = $this->input->ip_address();
        $sql = 'SELECT bv.vote_id
            FROM ' . $this->blog_vote . ' bv
            WHERE bv.ip_address=' . $this->db->escape($ip) .
                ' AND bv.blog_id=' . $blog_id;

        $this->db->limit(1);
        $query = $this->db->query($sql);
		
        if ($query->num_rows() > 0) {
            $row = $query->row();
            $vote_id = $row->vote_id;
			
            $sql = 'SELECT IFNULL(SUM(bv.blog_vote),0) total_rating,
                bv.blog_id
                FROM ' . $this->blog_vote . ' bv  
                WHERE bv.blog_id=' . $blog_id .
                    ' LIMIT 1';
					
            $query = $this->db->query($sql);
			
            $row = $query->row();
            $rating = $row->total_rating;
            $rating = round($rating, 1);
            $results['vote_rate'] = $rating;
			
            return $results;
        }
    }

    /*
     * rate this blog
     */

    function rate_blog($blog_id, $rating) {
        $ip = $this->input->ip_address();
        $sql = 'SELECT bv.vote_id
            FROM ' . $this->blog_vote . ' bv
            WHERE bv.ip_address=' . $this->db->escape($ip) .
                ' AND bv.blog_id=' . $blog_id;

        $this->db->limit(1);
        $query = $this->db->query($sql);
		
        if ($query->num_rows() > 0) {
            $row = $query->row();
            $vote_id = $row->vote_id;
			
            $sql = 'SELECT IFNULL(SUM(bv.blog_vote),0) total_rating,
                bv.blog_id
                FROM ' . $this->blog_vote . ' bv
                WHERE bv.vote_id=' . $vote_id . '
                AND bv.blog_id=' . $blog_id .
                    ' LIMIT 1';

            $query = $this->db->query($sql);
            $row = $query->row();
            $rating = $row->total_rating;
            $rating = round($rating, 1);
            $results['vote_curr_rate'] = $rating;
        } else {
            $data = array(
                'blog_vote' => $rating,
                'blog_id' => $blog_id,
                'ip_address' => $ip
            );
            $this->db->insert($this->blog_vote, $data);

			$sql = 'SELECT IFNULL(SUM(bv.blog_vote),0) total_rating,
			bv.blog_id
			FROM ' . $this->blog_vote . ' bv
			WHERE bv.blog_id=' . $blog_id .
					' LIMIT 1';

			$query = $this->db->query($sql);
			
			$row = $query->row();
			$rating = $row->total_rating;
			$rating = round($rating, 1);
			$results['vote_curr_rate'] = $rating;
        }
		
        $overall_results = $this->get_blog_rating($blog_id);
        $results['vote_rows'] = $overall_results['vote_rows'];
        $results['vote_rate'] = $overall_results['vote_rate'];
        $results['vote_dec_rate'] = $overall_results['vote_dec_rate'];
		
        return $results;
    }

}