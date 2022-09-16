function sortitem(choice){
    var itemArray = Array.prototype.slice.call(document.querySelectorAll('li.listings'),0);
    var items = document.querySelectorAll('tr.items');
    var tbody = document.querySelector('tbody');

// SORT ITEM BY DATE 
    if(choice == 'asc'){
        itemArray.sort((a,b)=>a.dataset.price - b.dataset.price);    
    }
    if(choice == 'desc'){
        itemArray.sort((a,b)=>b.dataset.price - a.dataset.price);    
    }
    if(choice == 'asc_cal'){
        itemArray.sort((a,b)=>a.dataset.calorie - b.dataset.calorie);    
    }
    if(choice == 'desc_cal'){
        itemArray.sort((a,b)=>b.dataset.calorie - a.dataset.calorie);
    console.log('CAL DESC');
    }   
    
    itemArray.forEach((li)=>{
        allproducts.appendChild(li);
    });
;}

//Event Listener
sort_price.addEventListener('change', (event) =>{
    event.preventDefault();

    sortitem(sort_price.value);           
})
sort_calorie.addEventListener('change', (event) =>{
    event.preventDefault();

    sortitem(sort_calorie.value);           
})