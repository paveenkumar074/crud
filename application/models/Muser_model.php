<?php

class Muser_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    
    /*
     * Get muser by UserUID
     */
    function get_muser($UserUID)
    {
        $this->db->select('*');

        $this->db->select('DATE_FORMAT(Birthday, "%d-%m-%Y") as Birthday', FALSE);
        $this->db->where('UserUID',$UserUID);
        return $this->db->get('mUsers')->row_array();

    }

    /*
     * Get all musers
     */
    function get_all_musers()
    {   
        $this->db->select('*');
        $this->db->select('DATE_FORMAT(Birthday, "%d-%m-%Y") as Birthday', FALSE);
        $this->db->order_by('UserUID', 'desc');
        $this->db->join('mColleges','mColleges.CollegeUID = mUsers.CollegeUID','LEFT');
        $this->db->join('mTeams','mTeams.TeamUID = mUsers.TeamUID','LEFT');
        $this->db->join('mCountries','mCountries.CountryUID = mUsers.CountryUID','LEFT');
        return $this->db->get('mUsers')->result_array();
    }

    /*
     * function to add new muser
     */
    function add_muser($params)
    {
        $this->db->insert('mUsers',$params);
        return $this->db->insert_id();
    }
    
    /*
     * function to update muser
     */
    function update_muser($UserUID,$params)
    {

        $this->db->where('UserUID',$UserUID);
        return $this->db->update('mUsers',$params);
    }
    
    /*
     * function to delete muser
     */
    function delete_muser($UserUID)
    {
        return $this->db->delete('mUsers',array('UserUID'=>$UserUID));
    }

        /*
     * Get mcollege by CollegeUID
     */
        function get_mcollege($CollegeUID)
        {
            return $this->db->get_where('mColleges',array('CollegeUID'=>$CollegeUID))->row_array();
        }
        
    /*
     * Get all mcolleges
     */
    function get_all_mcolleges()
    {
        $this->db->order_by('CollegeUID', 'desc');
        return $this->db->get('mColleges')->result_array();
    }

    /*
     * Get mcountry by CountryUID
     */
    function get_mcountry($CountryUID)
    {
        return $this->db->get_where('mCountries',array('CountryUID'=>$CountryUID))->row_array();
    }

    /*
     * Get all mcountries
     */
    function get_all_mcountries()
    {
        $this->db->order_by('CountryUID', 'desc');
        return $this->db->get('mCountries')->result_array();
    }

    /*
     * Get mteam by TeamUID
     */
    function get_mteam($TeamUID)
    {
        return $this->db->get_where('mTeams',array('TeamUID'=>$TeamUID))->row_array();
    }

    /*
     * Get all mteams
     */
    function get_all_mteams()
    {
        $this->db->order_by('TeamUID', 'desc');
        return $this->db->get('mTeams')->result_array();
    }
}
