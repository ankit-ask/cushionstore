<aside class="left-sidebar" data-sidebarbg="skin5">
    <!-- Sidebar scroll-->
    <div class="scroll-sidebar">
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav">
            <ul id="sidebarnav" class="p-t-30"  style="padding-bottom: 20px !important;">

                <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="<?php echo base_url(); ?>dashboard" aria-expanded="false"><i class="mdi mdi-view-dashboard"></i><span class="hide-menu">Dashboard</span></a></li>

                <li class="sidebar-item" id="s-o-employees"> <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="mdi mdi-face"></i><span class="hide-menu">Employees </span></a>
                    <ul aria-expanded="false" class="collapse  first-level">
                        <li class="sidebar-item" id="s-i-employees-active"><a href="<?php echo base_url(); ?>employee/active" class="sidebar-link"><i class="mdi mdi-note-outline"></i><span class="hide-menu"> Active Employees </span></a></li>

                        <!-- <li class="sidebar-item"><a href="/viewFT/employee_stats.php" class="sidebar-link"><i class="mdi mdi-note-plus"></i><span class="hide-menu"> Employee Stats </span></a></li> -->

                        <li class="sidebar-item" id="s-i-employees-all"><a href="<?php echo base_url(); ?>employee/inactive" class="sidebar-link"><i class="mdi mdi-note-plus"></i><span class="hide-menu"> Employees Backup </span></a></li>
                    </ul>
                </li>

                <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="mdi mdi-library-books"></i><span class="hide-menu">Leads </span></a>
                    <ul aria-expanded="false" class="collapse  first-level">
                        <li class="sidebar-item"><a href="<?php echo base_url(); ?>leads/all" class="sidebar-link"><i class="mdi mdi-note-outline"></i><span class="hide-menu"> All </span></a></li>

                        <li class="sidebar-item"><a href="<?php echo base_url(); ?>leads/aone" class="sidebar-link"><i class="mdi mdi-note-outline"></i><span class="hide-menu"> A-One Leads </span></a></li>

                        <li class="sidebar-item"><a href="<?php echo base_url(); ?>leads/web" class="sidebar-link"><i class="mdi mdi-note-outline"></i><span class="hide-menu"> Web Leads </span></a></li>

                        <li class="sidebar-item"><a href="<?php echo base_url(); ?>leads/smo" class="sidebar-link"><i class="mdi mdi-note-outline"></i><span class="hide-menu"> SMO Leads </span></a></li>

                        <li class="sidebar-item" id="s-i-leads-unassigned"><a href="<?php echo base_url(); ?>leads/unassigned" class="sidebar-link"><i class="mdi mdi-note-plus"></i><span class="hide-menu"> Unassigned </span></a></li>

                        <li class="sidebar-item" id="s-i-leads-assigned"><a href="<?php echo base_url(); ?>leads/assigned" class="sidebar-link"><i class="mdi mdi-note-plus"></i><span class="hide-menu"> Assigned </span></a></li>

                        <li class="sidebar-item" id="s-i-leads-fresh"><a href="<?php echo base_url(); ?>leads/fresh" class="sidebar-link"><i class="mdi mdi-note-plus"></i><span class="hide-menu"> Fresh </span></a></li>

                        <li class="sidebar-item" id="s-i-leads-follow-up"><a href="<?php echo base_url(); ?>leads/followup" class="sidebar-link"><i class="mdi mdi-note-plus"></i><span class="hide-menu"> Follow Up </span></a></li>

                        <li class="sidebar-item" id="s-i-leads-dnd"><a href="<?php echo base_url(); ?>leads/dnd" class="sidebar-link"><i class="mdi mdi-note-plus"></i><span class="hide-menu">  DND </span></a></li>

                        <li class="sidebar-item" id="s-i-leads-disposed"><a href="<?php echo base_url(); ?>leads/disposed" class="sidebar-link"><i class="mdi mdi-note-plus"></i><span class="hide-menu"> Disposed </span></a></li>
                        
                        <li class="sidebar-item" id="s-i-leads-idle"><a href="<?php echo base_url(); ?>leads/idle" class="sidebar-link"><i class="mdi mdi-note-plus"></i><span class="hide-menu"> Idle (>30 Days) </span></a></li>
                    </ul>
                </li>

                <!-- <li class="sidebar-item" id="s-o-lead-management"> <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="mdi mdi-blur-linear"></i><span class="hide-menu">Lead Management </span></a>
                    <ul aria-expanded="false" class="collapse  first-level">
                        <li class="sidebar-item"><a href="/viewFT/leadmgmt_list.php" class="sidebar-link"><i class="mdi mdi-note-outline"></i><span class="hide-menu"> All </span></a></li>

                        <li class="sidebar-item"><a href="/viewFT/leadmgmt_fresh_list.php" class="sidebar-link"><i class="mdi mdi-note-plus"></i><span class="hide-menu"> Fresh </span></a></li>

                        <li class="sidebar-item"><a href="/viewFT/leadmgmt_followup_list.php" class="sidebar-link"><i class="mdi mdi-note-plus"></i><span class="hide-menu"> Follow-up </span></a></li>
                    </ul>
                </li> -->

                <li class="sidebar-item" id="s-o-lead-description"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="/viewFT/lead_desc_list.php" aria-expanded="false"><i class="mdi mdi-blur-linear"></i><span class="hide-menu">Lead Descriptions</span></a></li>

                <li class="sidebar-item" id="s-o-free-trials"> <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="mdi mdi-calendar-clock"></i><span class="hide-menu">Free Trials </span></a>
                    <ul aria-expanded="false" class="collapse  first-level">
                        <li class="sidebar-item"><a href="<?php echo base_url(); ?>free-trials/active" class="sidebar-link"><i class="mdi mdi-note-outline"></i><span class="hide-menu"> Active </span></a></li>

                        <li class="sidebar-item"><a href="<?php echo base_url(); ?>free-trials/past" class="sidebar-link"><i class="mdi mdi-note-plus"></i><span class="hide-menu"> Past </span></a></li>
                    </ul>
                </li>

                <!-- <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="<?php echo base_url(); ?>target" aria-expanded="false"><i class="mdi mdi-ticket-percent"></i><span class="hide-menu">Target Management</span></a></li> -->
                <li class="sidebar-item" id="s-o-target"> <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="mdi mdi-ticket-percent"></i><span class="hide-menu">Target Management </span></a>
                    <ul aria-expanded="false" class="collapse  first-level">
                        <li class="sidebar-item" id="s-i-target-individual"><a href="<?php echo base_url(); ?>target/individual" class="sidebar-link"><i class="mdi mdi-note-outline"></i><span class="hide-menu"> My Target </span></a></li>

                        <li class="sidebar-item" id="s-i-target-all"><a href="<?php echo base_url(); ?>target/all" class="sidebar-link"><i class="mdi mdi-note-plus"></i><span class="hide-menu"> Employees Target </span></a></li>
                    </ul>
                </li>

                <li class="sidebar-item" id="s-o-lead-accounts"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="<?php echo base_url(); ?>accounts" aria-expanded="false"><i class="mdi mdi-credit-card-plus"></i><span class="hide-menu">Lead Accounts</span></a></li>

                <li class="sidebar-item" id="s-o-sales"> <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="mdi mdi-receipt"></i><span class="hide-menu">Sales Orders</span></a>
                    <ul aria-expanded="false" class="collapse  first-level">

                        <li class="sidebar-item"><a href="<?php echo base_url(); ?>sales/salesorder/all" class="sidebar-link"><i class="mdi mdi-note-plus"></i><span class="hide-menu"> All</span></a></li>
                        
                        <li class="sidebar-item"><a href="<?php echo base_url(); ?>sales/salesorder/accepted" class="sidebar-link"><i class="mdi mdi-note-plus"></i><span class="hide-menu">Accepted</span></a></li>
                        
                        <li class="sidebar-item"><a href="<?php echo base_url(); ?>sales/salesorder/pending" class="sidebar-link"><i class="mdi mdi-note-plus"></i><span class="hide-menu">Pending</span></a></li>
                        
                        <li class="sidebar-item"><a href="<?php echo base_url(); ?>sales/salesorder/rejected" class="sidebar-link"><i class="mdi mdi-note-plus"></i><span class="hide-menu">Rejected</span></a></li>
                        
                    </ul>
                </li>

                <li class="sidebar-item" id="s-o-reports"> <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="mdi mdi-chart-bar"></i><span class="hide-menu">Reports </span></a>
                    <ul aria-expanded="false" class="collapse  first-level">
                        <li class="sidebar-item" id="s-i-reports-dsh"><a href="/viewFT/report_graph_mgrsales.php" class="sidebar-link"><i class="mdi mdi-emoticon"></i><span class="hide-menu"> DSH Report </span></a></li>
                        
                        <li class="sidebar-item" id="s-i-reports-manager"><a href="/viewFT/report_graph_mgrsales.php" class="sidebar-link"><i class="mdi mdi-emoticon"></i><span class="hide-menu"> Managers Report </span></a></li>

                        <li class="sidebar-item" id="s-i-reports-employees"><a href="/viewFT/report_graph_empsales.php" class="sidebar-link"><i class="mdi mdi-emoticon-cool"></i><span class="hide-menu"> Employees Report </span></a></li>
                    </ul>
                </li>

                <li class="sidebar-item" id="s-o-services"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="<?php echo base_url(); ?>services" aria-expanded="false"><i class="mdi mdi-chart-bubble"></i><span class="hide-menu">Services</span></a></li>
                
                <li class="sidebar-item" id="s-o-bank-accounts"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="<?php echo base_url(); ?>bank" aria-expanded="false"><i class="mdi mdi-bank"></i><span class="hide-menu">Bank Accounts</span></a></li>

                <li class="sidebar-item" id="s-o-sms"> <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="mdi mdi-comment"></i><span class="hide-menu">SMS </span></a>
                    <ul aria-expanded="false" class="collapse  first-level">
                        <li class="sidebar-item" id="s-i-sms-category"><a href="<?php echo base_url(); ?>sms/category" class="sidebar-link"><i class="mdi mdi-note-outline"></i><span class="hide-menu"> Category </span></a></li>

                        <li class="sidebar-item"><a href="<?php echo base_url(); ?>sms/template" class="sidebar-link"><i class="mdi mdi-note-plus"></i><span class="hide-menu"> Templates </span></a></li>
                    </ul>
                </li>

                <li class="sidebar-item" id="s-o-email"> <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="mdi mdi-email-open"></i><span class="hide-menu">Emails </span></a>
                    <ul aria-expanded="false" class="collapse  first-level">
                        <li class="sidebar-item" id="s-i-email-category"><a href="<?php echo base_url(); ?>email/category" class="sidebar-link"><i class="mdi mdi-note-outline"></i><span class="hide-menu"> Category </span></a></li>

                        <li class="sidebar-item"><a href="<?php echo base_url(); ?>email/template" class="sidebar-link"><i class="mdi mdi-note-plus"></i><span class="hide-menu"> Templates </span></a></li>
                    </ul>
                </li>

                <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="<?php echo base_url(); ?>announcement" aria-expanded="false"><i class="mdi mdi-volume-high"></i><span class="hide-menu">Announcements</span></a></li>

                <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="mdi mdi-voice"></i><span class="hide-menu">Internal Communication </span></a>
                    <ul aria-expanded="false" class="collapse  first-level">
                        <li class="sidebar-item"><a href="<?php echo base_url(); ?>communication/sms" class="sidebar-link"><i class="mdi mdi-email-open"></i><span class="hide-menu"> Message </span></a></li>

                        <li class="sidebar-item"><a href="<?php echo base_url(); ?>communication/mail" class="sidebar-link"><i class="mdi mdi-comment"></i><span class="hide-menu"> Mail </span></a></li>
                    </ul>
                </li>

            </ul>
        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
</aside>