<meta charset="utf-8">
<script src="http://code.jquery.com/jquery-1.10.2.js"></script>
<div class="widget margin-bottom-10">
          <div class="content text-center">
              <!-- lich -->
				<link href='http://fonts.googleapis.com/css?family=Noticia+Text:400,700&subset=latin,vietnamese' rel='stylesheet' type='text/css'>
				<link href="glDatePicker.flatwhite.css" rel="stylesheet" type="text/css" />
					<div id="kccalendar"> 
					<div id="current">
						<span class="cmonth">Tháng <span class="text">9</span></span>
						<span class="cyear">Năm <span class="text">2015</span></span>
						<br />
						<span class="cdate">21</span>
						<span class="cday">Thứ 2</span>
					</div>
					<div id="mycalendar" style="dislay:none;">
						<input style="opacity:0;" id="mydate" gldp-id="mydate" />
						<div id="myselected">
							<div class="left">
								<span class="myselected_date">--</span>
								<span class="myselected_month">Tháng <span class="text">--</span></span>
								<span class="myselected_year">Năm <span class="text">--</span></span>
							</div>
							<div class="right">
								<span class="myselected_monthtext">--</span>
								<span class="myselected_daytext">--</span>
								<span class="myselected_hourtext">--</span>
								<span class="myselected_tiettext">--</span>
							</div>
							<div style="clear:both;"></div>
						</div>
						<div gldp-el="mydate"
							 style="width:299px; height:300px;">
						</div>
						<div id="notice">
							<span class="good">Ngày tốt</span>
							<span class="bad">Ngày xấu</span>
							<span class="gotoday" onclick="example5gotoday();">Hôm nay</span>
							<div style="clear:both;"></div>
						</div>
					</div>
					<div style="clear:both;"></div>
				</div>
				<script src="glDatePicker.js"></script>
			    <script src="amlich.js"></script>
			    <script type="text/javascript">
					var example5 = $('#mydate').glDatePicker({
					
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
							if(textDay==1) textDay = "Chủ nhật";
							else textDay = "Thứ "+ textDay;
							jQuery("#current .cday").text(textDay);
							
							// update am lich
							textDay = amlichObj.day;
							if(textDay < 10) textDay = "0" + textDay;
							jQuery("#myselected .left .myselected_date").text(textDay);
							textMonth = amlichObj.month;
							if(textMonth==1) textMonth = "Giêng";
							if(textMonth==12) textMonth = "Chạp";
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
    </div><!-- END WIDGET -->
