function init(){
    // Toggling Views
    if (userType != undefined) {
        if (userType === 'ADMIN' || userType === 'DSH') {
            // $("#dashborad_targets_tab").hide();
            
        } else {
            $("#dashborad_approval_tab").hide();
            $("#dashborad_download_formats_tab").hide();
            $("#dashborad_targets_tab").hide();
        }
    } else {
        console.log("No userType Found");
    }

    //Fetching count
        
    countAllGlobal('leads','count_total_leads');
    
    countGlobal('leads', 'lead_type', 'AONE', 'count_aone_leads');

    countGlobal('leads', 'lead_type', 'SMO', 'count_smo_leads');

    countGlobal('leads', 'lead_type', 'WEB', 'count_web_leads');
    
    countGlobal('leads', 'contact_account', 'YES', 'count_contact_accounts');

    countGlobal('employee', 'status', 'ACTIVE', 'count_active_employees');

    countAllGlobal('sales_order','count_sales_order');




} 
