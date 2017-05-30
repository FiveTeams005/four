/*
*页面加载动画；
*/
function Loading(){
	  var appId =  document.getElementsByTagName('body')[0];
	
	  this.oDiv = document.createElement('div');
	  this.oDiv.id='loading';
	  this.oDiv.innerHTML = 
	      '<main class="loaded">\
	        <div class="loaders">\
	          <div class="loader">\
	            <div class="loader-inner pacman">\
		              <div></div>\
		              <div></div>\
		              <div></div>\
		              <div></div>\
		              <div></div>\
	            </div>\
	          </div>\
	        </div>\
	      </main>';
	 appId.appendChild(this.oDiv);
}