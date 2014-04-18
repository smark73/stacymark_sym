<?php
include_once('../inc/cleaner.php');
include_once('../inc/db_user.php');
$conn = mysql_connect(DB_HOST, DB_USER, DB_PASSWORD) or die(mysql_error());
mysql_select_db(DB_DATABASE,$conn) or die(mysql_error());
$display_block = "";
$display_thumbs = "";
$i = 0;
$get_ptg = "SELECT * FROM ptg_details LIMIT 3";
$get_ptg_res = mysql_query($get_ptg) or die(mysql_error());
if (mysql_num_rows($get_ptg_res) < 1){
	// no records
	$display_block .= "<p>Sorry, no records</p>";
} else {
	$tot_results = mysql_num_rows($get_ptg_res);
	// list the first 2 results
	// array of details
	while ($p_recs = mysql_fetch_array($get_ptg_res)){
		$id = $p_recs['id'];
		$name = $p_recs['name'];
		$medium = $p_recs['medium'];
		$ptg_date = $p_recs['ptg_date'];
		$dim = $p_recs['dim'];
		$available = $p_recs['available'];
		// get thumb and photo
		$get_ph = "SELECT * FROM ptg_photos WHERE ptg_id = '$id'";
		$get_ph_res = mysql_query($get_ph) or die(mysql_error());
		while($ph_recs = mysql_fetch_array($get_ph_res)){
			$thumb = $ph_recs['thumb'];
			$photo = $ph_recs['photo'];
		}
		if($i == 0) {
			$visClass = "show";
		} else {
			$visClass = "";
		}
		if($available == 0) {
			$av = "Sold";
		} else {
			$av = "Available";
		}
		$display_thumbs .= "
			<a id=\"$id\" class=\"switcher\">
			<img src=\"gallery/thumbs/$thumb\" alt=\"$name - Painting by Stacy Mark\" width=\"50\" height=\"50\"/>
			</a>";
		$display_block .= "
			<div id=\"$id-content\" class=\"switcher-content col $visClass\">
			<img src=\"gallery/$photo\" alt=\"$name - Painting by Stacy Mark\"/>
			<p>$name | $ptg_date | $dim | $medium | $av</p>
			</div>";
		$display_nav = "Total results $tot_results";
		$i += 1;
	}

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Stacy Mark - Paintings - Art</title>
<meta name="description" content="Stacy Mark - Paintings">
<meta name="keywords" content="Stacy Mark, -Stacey, artist, art, paintings, painter">
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href='http://fonts.googleapis.com/css?family=Krona+One|Hammersmith+One' rel='stylesheet' type='text/css'>
<!--[if lt IE 9]>
<script src="scripts/html5shiv.js"></script>
<![endif]-->
<link type="text/css" rel="stylesheet" href="styles.css"/>
</head>
<body class="centered row">
<div class="centered page container row">
    <header class="row centered">
        <nav class="row centered">
            <div class="hdr-title col">
                <a href="/">
                    <span class="krona light">STACY MARK  |  </span><span class="krona dark">PAINTINGS</span>
                </a>
            </div>
            <ul class="menu col">     
				<?php echo $display_nav;?>
            </ul>
        </nav>
        <br class="clear"/>
    </header>
    <br class="clear"/>
    <section id="tab-content" class="centered gallery row">
    	<!-- tab1 START -->
    	<div id="tab1-content" class="centered visible">
			<div class="thumbs row centered">
				<?php echo $display_thumbs;?>
            </div>
            <br class="clear"/>
			<?php echo $display_block;?>
       </div>
       <!-- tab1 END -->
       <!-- tab2 START -->
       <div id="tab2-content" class="invisible">
			<?php include('tab2.php')?>
       </div>
       <!-- tab2 END -->
       <!-- tab3 START -->
        <div id="tab3-content" class="invisible">
        	<?php include('tab3.php')?>
        </div>
       <!-- tab3 END -->
       <!-- tab4 START -->  
        <div id="tab4-content" class="invisible">
        	<?php include('tab4.php')?>
        </div>
       <!-- tab4 END -->
       <!--  switcher DIV START -->
         <div id="ptgs" class="row">
            <div id="switcher-panel" class="centered row"></div>
        </div>
        <!-- switcher DIV END -->
    </section>
    <footer class="centered row">
        <div style="width:300px;display:block;margin:0 auto;text-align:center;" class="row contactArea">
        <form id="contactform" name="contactform" action="form-send.php" class="col one-edge-shadow">
            Name:<br/><input type="text" id="name" name="name" class="required" size="35" style="border:1px solid #999274;"><br/>
            Email:<br/><input type="text" id="email" name="email" class="required" size="35" style="border:1px solid #999274;"><br/>
            <input type="text" id="feedme" size="25" class="feedme">
            Comments:<br/><textarea id="comments" name="comments" class="required"></textarea><br/>
            <input type="submit" id="submit" name="submit" value="Send" style="float:right;margin-right:20px;">
            <p style="clear:both;margin-top:20px;"><a class="contactBtn">Close</a></p>
            <div id="result"></div>
        </form>
        </div>
        <div id="contact" class="row centered">
        	<div class="centered row" style="width:50%;height:35px;"><a class="contactBtn">Contact Stacy</a> &nbsp; | &nbsp; &copy All Rights Reserved</div>
        </div>
    </footer>
</div>
<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
<script type="text/javascript" src="scripts/jquery.content-panel-switcher.js"></script>
<script type="text/javascript" src="scripts/jquery.validate.min.js"></script>
<!--script type="text/javascript" src="gridpak.js"></script-->
<script>
	$(document).ready(function(){
		// content panel switcher
		jcps.fader(300, '#switcher-panel');
		//tabs and tab thumbs content
		var TAB = {};
		TAB.clickChange = function (_tabCont, _tabNum){
			_tabCont.removeClass('invisible').addClass('visible');
			//remove 2nd line below into 1 line here
			_tabNum = parseInt(_tabNum);
			switch (_tabNum) {
				case 1 :
					$('#tab2-content, #tab3-content, #tab4-content').removeClass('visible').addClass('invisible');
					$('#tab1 li').removeClass().addClass('tabON');
					$('#tab2 li, #tab3 li, #tab4 li').removeClass().addClass('tabHOV');
					break;
				case 2 :
					$('#tab1-content, #tab3-content, #tab4-content').removeClass('visible').addClass('invisible');
					$('#tab2 li').removeClass().addClass('tabON');
					$('#tab1 li, #tab3 li, #tab4 li').removeClass().addClass('tabHOV');
					break;
				case 3 :
					$('#tab1-content, #tab2-content, #tab4-content').removeClass('visible').addClass('invisible');
					$('#tab3 li').removeClass().addClass('tabON');
					$('#tab1 li, #tab2 li, #tab4 li').removeClass().addClass('tabHOV');
					break;
				case 4 :
					$('#tab1-content, #tab2-content, #tab3-content').removeClass('visible').addClass('invisible');
					$('#tab4 li').removeClass().addClass('tabON');
					$('#tab1 li, #tab2 li, #tab3 li').removeClass().addClass('tabHOV');
					break;
			}
			//_tabCont.toggleClass('visible invisible');
		};
		$('.tab1').click(function(){
			var _tabNum = 1;
			var _tabCont1 = $('#tab1-content');
			TAB.clickChange(_tabCont1, _tabNum);
		});
		$('.tab2').click(function(){
			var _tabNum = 2;
			var _tabCont2 = $('#tab2-content');
			TAB.clickChange(_tabCont2, _tabNum);
		});
		$('.tab3').click(function(){
			var _tabNum = 3;
			var _tabCont3 = $('#tab3-content');
			TAB.clickChange(_tabCont3, _tabNum);
		});
		$('.tab4').click(function(){
			var _tabNum = 4;
			var _tabCont4 = $('#tab4-content');
			TAB.clickChange(_tabCont4, _tabNum);
		});
		$('.contactBtn').click(function(){
			var $box = $('#contactform');
			if ($box.height() > 0) {
				$box.animate({ height : 0, opacity : 0, bottom : 0 });
			} else {
				$box.animate({ height: 220, opacity : 100, bottom : 100 });
			}
		});
		// bind submit button to ajax fn
		$('#contactform').bind('submit');
		//form validator
		jQuery(function() {		
			var v = jQuery("#contactform").validate({
				rules: {
					name: "required",
					email: {
						required: true,
						email: true
					},
					comments: "required"
				},
				messages: {
					name: "*",
					email: "*",
					comments: "*"
				},
				submitHandler: function(){
					//ajax submit
					$.ajax({
						type: "post",
						url:    'form-send.php',
						data:   $('#contactform').serialize(),
						success: function(){
							$('#contactform').html('<p style="margin:20px 0 0 -15px;text-align:center;font-size:18px;">Thank You!</p>');
							var $box = $('#contactform');
							$box.delay(1000).animate({ height : 0, opacity : 0, bottom : 0});
						}
					});
					return false;
				}
			});
		});
			
	});
</script>
</body>
</html>