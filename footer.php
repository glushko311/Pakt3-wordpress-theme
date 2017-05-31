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

$langArr = [["КОНТАКТЫ","CONTACTS","КОНТАКТИ","КОНТАКТЫ"],

			["тел.:<span> +38 (067) 669 50 61 </span>","phone:<span> +38 (067) 669 50 61 </span>","тел.:<span> +38 (067) 669 50 61 </span>","тел.:<span> +38 (067) 669 50 61 </span>"],
			["тел.:<span>+38 (050) 850 61 23 </span>","phone:<span>+38 (050) 850 61 23 </span>","тел.:<span>+38 (050) 850 61 23 </span>","тел.:<span>+38 (050) 850 61 23 </span>"],
			["e-mail:<span> info@pakt3.com.ua </span>","e-mail:<span> info@pakt3.com.ua </span>","e-mail:<span> info@pakt3.com.ua </span>","e-mail:<span> info@pakt3.com.ua </span>"],
			["О нас","About us","Про нас","О нас"],
			["Группа компаний Пакт-3 - команда профессионалов в области комплексной безопасности, аудита, предоставлении юридических услуг, внешнеэкономической деятельности, рекрутинга, кинологии и обеспечения комплекса мероприятий для комплексного обеспечения потребностей клиента.",
					"Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo 	ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem.",
					"Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo 	ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem.",
					"Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo 	ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem."],
		    ["Группа компаний \"Пакт-3\" © 2017","Group of companies \"Pact-3\" © 2017","Група компаній \"Пакт-3\" © 2017","Группа компаний \"Пакт-3\" © 2017"],
		    ["Разработано компанией","Developed by the company","Розроблено компанією","Разработано компанией"],
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
			<article class="span6">
				<h3><span><?php echo $langArr[0][$lang_marker]; ?></span></h3>
				<a class="title1" href="tel:+38 (067) 669 50 61"><?php echo $langArr[1][$lang_marker]; ?> </a>
				<a class="title1" href="tel:+38 (050) 850 61 23"><?php echo $langArr[2][$lang_marker]; ?></a>
				<a class="title1" href="mailto:info@pakt3.com.ua"><?php echo $langArr[3][$lang_marker]; ?></a>

			</article>
			<article class="span6">
				<h3><span><?php echo $langArr[4][$lang_marker]; ?></span></h3>
				<p class="margBot1"> <?php echo $langArr[5][$lang_marker]; ?>
				</p>
			</article>

		</div>
		<div class="row">
			<article class="span12">
				<p class="title2"><?php echo $langArr[6][$lang_marker]; ?></p>
				<br>
				<p class="title2"><?php echo $langArr[7][$lang_marker]; ?></p>
				<a href="http://foss-art-soft.com/" class="title3">Foss-Art-Soft</a>
			</article>
		</div>
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

<?php wp_footer(); ?><?php if( get_marker_of_page()=='ih') :?>	<link href="<?php bloginfo("template_directory"); ?>/css/rtl.css" rel="stylesheet"><?php endif;?>

</body>
</html>
