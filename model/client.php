<?php

class Client {
    public $company_name;
    public $business_number;
    public $contacts_first_name;
    public $contacts_last_name;
    public $phone_number;
    public $cell_number;
    public $website;
    public $status; # archive or active

    function __construct($contents)
    {
        $this->company_name = $contents[0];
        $this->business_number = $contents[2];
        $this->contacts_first_name = $contents[3];
        $this->contacts_last_name = $contents[4];
        $this->phone_number = $contents[5];
        $this->cell_number = $contents[6];
        $this->website = $contents[7];
        $this->status = $contents[8];
    }
}