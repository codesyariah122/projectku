<?php require_once(dirname(__FILE__)) .'/app/init.php'; ?>

<!DOCTYPE html>
<html>
<head>
	<title><?php $base->getTitle("NameSpace | HomePage")?></title>
<?php $style->getStyle("home");?>
</head>
<body>

<main>
	<div class="container">
		<div class="row">
			<?=$base->sayHallo();?>	
		</div>

		<div class="row">
			
			<?php
				/*
				$zakat->setZakat(0,0);
				$zakat->getZakat();
				*/
				$add->getAdd(5,4);

				$sub->getSub(10,5);

				$mult->getMult(100.55,45.01);

				$div->getDiv(100.5,2500.4);

				$mod->getMod(10,2);

				$x->getGanjilGenap(19);

			?>
				
		</div>	

	</div>
</main>

</body>
</html>

