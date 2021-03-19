ObjData.select.surah.append(`
	<option value="choose" selected>Choose ... </option>
`)


SelectSurah(ObjData.url, ObjData.prop)
.then(res=>{
	// console.log("Response : ", res);

	const DataSurah = res.data

	DataSurah.forEach(result => {
		ObjData.select.surah.append(`
			<option value="${result.number}">${result.name.transliteration.id}</option>
		`)
	})
}).catch(err=>{
	console.log("Error : ", err)
})


ObjData.result.loader.hide();
ObjData.result.loaderDua.hide();
ObjData.result.loaderTiga.hide();

ObjData.button.on('click', function(e){
	ObjData.result.loaderDua.show('slow').fadeIn(1000);
	ObjData.result.viewSurah.html('');
	ObjData.result.viewAyat.html('');
	ObjData.result.pagination.html('');

	const surahData = ObjData.select.surah.val()
	// alert(surahData)
	if(surahData == 'choose' || surahData == null){
		ObjData.result.error.html('')
		ObjData.result.viewSurah.html('')
		ObjData.result.viewAyat.html('')
		ObjData.result.pagination.html('')
		ObjData.result.error.append(`
			<div class="alert alert-warning" role="alert">
				  Pilih Nama Surah Terlebih Dahulu
			</div>
		`)
		ObjData.result.loaderDua.hide('slow').slideUp(1000)
	}else {
		ObjData.result.loaderDua.hide('slow').slideUp(1000);
		ObjData.select.surah.val('choose')
		ObjData.result.error.html('')

		ViewSurah(ObjData.baseAPI.proxy, ObjData.url, surahData)
		.then(res => {
			const resData = res.data
			// console.log(resObjData)

			const allData = {
				namaArb: resData.name.long,
				namaId: resData.name.transliteration.id,
				tafsir: resData.tafsir.id
			}

			ObjData.result.viewSurah.append(`
				<h2>${allData.namaArb} | Surah ${allData.namaId}</h2>
				<blockquote class="text-justify">${allData.tafsir}</blockquote>
				
				<button id="view-ayat" class="btn btn-outline-primary" data-id="${surahData}">View Ayat</button>
			`)
		})
	}
})


ObjData.result.viewSurah.on('click', '#view-ayat', function(){
	ObjData.result.loaderTiga.show('slow').fadeIn(1000);

	const idAyat = $(this).data('id');
		
	ViewAyat(ObjData.baseAPI.proxy, ObjData.url, idAyat)
	.then(res => {
		// console.log('Response : ', res)
		
		ObjData.result.loaderTiga.hide('slow').slideUp(1000)

		$(this).hide('slow').fadeOut(1000)

		const SetFirst = res.data.verses[0]
		const SetTotal = SetFirst.numberOfVerses
		const disable = SetFirst.number.inSurah == 1 ? 'disabled' : ''
		const disableTab = SetFirst.number.inSurah == 1 ? 'tabindex="-1" aria-disabled="true"' : ''

		ObjData.result.pagination.append(`

			<li class="page-item ${disable}"> 
				<a class="page-link" ${disableTab} id="prev">Previous</a>
			</li>
		`)

		ObjData.result.viewAyat.append(`
			<h1>${SetFirst.text.arab} . <span class="number-ayat">${SetFirst.number.inSurah}</span></h1>
			<p>${SetFirst.text.transliteration.en}</p>

				<audio controls>
					<source src="${SetFirst.audio.primary}" type="audio/mp3">
				</audio>

				<blockquote class="mb-5"> - ${SetFirst.translation.id}</blockquote>
		`)

		ObjData.result.pagination.append(`
			<li class="page-item">
				<a class="page-link" data-total="${SetTotal}" data-surah="${idAyat}" data-ayat="${SetFirst.number.inSurah + 1}" id="next">Next</a>
			</li>
		`)
	}).catch(err => {
		console.log("Error : ", err)
	})
})

ObjData.result.pagination.on('click', '#next', function(){
	ObjData.result.loaderTiga.show('slow').fadeIn(1000)

	const numberSurah = $(this).data('surah')
	const ayat = $(this).data('ayat')
	const TotalAyat = $(this).data('total')

	ObjData.result.viewAyat.html('')
	ObjData.result.pagination.html('')

	ReadAyat(ObjData.url,'surah', numberSurah, ayat, results => {
		ObjData.result.loaderTiga.hide('slow').slideUp(1000)

		const res= JSON.parse(results)
		const SetFirst = res.data
		// console.log(SetFirst)
		const disabled = (SetFirst.number.inSurah == 1) ? 'disabled' : '';
		const disableTab = (SetFirst.number.inSurah == 1) ? 'tabindex="-1" aria-disabled="true"' : '';
		const SetTotal = SetFirst.surah.numberOfVerses;
		const NextData = (SetFirst.number.inSurah >= SetTotal) ? 1 : SetFirst.number.inSurah + 1;
		const DisableNext = (SetFirst.number.inSurah >= SetTotal) ? 'disabled' : '';
		const PrevData = (SetFirst.number.inSurah != 1) ? SetFirst.number.inSurah - 1 : '';

		const ActiveData = SetFirst.number.inSurah
			

		const FirstData = (SetFirst.number.inSurah > 1) ? (ActiveData + 1) - ActiveData : '';

		const LastData = (SetFirst.number.inSurah > 1) ? (ActiveData - ActiveData)+SetTotal : '';


			ObjData.result.pagination.append(`
				 <li class="page-item ${disabled}">
			      <a class="page-link" aria-label="Previous" id="prev" data-total="${SetTotal}" data-surah="${numberSurah}" data-ayat="${FirstData}">
			        <span aria-hidden="true">&laquo;</span>
			      </a>
			    </li>

				<li class="page-item ${disabled}">
			      <a class="page-link" ${disableTab} id="prev" data-total="${SetTotal}" data-surah="${numberSurah}" data-ayat="${PrevData}">Previous</a>
			    </li>
			`);

			ObjData.result.viewAyat.append(`
				<h1>${SetFirst.text.arab} . <span class="number-ayat">${SetFirst.number.inSurah}</span></h1>
				<p>${SetFirst.text.transliteration.en}</p>

					<audio controls>
						<source src="${SetFirst.audio.secondary[0]}" type="audio/mp3">
					</audio>

				<blockquote class="mb-5">- ${SetFirst.translation.id}</blockquote>
			`)

			ObjData.result.pagination.append(`
				<li class="page-item ${DisableNext}">
					<a class="page-link" data-total="${SetTotal}" data-surah="${numberSurah}" data-ayat="${NextData}" id="next">Next</a>
				</li>

				<li class="page-item ${DisableNext}">
			      <a class="page-link" aria-label="Next" id="next" data-total="${SetTotal}" data-surah="${numberSurah}" data-ayat="${LastData}">
			        <span aria-hidden="true">&raquo;</span>
			      </a>
			    </li>
			`)

	}, (err) => {
		console.log("Results Error : ", err)
	})
})

ObjData.result.pagination.on('click', '#prev', function(){
	ObjData.result.loaderTiga.show('slow').fadeIn(1000)

	const numberSurah = $(this).data('surah')
	const ayat = $(this).data('ayat')
	const TotalAyat = $(this).data('total')

	ObjData.result.viewAyat.html('')
	ObjData.result.pagination.html('')

	ReadAyat(ObjData.url, 'surah', numberSurah, ayat, results => {
		ObjData.result.loaderTiga.hide('slow').slideUp(1000)

		const res= JSON.parse(results)
		const SetFirst = res.data
		// console.log(SetFirst)
		const disabled = (SetFirst.number.inSurah == 1) ? 'disabled' : '';
		const disableTab = (SetFirst.number.inSurah == 1) ? 'tabindex="-1" aria-disabled="true"' : '';
		const SetTotal = SetFirst.surah.numberOfVerses;
		const NextData = (SetFirst.number.inSurah >= SetTotal) ? 1 : SetFirst.number.inSurah + 1;
		const DisableNext = (SetFirst.number.inSurah >= SetTotal) ? 'disabled' : '';
		const PrevData = (SetFirst.number.inSurah != 1) ? SetFirst.number.inSurah - 1 : '';

		const ActiveData = SetFirst.number.inSurah
			

		const FirstData = (SetFirst.number.inSurah > 1) ? (ActiveData + 1) - ActiveData : '';

		const LastData = (SetFirst.number.inSurah > 1) ? (ActiveData - ActiveData)+SetTotal : '';

		// console.log(SetFirst);

			ObjData.result.pagination.append(`
				<li class="page-item ${disabled}">
			      <a class="page-link" aria-label="Previous" id="prev" data-total="${SetTotal}" data-surah="${numberSurah}" data-ayat="${FirstData}">
			        <span aria-hidden="true">&laquo;</span>
			      </a>
			    </li>

				<li class="page-item ${disabled}">
			      <a class="page-link" ${disableTab} id="prev" data-total="${SetTotal}" data-surah="${numberSurah}" data-ayat="${PrevData}">Previous</a>
			    </li>
			`);

			ObjData.result.viewAyat.append(`
				<h1>${SetFirst.text.arab} . <span class="number-ayat">${SetFirst.number.inSurah}</span></h1>
				<p>${SetFirst.text.transliteration.en}</p>

					<audio controls>
						<source src="${SetFirst.audio.secondary[0]}" type="audio/mp3">
					</audio>

				<blockquote class="mb-5">- ${SetFirst.translation.id}</blockquote>
			`)

			ObjData.result.pagination.append(`
				<li class="page-item ${DisableNext}">
					<a class="page-link" data-total="${SetTotal}" data-surah="${numberSurah}" data-ayat="${NextData}" id="next">Next</a>
				</li>
				<li class="page-item ${DisableNext}">
			      <a class="page-link" aria-label="Next" id="next" data-total="${SetTotal}" data-surah="${numberSurah}" data-ayat="${LastData}">
			        <span aria-hidden="true">&raquo;</span>
			      </a>
			    </li>
			`)
	}, (err)=>{
		console.log('Errors results : ', err)
	})
})

// ObjData.result.loader.style.display="none";
// ObjData.result.loaderDua.style.display="none";


// NewsMedia(ObjData.baseAPI.news, ObjData.apiNews.country, ObjData.apiNews.apiKey)
// .then(res => {
// 	// console.log(res)
// 	const resNews = res.articles
// 	$('#select-news').append(`
// 		<option value="choose">Choose ... </option>
// 	`)

// 	resNews.map((key, index) => {
// 		$('#select-news').append(`
// 			<option id="pilih" value="${index}">${key.source.name}</option>
// 		`)
// 	})
// })


// ObjData.pilihMedia.on('click', function(){
// 	const newsSelect = $('#select-news').val();

// 	if(newsSelect === 'choose' || newsSelect === null){
// 		ObjData.result.hasil.innerHtml=''
// 		ObjData.result.viewAyat.innerHtml=''
// 		ObjData.result.pagination.innerHtml=''
// 		ObjData.result.error.append(`
// 			<div class="alert alert-warning" role="alert">
// 				  Pilih Nama Media Online Terlebih dahulu
// 			</div>
// 		`)
// 	}else {

// 		GetNews(ObjData.baseAPI.proxy, ObjData.baseAPI.news, ObjData.apiNews.country, ObjData.apiNews.apiKey)
// 		.then(res => {
// 			$('#select-news').val('choose')
// 			const getNews = res.articles[newsSelect]
// 			$('#news-list').append(`
// 				<div class="mt-2 mb-2">
// 					<div class="card mb-5 mt-2">

// 						<img src="${getNews.urlToImage}" class="card-img-top float-left img-responsive" style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19) !important; color: rgba(255, 228, 181); border-radius: 0%;" alt="${getNews.title}">
// 						<div class="card-body">
// 							<h5 class="card-title">${getNews.title}</h5>

// 							<h6 class="card-subtitle mb-2 text-muted">${getNews.publishAt}</h6>

// 							<p>${getNews.content}</p>
// 							<a href="${getNews.url}" class="card-link see-detail" ObjData-id="${newsSelect}" target="_blank">See Detail</a>
// 						</div> 
// 				</div>
// 			`)
// 		}).catch(err=>{
// 			console.log('Something when wrong', err)
// 		})

// 	}
// })
