'use strict';

let verify_del = document.getElementsByClassName('verify_del'),
	cancel	   = document.getElementsByClassName('cancel'),
	del 	   = document.getElementsByClassName('delete');

for(let i=0;i<cancel.length;i++) {
	cancel[i].addEventListener('click', ()=>{
		verify_del[i].style.display = 'none';
		del[i].style.display = 'block';
	});
}


for(let i=0;i<del.length;i++) {
	del[i].addEventListener('click', ()=>{
		verify_del[i].style.display = 'block';
		del[i].style.display = 'none';
	});
}



