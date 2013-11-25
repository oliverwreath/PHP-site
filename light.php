<?php include_once("header.php")  ?>

<body>
	<script src="http://www.google-analytics.com/urchin.js" type="text/javascript">
	</script>
	<script type="text/javascript">
	_uacct = "UA-3125611-1";
	urchinTracker();
	</script>

	<div style="position: relative; width: 100%; display:inline; text-align: center;">
	
		<?php include_once("navi.php") ?>

		<div>
			<h1><span class="title1">Yanliang</span> H.</h1>
			<p>Master of Computer Science in University of Illinois at Urbana-Champaign</p>
			<p>ACM, IEEE Member</p>
		</div>

		<div class="band">
			<table>
				<tr>
					<td>
						<h3>Works Gallery - To be continued.</h3>
						<table style="width:100%">
							<tr style="width:100%">
								<td style="width:250px">
									<script>
									function changeTextRed()
									{
										text = document.getElementById("colorText");
										text.style.color = "#FF0000";
									}
									function changeTextGreen()
									{
										text = document.getElementById("colorText");
										text.style.color = "#00FF00";
									}
									function changeTextBlue()
									{
										text = document.getElementById("colorText");
										text.style.color = "#0000FF";
									}
									</script>
									<p id="colorText" style="color:#FF0000">Change colors as you wish!</p>
									<button type="button" onclick="changeTextRed()">Red</button>
									<button type="button" onclick="changeTextGreen()">Green</button>
									<button type="button" onclick="changeTextBlue()">Blue</button>
								</td>
							</tr>
							<tr style="width:100%">
								<td style="width:250px">
									<script>
									function changeLight()
									{
										light = document.getElementById("light");
										if(light.src.match("on"))
										{
											light.src = "/pics/pic_bulboff.gif";
										}
										else
										{
											light.src = "/pics/pic_bulbon.gif";
										}
									}
									</script>
									<img id="light" src="/pics/pic_bulbon.gif" alt="js switching light pic" onClick="changeLight()">
								</td>
							</tr>
						</table>
						<h3>Research Interests: Algorithms, Computer Vision, Data Mining, Compilers, Object-Oriented Programming and Information Security.</h3> 
					</td>
				</tr>
			</table>
		</div>

		<?php include_once("footer.php") ?>

	</div>

</body>
</html>