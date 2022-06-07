<?php
include_once 'header.php';
?>
<div class="frontpage">
<div class="slider">
	<div class="slides">
		<input type="radio" name="radio-btn" id="radio1">
		<input type="radio" name="radio-btn" id="radio2">
		<input type="radio" name="radio-btn" id="radio3">
		<input type="radio" name="radio-btn" id="radio4">
		<input type="radio" name="radio-btn" id="radio5">

		<div class="slide first">
			<img src="src/img/1.jpg" alt="pic">
		</div>
		<div class="slide">
			<img src="src/img/2.jpg" alt="pic">
		</div>
		<div class="slide">
			<img src="src/img/3.jpg" alt="pic">
		</div>
		<div class="slide">
			<img src="src/img/4.jpg" alt="pic">
		</div>
		<div class="slide">
			<img src="src/img/5.jpg" alt="pic">
		</div>
		<div class="navigation-auto">
			<div class="auto-btn1"></div>
			<div class="auto-btn2"></div>
			<div class="auto-btn3"></div>
			<div class="auto-btn4"></div>
			<div class="auto-btn5"></div>
		</div>
	</div>
	<div class="manual">
		<label for="radio1" class="manual-btn"></label>
		<label for="radio2" class="manual-btn"></label>
		<label for="radio3" class="manual-btn"></label>
		<label for="radio4" class="manual-btn"></label>
		<label for="radio5" class="manual-btn"></label>
	</div>
</div>
</div>
	<div class="side-text">
		<p> YearBeyond, or YeBo, is a Youth Service partnership between the Western Cape Government, The Community Chest of the Western Cape, the Michael and Susan Dell Foundation and numerous NGOs. It aims to provide 18 to 25 year-olds with a meaningful work experience and a pathway to further studies or work while at the same time encouraging a culture of active citizenship and volunteerism. Youth unemployment remains one of South Africa’s biggest challenges. Despite increasing access to education, almost half of the learners who enter school in grade 1 do not obtain matric. Young people who do complete their schooling, but come from disadvantaged backgrounds continue to have fewer post-school opportunities and are more likely to end up not in employment, education or training (NEET).

Data further highlights that the longer a young person stays out of work, the lower their chances of ever working, and the higher the likelihood that they will stay trapped in poverty. 

Experts note that the multiple barriers that give rise to high youth unemployment are interconnected and should be addressed holistically for the best outcomes. In 2015, YearBeyond was started as a flagship programme of the Western Cape Youth Development Strategy.  It aims to link young people not in employment, education or training to increased economic opportunity. YearBeyond provides participants with a meaningful work experience, a pathway into studies or work and a social and economic network.</p>
	</div>
<input type="hidden" id="pageName" value="Home">
<?php
include_once 'footer.php';
?>