<!-- lich van nien -->

<script>
	var wz_admin = '<?php echo admin_url('/admin-ajax.php');?>';
</script>

<meta charset="UTF-8">
<link rel="stylesheet" type="text/css" href="style.css" media="all" />

<div class="cal-sidebar-right" style="width: 22.5%; margin: 0 auto">
	<div class="content text-center">
		  <!-- lich -->	
			<script src="http://code.jquery.com/jquery-1.10.2.js"></script>
			<link href="glDatePicker.flatwhite.css" rel="stylesheet" type="text/css" />
				<div id="kccalendar"> 
				<div class="top-calendar no-border-top">
					<div id="current" class="ab132d">
						<?php 
							$ngay = gmdate('d', time() + 3600*7);
							$thang = gmdate('m', time() + 3600*7);
							$nam = gmdate('Y', time() + 3600*7);
						?>
						<span class="today">Hom nay</span>
						<span class="cdate"><?php echo $ngay; ?></span> / 
						<span class="cmonth"><span class="text"><?php echo $thang; ?></span></span> /
						<span class="cyear"><span class="text"><?php echo $nam; ?></span></span>
					</div>
					<div id="myselected" class="cc2844">
						<div class="left ab132d-b">
							<div class="div-left-top">
								<span class="myselected_date">--</span>
								<span class="myselected_month">Thang <span class="text">--</span></span>
							</div>
							<div class="div-left-bot">
								<span class="myselected_year">Nam <span class="text">--</span></span>
							</div>
						</div>
						<div class="right">
							<span class="myselected_monthtext">--</span>
							<span class="myselected_daytext">--</span>
							<span class="myselected_hourtext">--</span>
							<span class="myselected_tiettext">--</span>
						</div>
						<div style="clear:both;"></div>
					</div>
				</div>
				<div id="mycalendar" class="no-border-top" style="dislay:none;">
					<div id="mycalendar-inner">
						<input style="opacity:0;" id="mydate" gldp-id="mydate" />
						<div gldp-el="mydate" style="width:299px; height:298px;"></div>
					</div>
				</div>
				<div class="tittotx ab132d-c">
					
					<span class="icon-tittltx ab132d"></span>
					<span class="txt-tittltx">ngay tot cho cuoi hoi</span>
				</div>					
			<div style="clear:both;"></div>
			</div>
			
			<script src="glDatePicker.js"></script>
			<script src="amlich.js"></script>
			<script type="text/javascript">
				var example5 = jQuery('#mydate').glDatePicker({
				
					cssName: 'flatwhite',
					showAlways: true,
					onClick: function(target, cell, date, data) {
						var amlichObj = getNgayGioAmLich(date.getDate(), date.getMonth() + 1, date.getFullYear());
						var textDay, textMonth;
						// update duong lich
						jQuery("#current .cmonth .text").text(date.getMonth() + 1);
						jQuery("#current .cyear .text").text(date.getFullYear());
						textDay = date.getDate();
						if(textDay < 10) textDay = "0" + textDay;
						jQuery("#current .cdate").text(textDay);
						textDay = date.getDay() + 1;
						if(textDay==1) textDay = "Chu nhat";
						else textDay = "Thu "+ textDay;
						jQuery("#current .cday").text(textDay);
						
						// update am lich
						textDay = amlichObj.day;
						if(textDay < 10) textDay = "0" + textDay;
						jQuery("#myselected .left .myselected_date").text(textDay);
						textMonth = amlichObj.month;
						if(textMonth==1) textMonth = "Gieng";
						if(textMonth==12) textMonth = "Chap";
						jQuery("#myselected .left .myselected_month .text").text(textMonth);
						jQuery("#myselected .left .myselected_year .text").text(amlichObj.YearText);
						jQuery("#myselected .right .myselected_daytext").text(amlichObj.dayText);
						jQuery("#myselected .right .myselected_hourtext").text(amlichObj.hourText);
						jQuery("#myselected .right .myselected_monthtext").text(amlichObj.monText);
						jQuery("#myselected .right .myselected_tiettext").text(amlichObj.tietText);
						
						
						// notice if text
						if(data != null) {
							alert(data.message + '\n' + date);
							if(jQuery.trim(data.message) != '') {
								example5.callglDatePickerNotice(date.getDate()+"/"+(date.getMonth() + 1)+"/"+date.getFullYear()+": "+ data.message);
							}
						} else {
							// document.getElementById("cal_form").reset();
						}
						return false;
					}
					
				}).glDatePicker(true);
				jQuery(document).ready(function(){
					triggerSelectedClick();
					example5.render();
				});
				function example5gotoday(){
					example5.gotoDate();
					triggerSelectedClick();
				}
				function triggerSelectedClick(){
					if(jQuery("#mycalendar .today").length > 0) jQuery("#mycalendar .today").trigger("click");
					else if(jQuery("#mycalendar .selected").length > 0) jQuery("#mycalendar .selected").trigger("click");
				}
			</script>
			
			<!-- lich -->
	  </div>
	  <div class="border-style-dot"></div>
</div>