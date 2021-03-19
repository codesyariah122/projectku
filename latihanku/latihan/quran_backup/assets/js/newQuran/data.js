const ObjData = {
	'url': 'https://api.quran.sutanlab.id/',
	'prop': 'surah',
	'ip': $('#ip').data('ip'),
	'button': $('#pilih-surah'),
	'pilihMedia': $('#enter'),
	'selectSurah': $('.select-surah'),
	'select': {
		'surah': $('#select-surah'),
	},
	'result': {
		'hasil': $('.hasil'),
		'viewSurah': $('.view-surah'),
		'viewAyat': $('.view-ayat'),
		'BtnViewAyat': $('#view-ayat'),
		'pagination': $('.pagination'),
		'error': $('.error'),
		'loader': $('.loader'),
		'loaderDua': $('.loader2'),
		'loaderTiga': $('.loader3'),
	},
	'selectElementFetch': {
		'selectorId': document.getElementById('select-surah'),
		'createOptionElement': document.createElement('option'),
	},
	'selectBlank': {
		'text': 'Choose ... ',
		'value': 'choose',
		'option': 'selected'
	},

	apiNews: {
		country: Cookies.get('country_code'),
		apiKey: '5effd68f01ce47589b435b22ebdb06b9'
	},
	baseAPI: {
		proxy: 'https://cors-anywhere.herokuapp.com/',
		ip: 'https://api.ipify.org/?format=json',
		geo: 'https://tools.keycdn.com/geo.json',
		news: 'https://newsapi.org/v2/top-headlines/'
	}
}