const tabs = document.querySelectorAll('.tab_btn') ;
const all_content= document.querySelectorAll('.content') ;
let pro = document.getElementById('pro');
let log = document.getElementById('log');
let edit = document.getElementById('edit');
let div = document.getElementById('details');
let submit = document.getElementById('submit');
let cancel = document.getElementById('cancel');
let form = document.getElementById('form');


edit.addEventListener('click', () => {
    div.style.display = 'none';
    form.style.display = 'grid';
    console.log(tabs)
    // tabs[0].classList.add('active');
    // tabs[1].classList.remove('active');
    // tabs[2].classList.remove('active');
    

})

cancel.addEventListener('click', () => {
    div.style.display = 'grid';
    form.style.display = 'none';

})

submit.addEventListener('click', (e) => {
    let input = []
    input = document.getElementsByClassName('di');
    let hElements=[];
    hElements= document.getElementsByClassName("h");
    for (let i = 0; i < 5; i++) {
        hElements[i].innerText = input[i].value;
    }
    div.style.display = 'grid';
    form.style.display = 'none';
})




tabs.forEach((tab, index)=>{
tab.addEventListener( 'click' ,(e)=>{
tabs.forEach(tab=>{tab.classList.remove('active') } ) ;
index==0>0?tabs[index+1].classList.add('active'):tab.classList.add('active');
  
  var line=document.querySelector('.line');
line.style.width= e.target.offsetWidth + "px" ;
line.style.left= e.target.offsetLeft + "px";
  all_content.forEach(content=>{content.classList.remove('active')})
  all_content[index==0?0:index-1].classList.add( 'active' );
  })
})
