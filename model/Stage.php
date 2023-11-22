<?php
class Stage
{
    private ?int $id_stage = null;
    private ?string $domain = null;
    private ?string $email = null;
    private ?DateTime $start_date = null;
    private ?DateTime $end_date = null;
    private ?int $num_demands = null;
    private ?string $company_name = null;
    private ?string $description = null;
    

  
        public function __construct(
            int $id_stage,
            string $domain,
            string $email,
            DateTime $start_date,
            DateTime $end_date,
            int $num_demands,
            string $company_name,
            string $description
        
    ) {
        $this->id_stage = $id_stage;
        $this->domain = $domain;
        $this->email = $email;
        $this->start_date = $start_date;
        $this->end_date = $end_date;
        $this->num_demands = $num_demands;
        $this->company_name = $company_name;
        $this->description = $description;
        
    }
    public function getIdStage()
    {
        return $this->id_stage;
    }


    public function getDomain()
    {
        return $this->domain;
    }

    /**
     * Get the value of email
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Get the value of start_date
     */
    public function getStartDate()
    {
        return $this->start_date;
    }

    /**
     * Get the value of end_date
     */
    public function getEndDate()
    {
        return $this->end_date;
    }

    /**
     * Get the value of num_demands
     */
    public function getNumDemands()
    {
        return $this->num_demands;
    }

    /**
     * Get the value of company_name
     */
    public function getCompanyName(){
        return $this->company_name;
    }

    /**
     * Get the value of description
     */
    public function getDescription()
    {
        return $this->description;
       
    }

    /**
     * Get the value of terms_conditions
     */
    public function setDomain( $domain)
    {
        $this->domain = $domain;
        return $this;
    }

    /**
     * Set the value of email
     */
    public function setEmail(?string $email)
    {
        $this->email = $email;
        return $this;
    }

    /**
     * Set the value of start_date
     */
    public function setStartDate(?DateTime $start_date)
    {
        $this->start_date = $start_date;
        return $this;
    }

    /**
     * Set the value of end_date
     */
    public function setEndDate( $end_date)
    {
        $this->end_date = $end_date;
        return $this;
    }

    /**
     * Set the value of num_demands
     */
    public function setNumDemands( $num_demands)
    {
        $this->num_demands = $num_demands;
        return $this;
    }

    /**
     * Set the value of company_name
     */
    public function setCompanyName( $company_name)
    {
        $this->company_name = $company_name;
        return $this;
    }

    /**
     * Set the value of description
     */
    public function setDescription($description)
    {
        $this->description = $description;
        return $this;
    }

    
}
