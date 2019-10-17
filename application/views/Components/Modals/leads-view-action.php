<div id="leads_view_action_modal" class="modal fade">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">View Lead</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body">
                <ul class="nav nav-tabs" role="tablist">
                        <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#status_tab" role="tab"><span class="hidden-sm-up"></span> <span class="hidden-xs-down">Status</span></a> </li>
                        <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#sms_tab" role="tab"><span class="hidden-sm-up"></span> <span class="hidden-xs-down">SMS</span></a> </li>
                        <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#email_tab" role="tab"><span class="hidden-sm-up"></span> <span class="hidden-xs-down">Email</span></a> </li>
                        <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#desc_tab" role="tab"><span class="hidden-sm-up"></span> <span class="hidden-xs-down">Description</span></a> </li>
                        <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#contact_tab" role="tab"><span class="hidden-sm-up"></span> <span class="hidden-xs-down">Contact</span></a> </li>
                        <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#rpm_tab" role="tab"><span class="hidden-sm-up"></span> <span class="hidden-xs-down">RPM</span></a> </li>
                        <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#freetrial_tab" role="tab"><span class="hidden-sm-up"></span> <span class="hidden-xs-down">FreeTrial</span></a> </li>
                        <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#sales_tab" role="tab"><span class="hidden-sm-up"></span> <span class="hidden-xs-down">Sales Order</span></a> </li>
                        <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#transfer_tab" role="tab"><span class="hidden-sm-up"></span> <span class="hidden-xs-down">Transfer Account</span></a> </li>
                    </ul>

                <!-- Tab panes -->
                    <div class="tab-content tabcontent-border">
                        <div class="tab-pane active" id="status_tab" role="tabpanel">
                            <div class="p-20">
                                <form name="form_leads_view_action_modal" id="form_leads_view_action_modal" enctype="multipart/form-data">
                                <label class="col-md-3 m-t-15">Change Lead Status</label>
                                    <select id="lead_status" name="lead_status" class="select2 form-control custom-select" style="width: 100%; height:36px;" required>
                                        <optgroup label="Select Status">
                                         <option value="DND">DND</option>
                                         <option value="DISPOSED">DISPOSE</option> 
                                        </optgroup>
                                    </select>
                                    <button type="submit" onclick="updateLeadStatus()" name="action" id="action" class="btn btn-success btn-modal-tab" value="status_change">Change Status</button>
                                </form>
                            </div>
                        </div>
                        <div class="tab-pane  p-20" id="sms_tab" role="tabpanel">
                            <div class="p-20">
                            <form method="post" id="send_sms_form">
                            
                                <!-- <label class="col-md-3 m-t-15">SMS Type</label>
                                    <select id="sms_type" name="sms_type" class="select2 form-control custom-select" style="width: 100%; height:36px;" required>
                                        <optgroup label="Select SMS Type">
                                            <option value="template">From Template</option>
                                            <option value="custom">Custom SMS</option>
                                        </optgroup>
                                    </select> -->
                                <div class="form-group">
                                        <label class="col-md-4 m-t-15">SMS Category</label>
                                            <select id="sms_category_select" class="select2 form-control custom-select" style="width: 100%; height:36px;" required>
                                                <optgroup label="Select SMS Category"></optgroup>
                                            </select>
                                </div>

                                <div class="form-group">
                                        <label class="col-md-4 m-t-15">SMS Template</label>
                                            <select id="sms_template_select" class="select2 form-control custom-select" style="width: 100%; height:36px;" required>
                                                <optgroup label="Select SMS Template"></optgroup>
                                            </select>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-3 m-t-15">Message</label>
                                    <textarea class="form-control" rows="5" id="message" name="message" disabled></textarea>
                                </div>

                                <!-- <label class="col-md-3 m-t-15">SMS Header</label>
                                    <input type="text" name="sms_head" id="sms_head" class="form-control" disabled> -->

                                    <button type="button" onclick="sendSms()" name="action" id="action" class="btn btn-success btn-modal-tab" value="send_sms">Send SMS</button>
                            </form>
                            </div>

                        </div>
                        <div class="tab-pane p-20" id="email_tab" role="tabpanel">
                            <div class="p-20">

                            <form method="post" id="send_mail_form">

                                <!-- <div class="form-group">
                                <label class="col-md-3 m-t-15">E-Mail Type</label>
                                    <select id="mail_type" name="mail_type" class="select2 form-control custom-select" style="width: 100%; height:36px;" required>
                                        <optgroup label="Select Email Type">
                                            <option value="template">From Template</option>
                                            <option value="custom">Custom Email</option>
                                        </optgroup>
                                    </select>
                                </div> -->

                                <div class="form-group">
                                        <label class="col-md-4 m-t-15">E-Mail Category</label>
                                            <select id="mail_category_select" class="select2 form-control custom-select" style="width: 100%; height:36px;" required>
                                                <optgroup label="Select Mail Category"></optgroup>
                                            </select>
                                </div>

                                <div class="form-group">
                                        <label class="col-md-4 m-t-15">E-Mail Template</label>
                                            <select id="mail_template_select" class="select2 form-control custom-select" style="width: 100%; height:36px;" required>
                                                <optgroup label="Select E-mail Template"></optgroup>
                                            </select>
                                </div>

                                <div class="form-group">
                                <label class="col-md-3 m-t-15">E-Mail Subject</label>
                                    <input type="text" name="subject" id="mail_subject" class="form-control" disabled>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-3 m-t-15">E-Mail Content</label>
                                    <textarea class="form-control" rows="5" id="mail_body" name="body" disabled></textarea>
                                </div>

                                    <button type="button" onclick="sendMail()" name="action" id="action" class="btn btn-success btn-modal-tab" value="send_mail">SEND E-MAIL</button>
                            </form>

                            </div>
                        </div>
                        <div class="tab-pane p-20" id="desc_tab" role="tabpanel">
                            <div class="p-20">
                                <!-- <div class="form-group">
                                    <label class="col-md-3 m-t-15">Call Status</label>
                                    <select id="call_status" name="call_status" class="select2 form-control custom-select" style="width: 100%; height:36px;" required>
                                        <optgroup>
                                            <option value="0">Select Option</option>
                                            <option value="received">Received</option>
                                            <option value="not_received">Not Received</option>
                                        </optgroup>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 m-t-15">Lead Response</label>
                                    <select id="lead_response" name="lead_response" class="select2 form-control custom-select" style="width: 100%; height:36px;" required>
                                        <optgroup>
                                            <option value="0">Select Option</option>
                                            <option value="r1">Interested</option>
                                            <option value="r2">Call Back</option>
                                            <option value="r3">Not Interested</option>
                                            <option value="r4">Free Trial</option>
                                            <option value="r5">Disconnected During Call</option>
                                            <option value="nr1">Not Picked Call</option>
                                            <option value="nr2">Switched Off</option>
                                            <option value="nr3">Not Reachable</option>
                                            <option value="nr4">Invalid Number</option>
                                            <option value="nr5">Call Disconnect</option>
                                        </optgroup>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="callback_date" class="control-label">Callback Date:</label>
                                     <input type="text" class="form-control" id="datepicker-autoclose-3" name="callback_date" placeholder="yyyy/mm/dd">
                                     <div class="input-group-append" style="float: right; margin-top: -31px" >
                                        <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                                     </div>
                                </div>
                                <div class="form-group">
                                    <label for="callback_time" class="control-label">Callback Time:</label>
                                     <input type="time" class="form-control" id="callback_time" name="callback_time">
                                </div>
                                <div  class="form-group">
                                    <label class="col-md-3 m-t-15">Comment</label>
                                    <textarea class="form-control" rows="5" id="call_comment"></textarea>
                                </div>

                                <button type="button" onclick="return addDescription()" name="action" id="action" class="btn btn-success btn-modal-tab" value="add_desc">Add Description</button> -->

                                <button type="submit" name="view_desc" id="view_desc" class="btn btn-success btn-modal-tab" value="view" style="margin-left: 10px !important">View Descriptions</button>

                                <div id="lead_descriptions" style="display: none">
                                    <hr>
                                    <h4>Lead Descriptions</h4>
                                    <div class="table-responsive">
                            <table id="description_grid" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <!-- <th data-column-id="id">S.No.</th> -->
                                        <th data-column-id="calling_time">Calling Time</th>
                                        <!-- <th data-column-id="call_status">Call Status</th> -->
                                        <th data-column-id="lead_response">Lead Response</th>
                                        <th data-column-id="description">Comment</th>
                                        <th data-column-id="callback_date">Callback Date</th>
                                        <th data-column-id="callback_time">Callback Time</th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane p-20" id="contact_tab" role="tabpanel">
                            <div class="p-20">
                                <!-- <button type="submit" name="fetch_details" id="fetch_details" class="btn btn-success btn-modal-tab">Fetch Lead Details</button> -->

                                <form method="post" id="convert_lead_to_contact_form">

                                    <div class="form-group">
                                        <label for="contact_name" class="control-label">Name:</label>
                                        <input type="text" class="form-control" id="contact_name" name="name" required />
                                    </div>
                                    <div class="form-group col-md-6" style="float: left; padding-left: 0;">
                                    <label for="contact_mobile" class="control-label">Mobile:</label>
                                        <input type="number" class="form-control" id="contact_mobile" name="mobile" required />
                                    </div>
                                    <div class="form-group col-md-6" style="float: right; padding-right: 0;">
                                    <label for="contact_alternate_mobile" class="control-label">Alternate Mobile:</label>
                                        <input type="number" class="form-control" id="contact_alternate_mobile" name="alternate_mobile" />
                                    </div>
                                    <div class="form-group">
                                        <label for="contact_email" class="control-label">Email:</label>
                                        <input type="text" class="form-control" id="contact_email" name="email" value="-" />
                                    </div>
                                    <div class="form-group col-md-6" style="float: left; padding-left: 0;">
                                        <label for="contact_segment" class="control-label">Segment:</label>
                                        <input type="text" class="form-control" id="contact_segment" name="segment" value="-" />
                                    </div>
                                    <div class="form-group col-md-6" style="float: right; padding-right: 0;">
                                        <label for="contact_investment" class="control-label">Investment:</label>
                                        <input type="number" class="form-control" id="contact_investment" name="investment" value="0" />
                                    </div>
                                    <div class="form-group">
                                        <label for="contact_country" class="control-label">Country:</label>
                                        <input type="text" class="form-control" id="contact_country" name="country" value="India" />
                                    </div>

                                    <div class="form-group">
                                        <label for="contact_state" class="control-label">State:</label>
                                        <input type="text" class="form-control" id="contact_state" name="state" />

                                        <label for="contact_city"  class="control-label">City:</label>
                                        <input type="text" class="form-control" id="contact_city" name="city" />

                                    </div>
                                    <!-- <div class="form-group">
                                        <label for="city"  class="control-label">City:</label>
                                        <select id='secondlist' name="edit_city" ></select>
                                        <input type="text" class="form-control" id="edit_city" name="edit_city"/>
                                    </div> -->

                                    <div class="form-group">
                                        <label for="contact_address" class="control-label">Address:</label>
                                        <input type="text" class="form-control" id="contact_address" name="address" value="-" />
                                    </div>
                                    <div class="form-group col-md-6" style="float: left; padding-left: 0;">
                                    <label for="contact_pan_num" class="control-label">PAN No.:</label>
                                        <input type="text" class="form-control" id="contact_pan_num" name="pan_num" value="-" />
                                    </div>
                                    <div class="form-group col-md-6" style="float: right; padding-right: 0;">
                                    <label for="contact_aadhar_num" class="control-label">Aadhar No.:</label>
                                        <input type="text" class="form-control" id="contact_aadhar_num" name="aadhar_num" value="-" />
                                    </div>
                                    <div class="form-group">
                                        <label for="contact_dob" class="control-label">DOB:</label>
                                        <input type="text" class="form-control" id="datepicker_autoclose_contact_dob" name="dob" placeholder="yyyy/mm/ddy" value="-" autocomplete="off">
                                        <div class="input-group-append" style="float: right; margin-top: -31px" >
                                            <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                    <button type="button" onclick="convertLeadToContact()" name="action-contact" id="action-contact" class="btn btn-success" value="Add">Save</button>
                                    </div>
                                
                                </form>
                            </div>
                        </div>
                        <!-- RPM Begin -->
                        <div class="tab-pane p-20" id="rpm_tab" role="tabpanel">
                            <div class="p-20">
                                <form method="post" id="form_freetrial">
                                <p>Please answer all the questions by choosing one of the options. Choose the option that best indicates how you feel about each question. If none of the options is exactly right for you, choose the option that is closest.</p>
                                <div class="form-group">
                                    <label class="col-md-12 m-t-15">1) Full Name</label>
                                    <input type="text" class="form-control" name="rpm_1" id="rpm_name" placeholder="Full Name" required>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-12 m-t-15">2) Mobile No.</label>
                                    <input type="text" class="form-control" name="rpm_1" id="rpm_mobile_no" placeholder="Mobile No." required>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-12 m-t-15">3) Email ID</label>
                                    <input type="text" class="form-control" name="rpm_2" id="rpm_email" placeholder="Email ID" required>
                                </div>
                                <div class="form-group">
                                    <label for="rpm_dob" class="control-label">4) Date of Birth:</label>
                                     <input type="text" class="form-control" id="datepicker-autoclose-4" name="rpm_3" placeholder="yyyy/mm/dd" id="rpm_dob" required >
                                     <div class="input-group-append" style="float: right; margin-top: -31px" >
                                        <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                                     </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-12 m-t-15">5) Your Source of Income:</label><br>
                                    <input type="radio" name="rpm_sourceofincome" value="Salary"> Salary <br>
                                    <input type="radio" name="rpm_sourceofincome" value="Business"> Business <br>
                                    <input type="radio" name="rpm_sourceofincome" value="Pension / other retirement source"> Pension / other retirement source <br>
                                    <input type="radio" name="rpm_sourceofincome" value="Dependent on other's income"> Dependent on other's income <br>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-12 m-t-15">6) Your current annual take-home income from all sources is:</label><br>
                                    <input type="radio" name="rpm_current_annual_take_home" value="Under INR 5,00,000"> Under INR 5,00,000<br>
                                    <input type="radio" name="rpm_current_annual_take_home" value="Between INR 5,00,000 to INR 10,00,000"> Between INR 5,00,000 to INR 10,00,000<br>
                                    <input type="radio" name="rpm_current_annual_take_home" value="Between INR 10,00,000 to INR 20,00,000"> Between INR 10,00,000 to INR 20,00,000<br>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-12 m-t-15">7) Preferred Investment type?</label><br>
                                    <input type="radio" name="rpm_preferd_investment_type" value="Short term Positional"> Short term Positional <br>
                                    <input type="radio" name="rpm_preferd_investment_type" value="Long term Positional"> Long term Positional <br>
                                    <input type="radio" name="rpm_preferd_investment_type" value="Intraday"> Intraday <br>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-12 m-t-15">8) Proposed Investment Amount:</label><br>
                                    <input type="radio" name="rpm_proposed_investment_amt" value=" < 1 lacs"> < 1 lacs <br>
                                    <input type="radio" name="rpm_proposed_investment_amt" value=" 1-3 lacs"> 1-3 lacs <br>
                                    <input type="radio" name="rpm_proposed_investment_amt" value=" 3-5 lacs"> 3-5 lacs <br>
                                    <input type="radio" name="rpm_proposed_investment_amt" value="> 5 lacs"> > 5 lacs <br>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-12 m-t-15">9) Preferred Investment time horizon:</label><br>
                                    <input type="radio" name="rpm_prefered_investment_time_horizon" value="Less than one year"> Less than one year <br>
                                    <input type="radio" name="rpm_prefered_investment_time_horizon" value="1 year to 3 years"> 1 year to 3 years <br>
                                    <input type="radio" name="rpm_prefered_investment_time_horizon" value="More than 3 years"> More than 3 years <br>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-12 m-t-15">10) Investment Goal?</label><br>
                                    <input type="radio" name="rpm_investment_goal" value="Capital Appreciation"> Capital Appreciation <br>
                                    <input type="radio" name="rpm_investment_goal" value="Regular Income"> Regular Income <br>
                                    <input type="radio" name="rpm_investment_goal" value="Capital Appreciation and Regular Income"> Capital Appreciation and Regular Income <br>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-12 m-t-15">11) What is your experience with investments in past?</label><br>
                                    <input type="radio" name="rpm_past_experience" value="Very Good"> Very Good <br>
                                    <input type="radio" name="rpm_past_experience" value="Good"> Good <br>
                                    <input type="radio" name="rpm_past_experience" value="Moderate"> Moderate <br>
                                    <input type="radio" name="rpm_past_experience" value="Bad"> Bad <br>
                                    <input type="radio" name="rpm_past_experience" value="Very Bad"> Very Bad <br>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-12 m-t-15">12) When market is not performing well do you prefer to buy risky investments and sell less risky investments? </label><br>
                                    <input type="radio" name="rpm_risky_investment" value="Strongly prefer"> Strongly prefer <br>
                                    <input type="radio" name="rpm_risky_investment" value="Prefer"> Prefer <br>
                                    <input type="radio" name="rpm_risky_investment" value="Indifferent"> Indifferent <br>
                                    <input type="radio" name="rpm_risky_investment" value="Do not prefer"> Do not prefer <br>
                                    <input type="radio" name="rpm_risky_investment" value="Strongly do not prefer"> Strongly do not prefer <br>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-12 m-t-15">13) Risk Tolerance Ratio?</label><br>
                                    <input type="radio" name="rpm_risk_tolerance_ratio" value="High"> High <br>
                                    <input type="radio" name="rpm_risk_tolerance_ratio" value="Medium"> Medium <br>
                                    <input type="radio" name="rpm_risk_tolerance_ratio" value="Low"> Low <br>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-12 m-t-15">14) What is the duration of investment you are looking forward to keep invested?</label><br>
                                    <input type="radio" name="rpm_durationofinvestment" value="Short term Positional ( from 1 month to 6 months)"> Short term Positional ( from 1 month to 6 months) <br>
                                    <input type="radio" name="rpm_durationofinvestment" value="Long term Positional (more than 1 year)"> Long term Positional (more than 1 year) <br>
                                    <input type="radio" name="rpm_durationofinvestment" value="Intraday"> Intraday <br>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-12 m-t-15">15) In which of the following market segments have you traded previously?</label><br>
                                    <input type="radio" name="rpm_market_segment_previous_trade" value="Equity"> Equity <br>
                                    <input type="radio" name="rpm_market_segment_previous_trade" value="Derivatives"> Derivatives <br>
                                    <input type="radio" name="rpm_market_segment_previous_trade" value="Commodity"> Commodity <br>
                                    <input type="radio" name="rpm_market_segment_previous_trade" value="Forex"> Forex <br>
                                    <input type="radio" name="rpm_market_segment_previous_trade" value="All"> All <br>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-12 m-t-15">16) Liabilities/Borrowings</label><br>
                                    <input type="radio" name="rpm_liabilities" value="Nil"> Nil <br>
                                    <input type="radio" name="rpm_liabilities" value="INR 1,00,000 to INR 10,00,000"> INR 1,00,000 to INR 10,00,000 <br>
                                    <input type="radio" name="rpm_liabilities" value="INR 10,00,000 to INR 50,00,000"> INR 10,00,000 to INR 50,00,000 <br>
                                    <input type="radio" name="rpm_liabilities" value="Above INR 50,00,000"> Above INR 50,00,000 <br>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-12 m-t-15">17) What kind of investments do you currently own, or would prefer to own? </label><br>
                                    <input type="radio" name="rpm_prefered_to_own" value="Mainly money market or fixed-income securities (e.g. cash, bonds)"> Mainly money market or fixed-income securities (e.g. cash, bonds) <br>
                                    <input type="radio" name="rpm_prefered_to_own" value="Mainly fixed-income securities with some equity securities"> Mainly fixed-income securities with some equity securities <br>
                                    <input type="radio" name="rpm_prefered_to_own" value="Slightly heavier weighting in equities than fixed-income."> Slightly heavier weighting in equities than fixed-income. <br>
                                    <input type="radio" name="rpm_prefered_to_own" value="Mainly aggressive equities with some fixed income"> Mainly aggressive equities with some fixed income <br>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-12 m-t-15">18) What do you want this investment portfolio to do?</label><br>
                                    <input type="radio" name="rpm_investment_portfolio" value="Provide appreciation of capital in short-term">  Provide appreciation of capital in short-term <br>
                                    <input type="radio" name="rpm_investment_portfolio" value="Provide moderate growth in medium term"> Provide moderate growth in medium term <br>
                                    <input type="radio" name="rpm_investment_portfolio" value="Provide maximum capital appreciation of investment in long term "> Provide maximum capital appreciation of investment in long term <br>
                                    <input type="radio" name="rpm_investment_portfolio" value="Generate income with some capital appreciation"> Generate income with some capital appreciation <br>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-12 m-t-15">19) What is your Investment Horizon?</label><br>
                                    <input type="radio" name="rpm_investment_horizon" value="Below 1 year">  Below 1 year <br>
                                    <input type="radio" name="rpm_investment_horizon" value="1 year to 2 years"> 1 year to 2 years <br>
                                    <input type="radio" name="rpm_investment_horizon" value="2 years to 5 years">  2 years to 5 years <br>
                                    <input type="radio" name="rpm_investment_horizon" value="More than 5 years"> More than 5 years <br>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-12 m-t-15">20) Please tick your Occupation</label><br>
                                    <input type="radio" name="rpm_occupation" value="Private sector"> Private sector <br>
                                    <input type="radio" name="rpm_occupation" value="Public sector"> Public sector <br>
                                    <input type="radio" name="rpm_occupation" value="Govt sector"> Govt sector <br>
                                    <input type="radio" name="rpm_occupation" value="Business"> Business <br>
                                    <input type="radio" name="rpm_occupation" value="Professional"> Professional <br>
                                    <input type="radio" name="rpm_occupation" value="Agricultural"> Agricultural <br>
                                    <input type="radio" name="rpm_occupation" value="Retired"> Retired <br>
                                    <input type="radio" name="rpm_occupation" value="Housewife"> Housewife <br>
                                    <input type="radio" name="rpm_occupation" value="Student"> Student <br>
                                    <input type="radio" name="rpm_occupation" value="Any other please specify"> Any other please specify <br>
                                    <input type="text" id="other_occupation" class="form-control" name="radio16_in">
                                </div>
                                <div class="form-group">
                                    <label class="col-md-12 m-t-15">21) Are you any of the following, or are directly or indirectly related to any of the following?</label><br>
                                    <input type="radio" name="rpm_directly_or_indirectly" value="Civil Servant"> Civil Servant <br>
                                    <input type="radio" name="rpm_directly_or_indirectly" value="Politician"> Politician <br>
                                    <input type="radio" name="rpm_directly_or_indirectly" value="Current or former head of state"> Current or former head of state <br>
                                    <input type="radio" name="rpm_directly_or_indirectly" value="Bureaucrat (Tax authorities, Foreign Services, IAS etc)"> Bureaucrat (Tax authorities, Foreign Services, IAS etc) <br>
                                    <input type="radio" name="rpm_directly_or_indirectly" value="Current or former MP/MLA/MLC"> Current or former MP/MLA/MLC <br>
                                    <input type="radio" name="rpm_directly_or_indirectly" value="Connected to Media"> Connected to Media <br>
                                    <input type="radio" name="rpm_directly_or_indirectly" value="Connected to any company/promoter group/ group of companies listed on any stock exchange"> Connected to any company/promoter group/ group of companies listed on any stock exchange <br>
                                    <input type="radio" name="rpm_directly_or_indirectly" value="None"> None <br>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-12 m-t-15"></label><br>
                                    <input type="radio" name="rpm_agree" value="r1" required> I hereby declare that I have read, understood and personally accomplished this entire Risk Profiling Questionnaire and that the answers I have given are accurate. I understand the risk involved in investing in equities. I will exercise my own independent judgment in subscribing the suitable package/s (if any) as per my Risk Profile Score. You may review your answers before they are recorded in the system. Once recorded they cannot be changed. This is done to ensure the integrity of the data. You can review your answers by scrolling through the questionnaire. Now is the best time to correct any mistakes or omissions.<br>
                                </div>
                                <a href="javascript:(function()%7BSendMail()%3B%7D)()%3B">
                                <button type="button" name="rpm_action" id="rpm_action" class="btn btn-success btn-modal-tab" value="free_trial">Send Email</button></a>

                            </form>
                            </div>
                        </div>
                        <!-- RPM ENDS -->
                        <div class="tab-pane p-20" id="freetrial_tab" role="tabpanel">
                            <div class="p-20">
                                <form method="post" id="add_freetrial_form">
                                    <div class="form-group">
                                        <label class="col-md-4 m-t-15">Select Service for Free Trial</label>
                                            <select id="free_trial_service" name="service" class="select2 form-control custom-select" style="width: 100%; height:36px;" required>
                                                <optgroup label="Select Service"></optgroup>
                                            </select>
                                    </div>
                                    <div class="form-group">
                                            <label for="start_date" class="control-label">Start Date:</label>
                                             <input type="text" class="form-control" id="free_trial_start_date" name="start_date" placeholder="yyyy/mm/dd" required autocomplete="off">
                                             <div class="input-group-append" style="float: right; margin-top: -31px" >
                                                <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                                             </div>
                                    </div>
                                    <div class="form-group">
                                            <label for="end_date" class="control-label">End Date:</label>
                                             <input type="text" class="form-control" id="free_trial_end_date" name="end_date" placeholder="yyyy/mm/dd" required autocomplete="off">
                                             <div class="input-group-append" style="float: right; margin-top: -31px" >
                                                <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                                             </div>
                                    </div>
                                    
                                        <button type="submit" onclick="bookFreeTrial()" name="action" id="action" class="btn btn-success btn-modal-tab" value="free_trial">Book Free Trial</button>
                                </form>
                            </div>
                        </div>

                        <!-- Sales Tab Begins -->
                        <div class="tab-pane p-20" id="sales_tab" role="tabpanel">
                            <div class="p-20">
                                <div id="salesorder_main_view">

                                  <form method="post" id="form_sales_order">
                                    <br>
                                  <div class="form-group">
                                    <label for="sales_name" class="control-label">Name:</label>
                                    <input type="text" class="form-control" id="sales_name" name="lead_name" readonly />
                                  </div>

                                  <div class="form-group">
                                    <label for="sales_mobile" class="control-label">Mobile:</label>
                                    <input type="number" class="form-control" id="sales_mobile" name="mobile" readonly />
                                  </div>

                                  <div class="form-group">
                                    <label for="service_fk" class="control-label">Service Name:</label>
                                    <select id="sales_service_fk" name="service_fk" class="select2 form-control custom-select" style="width: 100%; height:36px;" required>
                                        <optgroup>
                                        </optgroup>
                                    </select>
                                  </div>

                                  <div class="form-group">
                                    <label for="sales_package_name" class="control-label">Package Name:</label>
                                    <select id="sales_package_name" name="package_name" class="select2 form-control custom-select" style="width: 100%; height:36px;" required disabled>
                                        <optgroup label="Select package type">
                                            <option value="0">Choose an option</option>
                                            <option value="MONTHLY">Monthly</option>
                                            <option value="QUATERLY">Quaterly</option>
                                            <option value="HALFYEARLY">Half-Yearly</option>
                                            <option value="YEARLY">Yearly</option>
                                        </optgroup>
                                    </select>
                                  </div>

                                  <div class="form-group">
                                    <label for="sales_package_amt" class="control-label">Package Amount:</label>
                                    <input type="number" class="form-control" id="sales_package_amt" name="package_amt" required readonly/>
                                  </div>

                                  <div class="form-group">
                                    <label for="sales_received_amt" class="control-label">Total Received Amount:</label>
                                    <input type="number" class="form-control" id="sales_received_amt" name="received_amt" required/>
                                  </div>

                                  <!-- <div class="form-group">
                                    <label for="receipt_discount" class="control-label">Discount:</label>
                                    <input type="number" class="form-control" id="edit_receipt_discount" name="edit_receipt_discount" required />
                                  </div> -->

                                  <div class="form-group">
                                    <label for="sales_payment_mode" class="control-label">Payment Mode:</label>
                                    <select id="sales_payment_mode" name="payment_mode" class="select2 form-control custom-select" style="width: 100%; height:36px;" required>
                                        <optgroup label="Select Payment Mode">
                                            <option value="BANK">Bank</option>
                                            <option value="ONLINE">Ease Buzz (Credit Card / Debit Card / Net Banking / UPI)</option>
                                            <option value="PAYTM">PayTM</option>
                                            <option value="CASH">Cash</option>
                                        </optgroup>
                                    </select>
                                 </div>
                                  
                                  <div class="form-group">
                                    <label for="payment_bank_fk" class="control-label">Select Bank Account:</label>
                                    <select id="payment_bank_fk" name="acc_fk" class="select2 form-control custom-select" style="width: 100%; height:36px;" required>
                                        <optgroup label="Select Company Bank Account">
                                        </optgroup>
                                    </select>
                                  </div>

                                  <div class="form-group">
                                    <label for="payment_date" class="control-label">Payment Date:</label>
                                     <input type="text" class="form-control" id="datepicker_payment_date" name="payment_date" placeholder="yyyy/mm/dd">
                                     <div class="input-group-append" style="float: right; margin-top: -31px" >
                                        <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                                     </div>
                                  </div>

                                  <div class="form-group">
                                    <label for="sales_reference_num" class="control-label">Payment Reference No.:</label>
                                    <input type="text" class="form-control" id="sales_reference_num" name="reference_num" required />
                                  </div>


                                  <div class="form-group">
                                    <label for="sales_start_date" class="control-label">Service Start Date:</label>
                                     <input type="text" class="form-control" id="datepicker_service_start_date" name="service_start_date" placeholder="yyyy/mm/dd">
                                     <div class="input-group-append" style="float: right; margin-top: -31px" >
                                        <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                                     </div>
                                  </div>

                                  <div class="form-group">
                                    <label for="service_end_date" class="control-label">Service End Date:</label>
                                     <input type="text" class="form-control" id="datepicker_service_end_date" name="service_end_date" placeholder="yyyy/mm/dd">
                                     <div class="input-group-append" style="float: right; margin-top: -31px" >
                                        <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                                     </div>
                                  </div>

                                  <div class="form-group">
                                    <label for="sales_total_days" class="control-label">Service Days:</label>
                                    <input type="number" class="form-control" id="sales_total_days" name="total_days" readonly/>
                                  </div>

                                  <div class="form-group">
                                    <label for="sales_remark" class="control-label">Remark:</label>
                                    <input type="text" class="form-control" id="sales_remark" name="remark"/>
                                  </div>

                                        <button type="submit" name="action" id="action" onclick="return submitSalesOrder()" class="btn btn-success btn-modal-tab" value="book_sales">Book Sales Order</button>

                                    </form>  

                                </div>
                                <div id="salesorder_alternate_view">
                                    <div class="form-group">
                                    <label class="control-label">Please convert lead to Contact Account to create Sales Order</label>
                                  </div>
                                </div>

                            </div>

                        </div>
                        <!-- Sales Tab Ends -->

                        <!-- Transfer Account Begins -->
                        <div class="tab-pane p-20" id="transfer_tab" role="tabpanel">
                            <div class="p-20">
                                <div id="transfer_account_view">
                                    <form method="post" id="form_transfer">
                                        <input type="hidden" value="0" name="edit_id" id="edit_id">
                                        <div class="form-group">
                                            <label class="col-md-4 m-t-15">Select Employee</label>
                                                <select id="transfer_employee_list" name="emp_fk" class="select2 form-control custom-select" style="width: 100%; height:36px;" required>
                                                    <optgroup label="Select Employee"></optgroup>
                                                </select>
                                        </div>
                                            <button type="submit" name="action" id="action" class="btn btn-success btn-modal-tab" value="transfer_account" onclick="transferAccount()">Transfer Account</button>
                                    </form>
                                </div>
                                <div id="transfer_lead_view">
                                    <div class="form-group">
                                        <label class="control-label">You can only transfer leads converted to contact.</label>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <!-- Transfer Account Ends -->
                        
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
