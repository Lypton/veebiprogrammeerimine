//Blokid
let modal;
let modalImg;
let captionText;
let photoId;
let photoDir = "../picuploadw600h400/";

window.onload = function (){
	modal = document.getElementById("myModal");
	modalImg = document.getElementById("modalImg");
	captionText = document.getElementById("caption");
	let allThumbs = document.getElementById("gallery").getElementsByTagName("img");
	let thumbCount = allThumbs.length;
	for(let i = 0; i < thumbCount; i ++){
		allThumbs[i].addEventListener("click", openModal);
	}
	document.getElementById("close").addEventListener("click", closeModal);
	document.getElementById("storeRating").addEventListener("click", storeRating);
}

//Funktsioonid:
function storeRating(){
	let rating = 0;
	for(let i = 1; i < 6; i++){
		if(document.getElementById("rate" + i).checked){
			rating = document.getElementById("rate" + i).value;
		}
	}
	if(rating > 0){
		//AJAX
		let webRequest = new XMLHttpRequest();
		webRequest.onreadystatechange = function(){
			if(this.readyState == 4 && this.status == 200){
				console.log(this.responseText);
			}
		}
		webRequest.open("GET", "storePhotoRating.php?rating=" + rating, true);
		webRequest.send();
	}
}

function openModal(e){
	console.log(e);
	modalImg.src = photoDir + e.target.dataset.fn;
	modalImg.alt = e.target.alt;
	modal.style.display = "block";
}

function closeModal(){
	modal.style.display = "none"; 
}