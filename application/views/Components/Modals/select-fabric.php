<!-- The Modal -->
<div class="modal trans-modal" id="fabricModal">
  <!-- <div class="modal fade" id="myModal"> -->
    <div class="modal-dialog modal-lg">
      <div class="modal-content larger-modal">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">CHOOSE YOUR COVER FABRIC</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body fabric-panel-modal">
          
            <ul class="nav nav-tabs fabric-panel-nav">
                <li class="active"><a data-toggle="tab" href="#fabrics">FABRICS</a></li>
                <li><a data-toggle="tab" href="#favorites">FAVORITES</a></li>
            </ul>

            <div class="tab-content">
                <div id="fabrics" class="tab-pane in active">
                
                <div class="col-lg-12">
                    <div class="col-lg-8 float-left">
                        <span class="color-label">COLORS</span>
                        <span class="color-icon"></span>
                        <span class="color-icon"></span>
                        <span class="color-icon"></span>
                        <span class="color-icon"></span>
                        <span class="color-icon"></span>
                        <span class="color-icon"></span>
                        <span class="color-icon"></span>
                        <span class="color-icon"></span>
                        <span class="color-icon"></span>
                        <span class="color-icon"></span>
                        <span class="color-icon"></span>
                        <span class="color-icon"></span>
                    </div>
                    <div class="col-lg-4 float-left modal-search">
                        <input type="search" placeholder="Search your Fabric">
                    </div>
                    <div class="clearfix"></div>
                </div>
                
                <div class="col-lg-12 padding-top-10">
                    <div class="col-lg-2 float-left modal-select">
                        <select class="form-control">
                            <option>ALL USES</option>
                            <option>OUTDOOR</option>
                            <option>OTHERS</option>
                        </select>
                    </div>
                    <div class="col-lg-2 float-left modal-select">
                        <select class="form-control">
                            <option>ALL BRANDS</option>
                            <option>OUTDOOR</option>
                            <option>OTHERS</option>
                        </select>
                    </div>
                    <div class="col-lg-2 float-left modal-select">
                        <select class="form-control">
                            <option>ALL PATTERNS</option>
                            <option>ABSTRACT</option>
                        </select>
                    </div>
                    <div class="col-lg-2 float-left modal-select">
                        <select class="form-control">
                            <option>ALL MATERIALS</option>
                            <option>SPUN POYSTER</option>
                            <option>OTHERS</option>
                        </select>
                    </div>
                    <div class="col-lg-2 float-left modal-select">
                        <select class="form-control">
                            <option>PAGE 1</option>
                            <option>PAGE 2</option>
                            <option>PAGE 3</option>
                        </select>
                    </div>
                    <div class="col-lg-2 float-left modal-select">
                        <button class="btn btn-dark">RESET</button>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="scrollable-div">
                    <div class="col-lg-3 fabric-wrapper">
                        <div class="fabric-inner">
                            <img src="<?php echo base_url('assets/images/fabric-sample-1.jpg')?>">
                        </div>
                        <span class="favorite-wrapper"></span>
                        <div class="fabric-item-label">
                            <p class="fabric-item-name">Test Name 1</p>
                            <p class="fabric-item-code">CUS0001</p>
                            <button class="btn btn-default view-details-btn" onClick='openFabricDetailsModal()'>VIEW</button>
                        </div>
                    </div>
                    <div class="col-lg-3 fabric-wrapper">
                        <div class="fabric-inner">
                            <img src="<?php echo base_url('assets/images/fabric-sample-1.jpg')?>">
                        </div>
                        <span class="favorite-wrapper"></span>
                        <div class="fabric-item-label">
                            <p class="fabric-item-name">Test Name 2</p>
                            <p class="fabric-item-code">CUS0002</p>
                            <button class="btn btn-default view-details-btn" onClick='openFabricDetailsModal()'>VIEW</button>
                        </div>
                    </div>
                    <div class="col-lg-3 fabric-wrapper">
                        <div class="fabric-inner">
                            <img src="<?php echo base_url('assets/images/fabric-sample-1.jpg')?>">
                        </div>
                        <span class="favorite-wrapper"></span>
                        <div class="fabric-item-label">
                            <p class="fabric-item-name">Test Name 3</p>
                            <p class="fabric-item-code">CUS0003</p>
                            <button class="btn btn-default view-details-btn" onClick='openFabricDetailsModal()'>VIEW</button>
                        </div>
                    </div>
                    <div class="col-lg-3 fabric-wrapper">
                        <div class="fabric-inner">
                            <img src="<?php echo base_url('assets/images/fabric-sample-1.jpg')?>">
                        </div>
                        <span class="favorite-wrapper"></span>
                        <div class="fabric-item-label">
                            <p class="fabric-item-name">Test Name 4</p>
                            <p class="fabric-item-code">CUS0004</p>
                            <button class="btn btn-default view-details-btn" onClick='openFabricDetailsModal()'>VIEW</button>
                        </div>
                    </div>
                    <div class="col-lg-3 fabric-wrapper">
                        <div class="fabric-inner">
                            <img src="<?php echo base_url('assets/images/fabric-sample-1.jpg')?>">
                        </div>
                        <span class="favorite-wrapper"></span>
                        <div class="fabric-item-label">
                            <p class="fabric-item-name">Test Name 5</p>
                            <p class="fabric-item-code">CUS0005</p>
                            <button class="btn btn-default view-details-btn" onClick='openFabricDetailsModal()'>VIEW</button>
                        </div>
                    </div>
                    
                </div>

                <!-- <div class="clearfix"></div> -->
                </div>
                <div id="favorites" class="tab-pane">
                    <div class="col-lg-12">
                        <div class="col-lg-8 float-left">
                            <span class="color-label">COLORS</span>
                            <span class="color-icon"></span>
                            <span class="color-icon"></span>
                            <span class="color-icon"></span>
                            <span class="color-icon"></span>
                            <span class="color-icon"></span>
                            <span class="color-icon"></span>
                            <span class="color-icon"></span>
                            <span class="color-icon"></span>
                            <span class="color-icon"></span>
                            <span class="color-icon"></span>
                            <span class="color-icon"></span>
                            <span class="color-icon"></span>
                        </div>
                        <div class="col-lg-4 float-left modal-search">
                            <input type="search" placeholder="Search your Fabric">
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    
                    <div class="col-lg-12 padding-top-10">
                        <div class="col-lg-2 float-left modal-select">
                            <select class="form-control">
                                <option>ALL USES</option>
                                <option>OUTDOOR</option>
                                <option>OTHERS</option>
                            </select>
                        </div>
                        <div class="col-lg-2 float-left modal-select">
                            <select class="form-control">
                                <option>ALL BRANDS</option>
                                <option>OUTDOOR</option>
                                <option>OTHERS</option>
                            </select>
                        </div>
                        <div class="col-lg-2 float-left modal-select">
                            <select class="form-control">
                                <option>ALL PATTERNS</option>
                                <option>ABSTRACT</option>
                            </select>
                        </div>
                        <div class="col-lg-2 float-left modal-select">
                            <select class="form-control">
                                <option>ALL MATERIALS</option>
                                <option>SPUN POYSTER</option>
                                <option>OTHERS</option>
                            </select>
                        </div>
                        <div class="col-lg-2 float-left modal-select">
                            <select class="form-control">
                                <option>PAGE 1</option>
                                <option>PAGE 2</option>
                                <option>PAGE 3</option>
                            </select>
                        </div>
                        <div class="col-lg-2 float-left modal-select">
                            <button class="btn btn-dark">RESET</button>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="scrollable-div">
                        <div class="col-lg-3 fabric-wrapper">
                            <div class="fabric-inner">
                                <img src="<?php echo base_url('assets/images/fabric-sample-1.jpg')?>">
                            </div>
                            <span class="favorite-wrapper"></span>
                            <div class="fabric-item-label">
                                <p class="fabric-item-name">Test Name 1</p>
                                <p class="fabric-item-code">CUS0001</p>
                                <button class="btn btn-default view-details-btn" onClick='openFabricDetailsModal()'>VIEW</button>
                            </div>
                        </div>
                        <div class="col-lg-3 fabric-wrapper">
                            <div class="fabric-inner">
                                <img src="<?php echo base_url('assets/images/fabric-sample-1.jpg')?>">
                            </div>
                            <span class="favorite-wrapper"></span>
                            <div class="fabric-item-label">
                                <p class="fabric-item-name">Test Name 2</p>
                                <p class="fabric-item-code">CUS0002</p>
                                <button class="btn btn-default view-details-btn" onClick='openFabricDetailsModal()'>VIEW</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        
        <!-- Modal footer -->
        <!-- <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div> -->
        
      </div>
    </div>
  </div>

<!-- Fabric Details Modal -->

<div class="modal trans-modal" id="fabricDetailsModal">
  <!-- <div class="modal fade" id="myModal"> -->
    <div class="modal-dialog modal-lg">
      <div class="modal-content larger-modal">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">FABRIC NAME - CUS001</h4>
          <button type="button" class="close" data-dismiss="modal"><i class="fa fa-arrow-left"></i> BACK</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body fabric-panel-modal">
          
            <ul class="nav nav-tabs fabric-panel-nav">
                <li class="active"><a data-toggle="tab" href="#fabrics-details">FABRIC DETAILS</a></li>
                <!-- <li><a data-toggle="tab" href="#favorites">FAVORITES</a></li> -->
            </ul>

            <div class="tab-content">
                <div id="fabrics-details" class="tab-pane in active">
                
                    <div class="col-lg-12">

                        <div class="col-lg-4 fabric-details-wrapper">
                            <div class="fabric-details-inner">
                                <img src="<?php echo base_url('assets/images/fabric-sample-1.jpg')?>">
                            </div>
                        </div>

                        <div class="col-lg-8 float-left">
                            <p class="fabric-item-name"><span><strong>BRAND - </strong></span>Brand Name</p>
                            <p class="fabric-item-name"><span><strong>FABRIC - </strong></span>Fabric Name</p>
                            <p class="fabric-item-name"><span><strong>CODE - </strong></span>CUS0001</p>
                            <p class="fabric-item-name"><span><strong>PATTERN - </strong></span>Solid</p>
                            <p class="fabric-item-name"><span><strong>MATERIAL - </strong></span>Acrylic - Solution Dyed</p>
                            <p class="fabric-item-name"><span><strong>WEIGHT - </strong></span>Approx. 8.0oz per sq. yard (271 grams per sq. meter) </p>
                            <button class="btn btn-default view-details-btn use-btn">SELECT THIS FABRIC</button>
                        </div>
                        
                        <div class="clearfix"></div>
                    </div>

                <!-- <div class="clearfix"></div> -->
                </div>
                
                <!-- <div id="favorites" class="tab-pane">

                    <div class="col-lg-12 padding-top-10">
                        <div class="col-lg-3 fabric-wrapper">
                            <div class="fabric-inner">
                                <img src="<?php echo base_url('assets/images/fabric-sample-1.jpg')?>">
                            </div>
                            <span class="favorite-wrapper"></span>
                            <div class="fabric-item-label">
                                <p class="fabric-item-name">Test Name</p>
                                <p class="fabric-item-code">CUS0001</p>
                            </div>
                        </div>
                        <div class="col-lg-2 float-left modal-select">
                            <button class="btn btn-dark">RESET</button>
                        </div>
                        <div class="clearfix"></div>
                    </div>

                </div> -->

            </div>

        </div>
        
        <!-- Modal footer -->
        <!-- <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div> -->
        
      </div>
    </div>
  </div>