	<div class="cl-mcont">    <div class="row">
      <div class="col-sm-12">
        <div class="block-flat profile-info">
          <div class="row">
            <div class="col-sm-2">
              <div class="avatar">
                <img src="http://condorthemes.com/flatdream/images/avatars/avatar1.jpg" class="profile-avatar" />
              </div>
            </div>
            <div class="col-sm-7">
              <div class="personal">
                <h1 class="name"><?php echo $Array[userinfo]; ?> ?></h1>
                <p class="description">I am a photographer based in New York - United States, I like make portraits and meet new people.<p>
                <button class="btn btn-primary btn-flat btn-rad" data-modal="reply-ticket"><i class="fa fa-check"></i> Following</button>
              </div>
            </div>
            <div class="col-sm-3">
              <table class="no-border no-strip skills">
                <tbody class="no-border-x no-border-y">
                  <tr>
                    <td style="width:45%;">Photoshop</td>
                    <td><div class="progress"><div style="width: 80%" class="progress-bar progress-bar-primary"></div></div></td>
                  </tr>
                  <tr>
                    <td>Lightroom</td>
                    <td><div class="progress"><div style="width: 70%" class="progress-bar progress-bar-primary"></div></div></td>
                  </tr>
                  <tr>
                    <td>Aperture</td>
                    <td><div class="progress"><div style="width: 50%" class="progress-bar progress-bar-primary"></div></div></td>
                  </tr>
                  <tr>
                    <td>GIMP</td>
                    <td><div class="progress"><div style="width: 40%" class="progress-bar progress-bar-primary"></div></div></td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
    
    <div class="row">
      <div class="col-sm-8">
        
        <div class="tab-container">
          <ul class="nav nav-tabs">
            <li class="active" ><a data-toggle="tab" href="#settings">Settings</a></li>
          </ul>
          <div class="tab-content">
            <div id="settings" class="tab-pane active">
              <form role="form" class="form-horizontal">
                  <div class="form-group">
                    <label class="col-sm-3 control-label" for="nick">Avatar</label>
                    <div class="col-sm-9"> 
                      <div class="avatar-upload">
                        <img src="http://condorthemes.com/flatdream/images/av.jpg" class="profile-avatar img-thumbnail" />
                        <input id="fileupload" type="file" name="files[]">
                        <div id="progress" class="overlay"></div>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-3 control-label" for="nick">Nick</label>
                    <div class="col-sm-9">
                      <input type="email" placeholder="Your Nickname" id="nick" class="form-control">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-3 control-label" for="name">Name</label>
                    <div class="col-sm-9">
                      <input type="email" placeholder="Your Name" id="name" class="form-control">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-3 control-label" for="inputEmail3">Email</label>
                    <div class="col-sm-9">
                      <input type="email" placeholder="Email" id="inputEmail3" class="form-control">
                    </div>
                  </div>
                  <div class="form-group spacer2">
                    <div class="col-sm-3"></div>
                    <label class="col-sm-9" for="inputPassword3">Change Password</label>

                  </div>
                  <div class="form-group">
                    <label class="col-sm-3 control-label" for="inputPassword3">Password</label>
                    <div class="col-sm-9">
                      <input type="password" placeholder="Password" id="inputPassword3" class="form-control">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-3 control-label" for="inputPassword4">Repeat Password</label>
                    <div class="col-sm-9">
                      <input type="password" placeholder="Password" id="inputPassword4" class="form-control">
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-sm-offset-3 col-sm-9">
                      <button class="btn btn-primary" type="submit">Update</button>
                      <button class="btn btn-default">Reset</button>
                    </div>
                  </div>
              </form>
              <div id="crop-image" class="md-modal colored-header md-effect-1">
                <div class="md-content">
                  <div class="modal-header">
                    <h3>Crop Image</h3>
                    <button aria-hidden="true" data-dismiss="modal" class="close md-close" type="button">×</button>
                  </div>
                  <div class="modal-body">
                    <div class="text-center crop-image">
                    </div>
                    <form action="crop.php" method="post" onsubmit="return checkCoords();">
                      <input type="hidden" id="x" name="x" />
                      <input type="hidden" id="y" name="y" />
                      <input type="hidden" id="w" name="w" />
                      <input type="hidden" id="h" name="h" />
                    </form>
                  </div>
                  <div class="modal-footer">
                    <button data-dismiss="modal" class="btn btn-default btn-flat md-close" type="button">Cancel</button>
                    <button id="save-image" class="btn btn-primary btn-flat" type="button">Save Image</button>
                  </div>
                </div>
              </div>
              <div class="md-overlay"></div>
            </div>
          </div>
        </div>    
        
        
        <div class="tab-container">
          <ul class="nav nav-tabs wall">
            <li class="active"><a data-toggle="tab" href="#comments"><i class="fa fa-comments"></i></a></li>
            <li><a data-toggle="tab" href="#picture"><i class="fa fa-camera"></i></a></li>
            <li><a data-toggle="tab" href="#media"><i class="fa fa-share-square-o"></i></a></li>
          </ul>
          <div class="tab-content">
            <div id="comments" class="tab-pane active cont">
              <textarea class="form-control spacer-bottom-sm" placeholder="Tell me something"></textarea>
              <button class="btn btn-primary" type="button">Share</button>
            </div>
            <div id="picture" class="tab-pane cont">
              <div class="fileinput fileinput-new" data-provides="fileinput" style="width: 100%;">
                <div class="fileinput-new thumbnail" style="width: 100%; height: 150px;">
                  <h2>Drop Files Here</h2>
                </div>
                <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;"></div>
                <div>
                  <span class="btn btn-primary btn-file pull-right"><span class="fileinput-new">Upload</span><span class="fileinput-exists">Change</span><input type="file" name="..."></span>
                  <a href="#" class="btn btn-danger fileinput-exists" data-dismiss="fileinput">Remove</a>
                </div>
              </div>
            </div>
            <div id="media" class="tab-pane">
              <div class="input-group no-margin">
                <input class="form-control" type="text" placeholder="http://www.example.com">
                <span class="input-group-btn">
                <button type="button" class="btn btn-primary">Share</button>
                </span>
              </div>
            </div>
          </div>
        </div>    
        
        <div class="block-transparent">
          <div class="header">
            <h4>Timeline</h4>
          </div>
          <ul class="timeline">
            <li>
              <i class="fa fa-comment"></i>
              <span class="date">27 Jan</span>
              <div class="content">
                <p><strong>Richard Avedon</strong> has called Shenlong with <strong>You</strong>.</p>
                <small>A minute ago</small>
              </div>
            </li>
            <li>
              <i class="fa fa-file green"></i>
              <span class="date">27 Jan</span>
              <div class="content">
                <i class="fa fa-paperclip pull-right"></i>
                <p><strong>Allan Arbus</strong><br/>This is a message for you in your birthday.</p>
                <a class="image-zoom" href="images/gallery/img4.jpg"><img src="http://condorthemes.com/flatdream/images/gallery/img4.jpg" class="img-thumbnail" style="height:64px;" /></a>
                <a class="image-zoom" href="images/gallery/img6.jpg"><img src="http://condorthemes.com/flatdream/images/gallery/img6.jpg" class="img-thumbnail" style="height:64px;" /></a>
              </div>
            </li>
            <li>
              <i class="fa fa-envelope red"></i>
              <span class="date">27 Jan</span>
              <div class="content">
                <p><strong>Michael</strong> has wrote on your wall:</p>
                <blockquote>
                  <p>Hi Diane, are you free tomorrow? I need some photos for my portfolio.</p>
                  <small>Some historic guy</small>
                </blockquote>
              </div>
            </li>
            <li><i class="fa fa-globe purple"></i><span class="date">27 Jan</span><div class="content"><p><strong>María</strong> This is a message for you in your birthday.</p></div></li>
          </ul>
        </div>
      </div>
      
      <div class="col-sm-4 side-right">
        <div class="block-flat bars-widget">
          <div class="spk4 pull-right spk-widget"></div>
          <h4>Total Sales</h4>
          <p>Monthly summary</p>
          <h3>545</h3>
        </div>
        
        <div class="block-flat bars-widget">
          <div class="spk5 pull-right spk-widget"></div>
          <h4>New Visitors</h4>
          <p>Stat Description</p>
          <h3>146</h3>
        </div>
        
        <div class="block-transparent">
          <div class="header">
            <h4>Events</h4>
          </div>
          <div class="list-group todo list-widget">
            <li href="#" class="list-group-item"><span class="date"><i class="fa fa-clock-o"></i> 20 Dec</span> Dinner with my family</li>
            <li href="#" class="list-group-item"><span class="date"><i class="fa fa-clock-o"></i> 13 Jan</span> Meeting with our partners</li>
            <li href="#" class="list-group-item"><span class="date"><i class="fa fa-clock-o"></i> 18 Feb</span> Work in new project</li>
            <li href="#" class="list-group-item"><span class="date"><i class="fa fa-clock-o"></i> 21 Feb</span> Go to the doctor</li>
          </div>
        </div>
        
        <div class="block widget-notes">
          <div class="header dark"><h4>Notes</h4></div>
          <div class="content">
            <div contenteditable="true" class="paper">
            Send e-mails.<br>
            <s>meeting at 4 pm.</s><br>
            <s>Buy some coffee.</s><br>
            Feed my dog.
            </div>
          </div>
        </div>
         
      </div>
    </div>

	</div>
	
	</div> 
	
</div>