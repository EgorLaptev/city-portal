'use strict';

let cnvs = document.querySelectorAll('.photo-cnv');
let ctxs = [];

for(let i=0;i<cnvs.length;i++) {
	let cnv = cnvs[i];

	ctxs.push(cnv.getContext('2d'));

}

let photo1 = new Image(),
	photo2 = new Image();

photo1.src = './media/img/problem1.jpg';
photo2.src = './media/img/decision1.jpg';

ctxs[0].drawImage(photo1, 0, 0, cnvs[0].width/2, cnvs[0].height);
ctxs[0].drawImage(photo2, cnvs[0].width/2, 0, cnvs[0].width, cnvs[0].height);

cnvs[0].addEventListener('mousemove', evt => {

	let x = evt.pageX - cnvs[0].getBoundingClientRect().left;

	console.log(evt);
	console.log(cnvs[0].getBoundingClientRect().left);

	ctxs[0].drawImage(photo1, 0, 0, x, cnvs[0].height);
	ctxs[0].drawImage(photo2, x, 0, cnvs[0].width, cnvs[0].height);
});