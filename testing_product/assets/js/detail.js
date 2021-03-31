const id = document.getElementById('detail')

document.addEventListener('click', function(e){
	if(e.target.classList.contains('detail')){
		const detailID = e.target.dataset.id
		detailData('detail.php?detail', detailID)
		// detailData(detailID, `index.php?detail=${detailID}`, res => {
		// 	console.log("Ok")
		// }, err => console.log(err))
	}
})


function detailData(url, id){
	$.ajax({
		url: `${url}`,
		type: 'post',
		data: `id=${id}`,
		success: function(res){
			if(res){
				console.log("Ok")
			}
		}
	})
	// const req = new XMLHttpRequest()
	// req.open('GET', url)

	// req.onload = () =>{
	// 	if(req.readyState === 4){
	// 		if(req.status === 200){
	// 			success(req.response)
	// 		}else if(req.status === 400){
	// 			error()
	// 		}
	// 	}
	// }

	// req.onerror = (err) => {
	// 	console.log(err.response)
	// }

	// req.send()
}