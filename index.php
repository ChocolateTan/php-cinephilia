
<!DOCTYPE HTML>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />  
	<title>Cinephilia迷影</title>
	<link rel="stylesheet" type="text/css" href="public/css/style.css">
	<script type="text/javascript" src="public/js/jquery.min.js"></script>
	<script type="text/javascript">
		$(document).ready(function () {
			var sWidth = $("#focus").width();
			var len = $("#focus ul li").length;
			var index = 0;
			var picTimer;
			var btn = "<div class='btnBg'></div><div class='btn'>";
			for (var i = 0; i < len; i++) {
				btn += "<span></span>";
			}
			btn += "</div><div class='preNext pre'></div><div class='preNext next'></div>";
			$("#focus").append(btn);
			$("#focus .btnBg").css("opacity", 0);
			$("#focus .btn span").css("opacity", 0.4).mouseenter(function () {
				index = $("#focus .btn span").index(this);
				showPics(index);
			}).eq(0).trigger("mouseenter");
			// $("#focus .preNext").css("opacity", 0.0).hover(function () {
				$("#focus .preNext").stop(true, false).animate({ "opacity": "0.5" }, 300);
			// }, function () {
				// $(this).stop(true, false).animate({ "opacity": "0" }, 300);
			// });
			$("#focus .pre").click(function () {
				index -= 1;
				if (index == -1) { index = len - 1; }
				showPics(index);
			});
			$("#focus .next").click(function () {
				index += 1;
				if (index == len) { index = 0; }
				showPics(index);
			});
			$("#focus ul").css("width", sWidth * (len));
			$("#focus").hover(function () {
				clearInterval(picTimer);
			}, function () {
				picTimer = setInterval(function () {
					showPics(index);
					index++;
					if (index == len) { index = 0; }
				}, 2800);
			}).trigger("mouseleave");
			function showPics(index) {
				var nowLeft = -index * sWidth;
				$("#focus ul").stop(true, false).animate({ "left": nowLeft }, 300);
				$("#focus .btn span").stop(true, false).animate({ "opacity": "0.4" }, 300).eq(index).stop(true, false).animate({ "opacity": "1" }, 300);
			}
		})
	</script>
</head>
<body>
	<div class="div_header">
		<h1>CINEPHILIA迷影</h1>
	</div>
	<div class="div_menu">
		<ul>
		<?php
		include "db/sqladapter.php";
		$sqladapter = new sqladapter();
		$menuList = $sqladapter->get_menu();
		// echo  $menuList['menu_name'][0];
		foreach ($menuList as $value) {

			echo "<li><a class=\"a_menu\" href=\"\">".$value["menu_name"]."<li>";

		}
		?>
		</ul>
	</div>
	<div class="div_scroll">
		<div class="bannerbox">
			<div id="focus">
				<ul>
					<li><a href="public/img/1-1000x500.jpg" target="_blank"><img src="public/img/1-1000x500.jpg" alt="" /></a></li>
					<li><a href="public/img/2-1000x500.jpg" target="_blank"><img src="public/img/2-1000x500.jpg" alt="" /></a></li>
					<li><a href="public/img/3-1000x500.jpg" target="_blank"><img src="public/img/3-1000x500.jpg" alt="" /></a></li>
					<li><a href="public/img/4-1000x500.jpg" target="_blank"><img src="public/img/4-1000x500.jpg" alt="" /></a></li>
					<li><a href="public/img/5-1000x500.jpg" target="_blank"><img src="public/img/5-1000x500.jpg" alt="" /></a></li>
				</ul>
			</div>
		</div>
	</div>
	<div class="div_content">
		<div class="div_row">
			<div class="div_column">
				<div class="div_cell">
					<img src="img/3-460x261.jpg">
					<h4><a>悲情城市：雨港基隆的真实与虚幻</a></h4>
					<p>这则政治寓言的尾声，摄影师林文清与吴宽美自拍了一张全家福，镜头停格一瞬，静止的团圆照，预告了无从选择的凄楚命运。<a href="">[...]</a></p>
					<div>04月14日, 2016 | <a href="">No Comments on 悲情城市：雨港基隆的真实与虚幻</a></div>
				</div>
			</div>

			<div class="div_column">
				<div class="div_cell">
					<img src="img/6-460x261.jpg">
					<h4><a>《无用》：空间、风格与劳动</a></h4>
					<p>作为艺术家三部曲之一的《无用》是贾樟柯又一次站在当下语境中，准确地把握住了现实正在激变的部分，通过“结构”保持着一种“电影 <a href="">[...]</a></p>
					<div>04月15日, 2016 | <a href="">No Comments on 《无用》：空间、风格与劳动</a></div>
				</div>
			</div>

			<div class="div_column">
				<div class="div_cell">
					<img src="img/5-460x261.jpg">
					<h4><a>【BJIFF｜大师映像】：爱上电影，从爱上比利·怀尔德开始</a></h4>
					<p>怀尔德是经典叙事方式的集大成者。对他而言，电影在于重现现实，但又要是平时人们在现实中体会不到的经验。<a href="">[...]</a></p>
					<div>04月11日, 2016 | <a href="">No Comments on 【BJIFF｜大师映像】：爱上电影，从爱上比利·怀尔德开始</a></div>
				</div>
			</div>
		</div>
		<div class="div_row">
			<div class="div_column">
				<div class="div_cell">
					<img src="img/2-460x261.jpg">
					<h4><a>杜可风：牛仔永远孤独</a></h4>
					<p>香港，其实算是我的家。心在哪儿，家就在哪儿，在那里拍的电影，故事都从那里来。<a href="">[...]</a></p>
					<div>10月6日, 2015 | <a href="">No Comments on 悲情城市：雨港基隆的真实与虚幻</a></div>
				</div>
			</div>

			<div class="div_column">
				<div class="div_cell">
					<img src="img/4-460x261.jpg">
					<h4><a>埃尼奥·莫里康内：让演奏的音乐家承受暴力场景受害者一样的苦难（作者：Tim Jonze）</a></h4>
					<p>“我在昆汀完全不知情的情况下创作配乐，然后他来布拉格时我正在录音，他也非常满意。所以这次合作对我来说是建立在信任和极大的<a href="">[...]</a></p>
					<div>03月8日, 2016 | <a href="">No Comments on 埃尼奥·莫里康内：</a></div>
				</div>
			</div>
			<div class="div_column">
				<div class="div_cell">
					<img src="img/1-460x261.jpg">
					<h4><a>王小帅专访：大语境里被屏蔽掉的，不能在个人的生活里消失</a></h4>
					<p>一个人当下的表达总与过去的生命经验相关，正如一个导演的创作气质总能在成长脉络里找到依稀的线索。<a href="">[...]</a></p>
					<div>04月14日, 2016 | <a href="">No Comments on 王小帅专访：大语境里被屏蔽掉的，不能在个人的生活里消失</a></div>
				</div>
			</div>
		</div>
	</div>

	<div class="div_border">
		<div class="div_border_content">
			<a href="">关于我们</a>
			<a href="">志愿者团队</a>
		</div>
	</div>
	<div class="div_footer">Copyright © 2011-2014 Cinephilia.net, all rights reserved</div>
</body>
</html>