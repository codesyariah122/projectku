// const searchButton = document.querySelector('#search-button')

// searchButton.addEventListener('click', function() {
// 	const inputKeyword = document.querySelector('#search-input')

// 	fetch('http://omdbapi.com/?apiKey=43c80ec7&s=' + inputKeyword.value)
// 	.then(res => res.json())
// 	.then(data => {
//         console.log(data)
// 		const movies = data.Search
//         let cards = ''
//         movies.forEach( m => cards += showCards(m))
//         const movieContainer = document.querySelector('#movie-list')
//         movieContainer.innerHTML = cards


//         const modalDetailButton = document.querySelectorAll('.modal-detail-button')

//         modalDetailButton.forEach(dataBtn => {
//             dataBtn.addEventListener('click', function(){
//                 const imdbid = this.dataset.imdbid
//                 fetch('http://www.omdbapi.com/?apiKey=43c80ec7&i='+imdbid)
//                 .then( res => res.json())
//                 .then(data => {
//                     // console.log(data)
//                     const movieDetail = showMovieDetail(data)
//                     const modalBody = document.querySelector('.modal-body')
//                     modalBody.innerHTML=movieDetail
//                 })
//             })
//         })

// 	})
// 	.catch(err => console.log(`Error results : ${err}`))
// })




const searchButton = document.querySelector('#search-button')
searchButton.addEventListener('click', async function(){
    const inputKeyword = document.querySelector('#search-input')
    const movies = await getMovies(inputKeyword.value)
    updateUI(movies)
})

// event binding
document.addEventListener('click', async function(e){
    if(e.target.classList.contains('modal-detail-button')){
        const imdbID = e.target.dataset.imdbid
        console.log(imdbID)
        const movieDetail = await getMovieDetail(imdbID)
        updateUIDetail(movieDetail)
    }
})


function getMovieDetail(imdbid) {
    return fetch('http://www.omdbapi.com/?apiKey=43c80ec7&i='+imdbid)
    .then(response => response.json())
    .then(m => m)
}

function updateUIDetail(m) {
    const movieDetail = showMovieDetail(m)
    const modalBody = document.querySelector('.modal-body')
    modalBody.innerHTML = movieDetail
}

function getMovies(keyword){
    return fetch('http://omdbapi.com/?apiKey=43c80ec7&s=' + keyword)
    .then(response => response.json())
    .then(response => response.Search)
}

function updateUI(movies){
        let cards = ''
        movies.forEach( m => cards += showCards(m))
        const movieContainer = document.querySelector('#movie-list')
        movieContainer.innerHTML = cards
}

function showMovieDetail(m) {    
    return `
        <div class="card mb-3" style="max-width: 540px;">
              <div class="row justify-content-center no-gutters">
                <div class="col-md-4">
                  <img src="${m.Poster}" class="card-img" alt="...">
                </div>
                <div class="col-md-8">
                  <div class="card-body">
                    <h5 class="card-title">${m.Title}</h5>
                        
                        <ul>
                            <li>
                                <b> Plot : </b> 
                                ${m.Plot}
                            </li>
                            <li>
                                <b> Genre : </b>
                                ${m.Genre}
                            </li>

                            <li>
                                <b>Actors : </b>
                                ${m.Actors}
                            </li>
                        </ul>

                    <p class="card-text">
                    <small class="text-muted">${m.Released}</small></p>
                  </div>
                </div>
              </div>
            </div>
    `
}


function showCards(m) {
    console.log(m)
	return `
		<div class="col-md-4 my-3">
            <div class="card" style="width: 18rem;">
              <img src="${m.Poster}" class="card-img-top" alt="${m.Title}">
              <div class="card-body">
                <h5 class="card-title">${m.Title}</h5>
                <p class="card-text">${m.Year}</p>
                <a class="btn btn-primary modal-detail-button" data-toggle="modal" data-target="#exampleModal" data-imdbid="${m.imdbID}">Go somewhere</a>
              </div>
            </div>
        </div>
	`
}