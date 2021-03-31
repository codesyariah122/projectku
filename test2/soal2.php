<?php 
function input($data){
	var_dump(@$data);
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Soal2a</title>
</head>
<body>

	<fieldset>
		<legend>Form</legend>
		<div id="form1">
			<label for="nama">Nama Anda</label>
			<input id="nama" type="text" name="nama">
			<br>
			<button type="submit" name="enter1" id="enter1">SUBMIT</button>
		</div>

		<div id="form2">
			<label for="nama">Umur Anda</label>
			<input type="text" id="umur" name="umur">
			<br>
			<button type="submit" name="umur" id="enter2">SUBMIT</button>
		</div>
		
		<div id="form3">
			<label for="hobi">Hobi Anda</label>
			<input type="text" id="hobi" name="hobi">
			<br>
			<button type="submit" name="hobi" id="enter3">SUBMIT</button>
		</div>

	</fieldset>

	<fieldset>
		<legend>Result : </legend>
		<ul id="result">
			
		</ul>
	</fieldset>


<script type="text/javascript">
		const form1 = document.querySelector('#form1')
		const form2 = document.querySelector('#form2')
		const form3 = document.querySelector('#form3')

		form2.style.visibility="hidden"
		form3.style.visibility="hidden"

		const enter1 = document.querySelector('#enter1')
		const enter2 = document.querySelector('#enter2')
		const enter3 = document.querySelector('#enter3')
		const result = document.querySelector('#result');
		const liFirst = document.createElement('li')
		liFirst.textContent=''
		enter1.addEventListener('click', function(){
			const nama = document.querySelector('#nama').value
			if(nama === ""){
				return false;	
				nama.value=""	
			}else{
				form1.style.visibility="hidden"
				form2.style.visibility="visible"
				let li = document.createElement('li')
				li.textContent = `Nama : ${nama}`
				result.appendChild(li)
			}
		})

		enter2.addEventListener('click', function(){
			const umur = document.querySelector('#umur').value
			if(umur === ""){
				return false
			}else{
				form2.style.visibility="hidden"
				form3.style.visibility="visible"
				let li = document.createElement('li')
				li.textContent = `Umur : ${umur}`
				result.appendChild(li)
			}
		})
		enter3.addEventListener('click', function(){
			const hobi = document.querySelector('#hobi').value
			if(hobi === ""){
				return false	
			}else{			
				form1.style.visibility="visible"
				form2.style.visibility="hidden"
				form3.style.visibility="hidden"
				const li = document.createElement('li')
				li.textContent=`Hobi : ${hobi}`
				result.appendChild(li)
			}
		})
</script>
</body>
</html>