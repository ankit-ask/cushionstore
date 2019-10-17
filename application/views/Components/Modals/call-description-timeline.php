<!-- Call Description Timeline Modal -->
<div id="view_call_description_timeline_modal" class="modal fade">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <div class="modal-header">
                <h4 class="modal-title" id="calling_timeline_title">Calling Timeline</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>

            <div class="modal-body" id="timeline-modal">

                <!-- TIMELINE BEGINS -->

                <div class="timeline">

                    <!-- <div class="container left">
                        <div class="content">
                        <h4 class="timeline_calling_time">28/08/2019 12:34:56</h4>
                        <p><strong>Call Status:</strong><span class="timeline_call_status">CALLBACK</span></p>
                        <p><strong>Callback Date:</strong><span class="timeline_callback_date">24/08/2019</span></p>
                        <p><strong>Callback Time:</strong><span class="timeline_callback_time">14:00</span></p>
                        <p class="timeline_call_description">Lorem ipsum</p>
                        </div>
                    </div>

                    <div class="container right">
                        <div class="content">
                        <h4 class="timeline_calling_time">19/08/2019 12:34:56</h4>
                        <p><strong>Call Status:</strong><span class="timeline_call_status">NOT INTERESTED</span></p>
                        <p><strong>Callback Date:</strong><span class="timeline_callback_date">NA</span></p>
                        <p><strong>Callback Time:</strong><span class="timeline_callback_time">NA</span></p>
                        <p class="timeline_call_description">Lorem ipsum</p>
                        </div>
                    </div> -->

                </div>


                <!-- TIMELINE ENDS -->
            
            </div>

            <!-- <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div> -->

        </div>
    </div>
</div>

<style>

* {
  box-sizing: border-box;
}

/* Set a background color */
#timeline-modal {
  background-color: #2255A4;
  font-family: Helvetica, sans-serif;
}

/* The actual timeline (the vertical ruler) */
.timeline {
  position: relative;
  max-width: 1200px;
  margin: 0 auto;
}

/* The actual timeline (the vertical ruler) */
.timeline::after {
  content: '';
  position: absolute;
  width: 6px;
  background-color: white;
  top: 0;
  bottom: 0;
  left: 50%;
  margin-left: -3px;
}

/* Container around content */
.container {
  padding: 10px 40px;
  position: relative;
  background-color: inherit;
  width: 50%;
}

/* The circles on the timeline */
.container::after {
  content: '';
  position: absolute;
  width: 25px;
  height: 25px;
  right: -17px;
  background-color: white;
  border: 4px solid #FF9F55;
  top: 15px;
  border-radius: 50%;
  z-index: 1;
}

/* Place the container to the left */
.left {
  left: 0;
  /* Custom */
  margin-left: -5px;
  /* Custom */
}

/* Place the container to the right */
.right {
  left: 50%;
  /* Custom */
  margin-left: 3px;
  /* Custom */
}

/* Add arrows to the left container (pointing right) */
.left::before {
  content: " ";
  height: 0;
  position: absolute;
  top: 22px;
  width: 0;
  z-index: 1;
  right: 30px;
  border: medium solid white;
  border-width: 10px 0 10px 10px;
  border-color: transparent transparent transparent white;
}

/* Add arrows to the right container (pointing left) */
.right::before {
  content: " ";
  height: 0;
  position: absolute;
  top: 22px;
  width: 0;
  z-index: 1;
  left: 30px;
  border: medium solid white;
  border-width: 10px 10px 10px 0;
  border-color: transparent white transparent transparent;
}

/* Fix the circle for containers on the right side */
.right::after {
  left: -16px;
}

/* The actual content */
.content {
  padding: 20px 30px;
  background-color: white;
  position: relative;
  border-radius: 6px;
}




/* Media queries - Responsive timeline on screens less than 600px wide */
@media screen and (max-width: 600px) {
/* Place the timelime to the left */
  .timeline::after {
    left: 31px;
  }

/* Full-width containers */
  .container {
    width: 100%;
    padding-left: 70px;
    padding-right: 25px;
  }

/* Make sure that all arrows are pointing leftwards */
  .container::before {
    left: 60px;
    border: medium solid white;
    border-width: 10px 10px 10px 0;
    border-color: transparent white transparent transparent;
  }

/* Make sure all circles are at the same spot */
  .left::after, .right::after {
    left: 15px;
  }

/* Make all right containers behave like the left ones */
  .right {
    left: 0%;
  }
}

</style>
