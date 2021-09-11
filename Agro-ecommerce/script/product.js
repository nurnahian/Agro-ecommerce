var right = document.getElementById('arrow-right');
var left = document.getElementById('arrow-left');
var quantity = document.getElementById('quantity-no');
var total = document.getElementById('total-cash');
var i = 0;


right.onclick = function increase(){
  i+= 1;
  if(i<10){
    quantity.innerHTML = "0" +i;
    updateTotal();
  }else if(i>=999){
    i=999;
    quantity.innerHTML = i;
  }else{
    quantity.innerHTML = i;
    updateTotal();
  }
}

left.onclick = function decrease(){
  if(i<=0){
    quantity.innerHTML = "00";
    i=0;
    updateTotal();
  }else{
    i-= 1;
    if(i<10){
      quantity.innerHTML = "0" +i;
      updateTotal();
    }else{
      quantity.innerHTML = i;
      updateTotal();
    }
  }
}

function updateTotal(){
  total.innerHTML = "BDT" + i * 320 + ".00";
}

