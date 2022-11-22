const template = document.createElement('template');
template.innerHTML = `
<style>

::-webkit-scrollbar {
	width: 20px;
  }
  ::-webkit-scrollbar-thumb {
	background: lightgray; 
	border-radius: 5px;
  }

.poster-container {
	width: 230px;
	position: absolute;
	top: 1vh;
	left: 20px;
}

.is-hidden { display: none; }

.poster {
	width: 100%;
	box-shadow: 0 5px 20px 3px rgba(0, 0, 0, 0.6);
	max-height: 37vh;
}

button {
    border-radius: 9px;
    background-color: #EDEDED;
    border: 1px;
}

a {
	color:white;
	text-decoration: none;
}

.ticket-container {
	background: #EDEDED;
	width: 270px;
	height: 520px;
	
	flex-direction: column;
	align-items: center;
	border-radius: 5px;
	position: absolute;
	top: 10vh;
	box-shadow: 0 5px 20px 3px rgba(0, 0, 0, 0.6);
	opacity: 0.75;

}

.ticket-container:hover {
	opacity: 1;
	
	z-index: 1;
}

@keyframes bounceIn {
	0%,
	20%,
	40%,
	60%,
	80%,
	to {
		-webkit-animation-timing-function: cubic-bezier(0.215, 0.61, 0.355, 1);
		animation-timing-function: cubic-bezier(0.215, 0.61, 0.355, 1);
	}
	0% {
		opacity: 0;
		-webkit-transform: scale3d(0.3, 0.3, 0.3);
		transform: scale3d(0.3, 0.3, 0.3);
	}
	20% {
		-webkit-transform: scale3d(1.03, 1.03, 1.03);
		transform: scale3d(1.03, 1.03, 1.03);
	}
	40% {
		-webkit-transform: scale3d(0.9, 0.9, 0.9);
		transform: scale3d(0.9, 0.9, 0.9);
	}
	60% {
		opacity: 1;
		-webkit-transform: scale3d(1.01, 1.01, 1.01);
		transform: scale3d(1.01, 1.01, 1.01);
	}
	80% {
		-webkit-transform: scale3d(0.97, 0.97, 0.97);
		transform: scale3d(0.97, 0.97, 0.97);
	}
	to {
		opacity: 1;
		-webkit-transform: scaleX(1);
		transform: scaleX(1);
		z-index:3;
	}
}

.ticket__content {
	width: 100%;
	position: absolute;
	bottom: 0;
	text-align: center; 
}

.ticket__movie-title {
	text-transform: uppercase;
	margin:0;
	text-align: center; 
	color:#999;
	
}

.ticket__movie-rating {
	color: #999;
	position: static;
	bottom: 95px;
	font-size: 0.9rem;
	
}


.ticket__buy-btn {
	cursor: pointer;
	width: 100%;
	background: #30415D;
	color: #EDEDED;
	padding: 15px 0;
	font-size: 1rem;
	font-weight: bold;
	text-transform: uppercase;
	border: 0;
	border-radius: 5px;
    margin: 5px;
    width: 200px;
	margin-bottom: 15px;
}

#popup {
	display:none;
	padding-top:150px;
	position: absolute;
}

</style>

<div class="movie-card">
	
	
	<div class="ticket-container">
		<div class="poster-container">
			<img class="poster"/> 
		</div>
		<div class="ticket__content">
			<h4 class="ticket__movie-title">Movie Title</h4>
			<p class="ticket__movie-rating">Movie Rating</p>
			<a><button class="ticket__buy-btn" onclick="myFunction()">
			More Information
		</button></a>
		</div>
    </div>
	
</div>`;

function myFunction() {
	console.log("click");
}

function liveSearch() {
    // Locate the card elements
    let cards = document.querySelectorAll('movie-card')
    // Locate the search input
    let search_query = document.getElementById("searchbox").value;
    // Loop through the cards
    for (var i = 0; i < cards.length; i++) {
		const box = document.getElementById('box');
        // If the text is within the card...
        if(cards[i].getAttribute('movie').toLowerCase().includes(search_query.toLowerCase())) {
            // ...remove the `.is-hidden` class.
            cards[i].classList.remove("is-hidden");
        } else {
        	// Otherwise, add the class.
        	cards[i].classList.add("is-hidden");
        }
    }
            
    let typingTimer;        
    let typeInterval = 500; // Half a second
    let searchInput = document.getElementById('searchbox');

    searchInput.addEventListener('keyup', () => {
    clearTimeout(typingTimer);
    typingTimer = setTimeout(liveSearch, typeInterval);
    });
}

class movieCard extends HTMLElement{
 constructor(){
     super();
     this.attachShadow({ mode: 'open'});
     this.shadowRoot.appendChild(template.content.cloneNode(true));
     this.shadowRoot.querySelector('h4').innerText = this.getAttribute('movie');
	 this.shadowRoot.querySelector('p').innerText = this.getAttribute('rating');
	 this.shadowRoot.querySelector('img').src = this.getAttribute('poster');  
	 this.shadowRoot.querySelector('a').href=this.getAttribute('page');
	 console.log(this.getAttribute('page'));
 } 

 connectedCallback(){
   this.h4 = this.getAttribute("movie");
   this.render();
 }

 render(){
   this.h4;
 }
}
window.customElements.define('movie-card', movieCard);