<?php
  session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Online Weka</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/stylish-portfolio.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <!-- Navigation -->
    <a id="menu-toggle" href="#" class="btn btn-dark btn-lg toggle"><i class="fa fa-bars"></i></a>
    <nav id="sidebar-wrapper">
        <ul class="sidebar-nav">
            <a id="menu-close" href="#" class="btn btn-light btn-lg pull-right toggle"><i class="fa fa-times"></i></a>
            <li class="sidebar-brand">
                <a href="#top"  onclick = $("#menu-close").click(); >Start Bootstrap</a>
            </li>
            <li>
                <a href="#top" onclick = $("#menu-close").click(); >Home</a>
            </li>
            <li>
                <a href="#upload" onclick = $("#menu-close").click(); >Upload</a>
            </li>
            <li>
                <a href="#services" onclick = $("#menu-close").click(); >Services</a>
            </li>
            <li>
                <a href="#portfolio" onclick = $("#menu-close").click(); >Portfolio</a>
            </li>
            <li>
                <a href="#contact" onclick = $("#menu-close").click(); >Contact</a>
            </li>
        </ul>
    </nav>

    <!-- Header -->
    <header id="top" class="header">
        <div class="text-vertical-center">
            <h1>Online Weka</h1>
            <h3>The best solution to data mining on your hands.</h3>
            <br>
            <a href="#upload" class="btn btn-dark btn-lg">Get start!</a>
        </div>
    </header>

    <!-- About -->
    <section id="upload" class="about">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2>Select your file to start new experience!</h2>
                    <p class="lead">
                      <form action="weka.php" method="POST" id="uploadForm" target="hiddenFrame" enctype="multipart/form-data">
                        <input type="hidden" name="action" value="upload">
                        <input type="hidden" value="uploadForm" name="<?php echo ini_get("session.upload_progress.name"); ?>">
                        <input type="file" id="file" name="file" style="display: none;" />
                      </form>
                      <div class="col-lg-3"></div>
                      <div class="input-group col-lg-6">
                        <input type="text" class="form-control simFile" placeholder="Browse your file." id="simFileName" readonly>
                        <span class="input-group-btn">
                          <button class="btn btn-default simFile" type="button">Browse</button>
                        </span>
                      </div>
                      <div class="col-lg-3"></div>
                    </p>
                    <!-- Hidden Frame -->
                    <iframe name="hiddenFrame" id="hiddenFrame" style="display: none;" ></iframe>
                    <p class="lead">If this is your first time to data mining. <a target="_blank" href="#">Click Here!</a>.</p>
                </div>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container -->
    </section>

    <!-- Services -->
    <!-- The circle icons use Font Awesome's stacked icon classes. For more information, visit http://fontawesome.io/examples/ -->
    <section id="services" class="services bg-primary">
        <div class="container">
            <div class="row text-center">
                <div class="col-lg-10 col-lg-offset-1">
                    <h2>Our Services</h2>
                    <hr class="small">
                    <div class="row">
                        <div class="col-md-3 col-sm-6">
                            <div class="service-item">
                                <span class="fa-stack fa-4x">
                                <i class="fa fa-circle fa-stack-2x"></i>
                                <i class="fa fa-cloud fa-stack-1x text-primary"></i>
                            </span>
                                <h4>
                                    <strong>Service Name</strong>
                                </h4>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                                <a href="#" class="btn btn-light">Learn More</a>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6">
                            <div class="service-item">
                                <span class="fa-stack fa-4x">
                                <i class="fa fa-circle fa-stack-2x"></i>
                                <i class="fa fa-compass fa-stack-1x text-primary"></i>
                            </span>
                                <h4>
                                    <strong>Service Name</strong>
                                </h4>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                                <a href="#" class="btn btn-light">Learn More</a>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6">
                            <div class="service-item">
                                <span class="fa-stack fa-4x">
                                <i class="fa fa-circle fa-stack-2x"></i>
                                <i class="fa fa-flask fa-stack-1x text-primary"></i>
                            </span>
                                <h4>
                                    <strong>Service Name</strong>
                                </h4>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                                <a href="#" class="btn btn-light">Learn More</a>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6">
                            <div class="service-item">
                                <span class="fa-stack fa-4x">
                                <i class="fa fa-circle fa-stack-2x"></i>
                                <i class="fa fa-shield fa-stack-1x text-primary"></i>
                            </span>
                                <h4>
                                    <strong>Service Name</strong>
                                </h4>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                                <a href="#" class="btn btn-light">Learn More</a>
                            </div>
                        </div>
                    </div>
                    <!-- /.row (nested) -->
                </div>
                <!-- /.col-lg-10 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container -->
    </section>

    <!-- Callout -->
    <aside class="callout">
        <div class="text-vertical-center">
            <h1>Vertically Centered Text</h1>
        </div>
    </aside>

    <!-- Portfolio -->
    <section id="portfolio" class="portfolio">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 col-lg-offset-1 text-center">
                    <h2>Our Work</h2>
                    <hr class="small">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="portfolio-item">
                                <a href="#">
                                    <img class="img-portfolio img-responsive" src="img/portfolio-1.jpg">
                                </a>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="portfolio-item">
                                <a href="#">
                                    <img class="img-portfolio img-responsive" src="img/portfolio-2.jpg">
                                </a>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="portfolio-item">
                                <a href="#">
                                    <img class="img-portfolio img-responsive" src="img/portfolio-3.jpg">
                                </a>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="portfolio-item">
                                <a href="#">
                                    <img class="img-portfolio img-responsive" src="img/portfolio-4.jpg">
                                </a>
                            </div>
                        </div>
                    </div>
                    <!-- /.row (nested) -->
                    <a href="#" class="btn btn-dark">View More Items</a>
                </div>
                <!-- /.col-lg-10 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container -->
    </section>

    <!-- Call to Action -->
    <aside class="call-to-action bg-primary">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h3>The buttons below are impossible to resist.</h3>
                    <a href="#" class="btn btn-lg btn-light">Click Me!</a>
                    <a href="#" class="btn btn-lg btn-dark">Look at Me!</a>
                </div>
            </div>
        </div>
    </aside>

    <!-- Map
    <section id="contact" class="map">
        <iframe width="100%" height="100%" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?f=q&amp;source=s_q&amp;hl=en&amp;geocode=&amp;q=Twitter,+Inc.,+Market+Street,+San+Francisco,+CA&amp;aq=0&amp;oq=twitter&amp;sll=28.659344,-81.187888&amp;sspn=0.128789,0.264187&amp;ie=UTF8&amp;hq=Twitter,+Inc.,+Market+Street,+San+Francisco,+CA&amp;t=m&amp;z=15&amp;iwloc=A&amp;output=embed"></iframe>
        <br />
        <small>
            <a href="https://maps.google.com/maps?f=q&amp;source=embed&amp;hl=en&amp;geocode=&amp;q=Twitter,+Inc.,+Market+Street,+San+Francisco,+CA&amp;aq=0&amp;oq=twitter&amp;sll=28.659344,-81.187888&amp;sspn=0.128789,0.264187&amp;ie=UTF8&amp;hq=Twitter,+Inc.,+Market+Street,+San+Francisco,+CA&amp;t=m&amp;z=15&amp;iwloc=A"></a>
        </small>
        </iframe>
    </section>
-->
    <!-- Footer -->
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-lg-10 col-lg-offset-1 text-center">
                    <h4><strong>Online Weka</strong>
                    </h4>
                    <p>50/56 Bangphliyai Bangphli<br>Samutprakarn, TH 10540</p>
                    <ul class="list-unstyled">
                        <li><i class="fa fa-phone fa-fw"></i> (+66) 97-0973031</li>
                        <li><i class="fa fa-envelope-o fa-fw"></i>  <a href="mailto:weka@utcc-ict.com">weka@utcc-ict.com</a>
                        </li>
                    </ul>
                    <br>
                    <ul class="list-inline">
                        <li>
                            <a href="#"><i class="fa fa-facebook fa-fw fa-3x"></i></a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-twitter fa-fw fa-3x"></i></a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-dribbble fa-fw fa-3x"></i></a>
                        </li>
                    </ul>
                    <hr class="small">
                    <p class="text-muted">Copyright &copy; Worapon Pookuk, Panupong Puengam 2016</p>
                </div>
            </div>
        </div>
    </footer>
    <!-- Modal -->
    <div id="progress" class="modal fade" role="dialog">
      <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">Upload Progress</h4>
          </div>
          <div class="modal-body">
            <div class="progress">
              <div class="progress-bar progress-bar-striped active" role="progressbar"
              aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width:0%" id="progressBar">
                <kbd>Starting...</kbd>
              </div>
            </div>
          </div>
          <div class="modal-footer" id="uploadCancelTab">
            <button type="button" class="btn btn-default" id="uploadCancel" data-dismiss="modal">Cancel</button>
          </div>
        </div>
      </div>
    </div>
    <input type="hidden" id="uploadCheck" value="0" />
    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script>
    // Closes the sidebar menu
    $("#menu-close").click(function(e) {
        e.preventDefault();
        $("#sidebar-wrapper").toggleClass("active");
    });

    // Opens the sidebar menu
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#sidebar-wrapper").toggleClass("active");
    });

    // Scrolls to the selected menu item on the page
    $(function() {
        $('a[href*=#]:not([href=#])').click(function() {
            if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') || location.hostname == this.hostname) {

                var target = $(this.hash);
                target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
                if (target.length) {
                    $('html,body').animate({
                        scrollTop: target.offset().top
                    }, 1000);
                    return false;
                }
            }
        });
        function uploadProgress(){
          $.post('upload_progress.php',{},function(data){
            if(data!=100){
              self.setTimeout(function(){uploadProgress();},500);
            }
            updateProgress(data);
          });
        }
        function updateProgress(i){
          if(i<100){
            $('#progressBar').html(i+'%').removeClass('progress-bar-danger progress-bar-warning');
          } else {
            if($('#uploadCheck').val()==1){
              $('#progressBar').html('Upload Complete').addClass('progress-bar-success');
              $('#uploadCancelTab').hide();
            } else {
              $('#progressBar').html('Upload Failed').addClass('progress-bar-danger');
              setTimeout(function(){
                $('#progressBar').html('Trying to upload again... Please wait.').removeClass('progress-bar-danger').addClass('progress-bar-warning');
                setTimeout(function(){
                  $('#uploadForm').submit();
                  setTimeout(function(){
                    uploadProgress();
                  },100);
                },2000);
              },1500);
            }
          }
          $('#progressBar').width(i+'%');
        }
        $('#uploadCancel').click(function(){
          $('#hiddenFrame').attr('src','index.php');
          setTimeout(function(){$('#uploadCheck').val(0);},500);
          $('#file').val('');
          $('#simFileName').val('');
        });
        $('#hiddenFrame').load(function(){
          $('#uploadCheck').val(1);
        });
        $('#progress').modal({
            backdrop: 'static',
            keyboard: false,
            show: false
        });
        $('.simFile').click(function(){
          $('#file').click();
        });
        $('#file').change(function(){
          if($('#file').val()){
            var _validFileExtensions = [".arff", ".csv"];
            var blnValid = false;
            var sFileName = $('#file').val();
            var name = sFileName.split('\\');
            for (var j = 0; j < _validFileExtensions.length; j++) {
              var sCurExtension = _validFileExtensions[j];
              if (sFileName.substr(sFileName.length - sCurExtension.length, sCurExtension.length).toLowerCase() == sCurExtension.toLowerCase()) {
                blnValid = true;
                break;
              }
            }

            $('#simFileName').val(name[name.length-1]);
            if (!blnValid) {
              alert("Sorry, This file extension is not support now, allowed extensions are: " + _validFileExtensions.join(", "));
            } else {
              $('#uploadForm').submit();
              $('#progress').modal('show');
              setTimeout(function(){uploadProgress();},1000);
            }
          }
        })
    });

    </script>

</body>

</html>
