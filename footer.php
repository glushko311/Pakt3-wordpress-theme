<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package pakt3
 */

// langArr[[russian, english, ukrainian, idish], ...] куда добавить значение определяется по номеру

$langArr = [["о нас","about us","о нас","о нас"],
		    ["Сайт рыбатекст поможет дизайнеру, верстальщику, вебмастеру сгенерировать несколько абзацев более менее осмысленного текста рыбы на русском языке, а начинающему оратору отточить навык публичных выступлений в домашних условиях.",
		     "Lorem ipsum dolor sit amet, con sectetuer adipiscing elit, sed diam non ummy nibh euismod tincidunt ut lao reet dolore magna aliquam. erat volutpat.",
		     "Проснувшись однажды утром после беспокойного сна, Грегор Замза обнаружил, что он у себя в постели превратился в страшное насекомое. ",
		     "Lorem ipsum dolor sit amet, con sectetuer adipiscing elit, sed diam non ummy nibh euismod tincidunt ut lao reet dolore magna aliquam. erat volutpat."
			],
			["Adam Smith","Adam Smith","о нас","о нас"],
			["Director","Director","о нас","о нас"],
			["ссылки","links","о нас","о нас"],
			["Crowd Management","Crowd Management","о нас","о нас"],
			["Corporate Governance","Corporate Governance","о нас","о нас"],
			["VIP Luxury Living","VIP Luxury Living","о нас","о нас"],
			["Vehicle Escort","Vehicle Escort","о нас","о нас"],
			["Gated Community Services","Gated Community Services","о нас","о нас"],
			["Chauffeur Services","Chauffeur Services","о нас","о нас"],
			["Special Events","Special Events","о нас","о нас"],
			["Primary contacts","Primary contacts","о нас","о нас"],
			["Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolor, nihil.","Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolor, nihil.","о нас","о нас"],
			["Sharp Company<br>8901 Marmora Road, Glasgow, D04 89GR","Sharp Company<br>8901 Marmora Road, Glasgow, D04 89GR","о нас","о нас"],
			["Tel: 1-800-234-5678","Tel: 1-800-234-5678","о нас","о нас"],
			["copyright","copyright","о нас","о нас"],
			["Sharp","Sharp","о нас","о нас"],
			["Privacy Policy","Privacy Policy","о нас","о нас"],
];

switch(get_marker_of_page()){
	case "ru":
		$lang_marker = 0;
		break;

	case "en":
		$lang_marker = 1;
		break;

	case "ua":
		$lang_marker = 2;
		break;

	case "ih":
		$lang_marker = 3;
		break;

	default:
		$lang_marker = 0;
}


?>
	</div><!-- #content -->
		<footer>
			<div class="container">
				<div class="row">
					<article class="span3">
						<h3><span><?= $langArr[0][$lang_marker];?></span></h3>
						<p class="title1">&ldquo;<?= $langArr[1][$lang_marker];?>  &rdquo;</p>
						<p class="title2"><?= $langArr[2][$lang_marker];?> </p>
						<p class="title3"><?= $langArr[3][$lang_marker];?> </p>
					</article>
					<article class="span3">
						<h3><span><?= $langArr[4][$lang_marker];?></span></h3>
						<ul class="list1">
							<li><a href="#"><?= $langArr[5][$lang_marker];?><em></em></a></li>
							<li><a href="#"><?= $langArr[6][$lang_marker];?><em></em></a></li>
							<li><a href="#"><?= $langArr[7][$lang_marker];?><em></em></a></li>
							<li><a href="#"><?= $langArr[8][$lang_marker];?><em></em></a></li>
							<li><a href="#"><?= $langArr[9][$lang_marker];?><em></em></a></li>
							<li><a href="#"><?= $langArr[10][$lang_marker];?><em></em></a></li>
							<li><a href="#"><?= $langArr[11][$lang_marker];?><em></em></a></li>
						</ul>
					</article>
					<article class="span3">
						<h3><span><?= $langArr[12][$lang_marker];?></span></h3>
						<p class="margBot1"><?= $langArr[13][$lang_marker];?>﻿</p>
						<p class="margBot1"><span><?= $langArr[14][$lang_marker];?></span></p>
						<p><span><?= $langArr[15][$lang_marker];?></span></p>
					</article>
					<article class="span3">
						<h3><span><?= $langArr[16][$lang_marker];?></span></h3>
						<p><?= $langArr[17][$lang_marker];?> &copy; 2013 &bull; <br><a href="index-5.html"><?= $langArr[18][$lang_marker];?></a></p>
						<ul class="follow_icon">
							<li><a href="#"><img alt="" src="<?php bloginfo("template_directory"); ?>/img/follow_icon1.png"></a></li>
							<li><a href="#"><img alt="" src="<?php bloginfo("template_directory"); ?>/img/follow_icon2.png"></a></li>
							<li><a href="#"><img alt="" src="<?php bloginfo("template_directory"); ?>/img/follow_icon3.png"></a></li>
						</ul>

					</article>

				</div>
<!--				More Security Website Templates at <a rel="nofollow" href="http://www.templatemonster.com/category/security-web-templates/" target="_blank">TemplateMonster.com</a>-->
			</div>
		</footer>

		<script>
			$('#search a').hover(function(){
				$(this).stop().animate({'opacity':0.5},350, "easeOutSine");
			}, function(){
				$(this).stop().animate({'opacity':1},350, "easeOutSine");
			})
			$('.follow_icon a').hover(function(){
				$(this).stop().animate({'opacity':0.5},350, "easeOutSine");
			}, function(){
				$(this).stop().animate({'opacity':1},350, "easeOutSine");
			})
		</script>

</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
