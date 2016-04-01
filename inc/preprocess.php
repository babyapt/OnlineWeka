<?php
  if (!function_exists('stats_standard_deviation')) {
    /**
     * This user-land implementation follows the implementation quite strictly;
     * it does not attempt to improve the code or algorithm in any way. It will
     * raise a warning if you have fewer than 2 values in your array, just like
     * the extension does (although as an E_USER_WARNING, not E_WARNING).
     *
     * @param array $a
     * @param bool $sample [optional] Defaults to false
     * @return float|bool The standard deviation or false on error.
     */
    function stats_standard_deviation(array $a, $sample = false) {
        $n = count($a);
        if ($n === 0) {
            trigger_error("The array has zero elements", E_USER_WARNING);
            return false;
        }
        if ($sample && $n === 1) {
            trigger_error("The array has only 1 element", E_USER_WARNING);
            return false;
        }
        $mean = array_sum($a) / $n;
        $carry = 0.0;
        foreach ($a as $val) {
            $d = ((double) $val) - $mean;
            $carry += $d * $d;
        };
        if ($sample) {
           --$n;
        }
        return sqrt($carry / $n);
    }
  }
  function histrogram($a){
    $n = count($a);
    if ($n === 0) {
        trigger_error("The array has zero elements", E_USER_WARNING);
        return false;
    }
    $min = min($a);
    $max = max($a);
    $nBar = 8;
    $range = ($max-$min)/$nBar;
    $bar[0]['from'] = (float) $min;
    for($i=0;$i<$nBar;$i++){
      if($i>0)
        $bar[$i]['from'] = round($bar[($i-1)]['to'],3);
      if($i==($nBar-1))
        $bar[$i]['to'] = (float) $max;
      else
        $bar[$i]['to'] = round(($bar[$i]['from'])+$range,3);
      $bar[$i]['name'] = '['.$bar[$i]['from'].','.$bar[$i]['to'].']';
      $bar[$i]['count'] = 0;
    }
    foreach ($a as $akey => $avalue) {
      for($i=0;$i<$nBar;$i++){
        if($i==0){
          if($avalue==$bar[$i]['from']){
            $bar[$i]['count']++;
          }
        }
        if($avalue>$bar[$i]['from']&&$avalue<=$bar[$i]['to']){
          $bar[$i]['count']++;
        }
      }
    }
    $data = NULL;
    foreach ($bar as $key => $value) {
      $predata['name'] = $bar[$key]['name'];
      $predata['count'] = $bar[$key]['count'];
      $data[] = $predata;
    }
    return json_encode($data);
  }
  $path = 'uploads/';
  $filename = session_id().'.arff';
  $file = $path.$filename;
  $myfile = fopen($file, "r") or die("Unable to open file!");
  $alldata = fread($myfile,filesize($file));
  fclose($myfile);
  $alldata = explode("\n",$alldata);
  $status = 0;
  $relation = $attribute = $data = NULL;
  foreach ($alldata as $key => $value) {
    $val = trim($value);
    if($val){
      if(substr($val,0,1)=='%'){
        $js .= "console.log('[status: $status] Skip : [Line ".($key+1)."] ".str_replace("'","\'",$val)."');\r\n";
        continue;
      }
      if(strtolower($val)=='@data'){
        $status = 2;
        continue;
      }
      if($status == 0){
        $pre = explode(' ',$val);
        if(strtolower(trim($pre[0]))=='@relation'){
          $relation = trim($pre[1]);
          $status = 1;
        }
      } elseif($status == 1){
        $pre = explode(' ',$val);
        if(strtolower(trim($pre[0]))=='@attribute'){
          $predata = NULL;
          $predata['name'] = trim($pre[1]);
          $predata['type'] = trim($pre[2]);
          $attribute[] = $predata;
        }
      } elseif($status == 2){
        $pre = explode(',',$val);
        $data[] = $pre;
      }
    } else {
      $js .= "console.log('[status: $status] Skip : [Line ".($key+1)."] $val');\r\n";
    }
  }
  $infoAttr = $dataAttr = NULL;
  foreach ($attribute as $akey => $avalue) {
    if(strtolower(trim($avalue['type']))=='real'||strtolower(trim($avalue['type']))=='numeric'){
      $predata = NULL;
      $checker = $attrData = NULL;
      $predata['missing'] = 0;
      foreach ($data as $dkey => $dvalue) {
        $attrData[] = $dvalue[$akey];
        if(trim($dvalue[$akey])!=''){
          $checker[$dvalue[$akey]]++;
          /*if(!$predata['min']) $predata['min'] = $dvalue[$akey]; else $predata['min'] = $predata['min']>$dvalue[$akey]?$dvalue[$akey]:$predata['min'];
          if(!$predata['max']) $predata['max'] = $dvalue[$akey]; else $predata['max'] = $predata['max']<$dvalue[$akey]?$dvalue[$akey]:$predata['max'];
          $predata['sum'] = $dvalue[$akey];*/
        } else {
          $predata['missing']++;
        }
      }
      foreach ($checker as $ckey => $cvalue){
        if($cvalue==1) $predata['unique']++; else $predata['distinct']++;
      }
      $predata['distinct'] += $predata['unique'];
      $missper = $predata['missing']<1?0:round(($predata['missing']/count($attrData)*100),0);
      $uniqueper = $predata['unique']<1?0:round(($predata['unique']/count($attrData)*100),0);
      $predata['missing'] = $predata['missing']." ($missper%)";
      $predata['unique'] = $predata['unique']." ($uniqueper%)";
      $predata['min'] = min($attrData);
      $predata['max'] = max($attrData);
      $predata['sum'] = array_sum($attrData);
      $predata['mean'] = round($predata['sum']/count($attrData),3);
      $predata['stddev'] = round(stats_standard_deviation($attrData,true),3);
      $predata['count'] = count($attrData);
      $dataAttr[$akey] = $attrData;
      $infoAttr[$akey] = $predata;
    }
  }
?>
<script>
  <?php echo $js; ?>
  function selectAttr(o,t,n,data){
    if(t=='real'||t=='numeric'){
      var jd = $.parseJSON(data);
      $('#name').html(n);
      $('#type').html('Numeric');
      $('#missing').html(jd.missing);
      $('#distinct').html(jd.distinct);
      $('#unique').html(jd.unique);
      $('#min').html(jd.min);
      $('#max').html(jd.max);
      $('#mean').html(jd.mean);
      $('#stddev').html(jd.stddev);
      $('#nominal').hide();
      $('#numeric').show();
    } else {
      $('#nominal').show();
      $('#numeric').hide();
    }
    $('.attrList').removeClass('active');
    $(o).addClass('active');
  }
  function genVis(a){
    var jd = $.parseJSON(a);
    vis.setData(jd);
  }
  $(function(){
    $('#numeric, #nominal').hide();
    if($('#row0')){
      $('#row0').click();
    }
  });
</script>
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Preprocess : <?php echo $relation; ?></h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-sort-amount-desc fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><?php echo count($data); ?></div>
                                    <div>Instances</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-green">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-tasks fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><?php echo count($attribute); ?></div>
                                    <div>Attribute</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-6">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <i class="fa fa-tasks fa-fw"></i> Attributes
                            <div class="pull-right">
                                <div class="btn-group">
                                    <button type="button" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown">
                                        Select
                                        <span class="caret"></span>
                                    </button>
                                    <ul class="dropdown-menu pull-right" role="menu">
                                        <li><a href="#">All</a>
                                        </li>
                                        <li><a href="#">None</a>
                                        </li>
                                        <li><a href="#">Invert</a>
                                        </li>
                                        <li class="disabled"><a href="#">Pattern</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-hover table-striped">
                                            <thead>
                                                <tr>
                                                    <th style="width:100px;">No</th>
                                                    <th style="width:20px;"></th>
                                                    <th>Name</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                              <?php
                                              foreach ($attribute as $key => $value) {
                                                echo "<tr class='attrList' id='row$key' onclick='selectAttr(this,`".$value['type']."`,`".$value['name']."`,`".json_encode($infoAttr[$key])."`);genVis(`".histrogram($dataAttr[$key])."`)'>";
                                                echo "<td class='text-right'>".($key+1)."</td><td><input type='checkbox' id='$key'></td><td>".$value['name']."</td>";
                                                echo '</tr>';
                                              }
                                              ?>
                                            </tbody>
                                        </table>
                                    </div>
                                    <!-- /.table-responsive -->
                                </div>
                                <!-- /.col-lg-4 (nested) -->
                            </div>
                            <!-- /.row -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-8 -->
                <div class="col-lg-6">
                  <div class="panel panel-default">
                      <div class="panel-heading">
                          <i class="fa fa-bar-chart-o fa-fw"></i> Area Chart Example
                          <div class="pull-right">
                              <div class="btn-group">
                                  <button type="button" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown">
                                      Actions
                                      <span class="caret"></span>
                                  </button>
                                  <ul class="dropdown-menu pull-right" role="menu">
                                      <li><a href="#">Action</a>
                                      </li>
                                      <li><a href="#">Another action</a>
                                      </li>
                                      <li><a href="#">Something else here</a>
                                      </li>
                                      <li class="divider"></li>
                                      <li><a href="#">Separated link</a>
                                      </li>
                                  </ul>
                              </div>
                          </div>
                      </div>
                      <!-- /.panel-heading -->
                      <div class="panel-body">
                          <div class="row">
                              <div class="col-lg-12">
                                <div class="row">
                                    <div class="col-lg-6 col-md-6">
                                        <div class="panel panel-primary">
                                            <div class="panel-heading">
                                                <div class="row">
                                                    <div class="col-xs-3">
                                                        <i class="fa fa-at fa-4x"></i>
                                                    </div>
                                                    <div class="col-xs-9 text-right">
                                                        <div class="big">Name</div>
                                                        <div id="name"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6">
                                        <div class="panel panel-green">
                                            <div class="panel-heading">
                                                <div class="row">
                                                    <div class="col-xs-3">
                                                        <i class="fa fa-sitemap fa-4x"></i>
                                                    </div>
                                                    <div class="col-xs-9 text-right">
                                                        <div class="big">Type</div>
                                                        <div id="type"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6">
                                        <div class="panel panel-primary">
                                            <div class="panel-heading">
                                                <div class="row">
                                                    <div class="col-xs-3">
                                                        <i class="fa fa-question fa-4x"></i>
                                                    </div>
                                                    <div class="col-xs-9 text-right">
                                                        <div class="big">Missing</div>
                                                        <div id="missing"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6">
                                        <div class="panel panel-green">
                                            <div class="panel-heading">
                                                <div class="row">
                                                    <div class="col-xs-3">
                                                        <i class="fa fa-tags fa-4x"></i>
                                                    </div>
                                                    <div class="col-xs-9 text-right">
                                                        <div class="big">Distinct</div>
                                                        <div id="distinct"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6">
                                        <div class="panel panel-green">
                                            <div class="panel-heading">
                                                <div class="row">
                                                    <div class="col-xs-3">
                                                        <i class="fa fa-tag fa-4x"></i>
                                                    </div>
                                                    <div class="col-xs-9 text-right">
                                                        <div class="big">Unique</div>
                                                        <div id="unique"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.row -->
                                  <div class="table-responsive" id="numeric">
                                      <table class="table table-bordered table-hover table-striped">
                                          <thead>
                                              <tr>
                                                  <th>Statistic</th>
                                                  <th>Value</th>
                                              </tr>
                                          </thead>
                                          <tbody>
                                            <tr>
                                              <td>Minimum</td>
                                              <td id="min"></td>
                                            </tr>
                                            <tr>
                                              <td>Maximum</td>
                                              <td id="max"></td>
                                            </tr>
                                            <tr>
                                              <td>Mean</td>
                                              <td id="mean"></td>
                                            </tr>
                                            <tr>
                                              <td>StdDev</td>
                                              <td id="stddev"></td>
                                            </tr>
                                          </tbody>
                                      </table>
                                  </div>
                                  <!-- /.table-responsive -->
                                  <div class="table-responsive" id="nominal">
                                      <table class="table table-bordered table-hover table-striped">
                                          <thead>
                                              <tr>
                                                  <th>No.</th>
                                                  <th>Label</th>
                                                  <th>Count</th>
                                              </tr>
                                          </thead>
                                          <tbody>
                                          </tbody>
                                      </table>
                                  </div>
                                  <!-- /.table-responsive -->
                              </div>
                              <!-- /.col-lg-4 (nested) -->
                          </div>
                          <!-- /.row -->
                      </div>
                      <!-- /.panel-body -->
                      <div class="panel-body">
                          <div id="vis-morris-bar-chart"></div>
                      </div>
                      <!-- /.panel-body -->
                      <div class="panel-body">
                          <div id="morris-area-chart"></div>
                      </div>
                      <!-- /.panel-body -->
                      <div class="panel-body">
                          <div id="morris-bar-chart"></div>
                      </div>
                      <!-- /.panel-body -->
                  </div>
                  <!-- /.panel -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <i class="fa fa-bell fa-fw"></i> Notifications Panel
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="list-group">
                                <a href="#" class="list-group-item">
                                    <i class="fa fa-comment fa-fw"></i> New Comment
                                    <span class="pull-right text-muted small"><em>4 minutes ago</em>
                                    </span>
                                </a>
                                <a href="#" class="list-group-item">
                                    <i class="fa fa-twitter fa-fw"></i> 3 New Followers
                                    <span class="pull-right text-muted small"><em>12 minutes ago</em>
                                    </span>
                                </a>
                                <a href="#" class="list-group-item">
                                    <i class="fa fa-envelope fa-fw"></i> Message Sent
                                    <span class="pull-right text-muted small"><em>27 minutes ago</em>
                                    </span>
                                </a>
                                <a href="#" class="list-group-item">
                                    <i class="fa fa-tasks fa-fw"></i> New Task
                                    <span class="pull-right text-muted small"><em>43 minutes ago</em>
                                    </span>
                                </a>
                                <a href="#" class="list-group-item">
                                    <i class="fa fa-upload fa-fw"></i> Server Rebooted
                                    <span class="pull-right text-muted small"><em>11:32 AM</em>
                                    </span>
                                </a>
                                <a href="#" class="list-group-item">
                                    <i class="fa fa-bolt fa-fw"></i> Server Crashed!
                                    <span class="pull-right text-muted small"><em>11:13 AM</em>
                                    </span>
                                </a>
                                <a href="#" class="list-group-item">
                                    <i class="fa fa-warning fa-fw"></i> Server Not Responding
                                    <span class="pull-right text-muted small"><em>10:57 AM</em>
                                    </span>
                                </a>
                                <a href="#" class="list-group-item">
                                    <i class="fa fa-shopping-cart fa-fw"></i> New Order Placed
                                    <span class="pull-right text-muted small"><em>9:49 AM</em>
                                    </span>
                                </a>
                                <a href="#" class="list-group-item">
                                    <i class="fa fa-money fa-fw"></i> Payment Received
                                    <span class="pull-right text-muted small"><em>Yesterday</em>
                                    </span>
                                </a>
                            </div>
                            <!-- /.list-group -->
                            <a href="#" class="btn btn-default btn-block">View All Alerts</a>
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <i class="fa fa-bar-chart-o fa-fw"></i> Donut Chart Example
                        </div>
                        <div class="panel-body">
                            <div id="morris-donut-chart"></div>
                            <a href="#" class="btn btn-default btn-block">View Details</a>
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                    <div class="chat-panel panel panel-default">
                        <div class="panel-heading">
                            <i class="fa fa-comments fa-fw"></i>
                            Chat
                            <div class="btn-group pull-right">
                                <button type="button" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown">
                                    <i class="fa fa-chevron-down"></i>
                                </button>
                                <ul class="dropdown-menu slidedown">
                                    <li>
                                        <a href="#">
                                            <i class="fa fa-refresh fa-fw"></i> Refresh
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="fa fa-check-circle fa-fw"></i> Available
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="fa fa-times fa-fw"></i> Busy
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="fa fa-clock-o fa-fw"></i> Away
                                        </a>
                                    </li>
                                    <li class="divider"></li>
                                    <li>
                                        <a href="#">
                                            <i class="fa fa-sign-out fa-fw"></i> Sign Out
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <ul class="chat">
                                <li class="left clearfix">
                                    <span class="chat-img pull-left">
                                        <img src="http://placehold.it/50/55C1E7/fff" alt="User Avatar" class="img-circle" />
                                    </span>
                                    <div class="chat-body clearfix">
                                        <div class="header">
                                            <strong class="primary-font">Jack Sparrow</strong>
                                            <small class="pull-right text-muted">
                                                <i class="fa fa-clock-o fa-fw"></i> 12 mins ago
                                            </small>
                                        </div>
                                        <p>
                                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur bibendum ornare dolor, quis ullamcorper ligula sodales.
                                        </p>
                                    </div>
                                </li>
                                <li class="right clearfix">
                                    <span class="chat-img pull-right">
                                        <img src="http://placehold.it/50/FA6F57/fff" alt="User Avatar" class="img-circle" />
                                    </span>
                                    <div class="chat-body clearfix">
                                        <div class="header">
                                            <small class=" text-muted">
                                                <i class="fa fa-clock-o fa-fw"></i> 13 mins ago</small>
                                            <strong class="pull-right primary-font">Bhaumik Patel</strong>
                                        </div>
                                        <p>
                                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur bibendum ornare dolor, quis ullamcorper ligula sodales.
                                        </p>
                                    </div>
                                </li>
                                <li class="left clearfix">
                                    <span class="chat-img pull-left">
                                        <img src="http://placehold.it/50/55C1E7/fff" alt="User Avatar" class="img-circle" />
                                    </span>
                                    <div class="chat-body clearfix">
                                        <div class="header">
                                            <strong class="primary-font">Jack Sparrow</strong>
                                            <small class="pull-right text-muted">
                                                <i class="fa fa-clock-o fa-fw"></i> 14 mins ago</small>
                                        </div>
                                        <p>
                                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur bibendum ornare dolor, quis ullamcorper ligula sodales.
                                        </p>
                                    </div>
                                </li>
                                <li class="right clearfix">
                                    <span class="chat-img pull-right">
                                        <img src="http://placehold.it/50/FA6F57/fff" alt="User Avatar" class="img-circle" />
                                    </span>
                                    <div class="chat-body clearfix">
                                        <div class="header">
                                            <small class=" text-muted">
                                                <i class="fa fa-clock-o fa-fw"></i> 15 mins ago</small>
                                            <strong class="pull-right primary-font">Bhaumik Patel</strong>
                                        </div>
                                        <p>
                                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur bibendum ornare dolor, quis ullamcorper ligula sodales.
                                        </p>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <!-- /.panel-body -->
                        <div class="panel-footer">
                            <div class="input-group">
                                <input id="btn-input" type="text" class="form-control input-sm" placeholder="Type your message here..." />
                                <span class="input-group-btn">
                                    <button class="btn btn-warning btn-sm" id="btn-chat">
                                        Send
                                    </button>
                                </span>
                            </div>
                        </div>
                        <!-- /.panel-footer -->
                    </div>
                    <!-- /.panel .chat-panel -->
                </div>
                <!-- /.col-lg-4 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->
<script>
var vis = Morris.Bar({
  element: 'vis-morris-bar-chart',
  stacked: true,
  xkey: 'name',
  ykeys: ['count'],
  labels: ['Count'],
  resize: true
});
</script>
